<?php

namespace Database\Seeders\DE;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class DeWorkSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'work-de')->first();
        if (!$category) {
            $this->command->error('Category with slug "work-de" not found.');
            return;
        }


        $templatesData = [
            // --- Резюме (классическое) / Resume (Classic) ---

            [
                'slug' => 'resume-classic-de',
                'fields' => '[
                    {"name":"full_name","type":"text","required":true,"labels":{"de":"Vollständiger Name","en":"Full Name","uk":"Повне ім\'я","pl":"Imię i Nazwisko"}},
                    {"name":"address","type":"text","required":true,"labels":{"de":"Adresse","en":"Address","uk":"Адреса","pl":"Adres"}},
                    {"name":"phone","type":"text","required":true,"labels":{"de":"Telefon","en":"Phone","uk":"Телефон","pl":"Telefon"}},
                    {"name":"email","type":"email","required":true,"labels":{"de":"E-Mail","en":"Email","uk":"Електронна пошта","pl":"E-mail"}},
                    {"name":"date_of_birth","type":"date","required":true,"labels":{"de":"Geburtsdatum","en":"Date of Birth","uk":"Дата народження","pl":"Data urodzenia"}},
                    {"name":"place_of_birth","type":"text","required":true,"labels":{"de":"Geburtsort","en":"Place of Birth","uk":"Місце народження","pl":"Miejsce urodzenia"}},
                    {"name":"nationality","type":"text","required":true,"labels":{"de":"Nationalität","en":"Nationality","uk":"Громадянство","pl":"Narodowość"}},
                    {"name":"profile_summary","type":"textarea","required":true,"labels":{"de":"Persönliches Profil/Kurzprofil","en":"Personal Profile/Summary","uk":"Особистий профіль/Короткий опис","pl":"Profil osobisty/Podsumowanie"}},
                    {"name":"work_experience","type":"textarea","required":true,"labels":{"de":"Berufserfahrung (Unternehmen, Position, Zeitraum, Aufgaben)","en":"Work Experience (Company, Position, Period, Responsibilities)","uk":"Досвід роботи (Компанія, Посада, Період, Обов\'язки)","pl":"Doświadczenie zawodowe (Firma, Stanowisko, Okres, Obowiązki)"}},
                    {"name":"education","type":"textarea","required":true,"labels":{"de":"Ausbildung (Hochschule/Schule, Studiengang/Fachrichtung, Zeitraum, Abschluss)","en":"Education (University/School, Field of Study, Period, Degree)","uk":"Освіта (ВНЗ/Школа, Спеціальність, Період, Ступінь)","pl":"Wykształcenie (Uczelnia/Szkoła, Kierunek, Okres, Tytuł)"}},
                    {"name":"skills","type":"textarea","required":true,"labels":{"de":"Fähigkeiten (Sprachen, Software, weitere Qualifikationen)","en":"Skills (Languages, Software, other qualifications)","uk":"Навички (Мови, Програмне забезпечення, інші кваліфікації)","pl":"Umiejętności (Języki, Oprogramowanie, inne kwalifikacje)"}},
                    {"name":"hobbies_interests","type":"textarea","required":false,"labels":{"de":"Hobbys und Interessen (optional)","en":"Hobbies and Interests (optional)","uk":"Хобі та інтереси (необов\'язково)","pl":"Hobby i zainteresowania (opcjonalnie)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Lebenslauf (klassisch)',
                        'description' => 'Ein klar strukturierter Lebenslauf, der einen umfassenden Überblick über Ihre Qualifikationen und Erfahrungen bietet, ideal für traditionelle Bewerbungen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">Lebenslauf</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[full_name]]</p>
                                <p style="font-size: 12px;">[[address]] | Tel: [[phone]] | E-Mail: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Persönliche Daten</h2>
                                <p>Geburtsdatum: [[date_of_birth]]<br>Geburtsort: [[place_of_birth]]<br>Nationalität: [[nationality]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Profil</h2>
                                <p>[[profile_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Berufserfahrung</h2>
                                <p>[[work_experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Ausbildung</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Fähigkeiten</h2>
                                <p>[[skills]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Hobbys und Interessen</h2>
                                <p>[[hobbies_interests]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Ort, Datum: [[city]], [[current_date]]</p>
                                <p>___________________<br>([[full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Resume (Classic)',
                        'description' => 'A clearly structured resume providing a comprehensive overview of your qualifications and experience, ideal for traditional applications.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">Resume</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[full_name]]</p>
                                <p style="font-size: 12px;">[[address]] | Phone: [[phone]] | Email: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Personal Details</h2>
                                <p>Date of Birth: [[date_of_birth]]<br>Place of Birth: [[place_of_birth]]<br>Nationality: [[nationality]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Profile</h2>
                                <p>[[profile_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Work Experience</h2>
                                <p>[[work_experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Education</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Skills</h2>
                                <p>[[skills]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Hobbies and Interests</h2>
                                <p>[[hobbies_interests]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>City, Date: [[city]], [[current_date]]</p>
                                <p>___________________<br>([[full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Резюме (класичне)',
                        'description' => 'Чітко структуроване резюме, що надає повний огляд ваших кваліфікацій та досвіду, ідеально підходить для традиційних заявок.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">Резюме</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[full_name]]</p>
                                <p style="font-size: 12px;">[[address]] | Тел: [[phone]] | Електронна пошта: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Особисті дані</h2>
                                <p>Дата народження: [[date_of_birth]]<br>Місце народження: [[place_of_birth]]<br>Громадянство: [[nationality]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Профіль</h2>
                                <p>[[profile_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Досвід роботи</h2>
                                <p>[[work_experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Освіта</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Навички</h2>
                                <p>[[skills]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Хобі та інтереси</h2>
                                <p>[[hobbies_interests]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Місто, Дата: [[city]], [[current_date]]</p>
                                <p>___________________<br>([[full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Życiorys (klasyczny)',
                        'description' => 'Przejrzysty życiorys, który zapewnia kompleksowy przegląd Twoich kwalifikacji i doświadczenia, idealny do tradycyjnych aplikacji.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">Życiorys</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[full_name]]</p>
                                <p style="font-size: 12px;">[[address]] | Tel: [[phone]] | E-mail: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Dane osobowe</h2>
                                <p>Data urodzenia: [[date_of_birth]]<br>Miejsce urodzenia: [[place_of_birth]]<br>Narodowość: [[nationality]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Profil</h2>
                                <p>[[profile_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Doświadczenie zawodowe</h2>
                                <p>[[work_experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Wykształcenie</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Umiejętności</h2>
                                <p>[[skills]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Hobby i zainteresowania</h2>
                                <p>[[hobbies_interests]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Miejscowość, Data: [[city]], [[current_date]]</p>
                                <p>___________________<br>([[full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Резюме (хронологическое) / Resume (Chronological) ---
            [
                'slug' => 'resume-chronological-de',
                'fields' => '[
                    {"name":"full_name","type":"text","required":true,"labels":{"de":"Vollständiger Name","en":"Full Name","uk":"Повне ім\'я","pl":"Imię i Nazwisko"}},
                    {"name":"address","type":"text","required":true,"labels":{"de":"Adresse","en":"Address","uk":"Адреса","pl":"Adres"}},
                    {"name":"phone","type":"text","required":true,"labels":{"de":"Telefon","en":"Phone","uk":"Телефон","pl":"Telefon"}},
                    {"name":"email","type":"email","required":true,"labels":{"de":"E-Mail","en":"Email","uk":"Електронна пошта","pl":"E-mail"}},
                    {"name":"profile_summary","type":"textarea","required":true,"labels":{"de":"Kurzprofil/Zusammenfassung","en":"Profile Summary","uk":"Короткий профіль/Резюме","pl":"Podsumowanie profilu"}},
                    {"name":"work_experience_chronological","type":"textarea","required":true,"labels":{"de":"Berufserfahrung (chronologisch absteigend: Unternehmen, Position, Zeitraum, Aufgaben)","en":"Work Experience (reverse chronological: Company, Position, Period, Responsibilities)","uk":"Досвід роботи (у зворотному хронологічному порядку: Компанія, Посада, Період, Обов\'язки)","pl":"Doświadczenie zawodowe (chronologicznie malejąco: Firma, Stanowisko, Okres, Obowiązki)"}},
                    {"name":"education_chronological","type":"textarea","required":true,"labels":{"de":"Ausbildung (chronologisch absteigend: Hochschule/Schule, Studiengang/Fachrichtung, Zeitraum, Abschluss)","en":"Education (reverse chronological: University/School, Field of Study, Period, Degree)","uk":"Освіта (у зворотному хронологічному порядку: ВНЗ/Школа, Спеціальність, Період, Ступінь)","pl":"Wykształcenie (chronologicznie malejąco: Uczelnia/Szkoła, Kierunek, Okres, Tytuł)"}},
                    {"name":"skills","type":"textarea","required":true,"labels":{"de":"Fähigkeiten (Sprachen, Software, weitere Qualifikationen)","en":"Skills (Languages, Software, other qualifications)","uk":"Навички (Мови, Програмне забезпечення, інші кваліфікації)","pl":"Umiejętności (Języki, Oprogramowanie, inne kwalifikacje)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Lebenslauf (chronologisch)',
                        'description' => 'Ein klassischer Lebenslauf, der Ihre berufliche Laufbahn und Ausbildung in umgekehrter chronologischer Reihenfolge darstellt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">Lebenslauf</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[full_name]]</p>
                                <p style="font-size: 12px;">[[address]] | Tel: [[phone]] | E-Mail: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Kurzprofil</h2>
                                <p>[[profile_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Berufserfahrung</h2>
                                <p>[[work_experience_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Ausbildung</h2>
                                <p>[[education_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Fähigkeiten</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Ort, Datum: [[city]], [[current_date]]</p>
                                <p>___________________<br>([[full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Resume (Chronological)',
                        'description' => 'A classic resume presenting your career and education in reverse chronological order.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">Resume</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[full_name]]</p>
                                <p style="font-size: 12px;">[[address]] | Phone: [[phone]] | Email: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Profile Summary</h2>
                                <p>[[profile_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Work Experience</h2>
                                <p>[[work_experience_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Education</h2>
                                <p>[[education_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Skills</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>City, Date: [[city]], [[current_date]]</p>
                                <p>___________________<br>([[full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Резюме (хронологічне)',
                        'description' => 'Класичне резюме, що представляє вашу кар\'єру та освіту у зворотному хронологічному порядку.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">Резюме</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[full_name]]</p>
                                <p style="font-size: 12px;">[[address]] | Тел: [[phone]] | Електронна пошта: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Короткий профіль</h2>
                                <p>[[profile_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Досвід роботи</h2>
                                <p>[[work_experience_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Освіта</h2>
                                <p>[[education_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Навички</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Місто, Дата: [[city]], [[current_date]]</p>
                                <p>___________________<br>([[full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Życiorys (chronologiczny)',
                        'description' => 'Klasyczny życiorys przedstawiający Twoją karierę i wykształcenie w odwróconej kolejności chronologicznej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">Życiorys</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[full_name]]</p>
                                <p style="font-size: 12px;">[[address]] | Tel: [[phone]] | E-mail: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Podsumowanie profilu</h2>
                                <p>[[profile_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Doświadczenie zawodowe</h2>
                                <p>[[work_experience_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Wykształcenie</h2>
                                <p>[[education_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Umiejętności</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Miejscowość, Data: [[city]], [[current_date]]</p>
                                <p>___________________<br>([[full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Резюме (функциональное) / Resume (Functional) ---
            [
                'slug' => 'resume-functional-de',
                'fields' => '[
                    {"name":"full_name","type":"text","required":true,"labels":{"de":"Vollständiger Name","en":"Full Name","uk":"Повне ім\'я","pl":"Imię i Nazwisko"}},
                    {"name":"address","type":"text","required":true,"labels":{"de":"Adresse","en":"Address","uk":"Адреса","pl":"Adres"}},
                    {"name":"phone","type":"text","required":true,"labels":{"de":"Telefon","en":"Phone","uk":"Телефон","pl":"Telefon"}},
                    {"name":"email","type":"email","required":true,"labels":{"de":"E-Mail","en":"Email","uk":"Електронна пошта","pl":"E-mail"}},
                    {"name":"career_objective","type":"textarea","required":true,"labels":{"de":"Berufsziel","en":"Career Objective","uk":"Професійна мета","pl":"Cel zawodowy"}},
                    {"name":"skills_summary","type":"textarea","required":true,"labels":{"de":"Zusammenfassung der Fähigkeiten und Kompetenzen (nach Themenbereichen)","en":"Summary of Skills and Competencies (by thematic areas)","uk":"Підсумок навичок та компетенцій (за тематичними областями)","pl":"Podsumowanie umiejętności i kompetencji (według obszarów tematycznych)"}},
                    {"name":"key_achievements","type":"textarea","required":true,"labels":{"de":"Wichtigste Erfolge","en":"Key Achievements","uk":"Ключові досягнення","pl":"Kluczowe osiągnięcia"}},
                    {"name":"employment_history_brief","type":"textarea","required":true,"labels":{"de":"Beruflicher Werdegang (kurzgefasst: Unternehmen, Position, Zeitraum)","en":"Employment History (brief: Company, Position, Period)","uk":"Історія працевлаштування (коротко: Компанія, Посада, Період)","pl":"Historia zatrudnienia (skrócona: Firma, Stanowisko, Okres)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Lebenslauf (funktional)',
                        'description' => 'Ein funktionaler Lebenslauf, der Ihre Fähigkeiten und Kompetenzen hervorhebt, ideal für Quereinsteiger oder bei Lücken im Lebenslauf.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">Lebenslauf</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[full_name]]</p>
                                <p style="font-size: 12px;">[[address]] | Tel: [[phone]] | E-Mail: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Berufsziel</h2>
                                <p>[[career_objective]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Fähigkeiten und Kompetenzen</h2>
                                <p>[[skills_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Wichtigste Erfolge</h2>
                                <p>[[key_achievements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Beruflicher Werdegang</h2>
                                <p>[[employment_history_brief]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Ort, Datum: [[city]], [[current_date]]</p>
                                <p>___________________<br>([[full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Resume (Functional)',
                        'description' => 'A functional resume that highlights your skills and competencies, ideal for career changers or those with employment gaps.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">Resume</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[full_name]]</p>
                                <p style="font-size: 12px;">[[address]] | Phone: [[phone]] | Email: [[email]]</p>
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
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>City, Date: [[city]], [[current_date]]</p>
                                <p>___________________<br>([[full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Резюме (функціональне)',
                        'description' => 'Функціональне резюме, що підкреслює ваші навички та компетенції, ідеально підходить для тих, хто змінює кар\'єру або має прогалини в резюме.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">Резюме</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[full_name]]</p>
                                <p style="font-size: 12px;">[[address]] | Тел: [[phone]] | Електронна пошта: [[email]]</p>
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
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Місто, Дата: [[city]], [[current_date]]</p>
                                <p>___________________<br>([[full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Życiorys (funkcjonalny)',
                        'description' => 'Funkcjonalny życiorys, który podkreśla Twoje umiejętności i kompetencje, idealny dla osób zmieniających branżę lub z lukami w zatrudnieniu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">Życiorys</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[full_name]]</p>
                                <p style="font-size: 12px;">[[address]] | Tel: [[phone]] | E-mail: [[email]]</p>
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
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Miejscowość, Data: [[city]], [[current_date]]</p>
                                <p>___________________<br>([[full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Сопроводительное письмо к резюме / Cover Letter ---
            [
                'slug' => 'cover-letter-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"de":"Ort","en":"City","uk":"Місто","pl":"Miejscowość"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"de":"Vollständiger Name des Bewerbers","en":"Applicant\'s Full Name","uk":"ПІБ заявника","pl":"Imię i nazwisko aplikanta"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"de":"Adresse des Bewerbers","en":"Applicant\'s Address","uk":"Адреса заявника","pl":"Adres aplikanta"}},
                    {"name":"applicant_phone","type":"text","required":true,"labels":{"de":"Telefon des Bewerbers","en":"Applicant\'s Phone","uk":"Телефон заявника","pl":"Telefon aplikanta"}},
                    {"name":"applicant_email","type":"email","required":true,"labels":{"de":"E-Mail des Bewerbers","en":"Applicant\'s Email","uk":"Електронна пошта заявника","pl":"E-mail aplikanta"}},
                    {"name":"recipient_company_name","type":"text","required":true,"labels":{"de":"Name des Unternehmens","en":"Company Name","uk":"Назва компанії","pl":"Nazwa firmy"}},
                    {"name":"recipient_company_address","type":"text","required":true,"labels":{"de":"Adresse des Unternehmens","en":"Company Address","uk":"Адреса компанії","pl":"Adres firmy"}},
                    {"name":"contact_person_full_name","type":"text","required":false,"labels":{"de":"Ansprechpartner (optional)","en":"Contact Person (optional)","uk":"Контактна особа (необов\'язково)","pl":"Osoba kontaktowa (opcjonalnie)"}},
                    {"name":"job_title","type":"text","required":true,"labels":{"de":"Stellenbezeichnung","en":"Job Title","uk":"Назва посади","pl":"Stanowisko"}},
                    {"name":"reference_number","type":"text","required":false,"labels":{"de":"Referenznummer (optional)","en":"Reference Number (optional)","uk":"Номер посилання (необов\'язково)","pl":"Numer referencyjny (opcjonalnie)"}},
                    {"name":"letter_body","type":"textarea","required":true,"labels":{"de":"Inhalt des Anschreibens","en":"Content of the cover letter","uk":"Зміст супровідного листа","pl":"Treść listu motywacyjnego"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Anschreiben (Bewerbung)',
                        'description' => 'Ein professionelles Anschreiben, das Ihre Motivation und Eignung für die beworbene Stelle hervorhebt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>Tel: [[applicant_phone]]<br>E-Mail: [[applicant_email]]</p>
                                <br/>
                                <p>[[city]], den [[current_date]]</p>
                                <br/>
                                <p>[[recipient_company_name]]<br>[[recipient_company_address]]</p>
                                <p>z.Hd. Herrn/Frau [[contact_person_full_name]] (falls zutreffend)</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Bewerbung als [[job_title]]</h1>
                                <p style="font-size: 12px;">Referenznummer: [[reference_number]] (falls zutreffend)</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[contact_person_full_name]] (oder "Sehr geehrte Damen und Herren,"),</p>
                                <p>[[letter_body]]</p>
                                <p>Über eine Einladung zu einem persönlichen Gespräch freue ich mich sehr.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Cover Letter (Application)',
                        'description' => 'A professional cover letter highlighting your motivation and suitability for the advertised position.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>Phone: [[applicant_phone]]<br>Email: [[applicant_email]]</p>
                                <br/>
                                <p>[[city]], [[current_date]]</p>
                                <br/>
                                <p>[[recipient_company_name]]<br>[[recipient_company_address]]</p>
                                <p>Attn. Mr./Ms. [[contact_person_full_name]] (if applicable)</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Application for [[job_title]]</h1>
                                <p style="font-size: 12px;">Reference Number: [[reference_number]] (if applicable)</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Mr./Ms. [[contact_person_full_name]] (or "Dear Sir/Madam,"),</p>
                                <p>[[letter_body]]</p>
                                <p>I look forward to an invitation for a personal interview.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Супровідний лист (Заява)',
                        'description' => 'Професійний супровідний лист, що підкреслює вашу мотивацію та відповідність вакансії, на яку ви претендуєте.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>Тел: [[applicant_phone]]<br>Електронна пошта: [[applicant_email]]</p>
                                <br/>
                                <p>[[city]], [[current_date]]</p>
                                <br/>
                                <p>[[recipient_company_name]]<br>[[recipient_company_address]]</p>
                                <p>На ім\'я пана/пані [[contact_person_full_name]] (якщо застосовно)</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Заява на посаду [[job_title]]</h1>
                                <p style="font-size: 12px;">Номер посилання: [[reference_number]] (якщо застосовно)</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а пане/пані [[contact_person_full_name]] (або "Шановні пані та панове,"),</p>
                                <p>[[letter_body]]</p>
                                <p>Буду радий/рада запрошенню на особисту співбесіду.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'List motywacyjny (aplikacja)',
                        'description' => 'Profesjonalny list motywacyjny podkreślający Twoją motywację i przydatność na stanowisko, na które aplikujesz.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>Tel: [[applicant_phone]]<br>E-mail: [[applicant_email]]</p>
                                <br/>
                                <p>[[city]], [[current_date]]</p>
                                <br/>
                                <p>[[recipient_company_name]]<br>[[recipient_company_address]]</p>
                                <p>Do rąk Pana/Pani [[contact_person_full_name]] (jeśli dotyczy)</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Aplikacja na stanowisko [[job_title]]</h1>
                                <p style="font-size: 12px;">Numer referencyjny: [[reference_number]] (jeśli dotyczy)</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny/a Panie/Pani [[contact_person_full_name]] (lub "Szanowni Państwo,"),</p>
                                <p>[[letter_body]]</p>
                                <p>Z przyjemnością oczekuję na zaproszenie na rozmowę kwalifikacyjną.</p>
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

            // --- Заявление о приеме на работу / Job Application Statement ---
            [
                'slug' => 'job-application-statement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"de":"Ort","en":"City","uk":"Місто","pl":"Miejscowość"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"de":"Vollständiger Name des Bewerbers","en":"Applicant\'s Full Name","uk":"ПІБ заявника","pl":"Imię i nazwisko wnioskodawcy"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"de":"Adresse des Bewerbers","en":"Applicant\'s Address","uk":"Адреса заявника","pl":"Adres wnioskodawcy"}},
                    {"name":"applicant_phone","type":"text","required":true,"labels":{"de":"Telefon des Bewerbers","en":"Applicant\'s Phone","uk":"Телефон заявника","pl":"Telefon wnioskodawcy"}},
                    {"name":"applicant_email","type":"email","required":true,"labels":{"de":"E-Mail des Bewerbers","en":"Applicant\'s Email","uk":"Електронна пошта заявника","pl":"E-mail wnioskodawcy"}},
                    {"name":"recipient_company_name","type":"text","required":true,"labels":{"de":"Name des Unternehmens","en":"Company Name","uk":"Назва компанії","pl":"Nazwa firmy"}},
                    {"name":"recipient_company_address","type":"text","required":true,"labels":{"de":"Adresse des Unternehmens","en":"Company Address","uk":"Адреса компанії","pl":"Adres firmy"}},
                    {"name":"job_title","type":"text","required":true,"labels":{"de":"Stellenbezeichnung","en":"Job Title","uk":"Назва посади","pl":"Stanowisko"}},
                    {"name":"earliest_start_date","type":"date","required":true,"labels":{"de":"Frühestmöglicher Eintrittstermin","en":"Earliest Start Date","uk":"Найраніша дата початку роботи","pl":"Najwcześniejsza data rozpoczęcia pracy"}},
                    {"name":"salary_expectation","type":"text","required":false,"labels":{"de":"Gehaltsvorstellung (optional)","en":"Salary Expectation (optional)","uk":"Очікувана зарплата (необов\'язково)","pl":"Oczekiwania finansowe (opcjonalnie)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Bewerbungsschreiben',
                        'description' => 'Ein formelles Bewerbungsschreiben, das Ihr Interesse an einer bestimmten Position und Ihre Verfügbarkeit darlegt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>Tel: [[applicant_phone]]<br>E-Mail: [[applicant_email]]</p>
                                <br/>
                                <p>[[city]], den [[current_date]]</p>
                                <br/>
                                <p>[[recipient_company_name]]<br>[[recipient_company_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Bewerbung als [[job_title]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>mit großem Interesse habe ich Ihre Stellenausschreibung für die Position als <strong>[[job_title]]</strong> gelesen. Hiermit bewerbe ich mich um diese Position in Ihrem Unternehmen.</p>
                                <p>Ich bin davon überzeugt, dass meine Qualifikationen und Erfahrungen, die ich in meinem beigefügten Lebenslauf detailliert darlege, eine wertvolle Bereicherung für Ihr Team darstellen werden.</p>
                                <p>Mein frühestmöglicher Eintrittstermin ist der [[earliest_start_date]]. Meine Gehaltsvorstellung liegt bei [[salary_expectation]].</p>
                                <p>Über die Möglichkeit, mich persönlich vorzustellen, würde ich mich sehr freuen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Job Application Statement',
                        'description' => 'A formal job application stating your interest in a specific position and your availability.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>Phone: [[applicant_phone]]<br>Email: [[applicant_email]]</p>
                                <br/>
                                <p>[[city]], [[current_date]]</p>
                                <br/>
                                <p>[[recipient_company_name]]<br>[[recipient_company_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Application for [[job_title]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Sir/Madam,</p>
                                <p>I have read your job advertisement for the position of <strong>[[job_title]]</strong> with great interest. I hereby apply for this position in your company.</p>
                                <p>I am convinced that my qualifications and experience, which I detail in my attached resume, will be a valuable asset to your team.</p>
                                <p>My earliest possible start date is [[earliest_start_date]]. My salary expectation is [[salary_expectation]].</p>
                                <p>I would be very pleased to have the opportunity to introduce myself in person.</p>
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
                        'description' => 'Формальна заява про прийом на роботу, що викладає ваш інтерес до певної посади та вашу доступність.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>Тел: [[applicant_phone]]<br>Електронна пошта: [[applicant_email]]</p>
                                <br/>
                                <p>[[city]], [[current_date]]</p>
                                <br/>
                                <p>[[recipient_company_name]]<br>[[recipient_company_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Заява про прийом на роботу [[job_title]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановні пані та панове,</p>
                                <p>З великим інтересом ознайомився/ознайомилася з вашим оголошенням про вакансію на посаду <strong>[[job_title]]</strong>. Цим я подаю заяву на цю посаду у вашій компанії.</p>
                                <p>Я переконаний/переконана, що мої кваліфікації та досвід, які я детально викладаю у своєму доданому резюме, стануть цінним надбанням для вашої команди.</p>
                                <p>Моя найраніша можлива дата початку роботи – [[earliest_start_date]]. Мої очікування щодо заробітної плати становлять [[salary_expectation]].</p>
                                <p>Буду дуже радий/рада можливості представитися особисто.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Podanie o pracę',
                        'description' => 'Formalne podanie o pracę, przedstawiające Twoje zainteresowanie konkretnym stanowiskiem i Twoją dostępność.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>Tel: [[applicant_phone]]<br>E-mail: [[applicant_email]]</p>
                                <br/>
                                <p>[[city]], [[current_date]]</p>
                                <br/>
                                <p>[[recipient_company_name]]<br>[[recipient_company_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Podanie o pracę na stanowisko [[job_title]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowni Państwo,</p>
                                <p>Z dużym zainteresowaniem zapoznałem/zapoznałam się z Państwa ogłoszeniem o pracę na stanowisko <strong>[[job_title]]</strong>. Niniejszym składam podanie o tę pozycję w Państwa firmie.</p>
                                <p>Jestem przekonany/przekonana, że moje kwalifikacje i doświadczenie, które szczegółowo przedstawiam w załączonym życiorysie, będą cennym wzbogaceniem dla Państwa zespołu.</p>
                                <p>Mój najwcześniejszy możliwy termin rozpoczęcia pracy to [[earliest_start_date]]. Moje oczekiwania finansowe wynoszą [[salary_expectation]].</p>
                                <p>Z przyjemnością oczekuję na zaproszenie na osobistą rozmowę.</p>
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

            // --- Трудовой договор (бессрочный) / Permanent Employment Contract ---
            [
                'slug' => 'permanent-employment-contract-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"de":"Ort","en":"City","uk":"Місто","pl":"Miejscowość"}},
                    {"name":"contract_date","type":"date","required":true,"labels":{"de":"Datum des Vertragsabschlusses","en":"Date of Contract Conclusion","uk":"Дата укладення договору","pl":"Data zawarcia umowy"}},
                    {"name":"employer_company_name","type":"text","required":true,"labels":{"de":"Name des Arbeitgebers (Firma)","en":"Employer Company Name","uk":"Назва компанії роботодавця","pl":"Nazwa firmy pracodawcy"}},
                    {"name":"employer_address","type":"text","required":true,"labels":{"de":"Adresse des Arbeitgebers","en":"Employer Address","uk":"Адреса роботодавця","pl":"Adres pracodawcy"}},
                    {"name":"employer_legal_form","type":"text","required":false,"labels":{"de":"Rechtsform des Arbeitgebers (z.B. GmbH, AG)","en":"Employer Legal Form (e.g., GmbH, AG)","uk":"Правова форма роботодавця (напр., ТОВ, АТ)","pl":"Forma prawna pracodawcy (np. sp. z o.o., S.A.)"}},
                    {"name":"employer_represented_by","type":"text","required":true,"labels":{"de":"Vertreten durch (Name, Position)","en":"Represented by (Name, Position)","uk":"Представлений (Ім\'я, Посада)","pl":"Reprezentowany przez (Imię, Stanowisko)"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"de":"Vollständiger Name des Arbeitnehmers","en":"Employee Full Name","uk":"Повне ім\'я працівника","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"de":"Adresse des Arbeitnehmers","en":"Employee Address","uk":"Адреса працівника","pl":"Adres pracownika"}},
                    {"name":"employee_date_of_birth","type":"date","required":true,"labels":{"de":"Geburtsdatum des Arbeitnehmers","en":"Employee Date of Birth","uk":"Дата народження працівника","pl":"Data urodzenia pracownika"}},
                    {"name":"employee_place_of_birth","type":"text","required":true,"labels":{"de":"Geburtsort des Arbeitnehmers","en":"Employee Place of Birth","uk":"Місце народження працівника","pl":"Miejsce urodzenia pracownika"}},
                    {"name":"job_title","type":"text","required":true,"labels":{"de":"Berufsbezeichnung/Position","en":"Job Title/Position","uk":"Назва посади/Позиція","pl":"Nazwa stanowiska/Pozycja"}},
                    {"name":"start_date","type":"date","required":true,"labels":{"de":"Beginn des Arbeitsverhältnisses","en":"Start Date of Employment","uk":"Дата початку трудових відносин","pl":"Data rozpoczęcia zatrudnienia"}},
                    {"name":"probation_period_months","type":"number","required":false,"labels":{"de":"Probezeit (in Monaten, optional)","en":"Probation Period (in months, optional)","uk":"Випробувальний термін (у місяцях, необов\'язково)","pl":"Okres próbny (w miesiącach, opcjonalnie)"}},
                    {"name":"weekly_working_hours","type":"number","required":true,"labels":{"de":"Wöchentliche Arbeitszeit (Stunden)","en":"Weekly Working Hours (hours)","uk":"Щотижневий робочий час (години)","pl":"Tygodniowy czas pracy (godziny)"}},
                    {"name":"gross_salary_per_month","type":"number","required":true,"labels":{"de":"Bruttomonatsgehalt (EUR)","en":"Gross Monthly Salary (EUR)","uk":"Валова місячна заробітна плата (EUR)","pl":"Miesięczne wynagrodzenie brutto (EUR)"}},
                    {"name":"annual_leave_days","type":"number","required":true,"labels":{"de":"Jahresurlaub (Arbeitstage)","en":"Annual Leave (working days)","uk":"Щорічна відпустка (робочі дні)","pl":"Urlop roczny (dni robocze)"}},
                    {"name":"notice_period","type":"textarea","required":true,"labels":{"de":"Kündigungsfristen","en":"Notice Periods","uk":"Терміни повідомлення про звільнення","pl":"Okresy wypowiedzenia"}},
                    {"name":"other_provisions","type":"textarea","required":false,"labels":{"de":"Sonstige Bestimmungen (optional)","en":"Other Provisions (optional)","uk":"Інші положення (необов\'язково)","pl":"Inne postanowienia (opcjonalnie)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Arbeitsvertrag (unbefristet)',
                        'description' => 'Ein unbefristeter Arbeitsvertrag nach deutschem Arbeitsrecht, der die wesentlichen Bedingungen des Arbeitsverhältn regelt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Arbeitsvertrag</h1>
                                <p style="font-size: 14px;">(Unbefristet)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Abgeschlossen in [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>am [[contract_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwischen</p>
                                <p><strong>[[employer_company_name]]</strong><br>[[employer_address]]<br>([[employer_legal_form]])<br>vertreten durch [[employer_represented_by]]</p>
                                <p>– im Folgenden „Arbeitgeber“ genannt –</p>
                                <br/>
                                <p>und</p>
                                <p>Herrn/Frau <strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Geburtsdatum: [[employee_date_of_birth]]<br>Geburtsort: [[employee_place_of_birth]]</p>
                                <p>– im Folgenden „Arbeitnehmer“ genannt –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Beginn des Arbeitsverhältnisses und Position</h2>
                                <p>Das Arbeitsverhältnis beginnt am <strong>[[start_date]]</strong> und wird auf unbestimmte Zeit geschlossen.</p>
                                <p>Der Arbeitnehmer wird als <strong>[[job_title]]</strong> eingestellt.</p>
                                <p>Die ersten [[probation_period_months]] Monate gelten als Probezeit (falls zutreffend).</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Arbeitszeit</h2>
                                <p>Die regelmäßige wöchentliche Arbeitszeit beträgt <strong>[[weekly_working_hours]] Stunden</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Vergütung</h2>
                                <p>Der Arbeitnehmer erhält ein Bruttomonatsgehalt von <strong>[[gross_salary_per_month]] EUR</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Urlaub</h2>
                                <p>Der Jahresurlaub beträgt <strong>[[annual_leave_days]] Arbeitstage</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 5 Kündigung</h2>
                                <p>Die Kündigungsfristen richten sich nach den gesetzlichen Bestimmungen, sofern einzelvertraglich nichts anderes vereinbart ist: [[notice_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 6 Sonstige Bestimmungen</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 7 Schlussbestimmungen</h2>
                                <p>Änderungen und Ergänzungen dieses Vertrages bedürfen der Schriftform. Sollten einzelne Bestimmungen dieses Vertrages unwirksam sein oder werden, so wird die Wirksamkeit der übrigen Bestimmungen dadurch nicht berührt. Es gilt deutsches Recht. Gerichtsstand ist [[city]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Arbeitgeber</p></td>
                                <td width="50%"><p>___________________<br>Arbeitnehmer</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Permanent Employment Contract',
                        'description' => 'An indefinite-term employment contract under German labor law, regulating the essential terms of employment.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Employment Contract</h1>
                                <p style="font-size: 14px;">(Permanent)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Concluded in [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>on [[contract_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Between</p>
                                <p><strong>[[employer_company_name]]</strong><br>[[employer_address]]<br>([[employer_legal_form]])<br>represented by [[employer_represented_by]]</p>
                                <p>– hereinafter referred to as the "Employer" –</p>
                                <br/>
                                <p>and</p>
                                <p>Mr./Ms. <strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Date of Birth: [[employee_date_of_birth]]<br>Place of Birth: [[employee_place_of_birth]]</p>
                                <p>– hereinafter referred to as the "Employee" –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Commencement of Employment and Position</h2>
                                <p>The employment relationship begins on <strong>[[start_date]]</strong> and is concluded for an indefinite period.</p>
                                <p>The Employee is hired as <strong>[[job_title]]</strong>.</p>
                                <p>The first [[probation_period_months]] months constitute a probationary period (if applicable).</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Working Hours</h2>
                                <p>The regular weekly working hours are <strong>[[weekly_working_hours]] hours</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Remuneration</h2>
                                <p>The Employee receives a gross monthly salary of <strong>[[gross_salary_per_month]] EUR</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Leave</h2>
                                <p>Annual leave amounts to <strong>[[annual_leave_days]] working days</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 5 Termination</h2>
                                <p>Notice periods are governed by statutory provisions, unless otherwise agreed individually: [[notice_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 6 Other Provisions</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 7 Final Provisions</h2>
                                <p>Amendments and additions to this contract require written form. Should individual provisions of this contract be or become invalid, the validity of the remaining provisions shall not be affected thereby. German law applies. The place of jurisdiction is [[city]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Employer</p></td>
                                <td width="50%"><p>___________________<br>Employee</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Трудовий договір (безстроковий)',
                        'description' => 'Безстроковий трудовий договір згідно з німецьким трудовим правом, що регулює основні умови трудових відносин.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Трудовий договір</h1>
                                <p style="font-size: 14px;">(Безстроковий)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Укладено в [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[contract_date]] р.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Між</p>
                                <p><strong>[[employer_company_name]]</strong><br>[[employer_address]]<br>([[employer_legal_form]])<br>представлений [[employer_represented_by]]</p>
                                <p>– надалі іменований «Роботодавець» –</p>
                                <br/>
                                <p>та</p>
                                <p>Паном/Пані <strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Дата народження: [[employee_date_of_birth]]<br>Місце народження: [[employee_place_of_birth]]</p>
                                <p>– надалі іменований «Працівник» –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Початок трудових відносин та посада</h2>
                                <p>Трудові відносини починаються <strong>[[start_date]]</strong> та укладаються на невизначений термін.</p>
                                <p>Працівник приймається на посаду <strong>[[job_title]]</strong>.</p>
                                <p>Перші [[probation_period_months]] місяців є випробувальним терміном (якщо застосовно).</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Робочий час</h2>
                                <p>Регулярний щотижневий робочий час становить <strong>[[weekly_working_hours]] годин</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Винагорода</h2>
                                <p>Працівник отримує валову місячну заробітну плату у розмірі <strong>[[gross_salary_per_month]] EUR</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Відпустка</h2>
                                <p>Щорічна відпустка становить <strong>[[annual_leave_days]] робочих днів</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 5 Розірвання</h2>
                                <p>Терміни повідомлення про розірвання регулюються законодавчими положеннями, якщо інше не погоджено індивідуально: [[notice_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 6 Інші положення</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 7 Прикінцеві положення</h2>
                                <p>Зміни та доповнення до цього договору потребують письмової форми. Якщо окремі положення цього договору є або стануть недійсними, це не впливає на дійсність інших положень. Застосовується німецьке право. Місцезнаходження суду – [[city]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Роботодавець</p></td>
                                <td width="50%"><p>___________________<br>Працівник</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o pracę (na czas nieokreślony)',
                        'description' => 'Umowa o pracę na czas nieokreślony zgodnie z niemieckim prawem pracy, regulująca podstawowe warunki zatrudnienia.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Umowa o pracę</h1>
                                <p style="font-size: 14px;">(na czas nieokreślony)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Zawarta w [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>dnia [[contract_date]] r.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Pomiędzy</p>
                                <p><strong>[[employer_company_name]]</strong><br>[[employer_address]]<br>([[employer_legal_form]])<br>reprezentowana przez [[employer_represented_by]]</p>
                                <p>– zwanym dalej „Pracodawcą” –</p>
                                <br/>
                                <p>a</p>
                                <p>Panem/Panią <strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Data urodzenia: [[employee_date_of_birth]]<br>Miejsce urodzenia: [[employee_place_of_birth]]</p>
                                <p>– zwanym dalej „Pracownikiem” –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Rozpoczęcie stosunku pracy i stanowisko</h2>
                                <p>Stosunek pracy rozpoczyna się w dniu <strong>[[start_date]]</strong> i zostaje zawarty na czas nieokreślony.</p>
                                <p>Pracownik zostaje zatrudniony na stanowisku <strong>[[job_title]]</strong>.</p>
                                <p>Pierwsze [[probation_period_months]] miesiące stanowią okres próbny (jeśli dotyczy).</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Czas pracy</h2>
                                <p>Regularny tygodniowy czas pracy wynosi <strong>[[weekly_working_hours]] godzin</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Wynagrodzenie</h2>
                                <p>Pracownik otrzymuje miesięczne wynagrodzenie brutto w wysokości <strong>[[gross_salary_per_month]] EUR</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Urlop</h2>
                                <p>Urlop roczny wynosi <strong>[[annual_leave_days]] dni roboczych</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 5 Wypowiedzenie</h2>
                                <p>Okresy wypowiedzenia regulują przepisy ustawowe, chyba że indywidualnie uzgodniono inaczej: [[notice_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 6 Inne postanowienia</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 7 Postanowienia końcowe</h2>
                                <p>Zmiany i uzupełnienia niniejszej umowy wymagają formy pisemnej. Jeżeli poszczególne postanowienia niniejszej umowy są lub staną się nieważne, nie narusza to ważności pozostałych postanowień. Obowiązuje prawo niemieckie. Sądem właściwym jest [[city]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Pracodawca</p></td>
                                <td width="50%"><p>___________________<br>Pracownik</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Срочный трудовой договор / Fixed-Term Employment Contract ---
            [
                'slug' => 'fixed-term-employment-contract-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"de":"Ort","en":"City","uk":"Місто","pl":"Miejscowość"}},
                    {"name":"contract_date","type":"date","required":true,"labels":{"de":"Datum des Vertragsabschlusses","en":"Date of Contract Conclusion","uk":"Дата укладення договору","pl":"Data zawarcia umowy"}},
                    {"name":"employer_company_name","type":"text","required":true,"labels":{"de":"Name des Arbeitgebers (Firma)","en":"Employer Company Name","uk":"Назва компанії роботодавця","pl":"Nazwa firmy pracodawcy"}},
                    {"name":"employer_address","type":"text","required":true,"labels":{"de":"Adresse des Arbeitgebers","en":"Employer Address","uk":"Адреса роботодавця","pl":"Adres pracodawcy"}},
                    {"name":"employer_legal_form","type":"text","required":false,"labels":{"de":"Rechtsform des Arbeitgebers (z.B. GmbH, AG)","en":"Employer Legal Form (e.g., GmbH, AG)","uk":"Правова форма роботодавця (напр., ТОВ, АТ)","pl":"Forma prawna pracodawcy (np. sp. z o.o., S.A.)"}},
                    {"name":"employer_represented_by","type":"text","required":true,"labels":{"de":"Vertreten durch (Name, Position)","en":"Represented by (Name, Position)","uk":"Представлений (Ім\'я, Посада)","pl":"Reprezentowany przez (Imię, Stanowisko)"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"de":"Vollständiger Name des Arbeitnehmers","en":"Employee Full Name","uk":"Повне ім\'я працівника","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"de":"Adresse des Arbeitnehmers","en":"Employee Address","uk":"Адреса працівника","pl":"Adres pracownika"}},
                    {"name":"employee_date_of_birth","type":"date","required":true,"labels":{"de":"Geburtsdatum des Arbeitnehmers","en":"Employee Date of Birth","uk":"Дата народження працівника","pl":"Data urodzenia pracownika"}},
                    {"name":"employee_place_of_birth","type":"text","required":true,"labels":{"de":"Geburtsort des Arbeitnehmers","en":"Employee Place of Birth","uk":"Місце народження працівника","pl":"Miejsce urodzenia pracownika"}},
                    {"name":"job_title","type":"text","required":true,"labels":{"de":"Berufsbezeichnung/Position","en":"Job Title/Position","uk":"Назва посади/Позиція","pl":"Nazwa stanowiska/Pozycja"}},
                    {"name":"start_date","type":"date","required":true,"labels":{"de":"Beginn des Arbeitsverhältnisses","en":"Start Date of Employment","uk":"Дата початку трудових відносин","pl":"Data rozpoczęcia zatrudnienia"}},
                    {"name":"end_date","type":"date","required":true,"labels":{"de":"Ende des Arbeitsverhältnisses","en":"End Date of Employment","uk":"Дата закінчення трудових відносин","pl":"Data zakończenia zatrudnienia"}},
                    {"name":"reason_for_fixed_term","type":"textarea","required":false,"labels":{"de":"Grund der Befristung (optional, aber empfohlen)","en":"Reason for fixed-term (optional, but recommended)","uk":"Причина строкового характеру (необов\'язково, але рекомендовано)","pl":"Powód zawarcia umowy na czas określony (opcjonalnie, ale zalecane)"}},
                    {"name":"weekly_working_hours","type":"number","required":true,"labels":{"de":"Wöchentliche Arbeitszeit (Stunden)","en":"Weekly Working Hours (hours)","uk":"Щотижневий робочий час (години)","pl":"Tygodniowy czas pracy (godziny)"}},
                    {"name":"gross_salary_per_month","type":"number","required":true,"labels":{"de":"Bruttomonatsgehalt (EUR)","en":"Gross Monthly Salary (EUR)","uk":"Валова місячна заробітна плата (EUR)","pl":"Miesięczne wynagrodzenie brutto (EUR)"}},
                    {"name":"annual_leave_days","type":"number","required":true,"labels":{"de":"Jahresurlaub (Arbeitstage)","en":"Annual Leave (working days)","uk":"Щорічна відпустка (робочі дні)","pl":"Urlop roczny (dni robocze)"}},
                    {"name":"notice_period","type":"textarea","required":true,"labels":{"de":"Kündigungsfristen","en":"Notice Periods","uk":"Терміни повідомлення про звільнення","pl":"Okresy wypowiedzenia"}},
                    {"name":"other_provisions","type":"textarea","required":false,"labels":{"de":"Sonstige Bestimmungen (optional)","en":"Other Provisions (optional)","uk":"Інші положення (необов\'язково)","pl":"Inne postanowienia (opcjonalnie)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Arbeitsvertrag (befristet)',
                        'description' => 'Ein befristeter Arbeitsvertrag nach deutschem Arbeitsrecht, der die wesentlichen Bedingungen des Arbeitsverhältnisses für einen bestimmten Zeitraum regelt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Arbeitsvertrag</h1>
                                <p style="font-size: 14px;">(Befristet)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Abgeschlossen in [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>am [[contract_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwischen</p>
                                <p><strong>[[employer_company_name]]</strong><br>[[employer_address]]<br>([[employer_legal_form]])<br>vertreten durch [[employer_represented_by]]</p>
                                <p>– im Folgenden „Arbeitgeber“ genannt –</p>
                                <br/>
                                <p>und</p>
                                <p>Herrn/Frau <strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Geburtsdatum: [[employee_date_of_birth]]<br>Geburtsort: [[employee_place_of_birth]]</p>
                                <p>– im Folgenden „Arbeitnehmer“ genannt –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Beginn und Dauer des Arbeitsverhältnisses</h2>
                                <p>Das Arbeitsverhältnis beginnt am <strong>[[start_date]]</strong> und endet am <strong>[[end_date]]</strong>.</p>
                                <p>Der Grund für die Befristung ist: [[reason_for_fixed_term]] (falls zutreffend).</p>
                                <p>Der Arbeitnehmer wird als <strong>[[job_title]]</strong> eingestellt.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Arbeitszeit</h2>
                                <p>Die regelmäßige wöchentliche Arbeitszeit beträgt <strong>[[weekly_working_hours]] Stunden</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Vergütung</h2>
                                <p>Der Arbeitnehmer erhält ein Bruttomonatsgehalt von <strong>[[gross_salary_per_month]] EUR</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Urlaub</h2>
                                <p>Der Jahresurlaub beträgt <strong>[[annual_leave_days]] Arbeitstage</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 5 Kündigung</h2>
                                <p>Die Kündigungsfristen richten sich nach den gesetzlichen Bestimmungen, sofern einzelvertraglich nichts anderes vereinbart ist: [[notice_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 6 Sonstige Bestimmungen</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 7 Schlussbestimmungen</h2>
                                <p>Änderungen und Ergänzungen dieses Vertrages bedürfen der Schriftform. Sollten einzelne Bestimmungen dieses Vertrages unwirksam sein oder werden, so wird die Wirksamkeit der übrigen Bestimmungen dadurch nicht berührt. Es gilt deutsches Recht. Gerichtsstand ist [[city]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Arbeitgeber</p></td>
                                <td width="50%"><p>___________________<br>Arbeitnehmer</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Fixed-Term Employment Contract',
                        'description' => 'A fixed-term employment contract under German labor law, regulating the essential terms of employment for a specific period.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Employment Contract</h1>
                                <p style="font-size: 14px;">(Fixed-Term)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Concluded in [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>on [[contract_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Between</p>
                                <p><strong>[[employer_company_name]]</strong><br>[[employer_address]]<br>([[employer_legal_form]])<br>represented by [[employer_represented_by]]</p>
                                <p>– hereinafter referred to as the "Employer" –</p>
                                <br/>
                                <p>and</p>
                                <p>Mr./Ms. <strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Date of Birth: [[employee_date_of_birth]]<br>Place of Birth: [[employee_place_of_birth]]</p>
                                <p>– hereinafter referred to as the "Employee" –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Commencement and Duration of Employment</h2>
                                <p>The employment relationship begins on <strong>[[start_date]]</strong> and ends on <strong>[[end_date]]</strong>.</p>
                                <p>The reason for the fixed-term is: [[reason_for_fixed_term]] (if applicable).</p>
                                <p>The Employee is hired as <strong>[[job_title]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Working Hours</h2>
                                <p>The regular weekly working hours are <strong>[[weekly_working_hours]] hours</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Remuneration</h2>
                                <p>The Employee receives a gross monthly salary of <strong>[[gross_salary_per_month]] EUR</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Leave</h2>
                                <p>Annual leave amounts to <strong>[[annual_leave_days]] working days</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 5 Termination</h2>
                                <p>Notice periods are governed by statutory provisions, unless otherwise agreed individually: [[notice_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 6 Other Provisions</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 7 Final Provisions</h2>
                                <p>Amendments and additions to this contract require written form. Should individual provisions of this contract be or become invalid, the validity of the remaining provisions shall not be affected thereby. German law applies. The place of jurisdiction is [[city]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Employer</p></td>
                                <td width="50%"><p>___________________<br>Employee</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Строковий трудовий договір',
                        'description' => 'Строковий трудовий договір згідно з німецьким трудовим правом, що регулює основні умови трудових відносин на певний період.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Трудовий договір</h1>
                                <p style="font-size: 14px;">(Строковий)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Укладено в [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[contract_date]] р.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Між</p>
                                <p><strong>[[employer_company_name]]</strong><br>[[employer_address]]<br>([[employer_legal_form]])<br>представлений [[employer_represented_by]]</p>
                                <p>– надалі іменований «Роботодавець» –</p>
                                <br/>
                                <p>та</p>
                                <p>Паном/Пані <strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Дата народження: [[employee_date_of_birth]]<br>Місце народження: [[employee_place_of_birth]]</p>
                                <p>– надалі іменований «Працівник» –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Початок та тривалість трудових відносин</h2>
                                <p>Трудові відносини починаються <strong>[[start_date]]</strong> та закінчуються <strong>[[end_date]]</strong>.</p>
                                <p>Причина строкового характеру: [[reason_for_fixed_term]] (якщо застосовно).</p>
                                <p>Працівник приймається на посаду <strong>[[job_title]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Робочий час</h2>
                                <p>Регулярний щотижневий робочий час становить <strong>[[weekly_working_hours]] годин</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Винагорода</h2>
                                <p>Працівник отримує валову місячну заробітну плату у розмірі <strong>[[gross_salary_per_month]] EUR</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Відпустка</h2>
                                <p>Щорічна відпустка становить <strong>[[annual_leave_days]] робочих днів</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 5 Розірвання</h2>
                                <p>Терміни повідомлення про розірвання регулюються законодавчими положеннями, якщо інше не погоджено індивідуально: [[notice_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 6 Інші положення</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 7 Прикінцеві положення</h2>
                                <p>Зміни та доповнення до цього договору потребують письмової форми. Якщо окремі положення цього договору є або стануть недійсними, це не впливає на дійсність інших положень. Застосовується німецьке право. Місцезнаходження суду – [[city]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Роботодавець</p></td>
                                <td width="50%"><p>___________________<br>Працівник</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o pracę (na czas określony)',
                        'description' => 'Umowa o pracę na czas określony zgodnie z niemieckim prawem pracy, regulująca podstawowe warunki zatrudnienia na określony czas.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Umowa o pracę</h1>
                                <p style="font-size: 14px;">(na czas określony)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Zawarta w [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>dnia [[contract_date]] r.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Pomiędzy</p>
                                <p><strong>[[employer_company_name]]</strong><br>[[employer_address]]<br>([[employer_legal_form]])<br>reprezentowana przez [[employer_represented_by]]</p>
                                <p>– zwanym dalej „Pracodawcą” –</p>
                                <br/>
                                <p>a</p>
                                <p>Panem/Panią <strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Data urodzenia: [[employee_date_of_birth]]<br>Miejsce urodzenia: [[employee_place_of_birth]]</p>
                                <p>– zwanym dalej „Pracownikiem” –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Rozpoczęcie i czas trwania stosunku pracy</h2>
                                <p>Stosunek pracy rozpoczyna się w dniu <strong>[[start_date]]</strong> i kończy w dniu <strong>[[end_date]]</strong>.</p>
                                <p>Powód zawarcia umowy na czas określony: [[reason_for_fixed_term]] (jeśli dotyczy).</p>
                                <p>Pracownik zostaje zatrudniony na stanowisku <strong>[[job_title]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Czas pracy</h2>
                                <p>Regularny tygodniowy czas pracy wynosi <strong>[[weekly_working_hours]] godzin</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Wynagrodzenie</h2>
                                <p>Pracownik otrzymuje miesięczne wynagrodzenie brutto w wysokości <strong>[[gross_salary_per_month]] EUR</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Urlop</h2>
                                <p>Urlop roczny wynosi <strong>[[annual_leave_days]] dni roboczych</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 5 Wypowiedzenie</h2>
                                <p>Okresy wypowiedzenia regulują przepisy ustawowe, chyba że indywidualnie uzgodniono inaczej: [[notice_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 6 Inne postanowienia</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 7 Postanowienia końcowe</h2>
                                <p>Zmiany i uzupełnienia niniejszej umowy wymagają formy pisemnej. Jeżeli poszczególne postanowienia niniejszej umowy są lub staną się nieważne, nie narusza to ważności pozostałych postanowień. Obowiązuje prawo niemieckie. Sądem właściwym jest [[city]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Pracodawca</p></td>
                                <td width="50%"><p>___________________<br>Pracownik</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор о неразглашении (NDA) / Non-Disclosure Agreement (NDA) ---
            [
                'slug' => 'nda-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"de":"Ort","en":"City","uk":"Місто","pl":"Miejscowość"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"de":"Datum der Vereinbarung","en":"Agreement Date","uk":"Дата угоди","pl":"Data zawarcia umowy"}},
                    {"name":"disclosing_party_name","type":"text","required":true,"labels":{"de":"Name der offenlegenden Partei","en":"Disclosing Party Name","uk":"Назва сторони, що розкриває","pl":"Nazwa Strony Ujawniającej"}},
                    {"name":"disclosing_party_address","type":"text","required":true,"labels":{"de":"Adresse der offenlegenden Partei","en":"Disclosing Party Address","uk":"Адреса сторони, що розкриває","pl":"Adres Strony Ujawniającej"}},
                    {"name":"receiving_party_name","type":"text","required":true,"labels":{"de":"Name der empfangenden Partei","en":"Receiving Party Name","uk":"Назва сторони, що отримує","pl":"Nazwa Strony Otrzymującej"}},
                    {"name":"receiving_party_address","type":"text","required":true,"labels":{"de":"Adresse der empfangenden Partei","en":"Receiving Party Address","uk":"Адреса сторони, що отримує","pl":"Adres Strony Otrzymującej"}},
                    {"name":"confidential_information_definition","type":"textarea","required":true,"labels":{"de":"Definition vertraulicher Informationen","en":"Definition of Confidential Information","uk":"Визначення конфіденційної інформації","pl":"Definicja Informacji Poufnych"}},
                    {"name":"purpose_of_disclosure","type":"textarea","required":true,"labels":{"de":"Zweck der Offenlegung","en":"Purpose of Disclosure","uk":"Мета розкриття","pl":"Cel ujawnienia"}},
                    {"name":"confidentiality_period_years","type":"number","required":true,"labels":{"de":"Dauer der Vertraulichkeit (in Jahren)","en":"Confidentiality Period (in years)","uk":"Термін конфіденційності (у роках)","pl":"Okres poufności (w latach)"}},
                    {"name":"exceptions_to_confidentiality","type":"textarea","required":false,"labels":{"de":"Ausnahmen von der Vertraulichkeit (optional)","en":"Exceptions to Confidentiality (optional)","uk":"Винятки з конфіденційності (необов\'язково)","pl":"Wyjątki od poufności (opcjonalnie)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Geheimhaltungsvereinbarung (NDA)',
                        'description' => 'Eine rechtlich bindende Vereinbarung zum Schutz vertraulicher Informationen, die zwischen Parteien ausgetauscht werden.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Geheimhaltungsvereinbarung (NDA)</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Abgeschlossen in [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>am [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwischen</p>
                                <p><strong>[[disclosing_party_name]]</strong><br>[[disclosing_party_address]]</p>
                                <p>– im Folgenden „Offenlegende Partei“ genannt –</p>
                                <br/>
                                <p>und</p>
                                <p><strong>[[receiving_party_name]]</strong><br>[[receiving_party_address]]</p>
                                <p>– im Folgenden „Empfangende Partei“ genannt –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Vertrauliche Informationen</h2>
                                <p>Vertrauliche Informationen im Sinne dieser Vereinbarung sind: [[confidential_information_definition]]</p>
                                <p>Die Offenlegung erfolgt zum Zweck von: [[purpose_of_disclosure]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Geheimhaltungspflicht</h2>
                                <p>Die Empfangende Partei verpflichtet sich, die vertraulichen Informationen für einen Zeitraum von <strong>[[confidentiality_period_years]] Jahren</strong> streng geheim zu halten und nur für den vereinbarten Zweck zu verwenden.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Ausnahmen</h2>
                                <p>Die Geheimhaltungspflicht gilt nicht für Informationen, die: [[exceptions_to_confidentiality]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Schlussbestimmungen</h2>
                                <p>Änderungen und Ergänzungen dieser Vereinbarung bedürfen der Schriftform. Es gilt deutsches Recht. Gerichtsstand ist [[city]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Offenlegende Partei</p></td>
                                <td width="50%"><p>___________________<br>Empfangende Partei</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Non-Disclosure Agreement (NDA)',
                        'description' => 'A legally binding agreement to protect confidential information exchanged between parties.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Non-Disclosure Agreement (NDA)</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Concluded in [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>on [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Between</p>
                                <p><strong>[[disclosing_party_name]]</strong><br>[[disclosing_party_address]]</p>
                                <p>– hereinafter referred to as the "Disclosing Party" –</p>
                                <br/>
                                <p>and</p>
                                <p><strong>[[receiving_party_name]]</strong><br>[[receiving_party_address]]</p>
                                <p>– hereinafter referred to as the "Receiving Party" –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Confidential Information</h2>
                                <p>Confidential Information within the meaning of this Agreement is: [[confidential_information_definition]]</p>
                                <p>The disclosure is for the purpose of: [[purpose_of_disclosure]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Obligation of Confidentiality</h2>
                                <p>The Receiving Party undertakes to keep the confidential information strictly confidential for a period of <strong>[[confidentiality_period_years]] years</strong> and to use it only for the agreed purpose.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Exceptions</h2>
                                <p>The obligation of confidentiality does not apply to information that: [[exceptions_to_confidentiality]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Final Provisions</h2>
                                <p>Amendments and additions to this agreement require written form. Should individual provisions of this agreement be or become invalid, the validity of the remaining provisions shall not be affected thereby. German law applies. The place of jurisdiction is [[city]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Disclosing Party</p></td>
                                <td width="50%"><p>___________________<br>Receiving Party</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Угода про нерозголошення (NDA)',
                        'description' => 'Юридично обов\'язкова угода про захист конфіденційної інформації, що обмінюється між сторонами.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Угода про нерозголошення (NDA)</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Укладено в [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[agreement_date]] р.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Між</p>
                                <p><strong>[[disclosing_party_name]]</strong><br>[[disclosing_party_address]]</p>
                                <p>– надалі іменована «Сторона, що розкриває» –</p>
                                <br/>
                                <p>та</p>
                                <p><strong>[[receiving_party_name]]</strong><br>[[receiving_party_address]]</p>
                                <p>– надалі іменована «Сторона, що отримує» –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Конфіденційна інформація</h2>
                                <p>Конфіденційна інформація в розумінні цієї Угоди – це: [[confidential_information_definition]]</p>
                                <p>Розкриття здійснюється з метою: [[purpose_of_disclosure]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Зобов\'язання щодо конфіденційності</h2>
                                <p>Сторона, що отримує, зобов\'язується зберігати конфіденційну інформацію в суворій таємниці протягом <strong>[[confidentiality_period_years]] років</strong> та використовувати її лише для узгодженої мети.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Винятки</h2>
                                <p>Зобов\'язання щодо конфіденційності не поширюється на інформацію, яка: [[exceptions_to_confidentiality]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Прикінцеві положення</h2>
                                <p>Зміни та доповнення до цієї Угоди потребують письмової форми. Якщо окремі положення цієї Угоди є або стануть недійсними, це не впливає на дійсність інших положень. Застосовується німецьке право. Місцезнаходження суду – [[city]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Сторона, що розкриває</p></td>
                                <td width="50%"><p>___________________<br>Сторона, що отримує</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o zachowaniu poufności (NDA)',
                        'description' => 'Prawnie wiążąca umowa o ochronie poufnych informacji wymienianych między stronami.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Umowa o zachowaniu poufności (NDA)</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Zawarta w [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Pomiędzy</p>
                                <p><strong>[[disclosing_party_name]]</strong><br>[[disclosing_party_address]]</p>
                                <p>– zwaną dalej „Stroną Ujawniającą” –</p>
                                <br/>
                                <p>a</p>
                                <p><strong>[[receiving_party_name]]</strong><br>[[receiving_party_address]]</p>
                                <p>– zwaną dalej „Stroną Otrzymującą” –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Informacje Poufne</h2>
                                <p>Informacje poufne w rozumieniu niniejszej Umowy to: [[confidential_information_definition]]</p>
                                <p>Ujawnienie następuje w celu: [[purpose_of_disclosure]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Obowiązek zachowania poufności</h2>
                                <p>Strona Otrzymująca zobowiązuje się do zachowania poufnych informacji w ścisłej tajemnicy przez okres <strong>[[confidentiality_period_years]] lat</strong> i wykorzystywania ich wyłącznie w uzgodnionym celu.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Wyjątki</h2>
                                <p>Obowiązek zachowania poufności nie dotyczy informacji, które: [[exceptions_to_confidentiality]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Postanowienia końcowe</h2>
                                <p>Zmiany i uzupełnienia niniejszej umowy wymagają formy pisemnej. Jeżeli poszczególne postanowienia niniejszej umowy są lub staną się nieważne, nie narusza to ważności pozostałych postanowień. Obowiązuje prawo niemieckie. Sądem właściwym jest [[city]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Strona Ujawniająca</p></td>
                                <td width="50%"><p>___________________<br>Strona Otrzymująca</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор о материальной ответственности / Material Liability Agreement ---
            [
                'slug' => 'material-liability-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"de":"Ort","en":"City","uk":"Місто","pl":"Miejscowość"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"de":"Datum der Vereinbarung","en":"Agreement Date","uk":"Дата угоди","pl":"Data zawarcia umowy"}},
                    {"name":"employer_company_name","type":"text","required":true,"labels":{"de":"Name des Arbeitgebers (Firma)","en":"Employer Company Name","uk":"Назва компанії роботодавця","pl":"Nazwa firmy pracodawcy"}},
                    {"name":"employer_address","type":"text","required":true,"labels":{"de":"Adresse des Arbeitgebers","en":"Employer Address","uk":"Адреса роботодавця","pl":"Adres pracodawcy"}},
                    {"name":"employer_represented_by","type":"text","required":true,"labels":{"de":"Vertreten durch (Name, Position)","en":"Represented by (Name, Position)","uk":"Представлений (Ім\'я, Посада)","pl":"Reprezentowany przez (Imię, Stanowisko)"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"de":"Vollständiger Name des Arbeitnehmers","en":"Employee Full Name","uk":"Повне ім\'я працівника","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"de":"Adresse des Arbeitnehmers","en":"Employee Address","uk":"Адреса працівника","pl":"Adres pracownika"}},
                    {"name":"employee_job_title","type":"text","required":true,"labels":{"de":"Berufsbezeichnung/Position des Arbeitnehmers","en":"Employee Job Title/Position","uk":"Назва посади/Позиція працівника","pl":"Nazwa stanowiska/Pozycja pracownika"}},
                    {"name":"property_description","type":"textarea","required":true,"labels":{"de":"Beschreibung des anvertrauten Eigentums","en":"Description of entrusted property","uk":"Опис довіреного майна","pl":"Opis powierzonego mienia"}},
                    {"name":"liability_scope","type":"textarea","required":true,"labels":{"de":"Umfang der Haftung (z.B. volle Haftung, Haftung für Vorsatz und grobe Fahrlässigkeit)","en":"Scope of liability (e.g., full liability, liability for intent and gross negligence)","uk":"Обсяг відповідальності (напр., повна відповідальність, відповідальність за умисел та грубу недбалість)","pl":"Zakres odpowiedzialności (np. pełna odpowiedzialność, odpowiedzialność za umyślność i rażące niedbalstwo)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Haftungsvereinbarung (Mitarbeiter)',
                        'description' => 'Eine Vereinbarung zur Regelung der Haftung des Arbeitnehmers für anvertrautes Eigentum oder Schäden im Rahmen des Arbeitsverhältnisses.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Haftungsvereinbarung</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Abgeschlossen in [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>am [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwischen</p>
                                <p><strong>[[employer_company_name]]</strong><br>[[employer_address]]<br>vertreten durch [[employer_represented_by]]</p>
                                <p>– im Folgenden „Arbeitgeber“ genannt –</p>
                                <br/>
                                <p>und</p>
                                <p>Herrn/Frau <strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Position: [[employee_job_title]]</p>
                                <p>– im Folgenden „Arbeitnehmer“ genannt –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Anvertrautes Eigentum</h2>
                                <p>Der Arbeitgeber vertraut dem Arbeitnehmer folgendes Eigentum an: [[property_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Umfang der Haftung</h2>
                                <p>Der Arbeitnehmer haftet für Schäden an dem anvertrauten Eigentum gemäß folgendem Umfang: [[liability_scope]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Pflichten des Arbeitnehmers</h2>
                                <p>Der Arbeitnehmer verpflichtet sich, das anvertraute Eigentum sorgfältig zu behandeln und vor Beschädigung oder Verlust zu schützen.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Schlussbestimmungen</h2>
                                <p>Änderungen und Ergänzungen dieser Vereinbarung bedürfen der Schriftform. Es gilt deutsches Arbeitsrecht.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Arbeitgeber</p></td>
                                <td width="50%"><p>___________________<br>Arbeitnehmer</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Material Liability Agreement (Employee)',
                        'description' => 'An agreement regulating the employee\'s liability for entrusted property or damages within the employment relationship.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Material Liability Agreement</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Concluded in [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>on [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Between</p>
                                <p><strong>[[employer_company_name]]</strong><br>[[employer_address]]<br>represented by [[employer_represented_by]]</p>
                                <p>– hereinafter referred to as the "Employer" –</p>
                                <br/>
                                <p>and</p>
                                <p>Mr./Ms. <strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Position: [[employee_job_title]]</p>
                                <p>– hereinafter referred to as the "Employee" –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Entrusted Property</h2>
                                <p>The Employer entrusts the Employee with the following property: [[property_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Scope of Liability</h2>
                                <p>The Employee is liable for damages to the entrusted property according to the following scope: [[liability_scope]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Employee\'s Obligations</h2>
                                <p>The Employee undertakes to handle the entrusted property carefully and to protect it from damage or loss.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Final Provisions</h2>
                                <p>Amendments and additions to this agreement require written form. German labor law applies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Employer</p></td>
                                <td width="50%"><p>___________________<br>Employee</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір про матеріальну відповідальність (Працівник)',
                        'description' => 'Угода, що регулює відповідальність працівника за довірене майно або збитки в рамках трудових відносин.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Договір про матеріальну відповідальність</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Укладено в [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[agreement_date]] р.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Між</p>
                                <p><strong>[[employer_company_name]]</strong><br>[[employer_address]]<br>представлений [[employer_represented_by]]</p>
                                <p>– надалі іменований «Роботодавець» –</p>
                                <br/>
                                <p>та</p>
                                <p>Паном/Пані <strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Посада: [[employee_job_title]]</p>
                                <p>– надалі іменований «Працівник» –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Довірене майно</h2>
                                <p>Роботодавець довіряє Працівнику таке майно: [[property_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Обсяг відповідальності</h2>
                                <p>Працівник несе відповідальність за збитки, завдані довіреному майну, в такому обсязі: [[liability_scope]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Обов\'язки Працівника</h2>
                                <p>Працівник зобов\'язується дбайливо ставитися до довіреного майна та захищати його від пошкодження або втрати.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Прикінцеві положення</h2>
                                <p>Зміни та доповнення до цієї Угоди потребують письмової форми. Застосовується німецьке трудове право.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Роботодавець</p></td>
                                <td width="50%"><p>___________________<br>Працівник</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o odpowiedzialności materialnej (pracownik)',
                        'description' => 'Umowa regulująca odpowiedzialność pracownika za powierzone mienie lub szkody w ramach stosunku pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Umowa o odpowiedzialności materialnej</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Zawarta w [[city]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Pomiędzy</p>
                                <p><strong>[[employer_company_name]]</strong><br>[[employer_address]]<br>reprezentowana przez [[employer_represented_by]]</p>
                                <p>– zwanym dalej „Pracodawcą” –</p>
                                <br/>
                                <p>a</p>
                                <p>Panem/Panią <strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Stanowisko: [[employee_job_title]]</p>
                                <p>– zwanym dalej „Pracownikiem” –</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 1 Powierzone mienie</h2>
                                <p>Pracodawca powierza Pracownikowi następujące mienie: [[property_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 2 Zakres odpowiedzialności</h2>
                                <p>Pracownik ponosi odpowiedzialność za szkody w powierzonym mieniu w następującym zakresie: [[liability_scope]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 3 Obowiązki Pracownika</h2>
                                <p>Pracownik zobowiązuje się do starannego obchodzenia się z powierzonym mieniem i ochrony go przed uszkodzeniem lub utratą.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">§ 4 Postanowienia końcowe</h2>
                                <p>Zmiany i uzupełnienia niniejszej umowy wymagają formy pisemnej. Obowiązuje niemieckie prawo pracy.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Pracodawca</p></td>
                                <td width="50%"><p>___________________<br>Pracownik</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Должностная инструкция / Job Description ---
            [
                'slug' => 'job-description-de',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"de":"Name des Unternehmens","en":"Company Name","uk":"Назва компанії","pl":"Nazwa firmy"}},
                    {"name":"job_title","type":"text","required":true,"labels":{"de":"Stellenbezeichnung","en":"Job Title","uk":"Назва посади","pl":"Stanowisko"}},
                    {"name":"department","type":"text","required":true,"labels":{"de":"Abteilung","en":"Department","uk":"Відділ","pl":"Dział"}},
                    {"name":"superior_position","type":"text","required":true,"labels":{"de":"Direkter Vorgesetzter (Position)","en":"Direct Superior (Position)","uk":"Безпосередній керівник (посада)","pl":"Bezpośredni przełożony (stanowisko)"}},
                    {"name":"main_purpose","type":"textarea","required":true,"labels":{"de":"Hauptaufgaben und Verantwortlichkeiten","en":"Main Tasks and Responsibilities","uk":"Основні завдання та обов\'язки","pl":"Główne zadania i obowiązki"}},
                    {"name":"responsibilities_details","type":"textarea","required":true,"labels":{"de":"Detaillierte Aufgabenbeschreibung","en":"Detailed Task Description","uk":"Детальний опис завдань","pl":"Szczegółowy opis zadań"}},
                    {"name":"requirements","type":"textarea","required":true,"labels":{"de":"Anforderungsprofil (Qualifikationen, Erfahrungen, Kompetenzen)","en":"Requirements Profile (Qualifications, Experience, Competencies)","uk":"Профіль вимог (Кваліфікації, Досвід, Компетенції)","pl":"Profil wymagań (Kwalifikacje, Doświadczenie, Kompetencje)"}},
                    {"name":"reporting_lines","type":"text","required":false,"labels":{"de":"Berichtslinien (optional)","en":"Reporting Lines (optional)","uk":"Лінії підпорядкування (необов\'язково)","pl":"Linie raportowania (opcjonalnie)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Stellenbeschreibung',
                        'description' => 'Eine detaillierte Beschreibung der Aufgaben, Verantwortlichkeiten und Anforderungen einer bestimmten Position in einem Unternehmen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Stellenbeschreibung</h1>
                                <p style="font-size: 14px;">für die Position: <strong>[[job_title]]</strong></p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Unternehmen: [[company_name]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>Abteilung: [[department]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Position und Berichtslinien</h2>
                                <p>Direkter Vorgesetzter: [[superior_position]]</p>
                                <p>Berichtslinien: [[reporting_lines]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Hauptaufgaben und Verantwortlichkeiten</h2>
                                <p>[[main_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Detaillierte Aufgabenbeschreibung</h2>
                                <p>[[responsibilities_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Anforderungsprofil</h2>
                                <p>[[requirements]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Datum, Unterschrift Arbeitgeber</p></td>
                                <td width="50%"><p>___________________<br>Datum, Unterschrift Arbeitnehmer</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Job Description',
                        'description' => 'A detailed description of the tasks, responsibilities, and requirements of a specific position within a company.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Job Description</h1>
                                <p style="font-size: 14px;">for the position: <strong>[[job_title]]</strong></p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Company: [[company_name]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>Department: [[department]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Position and Reporting Lines</h2>
                                <p>Direct Superior: [[superior_position]]</p>
                                <p>Reporting Lines: [[reporting_lines]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Main Tasks and Responsibilities</h2>
                                <p>[[main_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Detailed Task Description</h2>
                                <p>[[responsibilities_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Requirements Profile</h2>
                                <p>[[requirements]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Date, Employer Signature</p></td>
                                <td width="50%"><p>___________________<br>Date, Employee Signature</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Посадова інструкція',
                        'description' => 'Детальний опис завдань, обов\'язків та вимог до певної посади в компанії.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Посадова інструкція</h1>
                                <p style="font-size: 14px;">для посади: <strong>[[job_title]]</strong></p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Компанія: [[company_name]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>Відділ: [[department]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Посада та лінії підпорядкування</h2>
                                <p>Безпосередній керівник: [[superior_position]]</p>
                                <p>Лінії підпорядкування: [[reporting_lines]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Основні завдання та обов\'язки</h2>
                                <p>[[main_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Детальний опис завдань</h2>
                                <p>[[responsibilities_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Профіль вимог</h2>
                                <p>[[requirements]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Дата, Підпис роботодавця</p></td>
                                <td width="50%"><p>___________________<br>Дата, Підпис працівника</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Opis stanowiska pracy',
                        'description' => 'Szczegółowy opis zadań, obowiązków i wymagań na danym stanowisku w firmie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Opis stanowiska pracy</h1>
                                <p style="font-size: 14px;">dla stanowiska: <strong>[[job_title]]</strong></p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Firma: [[company_name]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>Dział: [[department]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Stanowisko i linie raportowania</h2>
                                <p>Bezpośredni przełożony: [[superior_position]]</p>
                                <p>Linie raportowania: [[reporting_lines]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Główne zadania i obowiązki</h2>
                                <p>[[main_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Szczegółowy opis zadań</h2>
                                <p>[[responsibilities_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Profil wymagań</h2>
                                <p>[[requirements]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Data, Podpis pracodawcy</p></td>
                                <td width="50%"><p>___________________<br>Data, Podpis pracownika</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Приказ о приеме на работу / Employment Confirmation ---
            [
                'slug' => 'employment-confirmation-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"de":"Ort","en":"City","uk":"Місто","pl":"Miejscowość"}},
                    {"name":"document_date","type":"date","required":true,"labels":{"de":"Datum des Dokuments","en":"Document Date","uk":"Дата документа","pl":"Data dokumentu"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"de":"Name des Unternehmens","en":"Company Name","uk":"Назва компанії","pl":"Nazwa firmy"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"de":"Vollständiger Name des Arbeitnehmers","en":"Employee Full Name","uk":"Повне ім\'я працівника","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"de":"Adresse des Arbeitnehmers","en":"Employee Address","uk":"Адреса працівника","pl":"Adres pracownika"}},
                    {"name":"employee_date_of_birth","type":"date","required":true,"labels":{"de":"Geburtsdatum des Arbeitnehmers","en":"Employee Date of Birth","uk":"Дата народження працівника","pl":"Data urodzenia pracownika"}},
                    {"name":"job_title","type":"text","required":true,"labels":{"de":"Stellenbezeichnung","en":"Job Title","uk":"Назва посади","pl":"Stanowisko"}},
                    {"name":"start_date","type":"date","required":true,"labels":{"de":"Beginn des Arbeitsverhältnisses","en":"Start Date of Employment","uk":"Дата початку трудових відносин","pl":"Data rozpoczęcia zatrudnienia"}},
                    {"name":"contract_type","type":"text","required":true,"labels":{"de":"Art des Arbeitsvertrags (z.B. unbefristet, befristet)","en":"Type of Employment Contract (e.g., permanent, fixed-term)","uk":"Тип трудового договору (напр., безстроковий, строковий)","pl":"Rodzaj umowy o pracę (np. na czas nieokreślony, na czas określony)"}},
                    {"name":"probation_period_months","type":"number","required":false,"labels":{"de":"Probezeit (in Monaten, optional)","en":"Probation Period (in months, optional)","uk":"Випробувальний термін (у місяцях, необов\'язково)","pl":"Okres próbny (w miesiącach, opcjonalnie)"}},
                    {"name":"gross_salary_per_month","type":"number","required":true,"labels":{"de":"Bruttomonatsgehalt (EUR)","en":"Gross Monthly Salary (EUR)","uk":"Валова місячна заробітна плата (EUR)","pl":"Miesięczne wynagrodzenie brutto (EUR)"}},
                    {"name":"annual_leave_days","type":"number","required":true,"labels":{"de":"Jahresurlaub (Arbeitstage)","en":"Annual Leave (working days)","uk":"Щорічна відпустка (робочі дні)","pl":"Urlop roczny (dni robocze)"}},
                    {"name":"signed_by_full_name","type":"text","required":true,"labels":{"de":"Name des Unterzeichners (Arbeitgeber)","en":"Signatory\'s Name (Employer)","uk":"ПІБ підписанта (Роботодавець)","pl":"Imię i nazwisko podpisującego (Pracodawca)"}},
                    {"name":"signed_by_position","type":"text","required":true,"labels":{"de":"Position des Unterzeichners","en":"Signatory\'s Position","uk":"Посада підписанта","pl":"Stanowisko podpisującego"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Einstellungsbestätigung',
                        'description' => 'Eine formelle Bestätigung der Einstellung eines Mitarbeiters und der wesentlichen Bedingungen des Arbeitsverhältnisses.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Einstellungsbestätigung</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>[[company_name]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[city]], den [[document_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau <strong>[[employee_full_name]]</strong>,</p>
                                <p>hiermit bestätigen wir Ihre Einstellung in unserem Unternehmen, <strong>[[company_name]]</strong>, zu folgenden Konditionen:</p>
                                <br/>
                                <p><strong>Name:</strong> [[employee_full_name]]</p>
                                <p><strong>Adresse:</strong> [[employee_address]]</p>
                                <p><strong>Geburtsdatum:</strong> [[employee_date_of_birth]]</p>
                                <p><strong>Position:</strong> [[job_title]]</p>
                                <p><strong>Beginn des Arbeitsverhältnisses:</strong> [[start_date]]</p>
                                <p><strong>Art des Arbeitsvertrags:</strong> [[contract_type]]</p>
                                <p><strong>Probezeit:</strong> [[probation_period_months]] Monate (falls zutreffend)</p>
                                <p><strong>Bruttomonatsgehalt:</strong> [[gross_salary_per_month]] EUR</p>
                                <p><strong>Jahresurlaub:</strong> [[annual_leave_days]] Arbeitstage</p>
                                <br/>
                                <p>Wir freuen uns auf eine erfolgreiche Zusammenarbeit.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>[[signed_by_full_name]]</p>
                                <p>[[signed_by_position]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Employment Confirmation',
                        'description' => 'A formal confirmation of an employee\'s hiring and the essential terms of employment.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Employment Confirmation</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>[[company_name]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[city]], [[document_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Mr./Ms. <strong>[[employee_full_name]]</strong>,</p>
                                <p>We hereby confirm your employment with our company, <strong>[[company_name]]</strong>, under the following conditions:</p>
                                <br/>
                                <p><strong>Name:</strong> [[employee_full_name]]</p>
                                <p><strong>Address:</strong> [[employee_address]]</p>
                                <p><strong>Date of Birth:</strong> [[employee_date_of_birth]]</p>
                                <p><strong>Position:</strong> [[job_title]]</p>
                                <p><strong>Start Date of Employment:</strong> [[start_date]]</p>
                                <p><strong>Type of Employment Contract:</strong> [[contract_type]]</p>
                                <p><strong>Probation Period:</strong> [[probation_period_months]] months (if applicable)</p>
                                <p><strong>Gross Monthly Salary:</strong> [[gross_salary_per_month]] EUR</p>
                                <p><strong>Annual Leave:</strong> [[annual_leave_days]] working days</p>
                                <br/>
                                <p>We look forward to a successful collaboration.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>[[signed_by_full_name]]</p>
                                <p>[[signed_by_position]]</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Наказ про прийом на роботу',
                        'description' => 'Формальне підтвердження прийому працівника на роботу та основних умов трудових відносин.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Підтвердження прийому на роботу</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>[[company_name]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[city]], [[document_date]] р.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а пане/пані <strong>[[employee_full_name]]</strong>,</p>
                                <p>цим підтверджуємо ваш прийом на роботу в нашій компанії, <strong>[[company_name]]</strong>, на таких умовах:</p>
                                <br/>
                                <p><strong>Ім\'я:</strong> [[employee_full_name]]</p>
                                <p><strong>Адреса:</strong> [[employee_address]]</p>
                                <p><strong>Дата народження:</strong> [[employee_date_of_birth]]</p>
                                <p><strong>Посада:</strong> [[job_title]]</p>
                                <p><strong>Початок трудових відносин:</strong> [[start_date]]</p>
                                <p><strong>Тип трудового договору:</strong> [[contract_type]]</p>
                                <p><strong>Випробувальний термін:</strong> [[probation_period_months]] місяців (якщо застосовно)</p>
                                <p><strong>Валова місячна заробітна плата:</strong> [[gross_salary_per_month]] EUR</p>
                                <p><strong>Щорічна відпустка:</strong> [[annual_leave_days]] робочих днів</p>
                                <br/>
                                <p>Ми сподіваємося на успішну співпрацю.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>[[signed_by_full_name]]</p>
                                <p>[[signed_by_position]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Potwierdzenie zatrudnienia',
                        'description' => 'Formalne potwierdzenie zatrudnienia pracownika i podstawowych warunków stosunku pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Potwierdzenie zatrudnienia</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>[[company_name]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[city]], dnia [[document_date]] r.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny/a Panie/Pani <strong>[[employee_full_name]]</strong>,</p>
                                <p>niniejszym potwierdzamy Pańskie/Pani zatrudnienie w naszej firmie, <strong>[[company_name]]</strong>, na następujących warunkach:</p>
                                <br/>
                                <p><strong>Imię i nazwisko:</strong> [[employee_full_name]]</p>
                                <p><strong>Adres:</strong> [[employee_address]]</p>
                                <p><strong>Data urodzenia:</strong> [[employee_date_of_birth]]</p>
                                <p><strong>Stanowisko:</strong> [[job_title]]</p>
                                <p><strong>Data rozpoczęcia zatrudnienia:</strong> [[start_date]]</p>
                                <p><strong>Rodzaj umowy o pracę:</strong> [[contract_type]]</p>
                                <p><strong>Okres próbny:</strong> [[probation_period_months]] miesięcy (jeśli dotyczy)</p>
                                <p><strong>Miesięczne wynagrodzenie brutto:</strong> [[gross_salary_per_month]] EUR</p>
                                <p><strong>Urlop roczny:</strong> [[annual_leave_days]] dni roboczych</p>
                                <br/>
                                <p>Z niecierpliwością oczekujemy na owocną współpracę.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: left;"><tr>
                                <td width="50%"><p>___________________</p>
                                <p>[[signed_by_full_name]]</p>
                                <p>[[signed_by_position]]</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Приказ о переводе на другую должность / Transfer Order ---
            [
                'slug' => 'transfer-order-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"de":"Ort","en":"City","uk":"Місто","pl":"Miejscowość"}},
                    {"name":"document_date","type":"date","required":true,"labels":{"de":"Datum des Dokuments","en":"Document Date","uk":"Дата документа","pl":"Data dokumentu"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"de":"Name des Unternehmens","en":"Company Name","uk":"Назва компанії","pl":"Nazwa firmy"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"de":"Vollständiger Name des Arbeitnehmers","en":"Employee Full Name","uk":"Повне ім\'я працівника","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"de":"Adresse des Arbeitnehmers","en":"Employee Address","uk":"Адреса працівника","pl":"Adres pracownika"}},
                    {"name":"old_job_title","type":"text","required":true,"labels":{"de":"Bisherige Stellenbezeichnung","en":"Previous Job Title","uk":"Попередня назва посади","pl":"Dotychczasowe stanowisko"}},
                    {"name":"new_job_title","type":"text","required":true,"labels":{"de":"Neue Stellenbezeichnung","en":"New Job Title","uk":"Нова назва посади","pl":"Nowe stanowisko"}},
                    {"name":"effective_date","type":"date","required":true,"labels":{"de":"Datum des Inkrafttretens der Versetzung","en":"Effective Date of Transfer","uk":"Дата набрання чинності переведенням","pl":"Data wejścia w życie przeniesienia"}},
                    {"name":"reason_for_transfer","type":"textarea","required":true,"labels":{"de":"Grund der Versetzung","en":"Reason for Transfer","uk":"Причина переведення","pl":"Powód przeniesienia"}},
                    {"name":"signed_by_full_name","type":"text","required":true,"labels":{"de":"Name des Unterzeichners (Arbeitgeber)","en":"Signatory\'s Name (Employer)","uk":"ПІБ підписанта (Роботодавець)","pl":"Imię i nazwisko podpisującego (Pracodawca)"}},
                    {"name":"signed_by_position","type":"text","required":true,"labels":{"de":"Position des Unterzeichners","en":"Signatory\'s Position","uk":"Посада підписанта","pl":"Stanowisko podpisującego"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Versetzungsanordnung',
                        'description' => 'Eine interne Anordnung zur Versetzung eines Mitarbeiters auf eine andere Position innerhalb des Unternehmens.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Versetzungsanordnung</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>[[company_name]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[city]], den [[document_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau <strong>[[employee_full_name]]</strong>,</p>
                                <p>hiermit teilen wir Ihnen mit, dass Sie mit Wirkung zum <strong>[[effective_date]]</strong> von Ihrer bisherigen Position als <strong>[[old_job_title]]</strong> auf die Position als <strong>[[new_job_title]]</strong> versetzt werden.</p>
                                <p>Der Grund für diese Versetzung ist: [[reason_for_transfer]]</p>
                                <p>Alle anderen Bedingungen Ihres Arbeitsvertrages bleiben unverändert.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: left;"><tr>
                                <td width="50%"><p>___________________</p>
                                <p>[[signed_by_full_name]]</p>
                                <p>[[signed_by_position]]</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Transfer Order',
                        'description' => 'An internal order for the transfer of an employee to another position within the company.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Transfer Order</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>[[company_name]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[city]], [[document_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Mr./Ms. <strong>[[employee_full_name]]</strong>,</p>
                                <p>We hereby inform you that effective <strong>[[effective_date]]</strong>, you will be transferred from your current position as <strong>[[old_job_title]]</strong> to the position of <strong>[[new_job_title]]</strong>.</p>
                                <p>The reason for this transfer is: [[reason_for_transfer]]</p>
                                <p>All other terms of your employment contract remain unchanged.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: left;"><tr>
                                <td width="50%"><p>___________________</p>
                                <p>[[signed_by_full_name]]</p>
                                <p>[[signed_by_position]]</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Наказ про переведення на іншу посаду',
                        'description' => 'Внутрішній наказ про переведення працівника на іншу посаду в межах компанії.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Наказ про переведення</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>[[company_name]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[city]], [[document_date]] р.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а пане/пані <strong>[[employee_full_name]]</strong>,</p>
                                <p>цим повідомляємо, що з <strong>[[effective_date]]</strong> ви будете переведені з вашої поточної посади <strong>[[old_job_title]]</strong> на посаду <strong>[[new_job_title]]</strong>.</p>
                                <p>Причина цього переведення: [[reason_for_transfer]]</p>
                                <p>Усі інші умови вашого трудового договору залишаються незмінними.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: left;"><tr>
                                <td width="50%"><p>___________________</p>
                                <p>[[signed_by_full_name]]</p>
                                <p>[[signed_by_position]]</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Zarządzenie o przeniesieniu',
                        'description' => 'Wewnętrzne zarządzenie o przeniesieniu pracownika na inne stanowisko w firmie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Zarządzenie o przeniesieniu</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>[[company_name]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[city]], dnia [[document_date]] r.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny/a Panie/Pani <strong>[[employee_full_name]]</strong>,</p>
                                <p>niniejszym informujemy, że z dniem <strong>[[effective_date]]</strong> zostaje Pan/Pani przeniesiony/a z dotychczasowego stanowiska <strong>[[old_job_title]]</strong> na stanowisko <strong>[[new_job_title]]</strong>.</p>
                                <p>Powodem tego przeniesienia jest: [[reason_for_transfer]]</p>
                                <p>Wszystkie pozostałe warunki Pańskiej/Pani umowy o pracę pozostają bez zmian.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: left;"><tr>
                                <td width="50%"><p>___________________</p>
                                <p>[[signed_by_full_name]]</p>
                                <p>[[signed_by_position]]</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],
// --- Заявление на ежегодный оплачиваемый отпуск / Antrag auf Jahresurlaub ---
            [
                'slug' => 'annual-paid-leave-application-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres pracownika","en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Mitarbeiters"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"pl":"Numer pracownika","en":"Employee ID","uk":"Номер працівника","de":"Personalnummer"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"department","type":"text","required":true,"labels":{"pl":"Dział","en":"Department","uk":"Відділ","de":"Abteilung"}},
                    {"name":"supervisor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko bezpośredniego przełożonego","en":"Direct Supervisor\'s Full Name","uk":"ПІБ безпосереднього керівника","de":"Vollständiger Name des direkten Vorgesetzten"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia urlopu","en":"Leave Start Date","uk":"Дата початку відпустки","de":"Urlaubsbeginn"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia urlopu","en":"Leave End Date","uk":"Дата закінчення відпустки","de":"Urlaubsende"}},
                    {"name":"leave_days","type":"number","required":true,"labels":{"pl":"Liczba dni roboczych urlopu","en":"Number of working days of leave","uk":"Кількість робочих днів відпустки","de":"Anzahl der Urlaubstage (Werktage)"}},
                    {"name":"remaining_leave_days","type":"number","required":false,"labels":{"pl":"Pozostały urlop z poprzedniego roku (dni)","en":"Remaining leave from previous year (days)","uk":"Залишок відпустки з попереднього року (дні)","de":"Resturlaub aus Vorjahr (Tage)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o urlop wypoczynkowy',
                        'description' => 'Formalny wniosek pracownika o udzielenie płatnego urlopu wypoczynkowego zgodnie z niemieckim prawem pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>Abteilung: [[department]]<br>Z. Hd. Herrn/Frau [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Antrag auf Jahresurlaub</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[supervisor_full_name]],</p>
                                <p>hiermit beantrage ich meinen Jahresurlaub für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis einschließlich <strong>[[leave_end_date]]</strong>.</p>
                                <p>Dies entspricht [[leave_days]] Arbeitstagen.</p>
                                <p>Mein Resturlaub aus dem Vorjahr beträgt [[remaining_leave_days]] Tage (falls zutreffend).</p>
                                <p>Ich bitte Sie höflich um Genehmigung meines Antrags.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Annual Paid Leave',
                        'description' => 'Formal employee application for annual paid leave in accordance with German labor law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Sender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Employee ID: [[employee_id]]</p>
                                <br>
                                <p><strong>Recipient:</strong><br>[[company_name]]<br>Department: [[department]]<br>Attn: Mr./Ms. [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('F j, Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Application for Annual Leave</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Mr./Ms. [[supervisor_full_name]],</p>
                                <p>I hereby apply for my annual leave for the period from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong> inclusive.</p>
                                <p>This corresponds to [[leave_days]] working days.</p>
                                <p>My remaining leave from the previous year is [[remaining_leave_days]] days (if applicable).</p>
                                <p>I kindly request your approval of my application.</p>
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
                        'description' => 'Офіційна заява працівника на щорічну оплачувану відпустку відповідно до німецького трудового законодавства.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Відправник:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Табельний номер: [[employee_id]]</p>
                                <br>
                                <p><strong>Одержувач:</strong><br>[[company_name]]<br>Відділ: [[department]]<br>На ім\'я: Пан/Пані [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . ' р.</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Заява на щорічну відпустку</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а Пане/Пані [[supervisor_full_name]],</p>
                                <p>цим подаю заяву на щорічну відпустку на період з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong> включно.</p>
                                <p>Це становить [[leave_days]] робочих днів.</p>
                                <p>Мій залишок відпустки з попереднього року становить [[remaining_leave_days]] днів (якщо застосовно).</p>
                                <p>Прошу Вас люб\'язно схвалити мою заяву.</p>
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
                        'description' => 'Formeller Antrag eines Mitarbeiters auf Jahresurlaub gemäß deutschem Arbeitsrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>Abteilung: [[department]]<br>Z. Hd. Herrn/Frau [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], den ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Antrag auf Jahresurlaub</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[supervisor_full_name]],</p>
                                <p>hiermit beantrage ich meinen Jahresurlaub für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis einschließlich <strong>[[leave_end_date]]</strong>.</p>
                                <p>Dies entspricht [[leave_days]] Arbeitstagen.</p>
                                <p>Mein Resturlaub aus dem Vorjahr beträgt [[remaining_leave_days]] Tage (falls zutreffend).</p>
                                <p>Ich bitte Sie höflich um Genehmigung meines Antrags.</p>
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

            // --- Заявление на отпуск за свой счет (без сохранения заработной платы) / Antrag auf unbezahlten Urlaub ---
            [
                'slug' => 'unpaid-leave-application-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres pracownika","en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Mitarbeiters"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"pl":"Numer pracownika","en":"Employee ID","uk":"Номер працівника","de":"Personalnummer"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"department","type":"text","required":true,"labels":{"pl":"Dział","en":"Department","uk":"Відділ","de":"Abteilung"}},
                    {"name":"supervisor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko bezpośredniego przełożonego","en":"Direct Supervisor\'s Full Name","uk":"ПІБ безпосереднього керівника","de":"Vollständiger Name des direkten Vorgesetzten"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia urlopu","en":"Leave Start Date","uk":"Дата початку відпустки","de":"Urlaubsbeginn"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia urlopu","en":"Leave End Date","uk":"Дата закінчення відпустки","de":"Urlaubsende"}},
                    {"name":"reason_for_leave","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie wniosku o urlop bezpłatny","en":"Reason for unpaid leave application","uk":"Обґрунтування заяви на відпустку без збереження зарплати","de":"Begründung des Antrags auf unbezahlten Urlaub"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Antrag auf unbezahlten Urlaub',
                        'description' => 'Formalny wniosek pracownika o udzielenie urlopu bezpłatnego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>Abteilung: [[department]]<br>Z. Hd. Herrn/Frau [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Antrag auf unbezahlten Urlaub</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[supervisor_full_name]],</p>
                                <p>hiermit beantrage ich unbezahlten Urlaub für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis einschließlich <strong>[[leave_end_date]]</strong>.</p>
                                <p>Die Begründung für meinen Antrag lautet:</p>
                                <p>[[reason_for_leave]]</p>
                                <p>Ich bitte Sie höflich um Genehmigung meines Antrags.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Unpaid Leave',
                        'description' => 'Formal employee application for unpaid leave.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Sender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Employee ID: [[employee_id]]</p>
                                <br>
                                <p><strong>Recipient:</strong><br>[[company_name]]<br>Department: [[department]]<br>Attn: Mr./Ms. [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('F j, Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Application for Unpaid Leave</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Mr./Ms. [[supervisor_full_name]],</p>
                                <p>I hereby apply for unpaid leave for the period from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong> inclusive.</p>
                                <p>The reason for my application is:</p>
                                <p>[[reason_for_leave]]</p>
                                <p>I kindly request your approval of my application.</p>
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
                        'description' => 'Офіційна заява працівника на відпустку без збереження заробітної плати.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Відправник:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Табельний номер: [[employee_id]]</p>
                                <br>
                                <p><strong>Одержувач:</strong><br>[[company_name]]<br>Відділ: [[department]]<br>На ім\'я: Пан/Пані [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . ' р.</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Заява на відпустку без збереження заробітної плати</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а Пане/Пані [[supervisor_full_name]],</p>
                                <p>цим подаю заяву на відпустку без збереження заробітної плати на період з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong> включно.</p>
                                <p>Обґрунтуванням моєї заяви є:</p>
                                <p>[[reason_for_leave]]</p>
                                <p>Прошу Вас люб\'язно схвалити мою заяву.</p>
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
                        'description' => 'Formeller Antrag eines Mitarbeiters auf unbezahlten Urlaub.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>Abteilung: [[department]]<br>Z. Hd. Herrn/Frau [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], den ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Antrag auf unbezahlten Urlaub</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[supervisor_full_name]],</p>
                                <p>hiermit beantrage ich unbezahlten Urlaub für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis einschließlich <strong>[[leave_end_date]]</strong>.</p>
                                <p>Die Begründung für meinen Antrag lautet:</p>
                                <p>[[reason_for_leave]]</p>
                                <p>Ich bitte Sie höflich um Genehmigung meines Antrags.</p>
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

            // --- Заявление на учебный отпуск / Antrag auf Bildungsurlaub ---
            [
                'slug' => 'educational-leave-application-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres pracownika","en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Mitarbeiters"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"pl":"Numer pracownika","en":"Employee ID","uk":"Номер працівника","de":"Personalnummer"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"department","type":"text","required":true,"labels":{"pl":"Dział","en":"Department","uk":"Відділ","de":"Abteilung"}},
                    {"name":"supervisor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko bezpośredniego przełożonego","en":"Direct Supervisor\'s Full Name","uk":"ПІБ безпосереднього керівника","de":"Vollständiger Name des direkten Vorgesetzten"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia urlopu","en":"Leave Start Date","uk":"Дата початку відпустки","de":"Urlaubsbeginn"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia urlopu","en":"Leave End Date","uk":"Дата закінчення відпустки","de":"Urlaubsende"}},
                    {"name":"educational_institution_name","type":"text","required":true,"labels":{"pl":"Nazwa instytucji edukacyjnej","en":"Educational Institution Name","uk":"Назва освітньої установи","de":"Name der Bildungseinrichtung"}},
                    {"name":"course_name","type":"text","required":true,"labels":{"pl":"Nazwa kursu/szkolenia","en":"Course/Training Name","uk":"Назва курсу/тренінгу","de":"Name des Kurses/der Schulung"}},
                    {"name":"reason_for_leave","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie wniosku o urlop edukacyjny","en":"Reason for educational leave application","uk":"Обґрунтування заяви на навчальну відпустку","de":"Begründung des Antrags auf Bildungsurlaub"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Antrag auf Bildungsurlaub',
                        'description' => 'Formalny wniosek pracownika o udzielenie urlopu edukacyjnego (Bildungsurlaub) zgodnie z niemieckim prawem.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>Abteilung: [[department]]<br>Z. Hd. Herrn/Frau [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Antrag auf Bildungsurlaub</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[supervisor_full_name]],</p>
                                <p>hiermit beantrage ich Bildungsurlaub für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis einschließlich <strong>[[leave_end_date]]</strong>.</p>
                                <p>Der Bildungsurlaub dient der Teilnahme an folgender Maßnahme:</p>
                                <p>Name der Institution: [[educational_institution_name]]</p>
                                <p>Name des Kurses/der Schulung: [[course_name]]</p>
                                <p>Die Begründung für meinen Antrag lautet:</p>
                                <p>[[reason_for_leave]]</p>
                                <p>Ich bitte Sie höflich um Genehmigung meines Antrags.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Educational Leave',
                        'description' => 'Formal employee application for educational leave (Bildungsurlaub) in accordance with German law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Sender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Employee ID: [[employee_id]]</p>
                                <br>
                                <p><strong>Recipient:</strong><br>[[company_name]]<br>Department: [[department]]<br>Attn: Mr./Ms. [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('F j, Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Application for Educational Leave</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Mr./Ms. [[supervisor_full_name]],</p>
                                <p>I hereby apply for educational leave for the period from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong> inclusive.</p>
                                <p>The educational leave is for participation in the following measure:</p>
                                <p>Institution Name: [[educational_institution_name]]</p>
                                <p>Course/Training Name: [[course_name]]</p>
                                <p>The reason for my application is:</p>
                                <p>[[reason_for_leave]]</p>
                                <p>I kindly request your approval of my application.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на навчальну відпустку',
                        'description' => 'Офіційна заява працівника на навчальну відпустку (Bildungsurlaub) відповідно до німецького законодавства.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Відправник:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Табельний номер: [[employee_id]]</p>
                                <br>
                                <p><strong>Одержувач:</strong><br>[[company_name]]<br>Відділ: [[department]]<br>На ім\'я: Пан/Пані [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . ' р.</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Заява на навчальну відпустку</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а Пане/Пані [[supervisor_full_name]],</p>
                                <p>цим подаю заяву на навчальну відпустку на період з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong> включно.</p>
                                <p>Навчальна відпустка призначена для участі у наступному заході:</p>
                                <p>Назва установи: [[educational_institution_name]]</p>
                                <p>Назва курсу/тренінгу: [[course_name]]</p>
                                <p>Обґрунтуванням моєї заяви є:</p>
                                <p>[[reason_for_leave]]</p>
                                <p>Прошу Вас люб\'язно схвалити мою заяву.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Bildungsurlaub',
                        'description' => 'Formeller Antrag eines Mitarbeiters auf Bildungsurlaub gemäß deutschem Recht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>Abteilung: [[department]]<br>Z. Hd. Herrn/Frau [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], den ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Antrag auf Bildungsurlaub</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[supervisor_full_name]],</p>
                                <p>hiermit beantrage ich Bildungsurlaub für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis einschließlich <strong>[[leave_end_date]]</strong>.</p>
                                <p>Der Bildungsurlaub dient der Teilnahme an folgender Maßnahme:</p>
                                <p>Name der Institution: [[educational_institution_name]]</p>
                                <p>Name des Kurses/der Schulung: [[course_name]]</p>
                                <p>Die Begründung für meinen Antrag lautet:</p>
                                <p>[[reason_for_leave]]</p>
                                <p>Ich bitte Sie höflich um Genehmigung meines Antrags.</p>
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

            // --- Заявление на отпуск по уходу за ребенком / Antrag auf Elternzeit ---
            [
                'slug' => 'parental-leave-application-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres pracownika","en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Mitarbeiters"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"pl":"Numer pracownika","en":"Employee ID","uk":"Номер працівника","de":"Personalnummer"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"department","type":"text","required":true,"labels":{"pl":"Dział","en":"Department","uk":"Відділ","de":"Abteilung"}},
                    {"name":"supervisor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko bezpośredniego przełożonego","en":"Direct Supervisor\'s Full Name","uk":"ПІБ безпосереднього керівника","de":"Vollständiger Name des direkten Vorgesetzten"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"ПІБ дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia dziecka","en":"Child\'s Date of Birth","uk":"Дата народження дитини","de":"Geburtsdatum des Kindes"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia Elternzeit","en":"Parental Leave Start Date","uk":"Дата початку батьківської відпустки","de":"Beginn der Elternzeit"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia Elternzeit","en":"Parental Leave End Date","uk":"Дата закінчення батьківської відпустки","de":"Ende der Elternzeit"}},
                    {"name":"reason_for_leave","type":"textarea","required":false,"labels":{"pl":"Uzasadnienie wniosku (opcjonalnie)","en":"Reason for application (optional)","uk":"Обґрунтування заяви (необов\'язково)","de":"Begründung des Antrags (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Antrag auf Elternzeit',
                        'description' => 'Formalny wniosek pracownika o udzielenie urlopu wychowawczego (Elternzeit) zgodnie z niemieckim prawem.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>Abteilung: [[department]]<br>Z. Hd. Herrn/Frau [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Antrag auf Elternzeit</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[supervisor_full_name]],</p>
                                <p>hiermit beantrage ich Elternzeit für mein Kind <strong>[[child_full_name]]</strong>, geboren am [[child_dob]], für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis einschließlich <strong>[[leave_end_date]]</strong>.</p>
                                <p>[[reason_for_leave]]</p>
                                <p>Ich bitte Sie höflich um Genehmigung meines Antrags.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Parental Leave',
                        'description' => 'Formal employee application for parental leave (Elternzeit) in accordance with German law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Sender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Employee ID: [[employee_id]]</p>
                                <br>
                                <p><strong>Recipient:</strong><br>[[company_name]]<br>Department: [[department]]<br>Attn: Mr./Ms. [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('F j, Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Application for Parental Leave</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Mr./Ms. [[supervisor_full_name]],</p>
                                <p>I hereby apply for parental leave for my child <strong>[[child_full_name]]</strong>, born on [[child_dob]], for the period from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong> inclusive.</p>
                                <p>[[reason_for_leave]]</p>
                                <p>I kindly request your approval of my application.</p>
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
                        'description' => 'Офіційна заява працівника на відпустку по догляду за дитиною (Elternzeit) відповідно до німецького законодавства.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Відправник:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Табельний номер: [[employee_id]]</p>
                                <br>
                                <p><strong>Одержувач:</strong><br>[[company_name]]<br>Відділ: [[department]]<br>На ім\'я: Пан/Пані [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . ' р.</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Заява на відпустку по догляду за дитиною</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а Пане/Пані [[supervisor_full_name]],</p>
                                <p>цим подаю заяву на відпустку по догляду за дитиною для моєї дитини <strong>[[child_full_name]]</strong>, народженої [[child_dob]], на період з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong> включно.</p>
                                <p>[[reason_for_leave]]</p>
                                <p>Прошу Вас люб\'язно схвалити мою заяву.</p>
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
                        'description' => 'Formeller Antrag eines Mitarbeiters auf Elternzeit gemäß deutschem Recht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>Abteilung: [[department]]<br>Z. Hd. Herrn/Frau [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], den ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Antrag auf Elternzeit</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[supervisor_full_name]],</p>
                                <p>hiermit beantrage ich Elternzeit für mein Kind <strong>[[child_full_name]]</strong>, geboren am [[child_dob]], für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis einschließlich <strong>[[leave_end_date]]</strong>.</p>
                                <p>[[reason_for_leave]]</p>
                                <p>Ich bitte Sie höflich um Genehmigung meines Antrags.</p>
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

            // --- Приказ на отпуск / Urlaubsanordnung ---
            [
                'slug' => 'leave-order-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"order_date","type":"date","required":true,"labels":{"pl":"Data zarządzenia","en":"Order Date","uk":"Дата наказу","de":"Datum der Anordnung"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"order_number","type":"text","required":true,"labels":{"pl":"Numer zarządzenia","en":"Order Number","uk":"Номер наказу","de":"Anordnungsnummer"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"pl":"Numer pracownika","en":"Employee ID","uk":"Номер працівника","de":"Personalnummer"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"leave_type","type":"text","required":true,"labels":{"pl":"Rodzaj urlopu (np. Jahresurlaub, Bildungsurlaub, unbezahlter Urlaub)","en":"Type of leave (e.g., annual leave, educational leave, unpaid leave)","uk":"Тип відпустки (напр., щорічна, навчальна, без збереження зарплати)","de":"Urlaubsart (z.B. Jahresurlaub, Bildungsurlaub, unbezahlter Urlaub)"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia urlopu","en":"Leave Start Date","uk":"Дата початку відпустки","de":"Urlaubsbeginn"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia urlopu","en":"Leave End Date","uk":"Дата закінчення відпустки","de":"Urlaubsende"}},
                    {"name":"approver_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko osoby zatwierdzającej","en":"Approver Full Name","uk":"ПІБ того, хто затверджує","de":"Vollständiger Name des Genehmigers"}},
                    {"name":"approver_position","type":"text","required":true,"labels":{"pl":"Stanowisko osoby zatwierdzającej","en":"Approver Position","uk":"Посада того, хто затверджує","de":"Position des Genehmigers"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Urlaubsanordnung',
                        'description' => 'Oficjalne zarządzenie pracodawcy o udzieleniu urlopu pracownikowi zgodnie z niemieckim prawem pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">Urlaubsanordnung</h1><p style="font-size: 14px;">Nummer: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit wird Herrn/Frau <strong>[[employee_full_name]]</strong> (Personalnummer: [[employee_id]]), tätig als [[employee_position]],</p>
                                <p>Urlaub der Art: <strong>[[leave_type]]</strong></p>
                                <p>für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis einschließlich <strong>[[leave_end_date]]</strong> gewährt.</p>
                                <br/>
                                <p>Diese Anordnung tritt mit dem Datum der Unterzeichnung in Kraft.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>[[approver_full_name]]<br>[[approver_position]]</p>
                                <br>
                                <p>Zur Kenntnisnahme: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Leave Order',
                        'description' => 'Official employer\'s order granting leave to an employee in accordance with German labor law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LEAVE ORDER</h1><p style="font-size: 14px;">Number: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hereby, Mr./Ms. <strong>[[employee_full_name]]</strong> (Employee ID: [[employee_id]]), working as [[employee_position]], is granted:</p>
                                <p>Leave type: <strong>[[leave_type]]</strong></p>
                                <p>for the period from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong> inclusive.</p>
                                <br/>
                                <p>This order comes into force on the date of signing.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>[[approver_full_name]]<br>[[approver_position]]</p>
                                <br>
                                <p>For information: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Наказ на відпустку',
                        'description' => 'Офіційний наказ роботодавця про надання відпустки працівнику відповідно до німецького трудового законодавства.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">НАКАЗ НА ВІДПУСТКУ</h1><p style="font-size: 14px;">Номер: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим Пану/Пані <strong>[[employee_full_name]]</strong> (Табельний номер: [[employee_id]]), який/яка працює на посаді [[employee_position]], надається:</p>
                                <p>Вид відпустки: <strong>[[leave_type]]</strong></p>
                                <p>на період з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong> включно.</p>
                                <br/>
                                <p>Цей наказ набирає чинності з дня підписання.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 50px; text-align: center;">
                                <p>___________________<br>[[approver_full_name]]<br>[[approver_position]]</p>
                                <br>
                                <p>До відома: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Urlaubsanordnung',
                        'description' => 'Offizielle Anordnung des Arbeitgebers zur Gewährung von Urlaub an einen Mitarbeiter gemäß deutschem Arbeitsrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">Urlaubsanordnung</h1><p style="font-size: 14px;">Nummer: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit wird Herrn/Frau <strong>[[employee_full_name]]</strong> (Personalnummer: [[employee_id]]), tätig als [[employee_position]],</p>
                                <p>Urlaub der Art: <strong>[[leave_type]]</strong></p>
                                <p>für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis einschließlich <strong>[[leave_end_date]]</strong> gewährt.</p>
                                <br/>
                                <p>Diese Anordnung tritt mit dem Datum der Unterzeichnung in Kraft.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 50px; text-align: center;">
                                <p style="text-align: center;">___________________<br>[[approver_full_name]]<br>[[approver_position]]</p>
                                <br>
                                <p>Zur Kenntnisnahme: [[employee_full_name]]</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление на увольнение по собственному желанию / Kündigungsschreiben des Arbeitnehmers ---
            [
                'slug' => 'employee-resignation-letter-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"letter_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pisma","en":"Letter Date","uk":"Дата складання листа","de":"Datum des Schreibens"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres pracownika","en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Mitarbeiters"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"pl":"Numer pracownika","en":"Employee ID","uk":"Номер працівника","de":"Personalnummer"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Company Address","uk":"Адреса компанії","de":"Adresse der Firma"}},
                    {"name":"termination_date","type":"date","required":true,"labels":{"pl":"Data rozwiązania stosunku pracy","en":"Termination Date of Employment","uk":"Дата розірвання трудових відносин","de":"Datum der Beendigung des Arbeitsverhältnisses"}},
                    {"name":"notice_period_info","type":"text","required":true,"labels":{"pl":"Informacja o okresie wypowiedzenia (np. zgodnie z umową, ustawą)","en":"Notice period information (e.g., as per contract, law)","uk":"Інформація про термін попередження (напр., згідно з договором, законом)","de":"Information zur Kündigungsfrist (z.B. gemäß Vertrag, Gesetz)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Kündigungsschreiben des Arbeitnehmers',
                        'description' => 'Formalne pismo pracownika o rozwiązaniu umowy o pracę z zachowaniem okresu wypowiedzenia, zgodnie z niemieckim prawem pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>[[company_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Kündigung meines Arbeitsverhältnisses</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit kündige ich mein Arbeitsverhältnis, das ich mit Ihnen am [Datum Beginn Arbeitsverhältnisses] eingegangen bin, fristgerecht zum <strong>[[termination_date]]</strong>.</p>
                                <p>Die Kündigung erfolgt unter Einhaltung der gesetzlichen/vertraglichen Kündigungsfrist von [[notice_period_info]].</p>
                                <p>Ich bitte Sie um eine schriftliche Bestätigung des Erhalts dieser Kündigung und des Beendigungsdatums des Arbeitsverhältnisses.</p>
                                <p>Des Weiteren bitte ich Sie um die Ausstellung eines qualifizierten Arbeitszeugnisses.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Employee Resignation Letter',
                        'description' => 'Formal employee letter terminating the employment contract with due notice, in accordance with German labor law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Sender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Employee ID: [[employee_id]]</p>
                                <br>
                                <p><strong>Recipient:</strong><br>[[company_name]]<br>[[company_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('F j, Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Resignation of Employment</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Sir or Madam,</p>
                                <p>I hereby give notice of termination of my employment contract, which I entered into with you on [Date of employment start], effective <strong>[[termination_date]]</strong>.</p>
                                <p>The termination is made in compliance with the statutory/contractual notice period of [[notice_period_info]].</p>
                                <p>I kindly request written confirmation of receipt of this termination and the effective date of termination of employment.</p>
                                <p>Furthermore, I request the issuance of a qualified employment reference.</p>
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
                        'description' => 'Офіційна заява працівника про розірвання трудового договору з дотриманням терміну попередження, відповідно до німецького трудового законодавства.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Відправник:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Табельний номер: [[employee_id]]</p>
                                <br>
                                <p><strong>Одержувач:</strong><br>[[company_name]]<br>[[company_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . ' р.</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Заява про звільнення</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановні пані та панове,</p>
                                <p>цим повідомляю про розірвання моїх трудових відносин, які я уклав(ла) з Вами [Дата початку трудових відносин], з дотриманням терміну попередження до <strong>[[termination_date]]</strong>.</p>
                                <p>Розірвання відбувається з дотриманням встановленого законом/договором терміну попередження [[notice_period_info]].</p>
                                <p>Прошу Вас письмово підтвердити отримання цієї заяви про звільнення та дату припинення трудових відносин.</p>
                                <p>Крім того, прошу Вас видати кваліфіковану характеристику.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Kündigungsschreiben des Arbeitnehmers',
                        'description' => 'Formelles Schreiben eines Arbeitnehmers zur Beendigung des Arbeitsverhältnisses unter Einhaltung der Kündigungsfrist, gemäß deutschem Arbeitsrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>[[company_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], den ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Kündigung meines Arbeitsverhältnisses</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit kündige ich mein Arbeitsverhältnis, das ich mit Ihnen am [Datum Beginn Arbeitsverhältnisses] eingegangen bin, fristgerecht zum <strong>[[termination_date]]</strong>.</p>
                                <p>Die Kündigung erfolgt unter Einhaltung der gesetzlichen/vertraglichen Kündigungsfrist von [[notice_period_info]].</p>
                                <p>Ich bitte Sie um eine schriftliche Bestätigung des Erhalts dieser Kündigung und des Beendigungsdatums des Arbeitsverhältnisses.</p>
                                <p>Des Weiteren bitte ich Sie um die Ausstellung eines qualifizierten Arbeitszeugnisses.</p>
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

            // --- Заявление на увольнение по соглашению сторон / Antrag auf Aufhebungsvertrag ---
            [
                'slug' => 'termination-mutual-agreement-application-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"letter_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pisma","en":"Letter Date","uk":"Дата складання листа","de":"Datum des Schreibens"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres pracownika","en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Mitarbeiters"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"pl":"Numer pracownika","en":"Employee ID","uk":"Номер працівника","de":"Personalnummer"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Company Address","uk":"Адреса компанії","de":"Adresse der Firma"}},
                    {"name":"proposed_termination_date","type":"date","required":true,"labels":{"pl":"Proponowana data rozwiązania umowy","en":"Proposed Termination Date","uk":"Пропонована дата розірвання договору","de":"Vorgeschlagenes Beendigungsdatum"}},
                    {"name":"reason","type":"textarea","required":false,"labels":{"pl":"Uzasadnienie (opcjonalnie)","en":"Reason (optional)","uk":"Обґрунтування (необов\'язково)","de":"Begründung (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Antrag auf Aufhebungsvertrag',
                        'description' => 'Formalny wniosek pracownika o rozwiązanie umowy o pracę za porozumieniem stron (Aufhebungsvertrag) zgodnie z niemieckim prawem pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>[[company_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Antrag auf Abschluss eines Aufhebungsvertrages</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit beantrage ich den Abschluss eines Aufhebungsvertrages zur Beendigung meines Arbeitsverhältnisses zum <strong>[[proposed_termination_date]]</strong>.</p>
                                <p>[[reason]]</p>
                                <p>Ich bitte Sie höflich um Prüfung meines Antrags und um Kontaktaufnahme zur Besprechung der weiteren Details.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Termination by Mutual Agreement',
                        'description' => 'Formal employee application for termination of the employment contract by mutual agreement (Aufhebungsvertrag) in accordance with German labor law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Sender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Employee ID: [[employee_id]]</p>
                                <br>
                                <p><strong>Recipient:</strong><br>[[company_name]]<br>[[company_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('F j, Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Application for Mutual Termination Agreement</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Sir or Madam,</p>
                                <p>I hereby apply for a mutual termination agreement to end my employment relationship on <strong>[[proposed_termination_date]]</strong>.</p>
                                <p>[[reason]]</p>
                                <p>I kindly request your review of my application and contact to discuss further details.</p>
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
                        'description' => 'Формальна заява працівника про розірвання трудового договору за угодою сторін (Aufhebungsvertrag) відповідно до німецького трудового законодавства.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Відправник:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Табельний номер: [[employee_id]]</p>
                                <br>
                                <p><strong>Одержувач:</strong><br>[[company_name]]<br>[[company_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . ' р.</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Заява про укладення угоди про розірвання трудового договору</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановні пані та панове,</p>
                                <p>цим подаю заяву про укладення угоди про розірвання трудового договору для припинення моїх трудових відносин до <strong>[[proposed_termination_date]]</strong>.</p>
                                <p>[[reason]]</p>
                                <p>Прошу Вас люб\'язно розглянути мою заяву та зв\'язатися для обговорення подальших деталей.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Aufhebungsvertrag',
                        'description' => 'Formeller Antrag eines Mitarbeiters auf Abschluss eines Aufhebungsvertrages zur Beendigung des Arbeitsverhältnisses im gegenseitigen Einvernehmen, gemäß deutschem Arbeitsrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>[[company_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], den ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Antrag auf Abschluss eines Aufhebungsvertrages</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit beantrage ich den Abschluss eines Aufhebungsvertrages zur Beendigung meines Arbeitsverhältnisses zum <strong>[[proposed_termination_date]]</strong>.</p>
                                <p>[[reason]]</p>
                                <p>Ich bitte Sie höflich um Prüfung meines Antrags und um Kontaktaufnahme zur Besprechung der weiteren Details.</p>
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

            // --- Соглашение о расторжении трудового договора / Aufhebungsvertrag ---
            [
                'slug' => 'termination-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"employer_name","type":"text","required":true,"labels":{"pl":"Nazwa pracodawcy","en":"Employer Name","uk":"Назва роботодавця","de":"Name des Arbeitgebers"}},
                    {"name":"employer_address","type":"text","required":true,"labels":{"pl":"Adres pracodawcy","en":"Employer Address","uk":"Адреса роботодавця","de":"Adresse des Arbeitgebers"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"pl":"Adres pracownika","en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Mitarbeiters"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"pl":"Numer pracownika","en":"Employee ID","uk":"Номер працівника","de":"Personalnummer"}},
                    {"name":"termination_date","type":"date","required":true,"labels":{"pl":"Data rozwiązania stosunku pracy","en":"Termination Date of Employment","uk":"Дата розірвання трудових відносин","de":"Datum der Beendigung des Arbeitsverhältnisses"}},
                    {"name":"reason_for_termination","type":"textarea","required":false,"labels":{"pl":"Przyczyna rozwiązania (opcjonalnie)","en":"Reason for termination (optional)","uk":"Причина розірвання (необов\'язково)","de":"Grund der Beendigung (optional)"}},
                    {"name":"severance_pay","type":"number","required":false,"labels":{"pl":"Odprawa (PLN, opcjonalnie)","en":"Severance Pay (PLN, optional)","uk":"Вихідна допомога (PLN, необов\'язково)","de":"Abfindung (PLN, optional)"}},
                    {"name":"other_terms","type":"textarea","required":false,"labels":{"pl":"Inne uzgodnienia (np. świadectwo pracy, urlop, zwolnienie z pracy)","en":"Other agreements (e.g., employment certificate, leave, garden leave)","uk":"Інші домовленості (напр., трудова книжка, відпустка, звільнення від роботи)","de":"Weitere Vereinbarungen (z.B. Arbeitszeugnis, Resturlaub, Freistellung)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Aufhebungsvertrag',
                        'description' => 'Umowa o rozwiązaniu stosunku pracy za porozumieniem stron, zawierająca uzgodnione warunki, zgodnie z niemieckim prawem pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">Aufhebungsvertrag</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Arbeitgeber:</strong> [[employer_name]], [[employer_address]],</p>
                                <p>und</p>
                                <p><strong>Arbeitnehmer:</strong> Herrn/Frau [[employee_full_name]], [[employee_address]], Personalnummer: [[employee_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Beendigung des Arbeitsverhältnisses</h2>
                                <p>Das zwischen den Parteien bestehende Arbeitsverhältnis wird im gegenseitigen Einvernehmen zum <strong>[[termination_date]]</strong> beendet.</p>
                                <p>[[reason_for_termination]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Abfindung</h2>
                                <p>Der Arbeitnehmer erhält eine Abfindung in Höhe von [[severance_pay]] PLN (falls zutreffend).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Weitere Vereinbarungen</h2>
                                <p>[[other_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Schlussbestimmungen</h2>
                                <p>Mit der Erfüllung dieses Vertrages sind alle gegenseitigen Ansprüche aus dem Arbeitsverhältnis und dessen Beendigung abgegolten. Dieser Vertrag wurde in zwei Ausfertigungen erstellt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Arbeitgeber</p></td>
                                <td width="50%"><p>___________________<br>Arbeitnehmer</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Mutual Termination Agreement',
                        'description' => 'Agreement on the termination of employment by mutual consent, containing agreed terms, in accordance with German labor law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MUTUAL TERMINATION AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Employer:</strong> [[employer_name]], [[employer_address]],</p>
                                <p>and</p>
                                <p><strong>Employee:</strong> Mr./Ms. [[employee_full_name]], [[employee_address]], Employee ID: [[employee_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Termination of Employment</h2>
                                <p>The employment relationship existing between the parties is terminated by mutual agreement as of <strong>[[termination_date]]</strong>.</p>
                                <p>[[reason_for_termination]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Severance Pay</h2>
                                <p>The employee receives a severance payment of [[severance_pay]] PLN (if applicable).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Further Agreements</h2>
                                <p>[[other_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Final Provisions</h2>
                                <p>With the fulfillment of this agreement, all mutual claims arising from the employment relationship and its termination are settled. This agreement has been drawn up in two copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Employer</p></td>
                                <td width="50%"><p>___________________<br>Employee</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Угода про розірвання трудового договору',
                        'description' => 'Угода про розірвання трудових відносин за взаємною згодою, що містить узгоджені умови, відповідно до німецького трудового законодавства.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">УГОДА ПРО РОЗІРВАННЯ ТРУДОВОГО ДОГОВОРУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Роботодавець:</strong> [[employer_name]], [[employer_address]],</p>
                                <p>та</p>
                                <p><strong>Працівник:</strong> Пан/Пані [[employee_full_name]], [[employee_address]], Табельний номер: [[employee_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Припинення трудових відносин</h2>
                                <p>Трудові відносини між сторонами припиняються за взаємною згодою до <strong>[[termination_date]]</strong>.</p>
                                <p>[[reason_for_termination]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Вихідна допомога</h2>
                                <p>Працівник отримує вихідну допомогу у розмірі [[severance_pay]] PLN (якщо застосовно).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Інші домовленості</h2>
                                <p>[[other_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Прикінцеві положення</h2>
                                <p>З виконанням цього договору всі взаємні претензії, що випливають з трудових відносин та їх припинення, врегульовуються. Цей договір складено у двох примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Роботодавець</p></td>
                                <td width="50%"><p>___________________<br>Працівник</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Aufhebungsvertrag',
                        'description' => 'Vereinbarung zur Beendigung des Arbeitsverhältnisses im gegenseitigen Einvernehmen, die die vereinbarten Bedingungen enthält, gemäß deutschem Arbeitsrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">Aufhebungsvertrag</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Arbeitgeber:</strong> [[employer_name]], [[employer_address]],</p>
                                <p>und</p>
                                <p><strong>Arbeitnehmer:</strong> Herrn/Frau [[employee_full_name]], [[employee_address]], Personalnummer: [[employee_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Beendigung des Arbeitsverhältnisses</h2>
                                <p>Das zwischen den Parteien bestehende Arbeitsverhältnis wird im gegenseitigen Einvernehmen zum <strong>[[termination_date]]</strong> beendet.</p>
                                <p>[[reason_for_termination]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Abfindung</h2>
                                <p>Der Arbeitnehmer erhält eine Abfindung in Höhe von [[severance_pay]] PLN (falls zutreffend).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Weitere Vereinbarungen</h2>
                                <p>[[other_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Schlussbestimmungen</h2>
                                <p>Mit der Erfüllung dieses Vertrages sind alle gegenseitigen Ansprüche aus dem Arbeitsverhältnis und dessen Beendigung abgegolten. Dieser Vertrag wurde in zwei Ausfertigungen erstellt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Arbeitgeber</p></td>
                                <td width="50%"><p>___________________<br>Arbeitnehmer</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Приказ об увольнении / Kündigungsbescheid des Arbeitgebers ---
            [
                'slug' => 'employer-termination-notice-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"notice_date","type":"date","required":true,"labels":{"pl":"Data wystawienia wypowiedzenia","en":"Notice Date","uk":"Дата видачі повідомлення","de":"Datum der Kündigung"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Company Address","uk":"Адреса компанії","de":"Adresse der Firma"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"pl":"Adres pracownika","en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Mitarbeiters"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"pl":"Numer pracownika","en":"Employee ID","uk":"Номер працівника","de":"Personalnummer"}},
                    {"name":"termination_date","type":"date","required":true,"labels":{"pl":"Data rozwiązania stosunku pracy","en":"Termination Date of Employment","uk":"Дата розірвання трудових відносин","de":"Datum der Beendigung des Arbeitsverhältnisses"}},
                    {"name":"reason_for_termination","type":"textarea","required":true,"labels":{"pl":"Podstawa prawna i uzasadnienie wypowiedzenia","en":"Legal basis and justification for termination","uk":"Правова підстава та обґрунтування звільнення","de":"Rechtsgrundlage und Begründung der Kündigung"}},
                    {"name":"notice_period_info","type":"text","required":true,"labels":{"pl":"Informacja o okresie wypowiedzenia","en":"Notice period information","uk":"Інформація про термін попередження","de":"Information zur Kündigungsfrist"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Kündigungsbescheid des Arbeitgebers',
                        'description' => 'Oficjalne pismo pracodawcy o wypowiedzeniu umowy o pracę, zawierające podstawę prawną i uzasadnienie, zgodnie z niemieckim prawem pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[company_name]]<br>[[company_address]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>Herrn/Frau [[employee_full_name]]<br>[[employee_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Kündigung des Arbeitsverhältnisses</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[employee_full_name]],</p>
                                <p>hiermit kündigen wir das mit Ihnen bestehende Arbeitsverhältnis fristgerecht zum <strong>[[termination_date]]</strong>.</p>
                                <p>Die Kündigung erfolgt unter Einhaltung der Kündigungsfrist von [[notice_period_info]].</p>
                                <p>Die Kündigung erfolgt aus folgendem Grund/auf folgender Rechtsgrundlage:</p>
                                <p>[[reason_for_termination]]</p>
                                <p>Wir bitten Sie um Bestätigung des Erhalts dieser Kündigung.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[company_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Employer Termination Notice',
                        'description' => 'Official employer letter terminating the employment contract, including legal basis and justification, in accordance with German labor law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Sender:</strong><br>[[company_name]]<br>[[company_address]]</p>
                                <br>
                                <p><strong>Recipient:</strong><br>Mr./Ms. [[employee_full_name]]<br>[[employee_address]]<br>Employee ID: [[employee_id]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('F j, Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Termination of Employment</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Mr./Ms. [[employee_full_name]],</p>
                                <p>We hereby terminate your employment relationship with due notice as of <strong>[[termination_date]]</strong>.</p>
                                <p>The termination is made in compliance with the notice period of [[notice_period_info]].</p>
                                <p>The termination is based on the following reason/legal basis:</p>
                                <p>[[reason_for_termination]]</p>
                                <p>We kindly request confirmation of receipt of this termination.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[company_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Наказ про звільнення',
                        'description' => 'Офіційний лист роботодавця про розірвання трудового договору, що містить правову підставу та обґрунтування, відповідно до німецького трудового законодавства.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Відправник:</strong><br>[[company_name]]<br>[[company_address]]</p>
                                <br>
                                <p><strong>Одержувач:</strong><br>Пан/Пані [[employee_full_name]]<br>[[employee_address]]<br>Табельний номер: [[employee_id]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . ' р.</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Розірвання трудових відносин</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а Пане/Пані [[employee_full_name]],</p>
                                <p>цим повідомляємо про розірвання Ваших трудових відносин з дотриманням терміну попередження до <strong>[[termination_date]]</strong>.</p>
                                <p>Розірвання відбувається з дотриманням терміну попередження [[notice_period_info]].</p>
                                <p>Підставою для розірвання є наступна причина/правова підстава:</p>
                                <p>[[reason_for_termination]]</p>
                                <p>Просимо Вас підтвердити отримання цього повідомлення про звільнення.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[company_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Kündigungsbescheid des Arbeitgebers',
                        'description' => 'Offizielles Schreiben des Arbeitgebers zur Beendigung des Arbeitsverhältnisses, einschließlich Rechtsgrundlage und Begründung, gemäß deutschem Arbeitsrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[company_name]]<br>[[company_address]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>Herrn/Frau [[employee_full_name]]<br>[[employee_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], den ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Kündigung des Arbeitsverhältnisses</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[employee_full_name]],</p>
                                <p>hiermit kündigen wir das mit Ihnen bestehende Arbeitsverhältnis fristgerecht zum <strong>[[termination_date]]</strong>.</p>
                                <p>Die Kündigung erfolgt unter Einhaltung der Kündigungsfrist von [[notice_period_info]].</p>
                                <p>Die Kündigung erfolgt aus folgendem Grund/auf folgender Rechtsgrundlage:</p>
                                <p>[[reason_for_termination]]</p>
                                <p>Wir bitten Sie um Bestätigung des Erhalts dieser Kündigung.</p>
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

            // --- Рекомендательное письмо / Empfehlungsschreiben ---
            [
                'slug' => 'recommendation-letter-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"letter_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pisma","en":"Letter Date","uk":"Дата складання листа","de":"Datum des Schreibens"}},
                    {"name":"recommender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wystawiającego","en":"Recommender Full Name","uk":"ПІБ того, хто надає рекомендацію","de":"Vollständiger Name des Empfehlers"}},
                    {"name":"recommender_position","type":"text","required":true,"labels":{"pl":"Stanowisko wystawiającego","en":"Recommender Position","uk":"Посада того, хто надає рекомендацію","de":"Position des Empfehlers"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"employment_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia pracy","en":"Employment Start Date","uk":"Дата початку роботи","de":"Beginn der Beschäftigung"}},
                    {"name":"employment_end_date","type":"date","required":false,"labels":{"pl":"Data zakończenia pracy (opcjonalnie)","en":"Employment End Date (optional)","uk":"Дата закінчення роботи (необов\'язково)","de":"Ende der Beschäftigung (optional)"}},
                    {"name":"achievements_and_qualities","type":"textarea","required":true,"labels":{"pl":"Opis osiągnięć i cech pracownika","en":"Description of employee\'s achievements and qualities","uk":"Опис досягнень та якостей працівника","de":"Beschreibung der Leistungen und Eigenschaften des Mitarbeiters"}},
                    {"name":"recommendation_strength","type":"text","required":true,"labels":{"pl":"Siła rekomendacji (np. bardzo polecam, polecam)","en":"Strength of recommendation (e.g., highly recommend, recommend)","uk":"Сила рекомендації (напр., дуже рекомендую, рекомендую)","de":"Stärke der Empfehlung (z.B. sehr empfehlenswert, empfehlenswert)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Empfehlungsschreiben',
                        'description' => 'Oficjalne pismo zawierające rekomendację dla byłego lub obecnego pracownika, zgodnie z niemiecką praktyką.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[recommender_full_name]]<br>[[recommender_position]]<br>[[company_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Empfehlungsschreiben</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit bestätige ich, dass Herr/Frau <strong>[[employee_full_name]]</strong> in unserem Unternehmen [[company_name]] als [[employee_position]] vom [[employment_start_date]] bis [[employment_end_date]] (falls zutreffend) beschäftigt war/ist.</p>
                                <p>Während seiner/ihrer Tätigkeit hat Herr/Frau [[employee_full_name]] stets [[achievements_and_qualities]] gezeigt.</p>
                                <p>Ich kann Herrn/Frau [[employee_full_name]] als engagierten und kompetenten Mitarbeiter [[recommendation_strength]] empfehlen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[recommender_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Recommendation Letter',
                        'description' => 'Official letter providing a recommendation for a former or current employee, in accordance with German practice.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Sender:</strong><br>[[recommender_full_name]]<br>[[recommender_position]]<br>[[company_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('F j, Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Recommendation Letter</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Sir or Madam,</p>
                                <p>I hereby confirm that Mr./Ms. <strong>[[employee_full_name]]</strong> was/is employed in our company [[company_name]] as [[employee_position]] from [[employment_start_date]] to [[employment_end_date]] (if applicable).</p>
                                <p>During his/her employment, Mr./Ms. [[employee_full_name]] consistently demonstrated [[achievements_and_qualities]].</p>
                                <p>I can [[recommendation_strength]] recommend Mr./Ms. [[employee_full_name]] as a dedicated and competent employee.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[recommender_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Рекомендаційний лист',
                        'description' => 'Офіційний лист, що містить рекомендацію для колишнього або поточного працівника, відповідно до німецької практики.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Відправник:</strong><br>[[recommender_full_name]]<br>[[recommender_position]]<br>[[company_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . ' р.</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Рекомендаційний лист</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановні пані та панове,</p>
                                <p>цим підтверджую, що Пан/Пані <strong>[[employee_full_name]]</strong> був(ла)/є працевлаштований(а) в нашій компанії [[company_name]] на посаді [[employee_position]] з [[employment_start_date]] по [[employment_end_date]] (якщо застосовно).</p>
                                <p>Протягом своєї діяльності Пан/Пані [[employee_full_name]] постійно демонстрував(ла) [[achievements_and_qualities]].</p>
                                <p>Я можу [[recommendation_strength]] рекомендувати Пана/Пані [[employee_full_name]] як відданого та компетентного працівника.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[recommender_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Empfehlungsschreiben',
                        'description' => 'Offizielles Schreiben mit einer Empfehlung für einen ehemaligen oder aktuellen Mitarbeiter, gemäß deutscher Praxis.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[recommender_full_name]]<br>[[recommender_position]]<br>[[company_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], den ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Empfehlungsschreiben</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit bestätige ich, dass Herr/Frau <strong>[[employee_full_name]]</strong> in unserem Unternehmen [[company_name]] als [[employee_position]] vom [[employment_start_date]] bis [[employment_end_date]] (falls zutreffend) beschäftigt war/ist.</p>
                                <p>Während seiner/ihrer Tätigkeit hat Herr/Frau [[employee_full_name]] stets [[achievements_and_qualities]] gezeigt.</p>
                                <p>Ich kann Herrn/Frau [[employee_full_name]] als engagierten und kompetenten Mitarbeiter [[recommendation_strength]] empfehlen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[recommender_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Характеристика на сотрудника / Arbeitszeugnis ---
            [
                'slug' => 'arbeitszeugnis-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"issue_date","type":"date","required":true,"labels":{"pl":"Data wystawienia","en":"Issue Date","uk":"Дата видачі","de":"Ausstellungsdatum"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Company Address","uk":"Адреса компанії","de":"Adresse der Firma"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"employee_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia pracownika","en":"Employee Date of Birth","uk":"Дата народження працівника","de":"Geburtsdatum des Mitarbeiters"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"employment_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia pracy","en":"Employment Start Date","uk":"Дата початку роботи","de":"Beginn der Beschäftigung"}},
                    {"name":"employment_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia pracy","en":"Employment End Date","uk":"Дата закінчення роботи","de":"Ende der Beschäftigung"}},
                    {"name":"duties_description","type":"textarea","required":true,"labels":{"pl":"Opis wykonywanych zadań","en":"Description of duties performed","uk":"Опис виконуваних завдань","de":"Beschreibung der ausgeführten Aufgaben"}},
                    {"name":"performance_evaluation","type":"textarea","required":true,"labels":{"pl":"Ocena wydajności i jakości pracy","en":"Evaluation of performance and work quality","uk":"Оцінка продуктивності та якості роботи","de":"Bewertung der Leistung und Arbeitsqualität"}},
                    {"name":"social_behavior_evaluation","type":"textarea","required":true,"labels":{"pl":"Ocena zachowania społecznego (wobec przełożonych, współpracowników)","en":"Evaluation of social behavior (towards superiors, colleagues)","uk":"Оцінка соціальної поведінки (щодо керівництва, колег)","de":"Bewertung des Sozialverhaltens (gegenüber Vorgesetzten, Kollegen)"}},
                    {"name":"reason_for_leaving","type":"textarea","required":false,"labels":{"pl":"Powód zakończenia stosunku pracy (opcjonalnie)","en":"Reason for termination of employment (optional)","uk":"Причина припинення трудових відносин (необов\'язково)","de":"Grund der Beendigung des Arbeitsverhältnisses (optional)"}},
                    {"name":"issuer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wystawiającego","en":"Issuer\'s Full Name","uk":"ПІБ того, хто видає","de":"Vollständiger Name des Ausstellers"}},
                    {"name":"issuer_position","type":"text","required":true,"labels":{"pl":"Stanowisko wystawiającego","en":"Issuer\'s Position","uk":"Посада того, хто видає","de":"Position des Ausstellers"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Arbeitszeugnis (Świadectwo pracy)',
                        'description' => 'Oficjalne świadectwo pracy, szczegółowo opisujące przebieg zatrudnienia, wykonywane zadania, ocenę pracy i zachowania, zgodnie z niemieckim prawem pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">Arbeitszeugnis</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]<br>[[company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Herr/Frau <strong>[[employee_full_name]]</strong>, geboren am [[employee_dob]], war in unserem Unternehmen vom <strong>[[employment_start_date]]</strong> bis zum <strong>[[employment_end_date]]</strong> als <strong>[[employee_position]]</strong> beschäftigt.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Aufgabenbereich</h2>
                                <p>[[duties_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Leistungsbeurteilung</h2>
                                <p>[[performance_evaluation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Sozialverhalten</h2>
                                <p>[[social_behavior_evaluation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Beendigung des Arbeitsverhältnisses</h2>
                                <p>Das Arbeitsverhältnis endete zum [[employment_end_date]]. [[reason_for_leaving]]</p>
                                <p>Wir bedanken uns für die geleistete Arbeit und wünschen Herrn/Frau [[employee_full_name]] für die Zukunft alles Gute.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>[[issuer_full_name]]</p>
                                <p>[[issuer_position]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Employment Reference (Arbeitszeugnis)',
                        'description' => 'Official employment reference, detailing the course of employment, duties performed, work and behavior evaluation, in accordance with German labor law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">Employment Reference</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]<br>[[company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Mr./Ms. <strong>[[employee_full_name]]</strong>, born on [[employee_dob]], was employed in our company from <strong>[[employment_start_date]]</strong> to <strong>[[employment_end_date]]</strong> as <strong>[[employee_position]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Area of Responsibility</h2>
                                <p>[[duties_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Performance Evaluation</h2>
                                <p>[[performance_evaluation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Social Behavior</h2>
                                <p>[[social_behavior_evaluation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Termination of Employment</h2>
                                <p>The employment ended on [[employment_end_date]]. [[reason_for_leaving]]</p>
                                <p>We thank Mr./Ms. [[employee_full_name]] for the work performed and wish him/her all the best for the future.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 50px; text-align: left;">
                                <p>___________________</p>
                                <p>[[issuer_full_name]]</p>
                                <p>[[issuer_position]]</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Характеристика на працівника (Arbeitszeugnis)',
                        'description' => 'Офіційна характеристика з місця роботи, що детально описує хід працевлаштування, виконувані завдання, оцінку роботи та поведінки, відповідно до німецького трудового законодавства.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">Характеристика з місця роботи</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]<br>[[company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Пан/Пані <strong>[[employee_full_name]]</strong>, народжений(а) [[employee_dob]], працював(ла) у нашій компанії з <strong>[[employment_start_date]]</strong> по <strong>[[employment_end_date]]</strong> на посаді <strong>[[employee_position]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Сфера обов\'язків</h2>
                                <p>[[duties_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Оцінка продуктивності</h2>
                                <p>[[performance_evaluation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Соціальна поведінка</h2>
                                <p>[[social_behavior_evaluation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Припинення трудових відносин</h2>
                                <p>Трудові відносини припинилися [[employment_end_date]]. [[reason_for_leaving]]</p>
                                <p>Ми дякуємо Пану/Пані [[employee_full_name]] за виконану роботу та бажаємо йому/їй всього найкращого у майбутньому.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 50px; text-align: left;">
                                <p>___________________</p>
                                <p>[[issuer_full_name]]</p>
                                <p>[[issuer_position]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Arbeitszeugnis',
                        'description' => 'Offizielles Arbeitszeugnis, das den Verlauf der Beschäftigung, die ausgeführten Aufgaben, die Leistungs- und Verhaltensbeurteilung detailliert beschreibt, gemäß deutschem Arbeitsrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">Arbeitszeugnis</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]<br>[[company_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Herr/Frau <strong>[[employee_full_name]]</strong>, geboren am [[employee_dob]], war in unserem Unternehmen vom <strong>[[employment_start_date]]</strong> bis zum <strong>[[employment_end_date]]</strong> als <strong>[[employee_position]]</strong> beschäftigt.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Aufgabenbereich</h2>
                                <p>[[duties_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Leistungsbeurteilung</h2>
                                <p>[[performance_evaluation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Sozialverhalten</h2>
                                <p>[[social_behavior_evaluation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Beendigung des Arbeitsverhältnisses</h2>
                                <p>Das Arbeitsverhältnis endete zum [[employment_end_date]]. [[reason_for_leaving]]</p>
                                <p>Wir bedanken uns für die geleistete Arbeit und wünschen Herrn/Frau [[employee_full_name]] für die Zukunft alles Gute.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>[[issuer_full_name]]</p>
                                <p>[[issuer_position]]</p>
                            </div>'
                    ]
                ]
            ],

            // --- Служебная записка / Interne Notiz/Memo ---
            [
                'slug' => 'internal-memo-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"memo_date","type":"date","required":true,"labels":{"pl":"Data notatki","en":"Memo Date","uk":"Дата записки","de":"Datum der Notiz"}},
                    {"name":"sender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko nadawcy","en":"Sender Full Name","uk":"ПІБ відправника","de":"Vollständiger Name des Absenders"}},
                    {"name":"sender_department","type":"text","required":true,"labels":{"pl":"Dział nadawcy","en":"Sender Department","uk":"Відділ відправника","de":"Abteilung des Absenders"}},
                    {"name":"recipient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko odbiorcy","en":"Recipient Full Name","uk":"ПІБ одержувача","de":"Vollständiger Name des Empfängers"}},
                    {"name":"recipient_department","type":"text","required":true,"labels":{"pl":"Dział odbiorcy","en":"Recipient Department","uk":"Відділ одержувача","de":"Abteilung des Empfängers"}},
                    {"name":"subject","type":"text","required":true,"labels":{"pl":"Temat notatki","en":"Subject of Memo","uk":"Тема записки","de":"Betreff der Notiz"}},
                    {"name":"memo_content","type":"textarea","required":true,"labels":{"pl":"Treść notatki","en":"Content of Memo","uk":"Зміст записки","de":"Inhalt der Notiz"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Interne Notiz (Służbowa notatka)',
                        'description' => 'Wewnętrzna notatka służbowa do komunikacji w firmie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>An:</strong> [[recipient_full_name]] (Abteilung: [[recipient_department]])</p>
                                <p><strong>Von:</strong> [[sender_full_name]] (Abteilung: [[sender_department]])</p>
                                <p><strong>Datum:</strong> [[memo_date]]</p>
                                <p><strong>Betreff:</strong> [[subject]]</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Interne Notiz</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[memo_content]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Internal Memo/Official Note',
                        'description' => 'Internal memo for communication within the company.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>To:</strong> [[recipient_full_name]] (Department: [[recipient_department]])</p>
                                <p><strong>From:</strong> [[sender_full_name]] (Department: [[sender_department]])</p>
                                <p><strong>Date:</strong> [[memo_date]]</p>
                                <p><strong>Subject:</strong> [[subject]]</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Internal Memo</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[memo_content]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Службова записка (Interne Notiz/Memo)',
                        'description' => 'Внутрішня службова записка для комунікації в компанії.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Кому:</strong> [[recipient_full_name]] (Відділ: [[recipient_department]])</p>
                                <p><strong>Від:</strong> [[sender_full_name]] (Відділ: [[sender_department]])</p>
                                <p><strong>Дата:</strong> [[memo_date]]</p>
                                <p><strong>Тема:</strong> [[subject]]</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Службова записка</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[memo_content]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Interne Notiz/Memo',
                        'description' => 'Interne Notiz zur Kommunikation innerhalb des Unternehmens.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>An:</strong> [[recipient_full_name]] (Abteilung: [[recipient_department]])</p>
                                <p><strong>Von:</strong> [[sender_full_name]] (Abteilung: [[sender_department]])</p>
                                <p><strong>Datum:</strong> [[memo_date]]</p>
                                <p><strong>Betreff:</strong> [[subject]]</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Interne Notiz</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[memo_content]]</p>
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

            // --- Объяснительная записка / Stellungnahme/Erklärung ---
            [
                'slug' => 'explanation-statement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"statement_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia oświadczenia","en":"Statement Date","uk":"Дата складання заяви","de":"Datum der Erklärung"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres pracownika","en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Mitarbeiters"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"pl":"Numer pracownika","en":"Employee ID","uk":"Номер працівника","de":"Personalnummer"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"department","type":"text","required":true,"labels":{"pl":"Dział","en":"Department","uk":"Відділ","de":"Abteilung"}},
                    {"name":"supervisor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko bezpośredniego przełożonego","en":"Direct Supervisor\'s Full Name","uk":"ПІБ безпосереднього керівника","de":"Vollständiger Name des direkten Vorgesetzten"}},
                    {"name":"incident_date","type":"date","required":true,"labels":{"pl":"Data zdarzenia/sytuacji","en":"Date of incident/situation","uk":"Дата події/ситуації","de":"Datum des Vorfalls/der Situation"}},
                    {"name":"incident_description","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis zdarzenia i wyjaśnienia","en":"Detailed description of incident and explanation","uk":"Детальний опис події та пояснення","de":"Detaillierte Beschreibung des Vorfalls und Erklärung"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Stellungnahme/Erklärung (Wyjaśnienie)',
                        'description' => 'Oficjalne pismo pracownika wyjaśniające okoliczności danego zdarzenia lub sytuacji w miejscu pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>Abteilung: [[department]]<br>Z. Hd. Herrn/Frau [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Stellungnahme / Erklärung</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[supervisor_full_name]],</p>
                                <p>hiermit nehme ich Stellung zu dem Vorfall/der Situation vom <strong>[[incident_date]]</strong>.</p>
                                <p>[[incident_description]]</p>
                                <p>Ich bitte um Ihr Verständnis.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Explanation/Statement',
                        'description' => 'Formal employee letter explaining the circumstances of a particular event or situation at work.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Sender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Employee ID: [[employee_id]]</p>
                                <br>
                                <p><strong>Recipient:</strong><br>[[company_name]]<br>Department: [[department]]<br>Attn: Mr./Ms. [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('F j, Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Statement / Explanation</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Mr./Ms. [[supervisor_full_name]],</p>
                                <p>I hereby provide a statement regarding the incident/situation of <strong>[[incident_date]]</strong>.</p>
                                <p>[[incident_description]]</p>
                                <p>I ask for your understanding.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Пояснювальна записка (Stellungnahme/Erklärung)',
                        'description' => 'Офіційний лист працівника, що пояснює обставини певної події або ситуації на робочому місці.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Відправник:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Табельний номер: [[employee_id]]</p>
                                <br>
                                <p><strong>Одержувач:</strong><br>[[company_name]]<br>Відділ: [[department]]<br>На ім\'я: Пан/Пані [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . ' р.</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Пояснювальна записка / Заява</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а Пане/Пані [[supervisor_full_name]],</p>
                                <p>цим надаю пояснення щодо інциденту/ситуації від <strong>[[incident_date]]</strong>.</p>
                                <p>[[incident_description]]</p>
                                <p>Прошу Вашого розуміння.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Stellungnahme/Erklärung',
                        'description' => 'Offizielles Schreiben eines Mitarbeiters zur Erläuterung der Umstände eines bestimmten Vorfalls oder einer Situation am Arbeitsplatz.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>Abteilung: [[department]]<br>Z. Hd. Herrn/Frau [[supervisor_full_name]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], den ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Stellungnahme / Erklärung</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[supervisor_full_name]],</p>
                                <p>hiermit nehme ich Stellung zu dem Vorfall/der Situation vom <strong>[[incident_date]]</strong>.</p>
                                <p>[[incident_description]]</p>
                                <p>Ich bitte um Ihr Verständnis.</p>
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

            // --- Табель учета рабочего времени / Arbeitszeiterfassung ---
            [
                'slug' => 'timesheet-de',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"reporting_period","type":"text","required":true,"labels":{"pl":"Okres rozliczeniowy (np. miesiąc i rok)","en":"Reporting Period (e.g., month and year)","uk":"Звітний період (напр., місяць і рік)","de":"Berichtszeitraum (z.B. Monat und Jahr)"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"pl":"Numer pracownika","en":"Employee ID","uk":"Номер працівника","de":"Personalnummer"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"total_working_hours","type":"number","required":true,"labels":{"pl":"Łączna liczba godzin pracy","en":"Total working hours","uk":"Загальна кількість робочих годин","de":"Gesamtarbeitsstunden"}},
                    {"name":"overtime_hours","type":"number","required":false,"labels":{"pl":"Godziny nadliczbowe (opcjonalnie)","en":"Overtime hours (optional)","uk":"Понаднормові години (необов\'язково)","de":"Überstunden (optional)"}},
                    {"name":"absence_days","type":"number","required":false,"labels":{"pl":"Dni nieobecności (opcjonalnie)","en":"Absence days (optional)","uk":"Дні відсутності (необов\'язково)","de":"Abwesenheitstage (optional)"}},
                    {"name":"approver_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko osoby zatwierdzającej","en":"Approver Full Name","uk":"ПІБ того, хто затверджує","de":"Vollständiger Name des Genehmigers"}},
                    {"name":"approver_position","type":"text","required":true,"labels":{"pl":"Stanowisko osoby zatwierdzającej","en":"Approver Position","uk":"Посада того, kto zatwierdza","de":"Position des Genehmigers"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Arbeitszeiterfassung (Karta ewidencji czasu pracy)',
                        'description' => 'Dokument do rejestrowania czasu pracy pracownika w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">Arbeitszeiterfassung</h1><p style="font-size: 14px;">[[company_name]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Berichtszeitraum: <strong>[[reporting_period]]</strong></p></td><td style="text-align: right;"><p>Datum der Erstellung: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Mitarbeiter:</strong> [[employee_full_name]] (Personalnummer: [[employee_id]])</p>
                                <p><strong>Position:</strong> [[employee_position]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Datum</th>
                                            <th>Arbeitsbeginn</th>
                                            <th>Arbeitsende</th>
                                            <th>Pausen</th>
                                            <th>Gesamtstunden</th>
                                            <th>Unterschrift</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01.XX.XXXX</td>
                                            <td>08:00</td>
                                            <td>17:00</td>
                                            <td>1:00</td>
                                            <td>8</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: right;"><strong>Gesamtarbeitsstunden:</strong></td>
                                            <td><strong>[[total_working_hours]]</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: right;">Überstunden:</td>
                                            <td>[[overtime_hours]]</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: right;">Abwesenheitstage:</td>
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
                    ],
                    'en' => [
                        'title' => 'Timesheet (Arbeitszeiterfassung)',
                        'description' => 'Document for recording employee working hours in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">Timesheet</h1><p style="font-size: 14px;">[[company_name]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Reporting Period: <strong>[[reporting_period]]</strong></p></td><td style="text-align: right;"><p>Date of Creation: ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Employee:</strong> [[employee_full_name]] (Employee ID: [[employee_id]])</p>
                                <p><strong>Position:</strong> [[employee_position]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Breaks</th>
                                            <th>Total Hours</th>
                                            <th>Signature</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01.XX.XXXX</td>
                                            <td>08:00</td>
                                            <td>17:00</td>
                                            <td>1:00</td>
                                            <td>8</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: right;"><strong>Total working hours:</strong></td>
                                            <td><strong>[[total_working_hours]]</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: right;">Overtime hours:</td>
                                            <td>[[overtime_hours]]</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: right;">Absence days:</td>
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
                        'title' => 'Табель обліку робочого часу (Arbeitszeiterfassung)',
                        'description' => 'Документ для обліку робочого часу працівника в Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">Табель обліку робочого часу</h1><p style="font-size: 14px;">[[company_name]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Звітний період: <strong>[[reporting_period]]</strong></p></td><td style="text-align: right;"><p>Дата складання: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Працівник:</strong> [[employee_full_name]] (Табельний номер: [[employee_id]])</p>
                                <p><strong>Посада:</strong> [[employee_position]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Дата</th>
                                            <th>Початок роботи</th>
                                            <th>Кінець роботи</th>
                                            <th>Перерви</th>
                                            <th>Всього годин</th>
                                            <th>Підпис</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01.XX.XXXX</td>
                                            <td>08:00</td>
                                            <td>17:00</td>
                                            <td>1:00</td>
                                            <td>8</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: right;"><strong>Всього робочих годин:</strong></td>
                                            <td><strong>[[total_working_hours]]</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: right;">Понаднормові години:</td>
                                            <td>[[overtime_hours]]</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: right;">Дні відсутності:</td>
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
                        'title' => 'Arbeitszeiterfassung',
                        'description' => 'Dokument zur Erfassung der Arbeitszeit eines Mitarbeiters in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">Arbeitszeiterfassung</h1><p style="font-size: 14px;">[[company_name]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Berichtszeitraum: <strong>[[reporting_period]]</strong></p></td><td style="text-align: right;"><p>Datum der Erstellung: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Mitarbeiter:</strong> [[employee_full_name]] (Personalnummer: [[employee_id]])</p>
                                <p><strong>Position:</strong> [[employee_position]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Datum</th>
                                            <th>Arbeitsbeginn</th>
                                            <th>Arbeitsende</th>
                                            <th>Pausen</th>
                                            <th>Gesamtstunden</th>
                                            <th>Unterschrift</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01.XX.XXXX</td>
                                            <td>08:00</td>
                                            <td>17:00</td>
                                            <td>1:00</td>
                                            <td>8</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: right;"><strong>Gesamtarbeitsstunden:</strong></td>
                                            <td><strong>[[total_working_hours]]</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: right;">Überstunden:</td>
                                            <td>[[overtime_hours]]</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: right;">Abwesenheitstage:</td>
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

            // --- Командировочное удостоверение / Dienstreiseantrag/-genehmigung ---
            [
                'slug' => 'business-trip-request-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"request_date","type":"date","required":true,"labels":{"pl":"Data wniosku","en":"Request Date","uk":"Дата запиту","de":"Datum des Antrags"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"pl":"Numer pracownika","en":"Employee ID","uk":"Номер працівника","de":"Personalnummer"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"department","type":"text","required":true,"labels":{"pl":"Dział","en":"Department","uk":"Відділ","de":"Abteilung"}},
                    {"name":"destination","type":"text","required":true,"labels":{"pl":"Miejsce docelowe podróży","en":"Destination of Trip","uk":"Місце призначення поїздки","de":"Reiseziel"}},
                    {"name":"purpose_of_trip","type":"textarea","required":true,"labels":{"pl":"Cel podróży służbowej","en":"Purpose of Business Trip","uk":"Мета відрядження","de":"Zweck der Geschäftsreise"}},
                    {"name":"trip_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia podróży","en":"Trip Start Date","uk":"Дата початку подорожі","de":"Reisebeginn"}},
                    {"name":"trip_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia podróży","en":"Trip End Date","uk":"Дата закінчення подорожі","de":"Reiseende"}},
                    {"name":"transport_method","type":"text","required":true,"labels":{"pl":"Środek transportu","en":"Method of Transport","uk":"Вид транспорту","de":"Transportmittel"}},
                    {"name":"accommodation_details","type":"textarea","required":false,"labels":{"pl":"Szczegóły zakwaterowania (opcjonalnie)","en":"Accommodation details (optional)","uk":"Деталі проживання (необов\'язково)","de":"Unterkunftsdetails (optional)"}},
                    {"name":"expected_costs","type":"textarea","required":false,"labels":{"pl":"Przewidywane koszty (opcjonalnie)","en":"Expected costs (optional)","uk":"Очікувані витрати (необов\'язково)","de":"Erwartete Kosten (optional)"}},
                    {"name":"approver_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko osoby zatwierdzającej","en":"Approver Full Name","uk":"ПІБ того, хто затверджує","de":"Vollständiger Name des Genehmigers"}},
                    {"name":"approver_position","type":"text","required":true,"labels":{"pl":"Stanowisko osoby zatwierdzającej","en":"Approver Position","uk":"Посада того, хто затверджує","de":"Position des Genehmigers"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Dienstreiseantrag / Dienstreisegenehmigung',
                        'description' => 'Formalny wniosek o podróż służbową i jej zatwierdzenie, zgodnie z niemiecką praktyką.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[employee_full_name]]<br>Personalnummer: [[employee_id]]<br>Abteilung: [[department]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>Z. Hd. Herrn/Frau [[approver_full_name]]<br>[[approver_position]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Dienstreiseantrag / Dienstreisegenehmigung</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[approver_full_name]],</p>
                                <p>hiermit beantrage ich eine Dienstreise für den Zeitraum vom <strong>[[trip_start_date]]</strong> bis einschließlich <strong>[[trip_end_date]]</strong>.</p>
                                <p><strong>Reiseziel:</strong> [[destination]]</p>
                                <p><strong>Zweck der Dienstreise:</strong> [[purpose_of_trip]]</p>
                                <p><strong>Transportmittel:</strong> [[transport_method]]</p>
                                <p><strong>Unterkunftsdetails:</strong> [[accommodation_details]]</p>
                                <p><strong>Erwartete Kosten:</strong> [[expected_costs]]</p>
                                <p>Ich bitte Sie höflich um Genehmigung meines Antrags.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Business Trip Request / Approval',
                        'description' => 'Formal request for a business trip and its approval, in accordance with German practice.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Sender:</strong><br>[[employee_full_name]]<br>Employee ID: [[employee_id]]<br>Department: [[department]]</p>
                                <br>
                                <p><strong>Recipient:</strong><br>[[company_name]]<br>Attn: Mr./Ms. [[approver_full_name]]<br>[[approver_position]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('F j, Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Business Trip Request / Approval</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Mr./Ms. [[approver_full_name]],</p>
                                <p>I hereby request a business trip for the period from <strong>[[trip_start_date]]</strong> to <strong>[[trip_end_date]]</strong> inclusive.</p>
                                <p><strong>Destination:</strong> [[destination]]</p>
                                <p><strong>Purpose of Business Trip:</strong> [[purpose_of_trip]]</p>
                                <p><strong>Method of Transport:</strong> [[transport_method]]</p>
                                <p><strong>Accommodation Details:</strong> [[accommodation_details]]</p>
                                <p><strong>Expected Costs:</strong> [[expected_costs]]</p>
                                <p>I kindly request your approval of my request.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на відрядження / Дозвіл на відрядження',
                        'description' => 'Формальна заява на відрядження та її затвердження, відповідно до німецької практики.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Відправник:</strong><br>[[employee_full_name]]<br>Табельний номер: [[employee_id]]<br>Відділ: [[department]]</p>
                                <br>
                                <p><strong>Одержувач:</strong><br>[[company_name]]<br>На ім\'я: Пан/Пані [[approver_full_name]]<br>[[approver_position]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . ' р.</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Заява на відрядження / Дозвіл на відрядження</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а Пане/Пані [[approver_full_name]],</p>
                                <p>цим подаю заяву на відрядження на період з <strong>[[trip_start_date]]</strong> по <strong>[[trip_end_date]]</strong> включно.</p>
                                <p><strong>Пункт призначення:</strong> [[destination]]</p>
                                <p><strong>Мета відрядження:</strong> [[purpose_of_trip]]</p>
                                <p><strong>Вид транспорту:</strong> [[transport_method]]</p>
                                <p><strong>Деталі проживання:</strong> [[accommodation_details]]</p>
                                <p><strong>Очікувані витрати:</strong> [[expected_costs]]</p>
                                <p>Прошу Вас люб\'язно схвалити мою заяву.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Dienstreiseantrag / Dienstreisegenehmigung',
                        'description' => 'Formeller Antrag auf eine Dienstreise und deren Genehmigung, gemäß deutscher Praxis.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[employee_full_name]]<br>Personalnummer: [[employee_id]]<br>Abteilung: [[department]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[company_name]]<br>Z. Hd. Herrn/Frau [[approver_full_name]]<br>[[approver_position]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], den ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Dienstreiseantrag / Dienstreisegenehmigung</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[approver_full_name]],</p>
                                <p>hiermit beantrage ich eine Dienstreise für den Zeitraum vom <strong>[[trip_start_date]]</strong> bis einschließlich <strong>[[trip_end_date]]</strong>.</p>
                                <p><strong>Reiseziel:</strong> [[destination]]</p>
                                <p><strong>Zweck der Dienstreise:</strong> [[purpose_of_trip]]</p>
                                <p><strong>Transportmittel:</strong> [[transport_method]]</p>
                                <p><strong>Unterkunftsdetails:</strong> [[accommodation_details]]</p>
                                <p><strong>Erwartete Kosten:</strong> [[expected_costs]]</p>
                                <p>Ich bitte Sie höflich um Genehmigung meines Antrags.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Коммерческое предложение / Angebot ---
            [
                'slug' => 'commercial-offer-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"offer_date","type":"date","required":true,"labels":{"pl":"Data wystawienia oferty","en":"Offer Date","uk":"Дата виставлення оферти","de":"Angebotsdatum"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy oferującej","en":"Offering Company Name","uk":"Назва компанії-продавця","de":"Name des anbietenden Unternehmens"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy oferującej","en":"Offering Company Address","uk":"Адреса компанії-продавця","de":"Adresse des anbietenden Unternehmens"}},
                    {"name":"company_contact","type":"text","required":true,"labels":{"pl":"Dane kontaktowe firmy","en":"Company Contact Details","uk":"Контактні дані компанії","de":"Kontaktdaten des Unternehmens"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa odbiorcy","en":"Recipient Name/Company Name","uk":"ПІБ/назва одержувача","de":"Name/Firmenname des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адреса одержувача","de":"Adresse des Empfängers"}},
                    {"name":"offer_subject","type":"text","required":true,"labels":{"pl":"Przedmiot oferty","en":"Subject of Offer","uk":"Предмет пропозиції","de":"Gegenstand des Angebots"}},
                    {"name":"offer_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły oferty (produkty/usługi, ceny, warunki)","en":"Offer details (products/services, prices, terms)","uk":"Деталі пропозиції (товари/послуги, ціни, умови)","de":"Angebotsdetails (Produkte/Dienstleistungen, Preise, Bedingungen)"}},
                    {"name":"validity_date","type":"date","required":true,"labels":{"pl":"Termin ważności oferty","en":"Offer Validity Date","uk":"Термін дії пропозиції","de":"Gültigkeitsdatum des Angebots"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Angebot (Oferta handlowa)',
                        'description' => 'Dokument przedstawiający propozycję sprzedaży produktów lub usług potencjalnemu klientowi w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[company_name]]<br>[[company_address]]<br>[[company_contact]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[recipient_name]]<br>[[recipient_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Angebot</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Betreff:</strong> [[offer_subject]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[recipient_name]],</p>
                                <p>vielen Dank für Ihr Interesse an unseren Produkten/Dienstleistungen. Gerne unterbreiten wir Ihnen folgendes Angebot:</p>
                                <p>[[offer_details]]</p>
                                <p>Dieses Angebot ist gültig bis zum <strong>[[validity_date]]</strong>.</p>
                                <p>Für Rückfragen stehen wir Ihnen jederzeit gerne zur Verfügung.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[company_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Commercial Offer',
                        'description' => 'A document presenting a proposal to sell products or services to a potential client in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Sender:</strong><br>[[company_name]]<br>[[company_address]]<br>[[company_contact]]</p>
                                <br>
                                <p><strong>Recipient:</strong><br>[[recipient_name]]<br>[[recipient_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('F j, Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Commercial Offer</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Subject:</strong> [[offer_subject]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Mr./Ms. [[recipient_name]],</p>
                                <p>Thank you for your interest in our products/services. We are pleased to submit the following offer:</p>
                                <p>[[offer_details]]</p>
                                <p>This offer is valid until <strong>[[validity_date]]</strong>.</p>
                                <p>Please do not hesitate to contact us if you have any questions.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[company_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Комерційна пропозиція (Angebot)',
                        'description' => 'Документ, що представляє пропозицію продажу товарів або послуг потенційному клієнту в Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Відправник:</strong><br>[[company_name]]<br>[[company_address]]<br>[[company_contact]]</p>
                                <br>
                                <p><strong>Одержувач:</strong><br>[[recipient_name]]<br>[[recipient_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . ' р.</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Комерційна пропозиція</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Тема:</strong> [[offer_subject]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а Пане/Пані [[recipient_name]],</p>
                                <p>дякуємо за Ваш інтерес до наших товарів/послуг. З радістю надаємо Вам наступну пропозицію:</p>
                                <p>[[offer_details]]</p>
                                <p>Ця пропозиція дійсна до <strong>[[validity_date]]</strong>.</p>
                                <p>У разі виникнення питань, будь ласка, звертайтеся до нас.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[company_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Angebot',
                        'description' => 'Dokument, das einen Vorschlag zum Verkauf von Produkten oder Dienstleistungen an einen potenziellen Kunden in Deutschland darstellt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[company_name]]<br>[[company_address]]<br>[[company_contact]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[recipient_name]]<br>[[recipient_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], den ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Angebot</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Betreff:</strong> [[offer_subject]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[recipient_name]],</p>
                                <p>vielen Dank für Ihr Interesse an unseren Produkten/Dienstleistungen. Gerne unterbreiten wir Ihnen folgendes Angebot:</p>
                                <p>[[offer_details]]</p>
                                <p>Dieses Angebot ist gültig bis zum <strong>[[validity_date]]</strong>.</p>
                                <p>Für Rückfragen stehen wir Ihnen jederzeit gerne zur Verfügung.</p>
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

            // --- Письмо-претензия / Mahnung/Reklamationsschreiben ---
            [
                'slug' => 'complaint-letter-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"letter_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pisma","en":"Letter Date","uk":"Дата складання листа","de":"Datum des Schreibens"}},
                    {"name":"sender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa nadawcy","en":"Sender Full Name/Company Name","uk":"ПІБ/назва відправника","de":"Vollständiger Name/Firmenname des Absenders"}},
                    {"name":"sender_address","type":"text","required":true,"labels":{"pl":"Adres nadawcy","en":"Sender Address","uk":"Адреса відправника","de":"Adresse des Absenders"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa odbiorcy","en":"Recipient Name/Company Name","uk":"ПІБ/назва одержувача","de":"Name/Firmenname des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адреса одержувача","de":"Adresse des Empfängers"}},
                    {"name":"subject","type":"text","required":true,"labels":{"pl":"Przedmiot pisma (np. Reklamacja, Mahnung)","en":"Subject of letter (e.g., Complaint, Reminder)","uk":"Тема листа (напр., Претензія, Нагадування)","de":"Betreff des Schreibens (z.B. Reklamation, Mahnung)"}},
                    {"name":"details","type":"textarea","required":true,"labels":{"pl":"Szczegóły sprawy (opis, daty, kwoty, żądania)","en":"Details of the matter (description, dates, amounts, demands)","uk":"Деталі справи (опис, дати, суми, вимоги)","de":"Details der Angelegenheit (Beschreibung, Daten, Beträge, Forderungen)"}},
                    {"name":"deadline","type":"date","required":false,"labels":{"pl":"Termin na odpowiedź/działanie (opcjonalnie)","en":"Deadline for response/action (optional)","uk":"Термін відповіді/дії (необов\'язково)","de":"Frist für Antwort/Maßnahme (optional)"}},
                    {"name":"attachments","type":"text","required":false,"labels":{"pl":"Załączniki (opcjonalnie)","en":"Attachments (optional)","uk":"Додатки (необов\'язково)","de":"Anhänge (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Mahnung / Reklamationsschreiben',
                        'description' => 'Formalne pismo z przypomnieniem o zaległej płatności lub reklamacją produktu/usługi w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[sender_full_name]]<br>[[sender_address]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[recipient_name]]<br>[[recipient_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">[[subject]]</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[recipient_name]],</p>
                                <p>hiermit möchten wir Sie auf folgende Angelegenheit aufmerksam machen:</p>
                                <p>[[details]]</p>
                                <p>Wir bitten Sie um Stellungnahme/Begleichung des Betrages bis zum <strong>[[deadline]]</strong> (falls zutreffend).</p>
                                <p>Anbei finden Sie: [[attachments]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Reminder / Complaint Letter',
                        'description' => 'Formal letter for overdue payment reminder or product/service complaint in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Sender:</strong><br>[[sender_full_name]]<br>[[sender_address]]</p>
                                <br>
                                <p><strong>Recipient:</strong><br>[[recipient_name]]<br>[[recipient_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('F j, Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">[[subject]]</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Mr./Ms. [[recipient_name]],</p>
                                <p>We would like to draw your attention to the following matter:</p>
                                <p>[[details]]</p>
                                <p>We kindly request your statement/payment of the amount by <strong>[[deadline]]</strong> (if applicable).</p>
                                <p>Enclosed please find: [[attachments]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Нагадування / Лист-претензія',
                        'description' => 'Формальний лист з нагадуванням про прострочений платіж або претензією щодо товару/послуги в Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Відправник:</strong><br>[[sender_full_name]]<br>[[sender_address]]</p>
                                <br>
                                <p><strong>Одержувач:</strong><br>[[recipient_name]]<br>[[recipient_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], ' . date('d.m.Y') . ' р.</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">[[subject]]</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а Пане/Пані [[recipient_name]],</p>
                                <p>цим хочемо звернути Вашу увагу на наступне питання:</p>
                                <p>[[details]]</p>
                                <p>Просимо Вас надати відповідь/сплатити суму до <strong>[[deadline]]</strong> (якщо застосовно).</p>
                                <p>Додаток: [[attachments]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Mahnung / Reklamationsschreiben',
                        'description' => 'Formelles Schreiben zur Zahlungserinnerung oder Reklamation eines Produkts/einer Dienstleistung in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Absender:</strong><br>[[sender_full_name]]<br>[[sender_address]]</p>
                                <br>
                                <p><strong>Empfänger:</strong><br>[[recipient_name]]<br>[[recipient_address]]</p>
                                <br>
                                <p style="text-align: right;">[[city]], den ' . date('d.m.Y') . '</p>
                                <br>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">[[subject]]</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[recipient_name]],</p>
                                <p>hiermit möchten wir Sie auf folgende Angelegenheit aufmerksam machen:</p>
                                <p>[[details]]</p>
                                <p>Wir bitten Sie um Stellungnahme/Begleichung des Betrages bis zum <strong>[[deadline]]</strong> (falls zutreffend).</p>
                                <p>Anbei finden Sie: [[attachments]].</p>
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
// --- Гарантийное письмо / Guarantee Letter ---
            [
                'slug' => 'guarantee-letter-de',
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LIST GWARANCYJNY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[guarantor_company_name]]</strong><br>[[guarantor_company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do: <strong>[[recipient_company_name]]</strong><br>[[recipient_company_address]]</p>
                                <br/>
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GUARANTEE LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[guarantor_company_name]]</strong><br>[[guarantor_company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
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

            // --- Официальный запрос / Official Request ---
            [
                'slug' => 'official-request-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"sender_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy wysyłającej","en":"Sending Company Name","uk":"Назва компанії-відправника","de":"Name des sendenden Unternehmens"}},
                    {"name":"sender_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy wysyłającej","en":"Sending Company Address","uk":"Адres firmy wysyłającej","de":"Adresse des sendenden Unternehmens"}},
                    {"name":"recipient_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy odbiorcy","en":"Recipient Company Name","uk":"Назва компанії-одержувача","de":"Name des Empfängerunternehmens"}},
                    {"name":"recipient_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy odbiorcy","en":"Recipient Company Address","uk":"Адres firmy odbiorcy","de":"Adresse des Empfängerunternehmens"}},
                    {"name":"request_subject","type":"text","required":true,"labels":{"pl":"Przedmiot zapytania","en":"Subject of Request","uk":"Предмет запиту","de":"Gegenstand der Anfrage"}},
                    {"name":"request_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły zapytania (cel, wymagane informacje/dokumenty)","en":"Request details (purpose, required information/documents)","uk":"Деталі запиту (мета, необхідна інформація/документи)","de":"Anfragedetails (Zweck, benötigte Informationen/Dokumente)"}},
                    {"name":"contact_person","type":"text","required":true,"labels":{"pl":"Osoba do kontaktu","en":"Contact Person","uk":"Контактна особа","de":"Ansprechpartner"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Oficjalne zapytanie',
                        'description' => 'Formalne pismo z prośbą o informacje lub dokumenty.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">OFICJALNE ZAPYTANIE</h1><p style="font-size: 14px;"><strong>Dotyczy:</strong> [[request_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do: <strong>[[recipient_company_name]]</strong><br>[[recipient_company_address]]</p>
                                <br/>
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">OFFICIAL REQUEST</h1><p style="font-size: 14px;"><strong>Subject:</strong> [[request_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ОФІЦІЙНИЙ ЗАПИТ</h1><p style="font-size: 14px;"><strong>Щодо:</strong> [[request_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">OFFIZIELLE ANFRAGE</h1><p style="font-size: 14px;"><strong>Betreff:</strong> [[request_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
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

            // --- Письмо-уведомление / Notification Letter ---
            [
                'slug' => 'notification-letter-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"sender_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy wysyłającej","en":"Sending Company Name","uk":"Назва компанії-відправника","de":"Name des sendenden Unternehmens"}},
                    {"name":"sender_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy wysyłającej","en":"Sending Company Address","uk":"Адres firmy wysyłającej","de":"Adresse des sendenden Unternehmens"}},
                    {"name":"recipient_name_or_company","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/Nazwa firmy odbiorcy","en":"Recipient Name/Company Name","uk":"ПІБ/Назва компанії одержувача","de":"Name/Firmenname des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адres odbiorcy","de":"Adresse des Empfängers"}},
                    {"name":"notification_subject","type":"text","required":true,"labels":{"pl":"Przedmiot powiadomienia","en":"Subject of Notification","uk":"Предмет повідомлення","de":"Gegenstand der Benachrichtigung"}},
                    {"name":"notification_details","type":"textarea","required":true,"labels":{"pl":"Treść powiadomienia","en":"Content of Notification","uk":"Зміст повідомлення","de":"Inhalt der Benachrichtigung"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pismo informacyjne/Powiadomienie',
                        'description' => 'Oficjalne pismo informujące o ważnych zmianach, wydarzeniach lub decyzjach.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">POWIADOMIENIE</h1><p style="font-size: 14px;"><strong>Dotyczy:</strong> [[notification_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do: <strong>[[recipient_name_or_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">NOTIFICATION LETTER</h1><p style="font-size: 14px;"><strong>Subject:</strong> [[notification_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЛИСТ-ПОВІДОМЛЕННЯ</h1><p style="font-size: 14px;"><strong>Щодо:</strong> [[notification_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">BENACHRICHTIGUNGSSCHREIBEN</h1><p style="font-size: 14px;"><strong>Betreff:</strong> [[notification_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An: <strong>[[recipient_name_or_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>Wir informieren Sie hiermit über [[notification_subject]].</p>
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

            // --- Письмо-извинение / Apology Letter ---
            [
                'slug' => 'apology-letter-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"sender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko nadawcy","en":"Sender Full Name","uk":"ПІБ відправника","de":"Vollständiger Name des Absenders"}},
                    {"name":"sender_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy nadawcy (jeśli dotyczy)","en":"Sender Company Name (if applicable)","uk":"Назва компанії відправника (якщо застосовно)","de":"Name des Absenderunternehmens (falls zutreffend)"}},
                    {"name":"recipient_name_or_company","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/Nazwa firmy odbiorcy","en":"Recipient Name/Company Name","uk":"ПІБ/Назва компанії одержувача","de":"Name/Firmenname des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адres odbiorcy","de":"Adresse des Empfängers"}},
                    {"name":"incident_date","type":"date","required":true,"labels":{"pl":"Data zdarzenia/sytuacji","en":"Date of incident/situation","uk":"Дата події/ситуації","de":"Datum des Vorfalls/der Situation"}},
                    {"name":"apology_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły przeprosin (za co przepraszasz, co zostanie zrobione)","en":"Apology details (what you are apologizing for, what will be done)","uk":"Деталі вибачень (за що вибачаєтеся, що буде зроблено)","de":"Entschuldigungsdetails (wofür Sie sich entschuldigen, was getan wird)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pismo z przeprosinami',
                        'description' => 'Oficjalne pismo wyrażające skruchę i przeprosiny za zaistniałą sytuację.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">PISMO Z PRZEPROSINAMI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do: <strong>[[recipient_name_or_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">APOLOGY LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЛИСТ-ВИБАЧЕННЯ</h1><p style="font-size: 14px;"><strong>Щодо:</strong> [[incident_date]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ENTSCHULDIGUNGSSCHREIBEN</h1><p style="font-size: 14px;"><strong>Betreff:</strong> [[incident_date]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
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

            // --- Благодарственное письмо / Thank You Letter ---
            [
                'slug' => 'thank-you-letter-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"sender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko nadawcy","en":"Sender Full Name","uk":"ПІБ відправника","de":"Vollständiger Name des Absenders"}},
                    {"name":"sender_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy nadawcy (jeśli dotyczy)","en":"Sender Company Name (if applicable)","uk":"Назва компанії відправника (якщо застосовно)","de":"Name des Absenderunternehmens (falls zutreffend)"}},
                    {"name":"recipient_name_or_company","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/Nazwa firmy odbiorcy","en":"Recipient Name/Company Name","uk":"ПІБ/Назва компанії одержувача","de":"Name/Firmenname des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адres odbiorcy","de":"Adresse des Empfängers"}},
                    {"name":"reason_for_thanks","type":"textarea","required":true,"labels":{"pl":"Powód podziękowania (za co dziękujesz, szczegóły)","en":"Reason for thanks (what you are thanking for, details)","uk":"Причина подяки (за що дякуєте, деталі)","de":"Grund des Dankes (wofür Sie sich bedanken, Details)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'List z podziękowaniami',
                        'description' => 'Oficjalne pismo wyrażające wdzięczność za pomoc, współpracę lub wykonaną usługę.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">LIST Z PODZIĘKOWANIAMI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">THANK YOU LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ПОДЯЧНИЙ ЛИСТ</h1><p style="font-size: 14px;"><strong>Щодо:</strong> [[reason_for_thanks]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">DANKESSCHREIBEN</h1><p style="font-size: 14px;"><strong>Betreff:</strong> [[reason_for_thanks]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
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

            // --- Счет на оплату (Инвойс) / Invoice ---
            [
                'slug' => 'invoice-de',
                'fields' => '[
                    {"name":"invoice_number","type":"text","required":true,"labels":{"pl":"Numer faktury","en":"Invoice Number","uk":"Номер рахунку","de":"Rechnungsnummer"}},
                    {"name":"invoice_date","type":"date","required":true,"labels":{"pl":"Data wystawienia","en":"Issue Date","uk":"Дата виставлення","de":"Ausstellungsdatum"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"pl":"Sprzedawca (nazwa firmy)","en":"Seller (company name)","uk":"Продавець (назва компанії)","de":"Verkäufer (Firmenname)"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedawcy","en":"Seller Address","uk":"Адреса продавця","de":"Adresse des Verkäufers"}},
                    {"name":"seller_tax_id","type":"text","required":true,"labels":{"pl":"NIP/Numer identyfikacji podatkowej sprzedawcy","en":"Seller\'s Tax ID/VAT ID","uk":"ІПН/Податковий номер продавця","de":"Steuer-ID/USt-IdNr. des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"pl":"Nabywca (nazwa firmy)","en":"Buyer (company name)","uk":"Покупець (назва компанії)","de":"Käufer (Firmenname)"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres nabywcy","en":"Buyer Address","uk":"Адреса покупця","de":"Adresse des Käufers"}},
                    {"name":"buyer_tax_id","type":"text","required":true,"labels":{"pl":"NIP/Numer identyfikacji podatkowej nabywcy","en":"Buyer\'s Tax ID/VAT ID","uk":"ІПН/Податковий номер покупця","de":"Steuer-ID/USt-IdNr. des Käufers"}},
                    {"name":"items","type":"textarea","required":true,"labels":{"pl":"Pozycje (nazwa, ilość, cena jednostkowa, wartość)","en":"Items (name, quantity, unit price, value)","uk":"Позиції (назва, кількість, ціна за одиницю, вартість)","de":"Positionen (Name, Menge, Einzelpreis, Wert)"}},
                    {"name":"total_amount","type":"number","required":true,"labels":{"pl":"Całkowita kwota netto","en":"Total Net Amount","uk":"Загальна сума нетто","de":"Gesamtnettobetrag"}},
                    {"name":"vat_rate","type":"text","required":true,"labels":{"pl":"Stawka VAT","en":"VAT Rate","uk":"Ставка ПДВ","de":"MwSt.-Satz"}},
                    {"name":"vat_amount","type":"number","required":true,"labels":{"pl":"Kwota VAT","en":"VAT Amount","uk":"Сума ПДВ","de":"MwSt.-Betrag"}},
                    {"name":"gross_amount","type":"number","required":true,"labels":{"pl":"Całkowita kwota brutto","en":"Total Gross Amount","uk":"Загальна сума брутто","de":"Gesamtbruttobetrag"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"payment_method","type":"text","required":true,"labels":{"pl":"Metoda płatności","en":"Payment Method","uk":"Метод оплати","de":"Zahlungsmethode"}},
                    {"name":"payment_due_date","type":"date","required":true,"labels":{"pl":"Termin płatności","en":"Payment Due Date","uk":"Термін оплати","de":"Fälligkeitsdatum der Zahlung"}},
                    {"name":"bank_details","type":"textarea","required":true,"labels":{"pl":"Dane bankowe (nazwa banku, IBAN, SWIFT/BIC)","en":"Bank details (bank name, IBAN, SWIFT/BIC)","uk":"Банківські реквізити (назва банку, IBAN, SWIFT/BIC)","de":"Bankverbindung (Bankname, IBAN, SWIFT/BIC)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Faktura',
                        'description' => 'Standardowa faktura do rozliczeń handlowych, zgodna z niemieckimi przepisami.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FAKTURA</h1><p style="font-size: 14px;">Numer: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Data wystawienia: [[invoice_date]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SPRZEDAWCA:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>NIP/Steuer-ID: [[seller_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">NABYWCA:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>NIP/Steuer-ID: [[buyer_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">POZYCJE:</h2>
                                <pre>[[items]]</pre>
                                <p>Kwota netto: [[total_amount]] [[currency]]</p>
                                <p>Stawka VAT: [[vat_rate]]</p>
                                <p>Kwota VAT: [[vat_amount]] [[currency]]</p>
                                <p><strong>Kwota brutto: [[gross_amount]] [[currency]]</strong></p>
                                <p>Metoda płatności: [[payment_method]]</p>
                                <p>Termin płatności: [[payment_due_date]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">DANE BANKOWE:</h2>
                                <p>[[bank_details]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: right;">
                                <p>___________________<br>(Podpis wystawcy)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Invoice',
                        'description' => 'Standard invoice for commercial settlements, compliant with German regulations.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">INVOICE</h1><p style="font-size: 14px;">Number: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Issue Date: [[invoice_date]]</p></td><td style="text-align: right;"><p>City: [[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SELLER:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>Tax ID/VAT ID: [[seller_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BUYER:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>Tax ID/VAT ID: [[buyer_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ITEMS:</h2>
                                <pre>[[items]]</pre>
                                <p>Net Amount: [[total_amount]] [[currency]]</p>
                                <p>VAT Rate: [[vat_rate]]</p>
                                <p>VAT Amount: [[vat_amount]] [[currency]]</p>
                                <p><strong>Gross Amount: [[gross_amount]] [[currency]]</strong></p>
                                <p>Payment Method: [[payment_method]]</p>
                                <p>Payment Due Date: [[payment_due_date]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BANK DETAILS:</h2>
                                <p>[[bank_details]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; text-align: right;">
                                <p>___________________<br>(Issuer\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Рахунок на оплату (Інвойс)',
                        'description' => 'Стандартний рахунок для комерційних розрахунків, що відповідає німецьким правилам.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РАХУНОК НА ОПЛАТУ</h1><p style="font-size: 14px;">Номер: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Дата виставлення: [[invoice_date]]</p></td><td style="text-align: right;"><p>Місто: [[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПРОДАВЕЦЬ:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>ІПН/Податковий номер: [[seller_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПОКУПЕЦЬ:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>ІПН/Податковий номер: [[buyer_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПОЗИЦІЇ:</h2>
                                <pre>[[items]]</pre>
                                <p>Сума нетто: [[total_amount]] [[currency]]</p>
                                <p>Ставка ПДВ: [[vat_rate]]</p>
                                <p>Сума ПДВ: [[vat_amount]] [[currency]]</p>
                                <p><strong>Сума брутто: [[gross_amount]] [[currency]]</strong></p>
                                <p>Метод оплати: [[payment_method]]</p>
                                <p>Термін оплати: [[payment_due_date]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">БАНКІВСЬКІ РЕКВІЗИТИ:</h2>
                                <p>[[bank_details]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; text-align: right;">
                                <p>___________________<br>(Підпис того, хто виставив)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Rechnung',
                        'description' => 'Standardrechnung für kommerzielle Abrechnungen, konform mit deutschen Vorschriften.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECHNUNG</h1><p style="font-size: 14px;">Nummer: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ausstellungsdatum: [[invoice_date]]</p></td><td style="text-align: right;"><p>Ort: [[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">VERKÄUFER:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>Steuer-ID/USt-IdNr.: [[seller_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">KÄUFER:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>Steuer-ID/USt-IdNr.: [[buyer_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">POSITIONEN:</h2>
                                <pre>[[items]]</pre>
                                <p>Nettobetrag: [[total_amount]] [[currency]]</p>
                                <p>MwSt.-Satz: [[vat_rate]]</p>
                                <p>MwSt.-Betrag: [[vat_amount]] [[currency]]</p>
                                <p><strong>Bruttobetrag: [[gross_amount]] [[currency]]</strong></p>
                                <p>Zahlungsmethode: [[payment_method]]</p>
                                <p>Fälligkeitsdatum der Zahlung: [[payment_due_date]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BANKVERBINDUNG:</h2>
                                <p>[[bank_details]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; text-align: right;">
                                <p>___________________<br>(Unterschrift des Ausstellers)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Акт выполненных работ / оказанных услуг / Acceptance Protocol of Works/Services ---
            [
                'slug' => 'acceptance-protocol-de',
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ ODBIORU PRAC/USŁUG</h1><p style="font-size: 14px;">Numer: [[protocol_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Data sporządzenia: [[protocol_date]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ACCEPTANCE PROTOCOL OF WORKS/SERVICES</h1><p style="font-size: 14px;">Number: [[protocol_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Date of Preparation: [[protocol_date]]</p></td><td style="text-align: right;"><p>City: [[city]], ' . date('F j, Y') . '</p></td></tr></table>',
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">АКТ ВИКОНАНИХ РОБІТ / НАДАНИХ ПОСЛУГ</h1><p style="font-size: 14px;">Номер: [[protocol_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Дата складання: [[protocol_date]]</p></td><td style="text-align: right;"><p>Місто: [[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
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
                        'title' => 'Abnahmeprotokoll für Leistungen',
                        'description' => 'Ein Dokument, das die Erbringung und Abnahme von Leistungen bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ABNAHMEPROTOKOLL FÜR LEISTUNGEN</h1><p style="font-size: 14px;">Nummer: [[protocol_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Erstellungsdatum: [[protocol_date]]</p></td><td style="text-align: right;"><p>Ort: [[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Abgeschlossen zwischen:</p>
                                <p><strong>Dienstleister:</strong> [[service_provider_name]], Adresse: [[service_provider_address]]</p>
                                <p>und</p>
                                <p><strong>Auftraggeber:</strong> [[service_recipient_name]], Adresse: [[service_recipient_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">GEGENSTAND DES PROTOKOLLS:</h2>
                                <p>Hiermit wird die Erbringung der folgenden Leistungen bestätigt:</p>
                                <p>[[work_description]]</p>
                                <p>Fertigstellungsdatum der Leistungen: <strong>[[completion_date]]</strong></p>
                                <p>Wert der Leistungen: <strong>[[total_amount]] [[currency]]</strong></p>
                                <br/>
                                <p>Die Parteien bestätigen die Übereinstimmung der erbrachten Leistungen mit dem Vertrag.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Dienstleister</p></td>
                                <td width="50%"><p>___________________<br>Auftraggeber</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Счет-фактура / VAT Invoice ---
            [
                'slug' => 'vat-invoice-de',
                'fields' => '[
                    {"name":"invoice_number","type":"text","required":true,"labels":{"pl":"Numer faktury VAT","en":"VAT Invoice Number","uk":"Номер ПДВ-рахунку","de":"USt-Rechnungsnummer"}},
                    {"name":"issue_date","type":"date","required":true,"labels":{"pl":"Data wystawienia","en":"Issue Date","uk":"Дата виставлення","de":"Ausstellungsdatum"}},
                    {"name":"delivery_date","type":"date","required":true,"labels":{"pl":"Data dostawy/usługi","en":"Date of Delivery/Service","uk":"Дата постачання/послуги","de":"Liefer-/Leistungsdatum"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"pl":"Sprzedawca (nazwa firmy)","en":"Seller (company name)","uk":"Продавець (назва компанії)","de":"Verkäufer (Firmenname)"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedawcy","en":"Seller Address","uk":"Адres sprzedawcy","de":"Adresse des Verkäufers"}},
                    {"name":"seller_tax_id","type":"text","required":true,"labels":{"pl":"NIP/Numer identyfikacji podatkowej sprzedawcy","en":"Seller\'s Tax ID/VAT ID","uk":"ІПН/Податковий номер продавця","de":"Steuer-ID/USt-IdNr. des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"pl":"Nabywca (nazwa firmy)","en":"Buyer (company name)","uk":"Покупець (назва компанії)","de":"Käufer (Firmenname)"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres nabywcy","en":"Buyer Address","uk":"Адres nabywcy","de":"Adresse des Käufers"}},
                    {"name":"buyer_tax_id","type":"text","required":true,"labels":{"pl":"NIP/Numer identyfikacji podatkowej nabywcy","en":"Buyer\'s Tax ID/VAT ID","uk":"ІПН/Податковий номер покупця","de":"Steuer-ID/USt-IdNr. des Käufers"}},
                    {"name":"items_table","type":"textarea","required":true,"labels":{"pl":"Tabela pozycji (nazwa, ilość, j.m., cena netto, VAT %, kwota VAT, cena brutto)","en":"Items table (name, quantity, unit, net price, VAT %, VAT amount, gross price)","uk":"Таблиця позицій (назва, кількість, од. вим., ціна нетто, ПДВ %, сума ПДВ, ціна брутто)","de":"Positionstabelle (Name, Menge, Einheit, Nettopreis, MwSt. %, MwSt.-Betrag, Bruttopreis)"}},
                    {"name":"net_amount","type":"number","required":true,"labels":{"pl":"Kwota netto","en":"Net Amount","uk":"Сума нетто","de":"Nettobetrag"}},
                    {"name":"vat_rate_summary","type":"textarea","required":true,"labels":{"pl":"Podsumowanie stawek VAT (stawka, kwota netto, kwota VAT, kwota brutto)","en":"VAT rates summary (rate, net amount, VAT amount, gross amount)","uk":"Підсумок ставок ПДВ (ставка, сума нетто, сума ПДВ, сума брутто)","de":"MwSt.-Sätze (Satz, Nettobetrag, MwSt.-Betrag, Bruttobetrag)"}},
                    {"name":"gross_amount","type":"number","required":true,"labels":{"pl":"Kwota brutto","en":"Gross Amount","uk":"Сума брутто","de":"Bruttobetrag"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"payment_method","type":"text","required":true,"labels":{"pl":"Metoda płatności","en":"Payment Method","uk":"Метод оплати","de":"Zahlungsmethode"}},
                    {"name":"payment_due_date","type":"date","required":true,"labels":{"pl":"Termin płatności","en":"Payment Due Date","uk":"Термін оплати","de":"Fälligkeitsdatum der Zahlung"}},
                    {"name":"bank_details","type":"textarea","required":true,"labels":{"pl":"Dane bankowe (nazwa banku, IBAN, SWIFT/BIC)","en":"Bank details (bank name, IBAN, SWIFT/BIC)","uk":"Банківські реквізити (назва банку, IBAN, SWIFT/BIC)","de":"Bankverbindung (Bankname, IBAN, SWIFT/BIC)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Faktura VAT',
                        'description' => 'Szczegółowa faktura VAT zgodna z niemieckimi przepisami.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FAKTURA VAT</h1><p style="font-size: 14px;">Numer: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Data wystawienia: [[issue_date]]</p><p>Data dostawy/usługi: [[delivery_date]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SPRZEDAWCA:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>NIP/Steuer-ID: [[seller_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">NABYWCA:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>NIP/Steuer-ID: [[buyer_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SZCZEGÓŁY TRANSAKCJI:</h2>
                                <pre>[[items_table]]</pre>
                                <p>Kwota netto: [[net_amount]] [[currency]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">PODSUMOWANIE STAWEK VAT:</h2>
                                <pre>[[vat_rate_summary]]</pre>
                                <p><strong>Kwota brutto: [[gross_amount]] [[currency]]</strong></p>
                                <p>Metoda płatności: [[payment_method]]</p>
                                <p>Termin płatności: [[payment_due_date]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">DANE BANKOWE:</h2>
                                <p>[[bank_details]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: right;">
                                <p>___________________<br>(Podpis wystawcy)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'VAT Invoice',
                        'description' => 'Detailed VAT invoice compliant with German regulations.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VAT INVOICE</h1><p style="font-size: 14px;">Number: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Issue Date: [[issue_date]]</p><p>Date of Delivery/Service: [[delivery_date]]</p></td><td style="text-align: right;"><p>City: [[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SELLER:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>Tax ID/VAT ID: [[seller_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BUYER:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>Tax ID/VAT ID: [[buyer_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">TRANSACTION DETAILS:</h2>
                                <pre>[[items_table]]</pre>
                                <p>Net Amount: [[net_amount]] [[currency]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">VAT RATES SUMMARY:</h2>
                                <pre>[[vat_rate_summary]]</pre>
                                <p><strong>Gross Amount: [[gross_amount]] [[currency]]</strong></p>
                                <p>Payment Method: [[payment_method]]</p>
                                <p>Payment Due Date: [[payment_due_date]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BANK DETAILS:</h2>
                                <p>[[bank_details]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; text-align: right;">
                                <p>___________________<br>(Issuer\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Рахунок-фактура',
                        'description' => 'Детальний ПДВ-рахунок відповідно до німецьких правил.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РАХУНОК-ФАКТУРА</h1><p style="font-size: 14px;">Номер: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Дата виставлення: [[issue_date]]</p><p>Дата постачання/послуги: [[delivery_date]]</p></td><td style="text-align: right;"><p>Місто: [[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПРОДАВЕЦЬ:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>ІПН/Податковий номер: [[seller_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПОКУПЕЦЬ:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>ІПН/Податковий номер: [[buyer_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ДЕТАЛІ ОПЕРАЦІЇ:</h2>
                                <pre>[[items_table]]</pre>
                                <p>Сума нетто: [[net_amount]] [[currency]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПІДСУМОК СТАВОК ПДВ:</h2>
                                <pre>[[vat_rate_summary]]</pre>
                                <p><strong>Сума брутто: [[gross_amount]] [[currency]]</strong></p>
                                <p>Метод оплати: [[payment_method]]</p>
                                <p>Термін оплати: [[payment_due_date]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">БАНКІВСЬКІ РЕКВІЗИТИ:</h2>
                                <p>[[bank_details]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; text-align: right;">
                                <p>___________________<br>(Підпис того, хто виставив)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Umsatzsteuerrechnung',
                        'description' => 'Detaillierte Umsatzsteuerrechnung gemäß deutschen Vorschriften.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMSATZSTEUERRECHNUNG</h1><p style="font-size: 14px;">Nummer: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ausstellungsdatum: [[issue_date]]</p><p>Liefer-/Leistungsdatum: [[delivery_date]]</p></td><td style="text-align: right;"><p>Ort: [[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">VERKÄUFER:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>Steuer-ID/USt-IdNr.: [[seller_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">KÄUFER:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>Steuer-ID/USt-IdNr.: [[buyer_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">POSITIONEN:</h2>
                                <pre>[[items_table]]</pre>
                                <p>Nettobetrag: [[net_amount]] [[currency]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ZUSAMMENFASSUNG DER MWST.-SÄTZE:</h2>
                                <pre>[[vat_rate_summary]]</pre>
                                <p><strong>Bruttobetrag: [[gross_amount]] [[currency]]</strong></p>
                                <p>Zahlungsmethode: [[payment_method]]</p>
                                <p>Fälligkeitsdatum der Zahlung: [[payment_due_date]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BANKVERBINDUNG:</h2>
                                <p>[[bank_details]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; text-align: right;">
                                <p>___________________<br>(Unterschrift des Ausstellers)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Товарная накладная / Delivery Note ---
            [
                'slug' => 'delivery-note-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"note_number","type":"text","required":true,"labels":{"pl":"Numer dowodu dostawy","en":"Delivery Note Number","uk":"Номер накладної","de":"Lieferscheinnummer"}},
                    {"name":"issue_date","type":"date","required":true,"labels":{"pl":"Data wystawienia","en":"Issue Date","uk":"Дата виставлення","de":"Ausstellungsdatum"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"pl":"Sprzedawca (nazwa firmy)","en":"Seller (company name)","uk":"Продавець (назва компанії)","de":"Verkäufer (Firmenname)"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedawcy","en":"Seller Address","uk":"Адres sprzedawcy","de":"Adresse des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"pl":"Odbiorca (nazwa firmy)","en":"Recipient (company name)","uk":"Отримувач (назва компанії)","de":"Empfänger (Firmenname)"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адres odbiorcy","de":"Adresse des Empfängers"}},
                    {"name":"items_table","type":"textarea","required":true,"labels":{"pl":"Tabela towarów (nazwa, ilość, j.m., cena jednostkowa, wartość)","en":"Goods table (name, quantity, unit, unit price, value)","uk":"Таблиця товарів (назва, кількість, од. вим., ціна за одиницю, вартість)","de":"Warentabelle (Name, Menge, Einheit, Einzelpreis, Wert)"}},
                    {"name":"total_quantity","type":"number","required":true,"labels":{"pl":"Łączna ilość","en":"Total Quantity","uk":"Загальна кількість","de":"Gesamtmenge"}},
                    {"name":"total_amount","type":"number","required":true,"labels":{"pl":"Całkowita wartość","en":"Total Value","uk":"Загальна вартість","de":"Gesamtwert"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Dowód dostawy (WZ)',
                        'description' => 'Dokument potwierdzający wydanie towarów z magazynu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DOWÓD DOSTAWY (WZ)</h1><p style="font-size: 14px;">Numer: [[note_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Data wystawienia: [[issue_date]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
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
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wystawił</p></td>
                                <td width="50%"><p>___________________<br>Odebrał</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Delivery Note',
                        'description' => 'A document confirming the release of goods from the warehouse.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DELIVERY NOTE</h1><p style="font-size: 14px;">Number: [[note_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Issue Date: [[issue_date]]</p></td><td style="text-align: right;"><p>City: [[city]], ' . date('F j, Y') . '</p></td></tr></table>',
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ТОВАРНА НАКЛАДНА</h1><p style="font-size: 14px;">Номер: [[note_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Дата виставлення: [[issue_date]]</p></td><td style="text-align: right;"><p>Місто: [[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LIEFERSCHEIN</h1><p style="font-size: 14px;">Nummer: [[note_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ausstellungsdatum: [[issue_date]]</p></td><td style="text-align: right;"><p>Ort: [[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
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

            // --- Договор займа между юридическими лицами / Loan Agreement between Legal Entities ---
            [
                'slug' => 'loan-agreement-legal-entities-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"lender_name","type":"text","required":true,"labels":{"pl":"Pożyczkodawca (nazwa firmy)","en":"Lender (company name)","uk":"Позикодавець (назва компанії)","de":"Darlehensgeber (Firmenname)"}},
                    {"name":"lender_address","type":"text","required":true,"labels":{"pl":"Adres pożyczkodawcy","en":"Lender Address","uk":"Адреса позикодавця","de":"Adresse des Darlehensgebers"}},
                    {"name":"lender_tax_id","type":"text","required":true,"labels":{"pl":"NIP/Numer identyfikacji podatkowej pożyczkodawcy","en":"Lender\'s Tax ID/VAT ID","uk":"ІПН/Податковий номер позикодавця","de":"Steuer-ID/USt-IdNr. des Darlehensgebers"}},
                    {"name":"borrower_name","type":"text","required":true,"labels":{"pl":"Pożyczkobiorca (nazwa firmy)","en":"Borrower (company name)","uk":"Позичальник (назва компанії)","de":"Darlehensnehmer (Firmenname)"}},
                    {"name":"borrower_address","type":"text","required":true,"labels":{"pl":"Adres pożyczkobiorcy","en":"Borrower Address","uk":"Адреса позичальника","de":"Adresse des Darlehensnehmers"}},
                    {"name":"borrower_tax_id","type":"text","required":true,"labels":{"pl":"NIP/Numer identyfikacji podatkowej pożyczkobiorcy","en":"Borrower\'s Tax ID/VAT ID","uk":"ІПН/Податковий номер позичальника","de":"Steuer-ID/USt-IdNr. des Darlehensnehmers"}},
                    {"name":"loan_amount","type":"number","required":true,"labels":{"pl":"Kwota pożyczki","en":"Loan Amount","uk":"Сума позики","de":"Darlehensbetrag"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"repayment_date","type":"date","required":true,"labels":{"pl":"Data spłaty","en":"Repayment Date","uk":"Дата погашення","de":"Rückzahlungsdatum"}},
                    {"name":"interest_rate","type":"text","required":true,"labels":{"pl":"Oprocentowanie","en":"Interest Rate","uk":"Процентна ставка","de":"Zinssatz"}},
                    {"name":"purpose_of_loan","type":"textarea","required":false,"labels":{"pl":"Cel pożyczki (opcjonalnie)","en":"Purpose of Loan (optional)","uk":"Мета позики (необов\'azkowo)","de":"Zweck des Darlehens (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa pożyczki między podmiotami prawnymi',
                        'description' => 'Umowa regulująca warunki pożyczki pieniężnej między dwiema firmami.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA POŻYCZKI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>[[lender_name]]</strong> z siedzibą w [[lender_address]], NIP/Steuer-ID: [[lender_tax_id]], zwanym/ą dalej "Pożyczkodawcą",</p>
                                <p>a</p>
                                <p><strong>[[borrower_name]]</strong> z siedzibą w [[borrower_address]], NIP/Steuer-ID: [[borrower_tax_id]], zwanym/ą dalej "Pożyczkobiorcą".</p>
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
                                <p><strong>Lender:</strong> [[lender_name]] with its registered office in [[lender_address]], Tax ID/VAT ID: [[lender_tax_id]], hereinafter referred to as the "Lender",</p>
                                <p>and</p>
                                <p><strong>Borrower:</strong> [[borrower_name]] with its registered office in [[borrower_address]], Tax ID/VAT ID: [[borrower_tax_id]], hereinafter referred to as the "Borrower".</p>
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
                                <p><strong>Позикодавцем:</strong> [[lender_name]] з місцезнаходженням у [[lender_address]], ІПН/Податковий номер: [[lender_tax_id]], надалі іменований "Позикодавець",</p>
                                <p>та</p>
                                <p><strong>Позичальником:</strong> [[borrower_name]] з місцезнаходженням у [[borrower_address]], ІПН/Податковий номер: [[borrower_tax_id]], надалі іменований "Позичальник".</p>
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DARLEHENSVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Darlehensgeber:</strong> [[lender_name]] mit Sitz in [[lender_address]], Steuer-ID/USt-IdNr.: [[lender_tax_id]], im Folgenden "Darlehensgeber" genannt,</p>
                                <p>und</p>
                                <p><strong>Darlehensnehmer:</strong> [[borrower_name]] mit Sitz in [[borrower_address]], Steuer-ID/USt-IdNr.: [[borrower_tax_id]], im Folgenden "Darlehensnehmer" genannt.</p>
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

            // --- Авансовый отчет / Expense Report ---
            [
                'slug' => 'expense-report-de',
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
                    {"name":"approver_position","type":"text","required":true,"labels":{"pl":"Stanowisko zatwierdzającego","en":"Approver Position","uk":"Посада того, kto zatwierdza","de":"Position des Genehmigers"}}
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SPESENABRECHNUNG</h1><p style="font-size: 14px;">Nummer: [[report_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Firma: [[company_name]]</p></td><td style="text-align: right;"><p>Ort: [[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
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

            // --- Доверенность на получение ТМЦ / Power of Attorney for Goods Receipt ---
            [
                'slug' => 'power-of-attorney-goods-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"poa_number","type":"text","required":true,"labels":{"pl":"Numer pełnomocnictwa","en":"Power of Attorney Number","uk":"Номер довіреності","de":"Vollmachtnummer"}},
                    {"name":"issue_date","type":"date","required":true,"labels":{"pl":"Data wystawienia","en":"Issue Date","uk":"Дата виставлення","de":"Ausstellungsdatum"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy (udzielającej pełnomocnictwa)","en":"Company Name (granting power of attorney)","uk":"Назва компанії (що надає довіреність)","de":"Firmenname (Vollmachtgeber)"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Company Address","uk":"Адres firmy","de":"Adresse des Unternehmens"}},
                    {"name":"company_tax_id","type":"text","required":true,"labels":{"pl":"NIP/Numer identyfikacji podatkowej firmy","en":"Company Tax ID/VAT ID","uk":"ІПН/Податковий номер компанії","de":"Steuer-ID/USt-IdNr. des Unternehmens"}},
                    {"name":"representative_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko przedstawiciela","en":"Representative Full Name","uk":"ПІБ представника","de":"Vollständiger Name des Vertreters"}},
                    {"name":"representative_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości przedstawiciela","en":"Representative ID Number","uk":"Номер посвідчення представника","de":"Ausweisnummer des Vertreters"}},
                    {"name":"goods_description","type":"textarea","required":true,"labels":{"pl":"Opis powierzonego mienia/towarów do odbioru","en":"Description of entrusted property/goods to be received","uk":"Опис довіреного майна/товарів для отримання","de":"Beschreibung des anvertrauten Eigentums/der zu empfangenden Waren"}},
                    {"name":"supplier_name","type":"text","required":true,"labels":{"pl":"Nazwa dostawcy","en":"Supplier Name","uk":"Назва постачальника","de":"Name des Lieferanten"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pełnomocnictwo do odbioru towarów',
                        'description' => 'Dokument uprawniający wskazaną osobę do odbioru towarów lub materiałów w imieniu firmy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO</h1><p style="font-size: 14px;">Numer: [[poa_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Data wystawienia: [[issue_date]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym <strong>[[company_name]]</strong> z siedzibą w [[company_address]], NIP/Steuer-ID: [[company_tax_id]],</p>
                                <p>udziela pełnomocnictwa Panu/Pani: <strong>[[representative_full_name]]</strong>, legitymującemu/ej się dowodem osobistym nr [[representative_id_number]],</p>
                                <p>do odbioru w naszym imieniu od firmy <strong>[[supplier_name]]</strong> następujących towarów/materiałów: [[goods_description]].</p>
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY</h1><p style="font-size: 14px;">Number: [[poa_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Issue Date: [[issue_date]]</p></td><td style="text-align: right;"><p>City: [[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hereby <strong>[[company_name]]</strong> with its registered office in [[company_address]], Tax ID/VAT ID: [[company_tax_id]],</p>
                                <p>grants power of attorney to Mr./Ms.: <strong>[[representative_full_name]]</strong>, holding ID number [[representative_id_number]],</p>
                                <p>to receive on our behalf from the company <strong>[[supplier_name]]</strong> the following goods/materials: [[goods_description]].</p>
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ</h1><p style="font-size: 14px;">Номер: [[poa_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Дата виставлення: [[issue_date]]</p></td><td style="text-align: right;"><p>Місто: [[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим <strong>[[company_name]]</strong> з місцезнаходженням у [[company_address]], ІПН/Податковий номер: [[company_tax_id]],</p>
                                <p>надає довіреність Пану/Пані: <strong>[[representative_full_name]]</strong>, який/яка має посвідчення особи номер: [[representative_id_number]],</p>
                                <p>на отримання від нашого імені від компанії <strong>[[supplier_name]]</strong> наступних товарів/матеріалів: [[goods_description]].</p>
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT</h1><p style="font-size: 14px;">Nummer: [[poa_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ausstellungsdatum: [[issue_date]]</p></td><td style="text-align: right;"><p>Ort: [[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit erteilt die <strong>[[company_name]]</strong> mit Sitz in [[company_address]], Steuer-ID/USt-IdNr.: [[company_tax_id]],</p>
                                <p>Herrn/Frau: <strong>[[representative_full_name]]</strong>, Ausweisnummer: [[representative_id_number]], die Vollmacht,</p>
                                <p>in unserem Namen von der Firma <strong>[[supplier_name]]</strong> folgende Waren/Materialien entgegenzunehmen: [[goods_description]].</p>
                                <br/>
                                <p>Die Vollmacht ist bis auf Widerruf gültig.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift der bevollmächtigten Person des Unternehmens)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Протокол разногласий к договору / Protocol of Disagreements to the Contract ---
            [
                'slug' => 'protocol-disagreements-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"protocol_number","type":"text","required":true,"labels":{"pl":"Numer protokołu","en":"Protocol Number","uk":"Номер протоколу","de":"Protokollnummer"}},
                    {"name":"protocol_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia","en":"Date of Preparation","uk":"Дата складання","de":"Erstellungsdatum"}},
                    {"name":"contract_name","type":"text","required":true,"labels":{"pl":"Nazwa umowy","en":"Contract Name","uk":"Назва договору","de":"Vertragsname"}},
                    {"name":"contract_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Contract Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"party_one_name","type":"text","required":true,"labels":{"pl":"Strona 1 (nazwa firmy)","en":"Party 1 (company name)","uk":"Сторона 1 (назва компанії)","de":"Partei 1 (Firmenname)"}},
                    {"name":"party_one_address","type":"text","required":true,"labels":{"pl":"Adres Strony 1","en":"Party 1 Address","uk":"Адres Strony 1","de":"Adresse der Partei 1"}},
                    {"name":"party_two_name","type":"text","required":true,"labels":{"pl":"Strona 2 (nazwa firmy)","en":"Party 2 (company name)","uk":"Сторона 2 (назва компанії)","de":"Partei 2 (Firmenname)"}},
                    {"name":"party_two_address","type":"text","required":true,"labels":{"pl":"Adres Strony 2","en":"Party 2 Address","uk":"Адres Strony 2","de":"Adresse der Partei 2"}},
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKOLL DER MEINUNGSVERSCHIEDENHEITEN</h1><p style="font-size: 14px;">Nummer: [[protocol_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Betrifft Vertrag: <strong>[[contract_name]]</strong> vom [[contract_date]]</p></td><td style="text-align: right;"><p>Ort: [[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
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

            // --- Договор на разработку программного обеспечения / Software Development Agreement ---
            [
                'slug' => 'software-development-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"developer_name","type":"text","required":true,"labels":{"pl":"Wykonawca (nazwa firmy/imię i nazwisko)","en":"Developer (company name/full name)","uk":"Розробник (назва компанії/ПІБ)","de":"Entwickler (Firmenname/vollständiger Name)"}},
                    {"name":"developer_address","type":"text","required":true,"labels":{"pl":"Adres wykonawcy","en":"Developer Address","uk":"Адres wykonawcy","de":"Adresse des Entwicklers"}},
                    {"name":"developer_tax_id","type":"text","required":true,"labels":{"pl":"NIP/Numer identyfikacji podatkowej wykonawcy (jeśli firma)","en":"Developer\'s Tax ID/VAT ID (if company)","uk":"ІПН/Податковий номер розробника (якщо компанія)","de":"Steuer-ID/USt-IdNr. des Entwicklers (falls Firma)"}},
                    {"name":"client_name","type":"text","required":true,"labels":{"pl":"Klient (nazwa firmy/imię i nazwisko)","en":"Client (company name/full name)","uk":"Клієнт (назва компанії/ПІБ)","de":"Kunde (Firmenname/vollständiger Name)"}},
                    {"name":"client_address","type":"text","required":true,"labels":{"pl":"Adres klienta","en":"Client Address","uk":"Адres klienta","de":"Adresse des Kunden"}},
                    {"name":"client_tax_id","type":"text","required":true,"labels":{"pl":"NIP/Numer identyfikacji podatkowej klienta (jeśli firma)","en":"Client\'s Tax ID/VAT ID (if company)","uk":"ІПН/Податковий номер клієнта (якщо компанія)","de":"Steuer-ID/USt-IdNr. des Kunden (falls Firma)"}},
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
                                <p><strong>Wykonawcą:</strong> [[developer_name]], adres: [[developer_address]], NIP/Steuer-ID: [[developer_tax_id]],</p>
                                <p>a</p>
                                <p><strong>Klientem:</strong> [[client_name]], adres: [[client_address]], NIP/Steuer-ID: [[client_tax_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Przedmiotem umowy jest rozwój oprogramowania zgodnie z opisem: [[project_description]]</p>
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
                                <p><strong>Developer:</strong> [[developer_name]], address: [[developer_address]], Tax ID/VAT ID: [[developer_tax_id]],</p>
                                <p>and</p>
                                <p><strong>Client:</strong> [[client_name]], address: [[client_address]], Tax ID/VAT ID: [[client_tax_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The subject of the agreement is the development of software according to the description: [[project_description]]</p>
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
                                <p><strong>Розробником:</strong> [[developer_name]], адреса: [[developer_address]], ІПН/Податковий номер: [[developer_tax_id]],</p>
                                <p>та</p>
                                <p><strong>Клієнтом:</strong> [[client_name]], адреса: [[client_address]], ІПН/Податковий номер: [[client_tax_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Предметом договору є розробка програмного забезпечення відповідно до опису: [[project_description]]</p>
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SOFTWAREENTWICKLUNGSVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Entwickler:</strong> [[developer_name]], Adresse: [[developer_address]], Steuer-ID/USt-IdNr.: [[developer_tax_id]],</p>
                                <p>und</p>
                                <p><strong>Kunde:</strong> [[client_name]], Adresse: [[client_address]], Steuer-ID/USt-IdNr.: [[client_tax_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Gegenstand des Vertrages ist die Entwicklung von Software gemäß der Beschreibung: [[project_description]]</p>
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

            // --- Договор на создание и поддержку сайта / Website Creation and Support Agreement ---
            [
                'slug' => 'website-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"service_provider_name","type":"text","required":true,"labels":{"pl":"Usługodawca (nazwa firmy/imię i nazwisko)","en":"Service Provider (company name/full name)","uk":"Постачальник послуг (назва компанії/ПІБ)","de":"Dienstleister (Firmenname/vollständiger Name)"}},
                    {"name":"service_provider_address","type":"text","required":true,"labels":{"pl":"Adres usługodawcy","en":"Service Provider Address","uk":"Адres usługodawcy","de":"Adresse des Dienstleisters"}},
                    {"name":"service_provider_tax_id","type":"text","required":true,"labels":{"pl":"NIP/Numer identyfikacji podatkowej usługodawcy (jeśli firma)","en":"Service Provider\'s Tax ID/VAT ID (if company)","uk":"ІПН/Податковий номер постачальника послуг (якщо компанія)","de":"Steuer-ID/USt-IdNr. des Dienstleisters (falls Firma)"}},
                    {"name":"client_name","type":"text","required":true,"labels":{"pl":"Klient (nazwa firmy/imię i nazwisko)","en":"Client (company name/full name)","uk":"Клієнт (назва компанії/ПІБ)","de":"Kunde (Firmenname/vollständiger Name)"}},
                    {"name":"client_address","type":"text","required":true,"labels":{"pl":"Adres klienta","en":"Client Address","uk":"Адres klienta","de":"Adresse des Kunden"}},
                    {"name":"client_tax_id","type":"text","required":true,"labels":{"pl":"NIP/Numer identyfikacji podatkowej klienta (jeśli firma)","en":"Client\'s Tax ID/VAT ID (if company)","uk":"ІПН/Податковий номер клієнта (якщо компанія)","de":"Steuer-ID/USt-IdNr. des Kunden (falls Firma)"}},
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
                                <p><strong>Usługodawcą:</strong> [[service_provider_name]], adres: [[service_provider_address]], NIP/Steuer-ID: [[service_provider_tax_id]],</p>
                                <p>a</p>
                                <p><strong>Klientem:</strong> [[client_name]], adres: [[client_address]], NIP/Steuer-ID: [[client_tax_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Przedmiotem umowy jest stworzenie i wdrożenie strony internetowej zgodnie z opisem: [[website_description]]</p>
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
                                <p><strong>Service Provider:</strong> [[service_provider_name]], address: [[service_provider_address]], Tax ID/VAT ID: [[service_provider_tax_id]],</p>
                                <p>and</p>
                                <p><strong>Client:</strong> [[client_name]], address: [[client_address]], Tax ID/VAT ID: [[client_tax_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The subject of the agreement is the creation and implementation of a website according to the description: [[website_description]]</p>
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
                                <p><strong>Постачальником послуг:</strong> [[service_provider_name]], адреса: [[service_provider_address]], ІПН/Податковий номер: [[service_provider_tax_id]],</p>
                                <p>та</p>
                                <p><strong>Клієнтом:</strong> [[client_name]], адреса: [[client_address]], ІПН/Податковий номер: [[client_tax_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Предметом договору є створення та впровадження веб-сайту відповідно до опису: [[website_description]]</p>
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VERTRAG ÜBER WEBSITE-ERSTELLUNG UND -SUPPORT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Dienstleister:</strong> [[service_provider_name]], Adresse: [[service_provider_address]], Steuer-ID/USt-IdNr.: [[service_provider_tax_id]],</p>
                                <p>und</p>
                                <p><strong>Kunde:</strong> [[client_name]], Adresse: [[client_address]], Steuer-ID/USt-IdNr.: [[client_tax_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Gegenstand des Vertrages ist die Erstellung und Implementierung einer Website gemäß der Beschreibung: [[website_description]]</p>
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

            // --- Техническое задание (ТЗ) на разработку / Technical Specification (TS) for Development ---
            [
                'slug' => 'technical-specification-de',
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
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TECHNISCHE SPEZIFIKATION</h1><p style="font-size: 14px;">Nummer: [[ts_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Projekt: <strong>[[project_name]]</strong></p></td><td style="text-align: right;"><p>Ort: [[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
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
            // --- Пользовательское соглашение для сайта / Website User Agreement (AGB) ---
            [
                'slug' => 'website-user-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data wejścia w życie","en":"Effective Date","uk":"Дата набрання чинності","de":"Datum des Inkrafttretens"}},
                    {"name":"website_name","type":"text","required":true,"labels":{"pl":"Nazwa strony internetowej","en":"Website Name","uk":"Назва веб-сайту","de":"Name der Website"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy (operatora strony)","en":"Company Name (website operator)","uk":"Назва компанії (оператора веб-сайту)","de":"Firmenname (Website-Betreiber)"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Company Address","uk":"Адреса компанії","de":"Adresse des Unternehmens"}},
                    {"name":"company_legal_form","type":"text","required":true,"labels":{"pl":"Forma prawna firmy (np. GmbH, UG)","en":"Company Legal Form (e.g., GmbH, UG)","uk":"Правова форма компанії (напр., GmbH, UG)","de":"Rechtsform des Unternehmens (z.B. GmbH, UG)"}},
                    {"name":"company_register_court","type":"text","required":true,"labels":{"pl":"Sąd rejestrowy","en":"Register Court","uk":"Реєстраційний суд","de":"Registergericht"}},
                    {"name":"company_register_number","type":"text","required":true,"labels":{"pl":"Numer rejestrowy","en":"Register Number","uk":"Реєстраційний номер","de":"Registernummer"}},
                    {"name":"company_vat_id","type":"text","required":false,"labels":{"pl":"Numer identyfikacji podatkowej VAT (opcjonalnie)","en":"VAT ID Number (optional)","uk":"Ідентифікаційний номер платника ПДВ (необов\'язково)","de":"Umsatzsteuer-Identifikationsnummer (optional)"}},
                    {"name":"contact_email","type":"email","required":true,"labels":{"pl":"Adres e-mail do kontaktu","en":"Contact Email","uk":"Електронна пошта для контакту","de":"Kontakt-E-Mail"}},
                    {"name":"terms_of_use_general","type":"textarea","required":true,"labels":{"pl":"Ogólne warunki użytkowania","en":"General Terms of Use","uk":"Загальні умови використання","de":"Allgemeine Nutzungsbedingungen"}},
                    {"name":"user_obligations","type":"textarea","required":true,"labels":{"pl":"Obowiązki użytkownika","en":"User Obligations","uk":"Обов\'язки користувача","de":"Pflichten des Nutzers"}},
                    {"name":"liability_limitation","type":"textarea","required":true,"labels":{"pl":"Ograniczenie odpowiedzialności","en":"Limitation of Liability","uk":"Обмеження відповідальності","de":"Haftungsbeschränkung"}},
                    {"name":"intellectual_property","type":"textarea","required":true,"labels":{"pl":"Prawa własności intelektualnej","en":"Intellectual Property Rights","uk":"Права інтелектуальної власності","de":"Rechte an geistigem Eigentum"}},
                    {"name":"changes_to_terms","type":"textarea","required":true,"labels":{"pl":"Zmiany w warunkach","en":"Changes to Terms","uk":"Зміни в умовах","de":"Änderungen der Bedingungen"}},
                    {"name":"governing_law_jurisdiction","type":"textarea","required":true,"labels":{"pl":"Prawo właściwe i jurysdykcja","en":"Governing Law and Jurisdiction","uk":"Застосовне право та юрисдикція","de":"Anwendbares Recht und Gerichtsstand"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Allgemeine Geschäftsbedingungen (AGB) für die Website',
                        'description' => 'Dokument, das die Regeln für die Nutzung der Website, die Rechte und Pflichten der Nutzer festlegt und den deutschen gesetzlichen Anforderungen entspricht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ALLGEMEINE GESCHÄFTSBEDINGUNGEN (AGB)</h1><p style="font-size: 14px;">für die Website <strong>[[website_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Betreiber: <strong>[[company_name]]</strong></p><p>[[company_address]]</p><p>Rechtsform: [[company_legal_form]]</p><p>Registergericht: [[company_register_court]], Registernummer: [[company_register_number]]</p><p>USt-IdNr.: [[company_vat_id]]</p><p>E-Mail: [[contact_email]]</p></td><td style="text-align: right;"><p>Stand: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Geltungsbereich und Vertragsgegenstand</h2>
                                <p>[[terms_of_use_general]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Pflichten des Nutzers</h2>
                                <p>[[user_obligations]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Haftungsbeschränkung</h2>
                                <p>[[liability_limitation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Rechte an geistigem Eigentum</h2>
                                <p>[[intellectual_property]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Änderungen der AGB</h2>
                                <p>[[changes_to_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Anwendbares Recht und Gerichtsstand</h2>
                                <p>[[governing_law_jurisdiction]]</p>
                                <br/>
                                <p>Sollten einzelne Bestimmungen dieser AGB ganz oder teilweise unwirksam sein oder werden, so wird hierdurch die Gültigkeit der übrigen Bestimmungen nicht berührt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ],
                    'en' => [
                        'title' => 'Website Terms and Conditions (AGB)',
                        'description' => 'Document outlining the rules for using the website, user rights and obligations, compliant with German legal requirements.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GENERAL TERMS AND CONDITIONS (AGB)</h1><p style="font-size: 14px;">for the website <strong>[[website_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Operator: <strong>[[company_name]]</strong></p><p>[[company_address]]</p><p>Legal Form: [[company_legal_form]]</p><p>Register Court: [[company_register_court]], Register Number: [[company_register_number]]</p><p>VAT ID: [[company_vat_id]]</p><p>Email: [[contact_email]]</p></td><td style="text-align: right;"><p>As of: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Scope and Subject Matter of the Contract</h2>
                                <p>[[terms_of_use_general]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. User Obligations</h2>
                                <p>[[user_obligations]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Limitation of Liability</h2>
                                <p>[[liability_limitation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Intellectual Property Rights</h2>
                                <p>[[intellectual_property]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Amendments to the Terms</h2>
                                <p>[[changes_to_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Governing Law and Jurisdiction</h2>
                                <p>[[governing_law_jurisdiction]]</p>
                                <br/>
                                <p>Should individual provisions of these GTC be or become wholly or partially invalid, the validity of the remaining provisions shall not be affected thereby.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Загальні положення та умови (AGB) для веб-сайту',
                        'description' => 'Документ, що визначає правила користування веб-сайтом, права та обов\'язки користувачів, відповідає вимогам німецького законодавства.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАГАЛЬНІ ПОЛОЖЕННЯ ТА УМОВИ (AGB)</h1><p style="font-size: 14px;">для веб-сайту <strong>[[website_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Оператор: <strong>[[company_name]]</strong></p><p>[[company_address]]</p><p>Правова форма: [[company_legal_form]]</p><p>Реєстраційний суд: [[company_register_court]], Реєстраційний номер: [[company_register_number]]</p><p>ІПН: [[company_vat_id]]</p><p>Електронна пошта: [[contact_email]]</p></td><td style="text-align: right;"><p>Станом на: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Сфера застосування та предмет договору</h2>
                                <p>[[terms_of_use_general]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Обов\'язки користувача</h2>
                                <p>[[user_obligations]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Обмеження відповідальності</h2>
                                <p>[[liability_limitation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Права інтелектуальної власності</h2>
                                <p>[[intellectual_property]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Зміни до умов</h2>
                                <p>[[changes_to_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Застосовне право та юрисдикція</h2>
                                <p>[[governing_law_jurisdiction]]</p>
                                <br/>
                                <p>Якщо окремі положення цих AGB повністю або частково недійсні або стануть такими, це не впливає на дійсність інших положень.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Ogólne Warunki Handlowe (AGB) dla strony internetowej',
                        'description' => 'Dokument określający zasady korzystania ze strony internetowej, prawa i obowiązki użytkowników, zgodny z niemieckimi wymogami prawnymi.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OGÓLNE WARUNKI HANDLOWE (AGB)</h1><p style="font-size: 14px;">dla strony internetowej <strong>[[website_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Operator: <strong>[[company_name]]</strong></p><p>[[company_address]]</p><p>Forma prawna: [[company_legal_form]]</p><p>Sąd rejestrowy: [[company_register_court]], Numer rejestrowy: [[company_register_number]]</p><p>NIP: [[company_vat_id]]</p><p>E-mail: [[contact_email]]</p></td><td style="text-align: right;"><p>Stan na: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Zakres obowiązywania i przedmiot umowy</h2>
                                <p>[[terms_of_use_general]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Obowiązki użytkownika</h2>
                                <p>[[user_obligations]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Ograniczenie odpowiedzialności</h2>
                                <p>[[liability_limitation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Prawa własności intelektualnej</h2>
                                <p>[[intellectual_property]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Zmiany w warunkach</h2>
                                <p>[[changes_to_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Prawo właściwe i jurysdykcja</h2>
                                <p>[[governing_law_jurisdiction]]</p>
                                <br/>
                                <p>Jeżeli poszczególne postanowienia niniejszych OWH są lub staną się w całości lub w części nieskuteczne, nie narusza to ważności pozostałych postanowień.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ]
                ]
            ],

            // --- Политика конфиденциальности / Privacy Policy (Datenschutzerklärung) ---
            [
                'slug' => 'privacy-policy-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"policy_date","type":"date","required":true,"labels":{"pl":"Data wejścia w życie","en":"Effective Date","uk":"Дата набрання чинності","de":"Datum des Inkrafttretens"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy (administratora danych)","en":"Company Name (data controller)","uk":"Назва компанії (контролера даних)","de":"Firmenname (Datenverantwortlicher)"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Company Address","uk":"Адреса компанії","de":"Adresse des Unternehmens"}},
                    {"name":"contact_email","type":"email","required":true,"labels":{"pl":"Adres e-mail do kontaktu","en":"Contact Email","uk":"Електронна пошта для контакту","de":"Kontakt-E-Mail"}},
                    {"name":"data_protection_officer","type":"text","required":false,"labels":{"pl":"Inspektor ochrony danych (imię i nazwisko/firma, opcjonalnie)","en":"Data Protection Officer (name/company, optional)","uk":"Інспектор із захисту даних (ПІБ/компанія, необов\'язково)","de":"Datenschutzbeauftragter (Name/Firma, optional)"}},
                    {"name":"data_collected_categories","type":"textarea","required":true,"labels":{"pl":"Kategorie zbieranych danych osobowych","en":"Categories of personal data collected","uk":"Категорії зібраних персональних даних","de":"Kategorien der erhobenen personenbezogenen Daten"}},
                    {"name":"purpose_of_processing","type":"textarea","required":true,"labels":{"pl":"Cel i podstawa prawna przetwarzania danych (np. Art. 6 RODO)","en":"Purpose and legal basis of data processing (e.g., Art. 6 GDPR)","uk":"Мета та правова підстава обробки даних (напр., ст. 6 GDPR)","de":"Zweck und Rechtsgrundlage der Datenverarbeitung (z.B. Art. 6 DSGVO)"}},
                    {"name":"data_recipients","type":"textarea","required":true,"labels":{"pl":"Odbiorcy danych osobowych","en":"Recipients of personal data","uk":"Одержувачі персональних даних","de":"Empfänger personenbezogener Daten"}},
                    {"name":"data_retention_period","type":"textarea","required":true,"labels":{"pl":"Okres przechowywania danych","en":"Data retention period","uk":"Термін зберігання даних","de":"Speicherdauer der Daten"}},
                    {"name":"user_rights_gdpr","type":"textarea","required":true,"labels":{"pl":"Prawa osoby, której dane dotyczą (Art. 15-22 RODO)","en":"Data subject rights (Art. 15-22 GDPR)","uk":"Права суб\'єкта даних (ст. 15-22 GDPR)","de":"Rechte der betroffenen Person (Art. 15-22 DSGVO)"}},
                    {"name":"right_to_lodge_complaint","type":"textarea","required":true,"labels":{"pl":"Prawo do wniesienia skargi do organu nadzorczego","en":"Right to lodge a complaint with a supervisory authority","uk":"Право подати скаргу до наглядового органу","de":"Recht auf Beschwerde bei einer Aufsichtsbehörde"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Datenschutzerklärung',
                        'description' => 'Dokument, das die Regeln für die Verarbeitung personenbezogener Daten der Nutzer festlegt, strikt konform mit der DSGVO und dem BDSG.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DATENSCHUTZERKLÄRUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Verantwortlicher: <strong>[[company_name]]</strong></p><p>[[company_address]]</p><p>E-Mail: [[contact_email]]</p><p>Datenschutzbeauftragter: [[data_protection_officer]]</p></td><td style="text-align: right;"><p>Stand: [[policy_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Erhebung und Verarbeitung personenbezogener Daten</h2>
                                <p>[[data_collected_categories]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Zweck und Rechtsgrundlage der Datenverarbeitung</h2>
                                <p>[[purpose_of_processing]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Empfänger personenbezogener Daten</h2>
                                <p>[[data_recipients]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Speicherdauer der personenbezogenen Daten</h2>
                                <p>[[data_retention_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Ihre Rechte als betroffene Person (Art. 15-22 DSGVO)</h2>
                                <p>[[user_rights_gdpr]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Recht auf Beschwerde bei einer Aufsichtsbehörde</h2>
                                <p>[[right_to_lodge_complaint]]</p>
                                <br/>
                                <p>Diese Datenschutzerklärung kann jederzeit mit Wirkung für die Zukunft geändert werden.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ],
                    'en' => [
                        'title' => 'Privacy Policy',
                        'description' => 'Document outlining the rules for processing users\' personal data, strictly compliant with GDPR and BDSG.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PRIVACY POLICY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Controller: <strong>[[company_name]]</strong></p><p>[[company_address]]</p><p>Email: [[contact_email]]</p><p>Data Protection Officer: [[data_protection_officer]]</p></td><td style="text-align: right;"><p>As of: [[policy_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Collection and Processing of Personal Data</h2>
                                <p>[[data_collected_categories]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Purpose and Legal Basis of Data Processing</h2>
                                <p>[[purpose_of_processing]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Recipients of Personal Data</h2>
                                <p>[[data_recipients]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Retention Period for Personal Data</h2>
                                <p>[[data_retention_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Your Rights as a Data Subject (Art. 15-22 GDPR)</h2>
                                <p>[[user_rights_gdpr]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Right to Lodge a Complaint with a Supervisory Authority</h2>
                                <p>[[right_to_lodge_complaint]]</p>
                                <br/>
                                <p>This Privacy Policy may be amended at any time with effect for the future.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Політика конфіденційності',
                        'description' => 'Документ, що визначає правила обробки персональних даних користувачів, суворо відповідає GDPR та BDSG.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОЛІТИКА КОНФІДЕНЦІЙНОСТІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Контролер: <strong>[[company_name]]</strong></p><p>[[company_address]]</p><p>Електронна пошта: [[contact_email]]</p><p>Інспектор із захисту даних: [[data_protection_officer]]</p></td><td style="text-align: right;"><p>Станом на: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Збір та обробка персональних даних</h2>
                                <p>[[data_collected_categories]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Мета та правова підстава обробки даних</h2>
                                <p>[[purpose_of_processing]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Одержувачі персональних даних</h2>
                                <p>[[data_recipients]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Термін зберігання персональних даних</h2>
                                <p>[[data_retention_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Ваші права як суб\'єкта даних (ст. 15-22 GDPR)</h2>
                                <p>[[user_rights_gdpr]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Право подати скаргу до наглядового органу</h2>
                                <p>[[right_to_lodge_complaint]]</p>
                                <br/>
                                <p>Ця Політика конфіденційності може бути змінена в будь-який час з дією на майбутнє.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Polityka Prywatności',
                        'description' => 'Dokument określający zasady przetwarzania danych osobowych użytkowników, ściśle zgodny z RODO i BDSG.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POLITYKA PRYWATNOŚCI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Administrator: <strong>[[company_name]]</strong></p><p>[[company_address]]</p><p>E-mail: [[contact_email]]</p><p>Inspektor ochrony danych: [[data_protection_officer]]</p></td><td style="text-align: right;"><p>Stan na: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Gromadzenie i przetwarzanie danych osobowych</h2>
                                <p>[[data_collected_categories]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Cel i podstawa prawna przetwarzania danych</h2>
                                <p>[[purpose_of_processing]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Odbiorcy danych osobowych</h2>
                                <p>[[data_recipients]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Okres przechowywania danych osobowych</h2>
                                <p>[[data_retention_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Prawa osoby, której dane dotyczą (Art. 15-22 RODO)</h2>
                                <p>[[user_rights_gdpr]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Prawo do wniesienia skargi do organu nadzorczego</h2>
                                <p>[[right_to_lodge_complaint]]</p>
                                <br/>
                                <p>Niniejsza Polityka Prywatności może zostać zmieniona w dowolnym momencie ze skutkiem na przyszłość.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ]
                ]
            ],

            // --- Договор оферты / Offer Agreement (Angebot) ---
            [
                'slug' => 'offer-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"offer_date","type":"date","required":true,"labels":{"pl":"Data wystawienia oferty","en":"Offer Issue Date","uk":"Дата виставлення оферти","de":"Angebotsdatum"}},
                    {"name":"offeror_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy (oferenta)","en":"Company Name (offeror)","uk":"Назва компанії (оферента)","de":"Firmenname (Anbieter)"}},
                    {"name":"offeror_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Company Address","uk":"Адреса компанії","de":"Adresse des Unternehmens"}},
                    {"name":"offeror_company_legal_form","type":"text","required":true,"labels":{"pl":"Forma prawna firmy (np. GmbH, UG)","en":"Company Legal Form (e.g., GmbH, UG)","uk":"Правова форма компанії (напр., GmbH, UG)","de":"Rechtsform des Unternehmens (z.B. GmbH, UG)"}},
                    {"name":"offeror_company_register_court","type":"text","required":true,"labels":{"pl":"Sąd rejestrowy","en":"Register Court","uk":"Реєстраційний суд","de":"Registergericht"}},
                    {"name":"offeror_company_register_number","type":"text","required":true,"labels":{"pl":"Numer rejestrowy","en":"Register Number","uk":"Реєстраційний номер","de":"Registernummer"}},
                    {"name":"offeror_company_vat_id","type":"text","required":false,"labels":{"pl":"Numer identyfikacji podatkowej VAT (opcjonalnie)","en":"VAT ID Number (optional)","uk":"Ідентифікаційний номер платника ПДВ (необов\'язково)","de":"Umsatzsteuer-Identifikationsnummer (optional)"}},
                    {"name":"offeree_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy/Imię i nazwisko odbiorcy oferty","en":"Company Name/Recipient Name","uk":"Назва компанії/ПІБ одержувача оферти","de":"Firmenname/Name des Angebotsempfängers"}},
                    {"name":"offeree_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy oferty","en":"Recipient Address","uk":"Адреса одержувача оферти","de":"Adresse des Angebotsempfängers"}},
                    {"name":"offer_subject","type":"text","required":true,"labels":{"pl":"Przedmiot oferty","en":"Subject of Offer","uk":"Предмет оферти","de":"Gegenstand des Angebots"}},
                    {"name":"offer_terms_description","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis warunków oferty (cena, zakres usług/produktów, termin realizacji)","en":"Detailed description of offer terms (price, scope of services/products, completion date)","uk":"Детальний опис умов оферти (ціна, обсяг послуг/товарів, термін виконання)","de":"Detaillierte Beschreibung der Angebotsbedingungen (Preis, Leistungsumfang/Produkte, Fertigstellungsdatum)"}},
                    {"name":"acceptance_method","type":"textarea","required":true,"labels":{"pl":"Sposób akceptacji oferty","en":"Method of offer acceptance","uk":"Спосіб акцепту оферти","de":"Annahmeverfahren des Angebots"}},
                    {"name":"validity_period","type":"text","required":true,"labels":{"pl":"Okres ważności oferty","en":"Offer validity period","uk":"Термін дії оферти","de":"Gültigkeitsdauer des Angebots"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Angebot',
                        'description' => 'Ein formelles Angebot, das nach Annahme durch die andere Partei zu einem verbindlichen Vertrag wird, gemäß deutschem Recht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANGEBOT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Anbieter: <strong>[[offeror_company_name]]</strong></p><p>[[offeror_company_address]]</p><p>Rechtsform: [[offeror_company_legal_form]]</p><p>Registergericht: [[offeror_company_register_court]], Registernummer: [[offeror_company_register_number]]</p><p>USt-IdNr.: [[offeror_company_vat_id]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[offer_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An: <strong>[[offeree_name]]</strong></p>
                                <p>[[offeree_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Betreff: [[offer_subject]]</h2>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit unterbreiten wir Ihnen folgendes verbindliches Angebot:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Gegenstand des Angebots</h2>
                                <p>[[offer_terms_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Annahme des Angebots</h2>
                                <p>Die Annahme dieses Angebots erfolgt durch: [[acceptance_method]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Gültigkeit des Angebots</h2>
                                <p>Dieses Angebot ist gültig für den Zeitraum von: [[validity_period]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ],
                    'en' => [
                        'title' => 'Offer',
                        'description' => 'A formal offer which, upon acceptance by the other party, becomes a binding agreement, in accordance with German law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OFFER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Offeror: <strong>[[offeror_company_name]]</strong></p><p>[[offeror_company_address]]</p><p>Legal Form: [[offeror_company_legal_form]]</p><p>Register Court: [[offeror_company_register_court]], Register Number: [[offeror_company_register_number]]</p><p>VAT ID: [[offeror_company_vat_id]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[offer_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To: <strong>[[offeree_name]]</strong></p>
                                <p>[[offeree_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Subject: [[offer_subject]]</h2>
                                <p>Dear Sir/Madam,</p>
                                <p>We hereby submit the following binding offer:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Subject of the Offer</h2>
                                <p>[[offer_terms_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Acceptance of the Offer</h2>
                                <p>Acceptance of this offer occurs through: [[acceptance_method]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Validity of the Offer</h2>
                                <p>This offer is valid for the period of: [[validity_period]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Оферта',
                        'description' => 'Формальна оферта, яка після акцепту іншою стороною стає обов\'язковим договором, відповідно до німецького законодавства.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ОФЕРТА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Оферент: <strong>[[offeror_company_name]]</strong></p><p>[[offeror_company_address]]</p><p>Правова форма: [[offeror_company_legal_form]]</p><p>Реєстраційний суд: [[offeror_company_register_court]], Реєстраційний номер: [[offeror_company_register_number]]</p><p>ІПН: [[offeror_company_vat_id]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому: <strong>[[offeree_name]]</strong></p>
                                <p>[[offeree_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Тема: [[offer_subject]]</h2>
                                <p>Шановні пані та панове,</p>
                                <p>цим ми надаємо Вам наступну обов\'язкову оферту:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Предмет оферти</h2>
                                <p>[[offer_terms_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Акцепт оферти</h2>
                                <p>Акцепт цієї оферти здійснюється шляхом: [[acceptance_method]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Термін дії оферти</h2>
                                <p>Ця оферта дійсна протягом: [[validity_period]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Oferta',
                        'description' => 'Formalna oferta, która po akceptacji przez drugą stronę staje się wiążącą umową, zgodnie z prawem niemieckim.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OFERTA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Oferent: <strong>[[offeror_company_name]]</strong></p><p>[[offeror_company_address]]</p><p>Forma prawna: [[offeror_company_legal_form]]</p><p>Sąd rejestrowy: [[offeror_company_register_court]], Numer rejestrowy: [[offeror_company_register_number]]</p><p>NIP: [[offeror_company_vat_id]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do: <strong>[[offeree_name]]</strong></p>
                                <p>[[offeree_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Temat: [[offer_subject]]</h2>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym przedstawiamy Państwu następującą wiążącą ofertę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Przedmiot oferty</h2>
                                <p>[[offer_terms_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Akceptacja oferty</h2>
                                <p>Akceptacja tej oferty następuje poprzez: [[acceptance_method]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Ważność oferty</h2>
                                <p>Niniejsza oferta jest ważna przez okres: [[validity_period]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ]
                ]
            ],

            // --- Соглашение об уровне обслуживания (SLA) / Service Level Agreement (SLA) ---
            [
                'slug' => 'service-level-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia SLA","en":"SLA Date","uk":"Дата укладення SLA","de":"SLA-Datum"}},
                    {"name":"service_provider_name","type":"text","required":true,"labels":{"pl":"Usługodawca (nazwa firmy)","en":"Service Provider (company name)","uk":"Постачальник послуг (назва компанії)","de":"Dienstleister (Firmenname)"}},
                    {"name":"service_provider_address","type":"text","required":true,"labels":{"pl":"Adres usługodawcy","en":"Service Provider Address","uk":"Адреса постачальника послуг","de":"Adresse des Dienstleisters"}},
                    {"name":"service_provider_legal_form","type":"text","required":true,"labels":{"pl":"Forma prawna usługodawcy","en":"Service Provider Legal Form","uk":"Правова форма постачальника послуг","de":"Rechtsform des Dienstleisters"}},
                    {"name":"service_provider_register_court","type":"text","required":true,"labels":{"pl":"Sąd rejestrowy usługodawcy","en":"Service Provider Register Court","uk":"Реєстраційний суд постачальника послуг","de":"Registergericht des Dienstleisters"}},
                    {"name":"service_provider_register_number","type":"text","required":true,"labels":{"pl":"Numer rejestrowy usługodawcy","en":"Service Provider Register Number","uk":"Реєстраційний номер постачальника послуг","de":"Registernummer des Dienstleisters"}},
                    {"name":"client_name","type":"text","required":true,"labels":{"pl":"Klient (nazwa firmy)","en":"Client (company name)","uk":"Клієнт (назва компанії)","de":"Kunde (Firmenname)"}},
                    {"name":"client_address","type":"text","required":true,"labels":{"pl":"Adres klienta","en":"Client Address","uk":"Адреса клієнта","de":"Adresse des Kunden"}},
                    {"name":"client_legal_form","type":"text","required":true,"labels":{"pl":"Forma prawna klienta","en":"Client Legal Form","uk":"Правова форма клієнта","de":"Rechtsform des Kunden"}},
                    {"name":"service_description","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis usługi","en":"Detailed service description","uk":"Детальний опис послуги","de":"Detaillierte Dienstleistungsbeschreibung"}},
                    {"name":"service_levels_metrics","type":"textarea","required":true,"labels":{"pl":"Poziomy usług i metryki (np. dostępność, czas reakcji, czas rozwiązania)","en":"Service levels and metrics (e.g., availability, response time, resolution time)","uk":"Рівні послуг та метрики (напр., доступність, час реакції, час вирішення)","de":"Service-Levels und Metriken (z.B. Verfügbarkeit, Reaktionszeit, Lösungszeit)"}},
                    {"name":"responsibilities_provider","type":"textarea","required":true,"labels":{"pl":"Obowiązki usługodawcy","en":"Service Provider Responsibilities","uk":"Обов\'язки постачальника послуг","de":"Pflichten des Dienstleisters"}},
                    {"name":"responsibilities_client","type":"textarea","required":true,"labels":{"pl":"Obowiązki klienta","en":"Client Responsibilities","uk":"Обов\'язки клієнта","de":"Pflichten des Kunden"}},
                    {"name":"penalties_compensation","type":"textarea","required":false,"labels":{"pl":"Kary/odszkodowania za niezgodność z SLA (opcjonalnie)","en":"Penalties/compensation for SLA non-compliance (optional)","uk":"Штрафи/компенсації за недотримання SLA (необов\'язково)","de":"Strafen/Entschädigungen bei Nichteinhaltung des SLA (optional)"}},
                    {"name":"reporting_dispute_resolution","type":"textarea","required":true,"labels":{"pl":"Zasady raportowania i rozwiązywania sporów","en":"Reporting and dispute resolution rules","uk":"Правила звітності та вирішення спорів","de":"Berichts- und Streitbeilegungsregeln"}},
                    {"name":"term_termination","type":"textarea","required":true,"labels":{"pl":"Okres obowiązywania i warunki wypowiedzenia","en":"Term and termination conditions","uk":"Термін дії та умови розірвання","de":"Laufzeit und Kündigungsbedingungen"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Service Level Agreement (SLA)',
                        'description' => 'Dokument, das die garantierten Service-Levels eines Dienstleisters festlegt und die deutschen gesetzlichen Anforderungen berücksichtigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SERVICE LEVEL AGREEMENT (SLA)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Dienstleister: <strong>[[service_provider_name]]</strong></p><p>[[service_provider_address]]</p><p>Rechtsform: [[service_provider_legal_form]]</p><p>Registergericht: [[service_provider_register_court]], Registernummer: [[service_provider_register_number]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Kunde: <strong>[[client_name]]</strong></p>
                                <p>[[client_address]]</p>
                                <p>Rechtsform: [[client_legal_form]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Leistungsbeschreibung</h2>
                                <p>[[service_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Service-Levels und Metriken</h2>
                                <p>[[service_levels_metrics]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Pflichten des Dienstleisters</h2>
                                <p>[[responsibilities_provider]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Pflichten des Kunden</h2>
                                <p>[[responsibilities_client]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Strafen/Entschädigungen bei Nichteinhaltung des SLA</h2>
                                <p>[[penalties_compensation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Berichterstattung und Streitbeilegung</h2>
                                <p>[[reporting_dispute_resolution]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">7. Laufzeit und Kündigung</h2>
                                <p>[[term_termination]]</p>
                                <br/>
                                <p>Dieser Vertrag unterliegt deutschem Recht.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ],
                    'en' => [
                        'title' => 'Service Level Agreement (SLA)',
                        'description' => 'Document specifying the guaranteed service levels of a service provider, considering German legal requirements.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SERVICE LEVEL AGREEMENT (SLA)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Service Provider: <strong>[[service_provider_name]]</strong></p><p>[[service_provider_address]]</p><p>Legal Form: [[service_provider_legal_form]]</p><p>Register Court: [[service_provider_register_court]], Register Number: [[service_provider_register_number]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Client: <strong>[[client_name]]</strong></p>
                                <p>[[client_address]]</p>
                                <p>Legal Form: [[client_legal_form]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Service Description</h2>
                                <p>[[service_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Service Levels and Metrics</h2>
                                <p>[[service_levels_metrics]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Service Provider Responsibilities</h2>
                                <p>[[responsibilities_provider]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Client Responsibilities</h2>
                                <p>[[responsibilities_client]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Penalties/Compensation for SLA Non-Compliance</h2>
                                <p>[[penalties_compensation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Reporting and Dispute Resolution</h2>
                                <p>[[reporting_dispute_resolution]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">7. Term and Termination</h2>
                                <p>[[term_termination]]</p>
                                <br/>
                                <p>This agreement is governed by German law.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Угода про рівень обслуговування (SLA)',
                        'description' => 'Документ, що визначає гарантовані рівні надання послуг постачальником послуг, з урахуванням вимог німецького законодавства.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">УГОДА ПРО РІВЕНЬ ОБСЛУГОВУВАННЯ (SLA)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Постачальник послуг: <strong>[[service_provider_name]]</strong></p><p>[[service_provider_address]]</p><p>Правова форма: [[service_provider_legal_form]]</p><p>Реєстраційний суд: [[service_provider_register_court]], Реєстраційний номер: [[service_provider_register_number]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Клієнт: <strong>[[client_name]]</strong></p>
                                <p>[[client_address]]</p>
                                <p>Правова форма: [[client_legal_form]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Опис послуги</h2>
                                <p>[[service_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Рівні послуг та метрики</h2>
                                <p>[[service_levels_metrics]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Обов\'язки постачальника послуг</h2>
                                <p>[[responsibilities_provider]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Обов\'язки клієнта</h2>
                                <p>[[responsibilities_client]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Штрафи/компенсації за недотримання SLA</h2>
                                <p>[[penalties_compensation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Звітність та вирішення спорів</h2>
                                <p>[[reporting_dispute_resolution]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">7. Термін дії та розірвання</h2>
                                <p>[[term_termination]]</p>
                                <br/>
                                <p>Цей договір регулюється німецьким законодавством.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o Poziomie Usług (SLA)',
                        'description' => 'Dokument określający gwarantowane poziomy świadczenia usług przez usługodawcę, uwzględniający niemieckie wymogi prawne.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA O POZIOMIE USŁUG (SLA)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Usługodawca: <strong>[[service_provider_name]]</strong></p><p>[[service_provider_address]]</p><p>Forma prawna: [[service_provider_legal_form]]</p><p>Sąd rejestrowy: [[service_provider_register_court]], Numer rejestrowy: [[service_provider_register_number]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Klient: <strong>[[client_name]]</strong></p>
                                <p>[[client_address]]</p>
                                <p>Forma prawna: [[client_legal_form]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Opis usługi</h2>
                                <p>[[service_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Poziomy usług i metryki</h2>
                                <p>[[service_levels_metrics]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Obowiązki usługodawcy</h2>
                                <p>[[responsibilities_provider]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Obowiązki klienta</h2>
                                <p>[[responsibilities_client]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Kary/odszkodowania za niezgodność z SLA</h2>
                                <p>[[penalties_compensation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Zasady raportowania i rozwiązywania sporów</h2>
                                <p>[[reporting_dispute_resolution]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">7. Okres obowiązywania i warunki wypowiedzenia</h2>
                                <p>[[term_termination]]</p>
                                <br/>
                                <p>Niniejsza umowa podlega prawu niemieckiemu.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ]
                ]
            ],

            // --- Договор с фрилансером (Gig-контракт) / Freelancer Agreement (Dienstvertrag/Werkvertrag) ---
            [
                'slug' => 'freelancer-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"client_name","type":"text","required":true,"labels":{"pl":"Zleceniodawca (nazwa firmy/imię i nazwisko)","en":"Client (company name/full name)","uk":"Замовник (назва компанії/ПІБ)","de":"Auftraggeber (Firmenname/vollständiger Name)"}},
                    {"name":"client_address","type":"text","required":true,"labels":{"pl":"Adres zleceniodawcy","en":"Client Address","uk":"Адреса замовника","de":"Adresse des Auftraggebers"}},
                    {"name":"client_legal_form","type":"text","required":true,"labels":{"pl":"Forma prawna zleceniodawcy (jeśli firma)","en":"Client Legal Form (if company)","uk":"Правова форма замовника (якщо компанія)","de":"Rechtsform des Auftraggebers (falls Firma)"}},
                    {"name":"freelancer_full_name","type":"text","required":true,"labels":{"pl":"Freelancer (imię i nazwisko)","en":"Freelancer (full name)","uk":"Фрілансер (ПІБ)","de":"Freelancer (vollständiger Name)"}},
                    {"name":"freelancer_address","type":"text","required":true,"labels":{"pl":"Adres freelancera","en":"Freelancer Address","uk":"Адреса фрілансера","de":"Adresse des Freelancers"}},
                    {"name":"freelancer_tax_id","type":"text","required":true,"labels":{"pl":"Numer identyfikacji podatkowej freelancera (Steuer-ID)","en":"Freelancer Tax ID (Steuer-ID)","uk":"Податковий ідентифікаційний номер фрілансера (Steuer-ID)","de":"Steuer-ID des Freelancers"}},
                    {"name":"service_description","type":"textarea","required":true,"labels":{"pl":"Dokładny opis usługi/dzieła","en":"Exact description of service/work","uk":"Точний опис послуги/роботи","de":"Genaue Beschreibung der Dienstleistung/des Werks"}},
                    {"name":"delivery_deadline","type":"date","required":true,"labels":{"pl":"Termin realizacji/dostarczenia","en":"Completion/Delivery Deadline","uk":"Термін виконання/доставки","de":"Frist für Fertigstellung/Lieferung"}},
                    {"name":"remuneration_amount","type":"number","required":true,"labels":{"pl":"Kwota wynagrodzenia (brutto)","en":"Remuneration amount (gross)","uk":"Сума винагороди (брутто)","de":"Vergütungsbetrag (brutto)"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"pl":"Warunki płatności","en":"Payment Terms","uk":"Умови оплати","de":"Zahlungsbedingungen"}},
                    {"name":"intellectual_property_rights","type":"textarea","required":true,"labels":{"pl":"Prawa własności intelektualnej","en":"Intellectual Property Rights","uk":"Права інтелектуальної власності","de":"Rechte an geistigem Eigentum"}},
                    {"name":"contract_type_note","type":"textarea","required":false,"labels":{"pl":"Uwaga dotycząca typu umowy (Dienstvertrag/Werkvertrag)","en":"Note regarding contract type (service contract/work contract)","uk":"Примітка щодо типу договору (договір послуг/договір підряду)","de":"Hinweis zum Vertragstyp (Dienstvertrag/Werkvertrag)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Freelancer-Vertrag (Dienstvertrag/Werkvertrag)',
                        'description' => 'Vertrag zur Regelung der Zusammenarbeit mit einem Freelancer in Deutschland, unter Berücksichtigung der Unterscheidung zwischen Dienst- und Werkvertrag.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FREELANCER-VERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Auftraggeber: <strong>[[client_name]]</strong></p><p>[[client_address]]</p><p>Rechtsform: [[client_legal_form]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Freelancer: <strong>[[freelancer_full_name]]</strong></p>
                                <p>[[freelancer_address]]</p>
                                <p>Steuer-ID: [[freelancer_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Gegenstand des Vertrages</h2>
                                <p>[[service_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Frist für Fertigstellung/Lieferung</h2>
                                <p>Die Fertigstellung/Lieferung erfolgt bis zum: <strong>[[delivery_deadline]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Vergütung und Zahlungsbedingungen</h2>
                                <p>Die Vergütung beträgt: <strong>[[remuneration_amount]] [[currency]] (brutto)</strong></p>
                                <p>Zahlungsbedingungen: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Rechte an geistigem Eigentum</h2>
                                <p>[[intellectual_property_rights]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Hinweis zum Vertragstyp</h2>
                                <p>[[contract_type_note]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Schlussbestimmungen</h2>
                                <p>Dieser Vertrag unterliegt deutschem Recht. Änderungen und Ergänzungen bedürfen der Schriftform.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ],
                    'en' => [
                        'title' => 'Freelancer Agreement (Service Contract/Work Contract)',
                        'description' => 'Agreement regulating cooperation with a freelancer in Germany, considering the distinction between service and work contracts.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FREELANCER AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Client: <strong>[[client_name]]</strong></p><p>[[client_address]]</p><p>Legal Form: [[client_legal_form]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Freelancer: <strong>[[freelancer_full_name]]</strong></p>
                                <p>[[freelancer_address]]</p>
                                <p>Tax ID: [[freelancer_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Subject of the Agreement</h2>
                                <p>[[service_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Completion/Delivery Deadline</h2>
                                <p>Completion/delivery by: <strong>[[delivery_deadline]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Remuneration and Payment Terms</h2>
                                <p>Remuneration amount: <strong>[[remuneration_amount]] [[currency]] (gross)</strong></p>
                                <p>Payment terms: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Intellectual Property Rights</h2>
                                <p>[[intellectual_property_rights]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Note on Contract Type</h2>
                                <p>[[contract_type_note]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Final Provisions</h2>
                                <p>This agreement is governed by German law. Amendments and supplements must be made in writing.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Договір з фрілансером (Договір послуг/Договір підряду)',
                        'description' => 'Договір, що регулює співпрацю з фрілансером у Німеччині, з урахуванням розрізнення між договором послуг та договором підряду.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР З ФРІЛАНСЕРОМ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Замовник: <strong>[[client_name]]</strong></p><p>[[client_address]]</p><p>Правова форма: [[client_legal_form]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Фрілансер: <strong>[[freelancer_full_name]]</strong></p>
                                <p>[[freelancer_address]]</p>
                                <p>Податковий ідентифікатор (Steuer-ID): [[freelancer_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Предмет договору</h2>
                                <p>[[service_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Термін виконання/доставки</h2>
                                <p>Виконання/доставка до: <strong>[[delivery_deadline]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Винагорода та умови оплати</h2>
                                <p>Сума винагороди: <strong>[[remuneration_amount]] [[currency]] (брутто)</strong></p>
                                <p>Умови оплати: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Права інтелектуальної власності</h2>
                                <p>[[intellectual_property_rights]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Примітка щодо типу договору</h2>
                                <p>[[contract_type_note]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Прикінцеві положення</h2>
                                <p>Цей договір регулюється німецьким законодавством. Зміни та доповнення повинні бути зроблені в письмовій формі.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa z freelancerem (umowa o świadczenie usług/umowa o dzieło)',
                        'description' => 'Umowa regulująca współpracę z freelancerem w Niemczech, z uwzględnieniem rozróżnienia między umową o świadczenie usług a umową o dzieło.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA Z FREELANCEREM</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zleceniodawca: <strong>[[client_name]]</strong></p><p>[[client_address]]</p><p>Forma prawna: [[client_legal_form]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Freelancer: <strong>[[freelancer_full_name]]</strong></p>
                                <p>[[freelancer_address]]</p>
                                <p>Numer identyfikacji podatkowej (Steuer-ID): [[freelancer_tax_id]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Przedmiot umowy</h2>
                                <p>[[service_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Termin realizacji/dostarczenia</h2>
                                <p>Realizacja/dostarczenie do: <strong>[[delivery_deadline]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Wynagrodzenie i warunki płatności</h2>
                                <p>Kwota wynagrodzenia: <strong>[[remuneration_amount]] [[currency]] (brutto)</strong></p>
                                <p>Warunki płatności: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Prawa własności intelektualnej</h2>
                                <p>[[intellectual_property_rights]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Uwaga dotycząca typu umowy</h2>
                                <p>[[contract_type_note]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. Postanowienia końcowe</h2>
                                <p>Niniejsza umowa podlega prawu niemieckiemu. Zmiany i uzupełnienia wymagają formy pisemnej.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 10px; text-align: center; color: #555;">

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
