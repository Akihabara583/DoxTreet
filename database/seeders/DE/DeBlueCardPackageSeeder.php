<?php

namespace Database\Seeders\DE;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class DeBlueCardPackageSeeder extends Seeder
{
    /**
     * Run the database seeds for the German "EU Blue Card" Package 2025-2026.
     */
    public function run(): void
    {
        // Предполагаем, что у вас есть эти категории
        $catWork = Category::where('slug', 'work-de')->firstOrFail();

        $templatesData = [
            // === ПАКЕТ "ГОЛУБАЯ КАРТА ЕС (BLUE CARD)" (STANDARD) ===

            // 1. Заявление на получение Голубой карты (Antrag auf Erteilung einer Blauen Karte EU)
            [
                'category_id' => $catWork->id,
                'slug' => 'de-blue-card-application-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"applicant_details","type":"textarea","required":true,"labels":{"de":"Persönliche Angaben des Antragstellers (Name, Geburtsdatum, Anschrift, Nationalität)","en":"Applicant\'s personal details (name, date of birth, address, nationality)","pl":"Dane osobowe wnioskodawcy (imię i nazwisko, data urodzenia, adres, obywatelstwo)","uk":"Особисті дані заявника (ім\'я, дата народження, адреса, громадянство)"}},
                    {"name":"passport_details","type":"text","required":true,"labels":{"de":"Passnummer und Gültigkeit","en":"Passport number and validity","pl":"Numer i ważność paszportu","uk":"Номер та термін дії паспорта"}},
                    {"name":"university_degree","type":"textarea","required":true,"labels":{"de":"Angaben zum Hochschulabschluss (Fachrichtung, Universität, Land, Anerkennung in DE)","en":"University degree details (field of study, university, country, recognition in DE)","pl":"Informacje o wykształceniu wyższym (kierunek, uniwersytet, kraj, uznanie w DE)","uk":"Дані про вищу освіту (спеціальність, університет, країна, визнання в НІ)"}},
                    {"name":"employer_details","type":"textarea","required":true,"labels":{"de":"Angaben zum Arbeitgeber in Deutschland (Name, Anschrift)","en":"Details of the employer in Germany (name, address)","pl":"Dane pracodawcy w Niemczech (nazwa, adres)","uk":"Дані роботодавця в Німеччині (назва, адреса)"}},
                    {"name":"job_title","type":"text","required":true,"labels":{"de":"Bezeichnung der Tätigkeit","en":"Job title","pl":"Stanowisko","uk":"Посада"}},
                    {"name":"annual_salary_gross","type":"number","required":true,"labels":{"de":"Bruttojahresgehalt (€)","en":"Annual gross salary (€)","pl":"Roczne wynagrodzenie brutto (€)","uk":"Річна заробітна плата брутто (€)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Erteilung einer Blauen Karte EU',
                        'description' => 'Offizieller Antrag für hochqualifizierte Fachkräfte zur Erlangung eines Aufenthaltstitels "Blaue Karte EU" in Deutschland gemäß § 18g AufenthG.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Erteilung eines Aufenthaltstitels</h1><h2 style="font-size: 14px;">Zweck: Blaue Karte EU (§ 18g AufenthG)</h2></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An die zuständige Ausländerbehörde</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur Person</h3>
                            <p style="white-space: pre-wrap;">[[applicant_details]]</p>
                            <p>Pass: <strong>[[passport_details]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur Qualifikation und Beschäftigung</h3>
                            <p>Hochschulabschluss: <span style="white-space: pre-wrap;">[[university_degree]]</span></p>
                            <p>Arbeitgeber: <span style="white-space: pre-wrap;">[[employer_details]]</span></p>
                            <p>Tätigkeit als: <strong>[[job_title]]</strong></p>
                            <p>Bruttojahresgehalt: <strong>[[annual_salary_gross]] €</strong></p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift des Antragstellers: _________________________</p></div>'
                    ],
                    'en' => [
                        'title' => 'Application for EU Blue Card',
                        'description' => 'Official application for highly qualified professionals to obtain an "EU Blue Card" residence title in Germany according to § 18g AufenthG.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Erteilung eines Aufenthaltstitels</h1><h2 style="font-size: 14px;">Zweck: Blaue Karte EU (§ 18g AufenthG)</h2></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An die zuständige Ausländerbehörde</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur Person</h3>
                            <p style="white-space: pre-wrap;">[[applicant_details]]</p>
                            <p>Pass: <strong>[[passport_details]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur Qualifikation und Beschäftigung</h3>
                            <p>Hochschulabschluss: <span style="white-space: pre-wrap;">[[university_degree]]</span></p>
                            <p>Arbeitgeber: <span style="white-space: pre-wrap;">[[employer_details]]</span></p>
                            <p>Tätigkeit als: <strong>[[job_title]]</strong></p>
                            <p>Bruttojahresgehalt: <strong>[[annual_salary_gross]] €</strong></p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift des Antragstellers: _________________________</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o wydanie Niebieskiej Karty UE',
                        'description' => 'Oficjalny wniosek dla wysoko wykwalifikowanych specjalistów o uzyskanie tytułu pobytowego "Niebieska Karta UE" w Niemczech zgodnie z § 18g AufenthG.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Erteilung eines Aufenthaltstitels</h1><h2 style="font-size: 14px;">Zweck: Blaue Karte EU (§ 18g AufenthG)</h2></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An die zuständige Ausländerbehörde</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur Person</h3>
                            <p style="white-space: pre-wrap;">[[applicant_details]]</p>
                            <p>Pass: <strong>[[passport_details]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur Qualifikation und Beschäftigung</h3>
                            <p>Hochschulabschluss: <span style="white-space: pre-wrap;">[[university_degree]]</span></p>
                            <p>Arbeitgeber: <span style="white-space: pre-wrap;">[[employer_details]]</span></p>
                            <p>Tätigkeit als: <strong>[[job_title]]</strong></p>
                            <p>Bruttojahresgehalt: <strong>[[annual_salary_gross]] €</strong></p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift des Antragstellers: _________________________</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на отримання Блакитної карти ЄС',
                        'description' => 'Офіційна заява для висококваліфікованих фахівців на отримання дозволу на проживання "Блакитна карта ЄС" в Німеччині відповідно до § 18g AufenthG.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Erteilung eines Aufenthaltstitels</h1><h2 style="font-size: 14px;">Zweck: Blaue Karte EU (§ 18g AufenthG)</h2></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An die zuständige Ausländerbehörde</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur Person</h3>
                            <p style="white-space: pre-wrap;">[[applicant_details]]</p>
                            <p>Pass: <strong>[[passport_details]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur Qualifikation und Beschäftigung</h3>
                            <p>Hochschulabschluss: <span style="white-space: pre-wrap;">[[university_degree]]</span></p>
                            <p>Arbeitgeber: <span style="white-space: pre-wrap;">[[employer_details]]</span></p>
                            <p>Tätigkeit als: <strong>[[job_title]]</strong></p>
                            <p>Bruttojahresgehalt: <strong>[[annual_salary_gross]] €</strong></p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift des Antragstellers: _________________________</p></div>'
                    ]
                ]
            ],

            // 2. Описание должностных обязанностей (Stellenbeschreibung)
            [
                'category_id' => $catWork->id,
                'slug' => 'de-job-description-blue-card-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"employer_details","type":"textarea","required":true,"labels":{"de":"Arbeitgeber (Name, Anschrift)","en":"Employer (Name, Address)","pl":"Pracodawca (Nazwa, adres)","uk":"Роботодавець (Назва, адреса)"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"de":"Name des Arbeitnehmers","en":"Employee Name","pl":"Imię i nazwisko pracownika","uk":"Ім\'я та прізвище працівника"}},
                    {"name":"job_title","type":"text","required":true,"labels":{"de":"Stellenbezeichnung","en":"Job Title","pl":"Stanowisko","uk":"Посада"}},
                    {"name":"main_tasks","type":"textarea","required":true,"labels":{"de":"Hauptaufgaben und Tätigkeiten","en":"Main tasks and activities","pl":"Główne zadania i czynności","uk":"Основні завдання та діяльність"}},
                    {"name":"required_qualifications","type":"textarea","required":true,"labels":{"de":"Anforderungsprofil (Erforderliche Qualifikationen, Ausbildung, Fähigkeiten)","en":"Requirements profile (Required qualifications, education, skills)","pl":"Profil wymagań (Wymagane kwalifikacje, wykształcenie, umiejętności)","uk":"Профіль вимог (Необхідна кваліфікація, освіта, навички)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Erklärung zum Beschäftigungsverhältnis (Stellenbeschreibung)',
                        'description' => 'Ein vom Arbeitgeber auszufüllendes Formular, das die Details der Beschäftigung für den Antrag auf eine Blaue Karte EU detailliert beschreibt.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Erklärung zum Beschäftigungsverhältnis</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">Angaben zum Arbeitgeber</h3>
                            <p style="white-space: pre-wrap;">[[employer_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zum Arbeitnehmer</h3>
                            <p>Name: <strong>[[employee_name]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur Tätigkeit</h3>
                            <p>Stellenbezeichnung: <strong>[[job_title]]</strong></p>
                            <p><strong>Hauptaufgaben und detaillierte Tätigkeitsbeschreibung:</strong><br><span style="white-space: pre-wrap;">[[main_tasks]]</span></p>
                            <p><strong>Fachliche Anforderungen an den Stelleninhaber (Anforderungsprofil):</strong><br><span style="white-space: pre-wrap;">[[required_qualifications]]</span></p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift und Stempel des Arbeitgebers: _________________________</p></div>'
                    ],
                    'en' => [
                        'title' => 'Employment Relationship Declaration (Job Description)',
                        'description' => 'A form to be filled out by the employer that describes in detail the employment details for the EU Blue Card application.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Erklärung zum Beschäftigungsverhältnis</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">Angaben zum Arbeitgeber</h3>
                            <p style="white-space: pre-wrap;">[[employer_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zum Arbeitnehmer</h3>
                            <p>Name: <strong>[[employee_name]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur Tätigkeit</h3>
                            <p>Stellenbezeichnung: <strong>[[job_title]]</strong></p>
                            <p><strong>Hauptaufgaben und detaillierte Tätigkeitsbeschreibung:</strong><br><span style="white-space: pre-wrap;">[[main_tasks]]</span></p>
                            <p><strong>Fachliche Anforderungen an den Stelleninhaber (Anforderungsprofil):</strong><br><span style="white-space: pre-wrap;">[[required_qualifications]]</span></p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift und Stempel des Arbeitgebers: _________________________</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Oświadczenie dotyczące stosunku pracy (Opis stanowiska)',
                        'description' => 'Formularz wypełniany przez pracodawcę, który szczegółowo opisuje szczegóły zatrudnienia do wniosku o Niebieską Kartę UE.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Erklärung zum Beschäftigungsverhältnis</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">Angaben zum Arbeitgeber</h3>
                            <p style="white-space: pre-wrap;">[[employer_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zum Arbeitnehmer</h3>
                            <p>Name: <strong>[[employee_name]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur Tätigkeit</h3>
                            <p>Stellenbezeichnung: <strong>[[job_title]]</strong></p>
                            <p><strong>Hauptaufgaben und detaillierte Tätigkeitsbeschreibung:</strong><br><span style="white-space: pre-wrap;">[[main_tasks]]</span></p>
                            <p><strong>Fachliche Anforderungen an den Stelleninhaber (Anforderungsprofil):</strong><br><span style="white-space: pre-wrap;">[[required_qualifications]]</span></p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift und Stempel des Arbeitgebers: _________________________</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про трудові відносини (Опис посади)',
                        'description' => 'Форма, яку заповнює роботодавець і яка детально описує деталі працевлаштування для заяви на Блакитну карту ЄС.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Erklärung zum Beschäftigungsverhältnis</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">Angaben zum Arbeitgeber</h3>
                            <p style="white-space: pre-wrap;">[[employer_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zum Arbeitnehmer</h3>
                            <p>Name: <strong>[[employee_name]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur Tätigkeit</h3>
                            <p>Stellenbezeichnung: <strong>[[job_title]]</strong></p>
                            <p><strong>Hauptaufgaben und detaillierte Tätigkeitsbeschreibung:</strong><br><span style="white-space: pre-wrap;">[[main_tasks]]</span></p>
                            <p><strong>Fachliche Anforderungen an den Stelleninhaber (Anforderungsprofil):</strong><br><span style="white-space: pre-wrap;">[[required_qualifications]]</span></p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift und Stempel des Arbeitgebers: _________________________</p></div>'
                    ]
                ]
            ],

            // 3. Резюме (классическое) (Lebenslauf)
            [
                'category_id' => $catWork->id,
                'slug' => 'de-classic-cv-lebenslauf-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"personal_data","type":"textarea","required":true,"labels":{"de":"Persönliche Daten (Name, Anschrift, Telefon, E-Mail, Geburtsdatum)","en":"Personal Data (Name, Address, Phone, E-Mail, Date of Birth)","pl":"Dane osobowe (Imię i nazwisko, adres, telefon, e-mail, data urodzenia)","uk":"Особисті дані (Ім\'я, адреса, телефон, e-mail, дата народження)"}},
                    {"name":"professional_experience","type":"textarea","required":true,"labels":{"de":"Berufserfahrung (Zeitraum, Position, Firma, Ort, Aufgaben)","en":"Professional Experience (Period, Position, Company, City, Tasks)","pl":"Doświadczenie zawodowe (Okres, stanowisko, firma, miasto, zadania)","uk":"Професійний досвід (Період, посада, компанія, місто, завдання)"}},
                    {"name":"education","type":"textarea","required":true,"labels":{"de":"Bildungsweg (Zeitraum, Abschluss, Universität/Schule, Ort)","en":"Education (Period, Degree, University/School, City)","pl":"Wykształcenie (Okres, stopień, uczelnia/szkoła, miasto)","uk":"Освіта (Період, ступінь, університет/школа, місто)"}},
                    {"name":"skills_languages","type":"textarea","required":true,"labels":{"de":"Besondere Kenntnisse (Sprachen, EDV, etc.)","en":"Special Skills (Languages, IT, etc.)","pl":"Umiejętności specjalne (Języki, IT, itp.)","uk":"Особливі навички (Мови, ІТ, тощо)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Lebenslauf (Tabellarisch)',
                        'description' => 'Klassischer, tabellarischer Lebenslauf nach deutschem Standard. Ideal für Bewerbungen und offizielle Anträge wie die Blaue Karte EU.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 20px; font-weight: bold;">Lebenslauf</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px;">Persönliche Daten</h3>
                            <p style="white-space: pre-wrap;">[[personal_data]]</p>
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px; margin-top: 20px;">Berufserfahrung</h3>
                            <p style="white-space: pre-wrap;">[[professional_experience]]</p>
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px; margin-top: 20px;">Bildungsweg</h3>
                            <p style="white-space: pre-wrap;">[[education]]</p>
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px; margin-top: 20px;">Besondere Kenntnisse und Fähigkeiten</h3>
                            <p style="white-space: pre-wrap;">[[skills_languages]]</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift: _________________________</p></div>'
                    ],
                    'en' => [
                        'title' => 'Curriculum Vitae (Tabular)',
                        'description' => 'Classic tabular CV according to German standards. Ideal for job applications and official applications such as the EU Blue Card.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 20px; font-weight: bold;">Lebenslauf</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px;">Persönliche Daten</h3>
                            <p style="white-space: pre-wrap;">[[personal_data]]</p>
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px; margin-top: 20px;">Berufserfahrung</h3>
                            <p style="white-space: pre-wrap;">[[professional_experience]]</p>
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px; margin-top: 20px;">Bildungsweg</h3>
                            <p style="white-space: pre-wrap;">[[education]]</p>
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px; margin-top: 20px;">Besondere Kenntnisse und Fähigkeiten</h3>
                            <p style="white-space: pre-wrap;">[[skills_languages]]</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift: _________________________</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Życiorys (Tabelaryczny)',
                        'description' => 'Klasyczny, tabelaryczny życiorys zgodny z niemieckimi standardami. Idealny do aplikacji o pracę i oficjalnych wniosków takich jak Niebieska Karta UE.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 20px; font-weight: bold;">Lebenslauf</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px;">Persönliche Daten</h3>
                            <p style="white-space: pre-wrap;">[[personal_data]]</p>
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px; margin-top: 20px;">Berufserfahrung</h3>
                            <p style="white-space: pre-wrap;">[[professional_experience]]</p>
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px; margin-top: 20px;">Bildungsweg</h3>
                            <p style="white-space: pre-wrap;">[[education]]</p>
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px; margin-top: 20px;">Besondere Kenntnisse und Fähigkeiten</h3>
                            <p style="white-space: pre-wrap;">[[skills_languages]]</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift: _________________________</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Резюме (Табличне)',
                        'description' => 'Класичне табличне резюме за німецькими стандартами. Ідеально підходить для заяв про роботу та офіційних заяв, таких як Блакитна карта ЄС.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 20px; font-weight: bold;">Lebenslauf</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px;">Persönliche Daten</h3>
                            <p style="white-space: pre-wrap;">[[personal_data]]</p>
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px; margin-top: 20px;">Berufserfahrung</h3>
                            <p style="white-space: pre-wrap;">[[professional_experience]]</p>
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px; margin-top: 20px;">Bildungsweg</h3>
                            <p style="white-space: pre-wrap;">[[education]]</p>
                            <h3 style="font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 5px; margin-top: 20px;">Besondere Kenntnisse und Fähigkeiten</h3>
                            <p style="white-space: pre-wrap;">[[skills_languages]]</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift: _________________________</p></div>'
                    ]
                ]
            ],

            // 4. Трудовой договор (бессрочный)
            [
                'category_id' => $catWork->id,
                'slug' => 'de-unlimited-employment-contract-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"employer_details","type":"textarea","required":true,"labels":{"de":"Arbeitgeber (Name, Anschrift)","en":"Employer (Name, Address)","pl":"Pracodawca (Nazwa, adres)","uk":"Роботодавець (Назва, адреса)"}},
                    {"name":"employee_details","type":"textarea","required":true,"labels":{"de":"Arbeitnehmer (Name, Anschrift)","en":"Employee (Name, Address)","pl":"Pracownik (Imię i nazwisko, adres)","uk":"Працівник (Ім\'я, адреса)"}},
                    {"name":"start_date","type":"date","required":true,"labels":{"de":"Beginn des Arbeitsverhältnisses","en":"Start date of employment","pl":"Data rozpoczęcia zatrudnienia","uk":"Дата початку роботи"}},
                    {"name":"job_description","type":"textarea","required":true,"labels":{"de":"Tätigkeitsbeschreibung","en":"Job description","pl":"Opis stanowiska","uk":"Опис посади"}},
                    {"name":"work_place","type":"text","required":true,"labels":{"de":"Arbeitsort","en":"Place of work","pl":"Miejsce pracy","uk":"Місце роботи"}},
                    {"name":"working_hours","type":"text","required":true,"labels":{"de":"Wöchentliche Arbeitszeit","en":"Weekly working hours","pl":"Tygodniowy czas pracy","uk":"Тижневий робочий час"}},
                    {"name":"annual_salary_gross","type":"number","required":true,"labels":{"de":"Bruttojahresgehalt (€)","en":"Annual gross salary (€)","pl":"Roczne wynagrodzenie brutto (€)","uk":"Річна заробітна плата брутто (€)"}},
                    {"name":"vacation_days","type":"number","required":true,"labels":{"de":"Urlaubsanspruch (Arbeitstage pro Jahr)","en":"Vacation entitlement (working days per year)","pl":"Wymiar urlopu (dni robocze w roku)","uk":"Право на відпустку (робочих днів на рік)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Arbeitsvertrag (unbefristet)',
                        'description' => 'Ein Standard-Arbeitsvertrag für ein unbefristetes Arbeitsverhältnis. Erforderlich für den Antrag auf eine Blaue Karte EU.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">ARBEITSVERTRAG</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <p>Zwischen</p>
                            <p><strong>- dem Arbeitgeber -</strong><br>[[employer_details]]</p>
                            <p>und</p>
                            <p><strong>- dem Arbeitnehmer -</strong><br>[[employee_details]]</p>
                            <p>wird folgender Arbeitsvertrag geschlossen:</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 1 Beginn und Art des Arbeitsverhältnisses</h3>
                            <p>1. Das Arbeitsverhältnis beginnt am <strong>[[start_date]]</strong>.</p>
                            <p>2. Das Arbeitsverhältnis wird auf unbestimmte Zeit geschlossen.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 2 Tätigkeit und Arbeitsort</h3>
                            <p>1. Der Arbeitnehmer wird als <strong>[[job_description]]</strong> eingestellt.</p>
                            <p>2. Der Arbeitsort ist <strong>[[work_place]]</strong>.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 3 Arbeitszeit und Vergütung</h3>
                            <p>1. Die regelmäßige wöchentliche Arbeitszeit beträgt <strong>[[working_hours]]</strong> Stunden.</p>
                            <p>2. Der Arbeitnehmer erhält ein Bruttojahresgehalt in Höhe von <strong>[[annual_salary_gross]] €</strong>.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 4 Urlaub</h3>
                            <p>Der Arbeitnehmer hat Anspruch auf einen jährlichen Erholungsurlaub von <strong>[[vacation_days]]</strong> Arbeitstagen.</p>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; display: flex; justify-content: space-between;">
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Arbeitgeber)</strong></p></div>
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Arbeitnehmer)</strong></p></div>
                        </div>'
                    ],
                    'en' => [
                        'title' => 'Employment Contract (Permanent)',
                        'description' => 'A standard employment contract for permanent employment. Required for the EU Blue Card application.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">ARBEITSVERTRAG</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <p>Zwischen</p>
                            <p><strong>- dem Arbeitgeber -</strong><br>[[employer_details]]</p>
                            <p>und</p>
                            <p><strong>- dem Arbeitnehmer -</strong><br>[[employee_details]]</p>
                            <p>wird folgender Arbeitsvertrag geschlossen:</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 1 Beginn und Art des Arbeitsverhältnisses</h3>
                            <p>1. Das Arbeitsverhältnis beginnt am <strong>[[start_date]]</strong>.</p>
                            <p>2. Das Arbeitsverhältnis wird auf unbestimmte Zeit geschlossen.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 2 Tätigkeit und Arbeitsort</h3>
                            <p>1. Der Arbeitnehmer wird als <strong>[[job_description]]</strong> eingestellt.</p>
                            <p>2. Der Arbeitsort ist <strong>[[work_place]]</strong>.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 3 Arbeitszeit und Vergütung</h3>
                            <p>1. Die regelmäßige wöchentliche Arbeitszeit beträgt <strong>[[working_hours]]</strong> Stunden.</p>
                            <p>2. Der Arbeitnehmer erhält ein Bruttojahresgehalt in Höhe von <strong>[[annual_salary_gross]] €</strong>.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 4 Urlaub</h3>
                            <p>Der Arbeitnehmer hat Anspruch auf einen jährlichen Erholungsurlaub von <strong>[[vacation_days]]</strong> Arbeitstagen.</p>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; display: flex; justify-content: space-between;">
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Arbeitgeber)</strong></p></div>
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Arbeitnehmer)</strong></p></div>
                        </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o pracę (na czas nieokreślony)',
                        'description' => 'Standardowa umowa o pracę na czas nieokreślony. Wymagana do wniosku o Niebieską Kartę UE.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">ARBEITSVERTRAG</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <p>Zwischen</p>
                            <p><strong>- dem Arbeitgeber -</strong><br>[[employer_details]]</p>
                            <p>und</p>
                            <p><strong>- dem Arbeitnehmer -</strong><br>[[employee_details]]</p>
                            <p>wird folgender Arbeitsvertrag geschlossen:</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 1 Beginn und Art des Arbeitsverhältnisses</h3>
                            <p>1. Das Arbeitsverhältnis beginnt am <strong>[[start_date]]</strong>.</p>
                            <p>2. Das Arbeitsverhältnis wird auf unbestimmte Zeit geschlossen.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 2 Tätigkeit und Arbeitsort</h3>
                            <p>1. Der Arbeitnehmer wird als <strong>[[job_description]]</strong> eingestellt.</p>
                            <p>2. Der Arbeitsort ist <strong>[[work_place]]</strong>.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 3 Arbeitszeit und Vergütung</h3>
                            <p>1. Die regelmäßige wöchentliche Arbeitszeit beträgt <strong>[[working_hours]]</strong> Stunden.</p>
                            <p>2. Der Arbeitnehmer erhält ein Bruttojahresgehalt in Höhe von <strong>[[annual_salary_gross]] €</strong>.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 4 Urlaub</h3>
                            <p>Der Arbeitnehmer hat Anspruch auf einen jährlichen Erholungsurlaub von <strong>[[vacation_days]]</strong> Arbeitstagen.</p>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; display: flex; justify-content: space-between;">
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Arbeitgeber)</strong></p></div>
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Arbeitnehmer)</strong></p></div>
                        </div>'
                    ],
                    'uk' => [
                        'title' => 'Трудовий договір (безстроковий)',
                        'description' => 'Стандартний трудовий договір для безстрокового працевлаштування. Необхідний для заяви на Блакитну карту ЄС.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">ARBEITSVERTRAG</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <p>Zwischen</p>
                            <p><strong>- dem Arbeitgeber -</strong><br>[[employer_details]]</p>
                            <p>und</p>
                            <p><strong>- dem Arbeitnehmer -</strong><br>[[employee_details]]</p>
                            <p>wird folgender Arbeitsvertrag geschlossen:</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 1 Beginn und Art des Arbeitsverhältnisses</h3>
                            <p>1. Das Arbeitsverhältnis beginnt am <strong>[[start_date]]</strong>.</p>
                            <p>2. Das Arbeitsverhältnis wird auf unbestimmte Zeit geschlossen.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 2 Tätigkeit und Arbeitsort</h3>
                            <p>1. Der Arbeitnehmer wird als <strong>[[job_description]]</strong> eingestellt.</p>
                            <p>2. Der Arbeitsort ist <strong>[[work_place]]</strong>.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 3 Arbeitszeit und Vergütung</h3>
                            <p>1. Die regelmäßige wöchentliche Arbeitszeit beträgt <strong>[[working_hours]]</strong> Stunden.</p>
                            <p>2. Der Arbeitnehmer erhält ein Bruttojahresgehalt in Höhe von <strong>[[annual_salary_gross]] €</strong>.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 4 Urlaub</h3>
                            <p>Der Arbeitnehmer hat Anspruch auf einen jährlichen Erholungsurlaub von <strong>[[vacation_days]]</strong> Arbeitstagen.</p>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; display: flex; justify-content: space-between;">
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Arbeitgeber)</strong></p></div>
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Arbeitnehmer)</strong></p></div>
                        </div>'
                    ]
                ]
            ]
        ];

        foreach ($templatesData as $templateData) {
            $this->createTemplate($catWork->id, $templateData);
        }
    }

    private function createTemplate(int $categoryId, array $data): void
    {
        // Эта функция должна быть адаптирована к вашей структуре модели
        $template = Template::updateOrCreate(
            ['slug' => $data['slug']],
            [
                'category_id' => $categoryId,
                'is_active' => $data['is_active'] ?? true,
                'access_level' => $data['access_level'],
                'country_code' => 'DE',
                'fields' => is_string($data['fields']) ? json_decode($data['fields'], true) : $data['fields'],
            ]
        );

        if (isset($data['translations']) && is_array($data['translations'])) {
            foreach ($data['translations'] as $locale => $transData) {
                $template->translations()->updateOrCreate(['locale' => $locale], $transData);
            }
        }
    }
}
