<?php

namespace Database\Seeders\DE;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class DeLegalDocumentsSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'legal-claims-de')->first();
        if (!$category) {
            $this->command->error('Category with slug "legal-claims-de" not found.');
            return;
        }


        $templatesData = [


            [
                'slug' => 'claim-debt-recovery-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"claimant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko powoda","en":"Claimant\'s Full Name","uk":"ПІБ позивача","de":"Vollständiger Name des Klägers"}},
                    {"name":"claimant_address","type":"text","required":true,"labels":{"pl":"Adres powoda","en":"Claimant\'s Address","uk":"Адреса позивача","de":"Adresse des Klägers"}},
                    {"name":"defendant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pozwanego","en":"Defendant\'s Full Name","uk":"ПІБ відповідача","de":"Vollständiger Name des Beklagten"}},
                    {"name":"defendant_address","type":"text","required":true,"labels":{"pl":"Adres pozwanego","en":"Defendant\'s Address","uk":"Адреса відповідача","de":"Adresse des Beklagten"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa sądu (np. Sąd Rejonowy)","en":"Court Name (e.g., District Court)","uk":"Назва суду (напр., Районний суд)","de":"Name des Gerichts (z.B. Amtsgericht)"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres sądu","en":"Court Address","uk":"Адреса суду","de":"Adresse des Gerichts"}},
                    {"name":"debt_amount","type":"number","required":true,"labels":{"pl":"Kwota długu","en":"Debt Amount","uk":"Сума боргу","de":"Schuldsumme"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"debt_reason_details","type":"textarea","required":true,"labels":{"pl":"Szczegółowe uzasadnienie roszczenia (np. numer i data umowy pożyczki, termin spłaty)","en":"Detailed justification of the claim (e.g., loan agreement number and date, repayment date)","uk":"Детальне обґрунтування позову (напр., номер та дата договору позики, термін погашення)","de":"Detaillierte Begründung der Forderung (z.B. Darlehensvertragsnummer und -datum, Rückzahlungsdatum)"}},
                    {"name":"requested_action","type":"textarea","required":true,"labels":{"pl":"Żądanie (np. zasądzenie kwoty z odsetkami)","en":"Demand (e.g., judgment for amount with interest)","uk":"Вимога (напр., стягнення суми з відсотками)","de":"Forderung (z.B. Verurteilung zur Zahlung des Betrags mit Zinsen)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (np. kopia pokwitowania, wezwania do zapłaty)","en":"Attachments (e.g., copy of receipt, payment reminders)","uk":"Додатки (напр., копія розписки, вимоги про оплату)","de":"Anhänge (z.B. Kopie des Schuldscheins, Mahnungen)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Klage auf Zahlung (Forderung aus Schuldschein)',
                        'description' => 'Muster einer Klageschrift zur Geltendmachung einer Geldforderung vor Gericht in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KLAGE AUF ZAHLUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Kläger: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An das:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Beklagter: <strong>[[defendant_full_name]]</strong><br>[[defendant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Klagegegenstand</h2>
                                <p>Der Kläger macht gegen den Beklagten eine Forderung in Höhe von <strong>[[debt_amount]] [[currency]]</strong> geltend.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Begründung der Klage</h2>
                                <p>[[debt_reason_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Antrag</h2>
                                <p>Es wird beantragt, [[requested_action]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Anlagen</h2>
                                <p>[[attachments]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Kläger</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Statement of Claim for Payment (Debt Recovery)',
                        'description' => 'Sample statement of claim for asserting a monetary claim in court in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STATEMENT OF CLAIM FOR PAYMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Claimant: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To the:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Defendant: <strong>[[defendant_full_name]]</strong><br>[[defendant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Subject of the Claim</h2>
                                <p>The claimant asserts a claim against the defendant in the amount of <strong>[[debt_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Justification of the Claim</h2>
                                <p>[[debt_reason_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Motion</h2>
                                <p>It is requested that [[requested_action]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Attachments</h2>
                                <p>[[attachments]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Claimant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Позовна заява про стягнення боргу (за розпискою)',
                        'description' => 'Зразок позовної заяви про стягнення грошової вимоги в суді Німеччини.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОЗОВНА ЗАЯВА ПРО СТЯГНЕННЯ БОРГУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Позивач: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Відповідач: <strong>[[defendant_full_name]]</strong><br>[[defendant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Предмет позову</h2>
                                <p>Позивач заявляє вимогу до відповідача на суму <strong>[[debt_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Обґрунтування позову</h2>
                                <p>[[debt_reason_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Клопотання</h2>
                                <p>Просимо: [[requested_action]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Додатки</h2>
                                <p>[[attachments]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Позивач</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Pozew o zapłatę (z tytułu długu z pokwitowania)',
                        'description' => 'Wzór pozwu o dochodzenie roszczenia pieniężnego przed sądem w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POZEW O ZAPŁATĘ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Powód: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Pozwany: <strong>[[defendant_full_name]]</strong><br>[[defendant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Przedmiot pozwu</h2>
                                <p>Powód dochodzi od pozwanego roszczenia w wysokości <strong>[[debt_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Uzasadnienie pozwu</h2>
                                <p>[[debt_reason_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Wniosek</h2>
                                <p>Wnosi się o: [[requested_action]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Załączniki</h2>
                                <p>[[attachments]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Powód</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Исковое заявление о расторжении брака / Statement of Claim for Divorce (Scheidungsklage) ---
            [
                'slug' => 'divorce-claim-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy","en":"Applicant Address","uk":"Адреса заявника","de":"Adresse des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia wnioskodawcy","en":"Applicant Date of Birth","uk":"Дата народження заявника","de":"Geburtsdatum des Antragstellers"}},
                    {"name":"spouse_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko małżonka","en":"Spouse Full Name","uk":"ПІБ чоловіка/дружини","de":"Vollständiger Name des Ehepartners"}},
                    {"name":"spouse_address","type":"text","required":true,"labels":{"pl":"Adres małżonka","en":"Spouse Address","uk":"Адреса чоловіка/дружини","de":"Adresse des Ehepartners"}},
                    {"name":"spouse_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia małżonka","en":"Spouse Date of Birth","uk":"Дата народження чоловіка/дружини","de":"Geburtsdatum des Ehepartners"}},
                    {"name":"marriage_date","type":"date","required":true,"labels":{"pl":"Data zawarcia małżeństwa","en":"Marriage Date","uk":"Дата укладення шлюбу","de":"Datum der Eheschließung"}},
                    {"name":"marriage_place","type":"text","required":true,"labels":{"pl":"Miejsce zawarcia małżeństwa","en":"Marriage Place","uk":"Місце укладення шлюбу","de":"Ort der Eheschließung"}},
                    {"name":"separation_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia separacji","en":"Separation Start Date","uk":"Дата початку розлучення","de":"Beginn der Trennung"}},
                    {"name":"children_details","type":"textarea","required":false,"labels":{"pl":"Dane dzieci (imię, nazwisko, data urodzenia, ustalenia dot. opieki/alimentów)","en":"Children details (name, DOB, custody/alimony arrangements)","uk":"Дані дітей (ім\'я, прізвище, дата народження, домовленості щодо опіки/аліментів)","de":"Details zu Kindern (Name, Geburtsdatum, Sorgerechts-/Unterhaltsregelungen)"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa sądu rodzinnego (Familiengericht)","en":"Family Court Name (Familiengericht)","uk":"Назва сімейного суду (Familiengericht)","de":"Name des Familiengerichts"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres sądu","en":"Court Address","uk":"Адреса суду","de":"Adresse des Gerichts"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Scheidungsklage',
                        'description' => 'Muster einer Klageschrift zur Einleitung eines Scheidungsverfahrens vor dem Familiengericht in Deutschland. Erfordert Anwaltszwang.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SCHEIDUNGSKLAGE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Antragsteller: <strong>[[applicant_full_name]]</strong><br>Geb. am: [[applicant_dob]]<br>Adresse: [[applicant_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An das:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Gegen:<br>Ehepartner: <strong>[[spouse_full_name]]</strong><br>Geb. am: [[spouse_dob]]<br>Adresse: [[spouse_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Sachverhalt</h2>
                                <p>Die Ehe zwischen dem Antragsteller und dem Ehepartner wurde am <strong>[[marriage_date]]</strong> in <strong>[[marriage_place]]</strong> geschlossen.</p>
                                <p>Die Eheleute leben seit dem <strong>[[separation_start_date]]</strong> getrennt.</p>
                                <p>Details zu gemeinsamen Kindern (falls zutreffend): [[children_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Antrag</h2>
                                <p>Es wird beantragt, die Ehe der Parteien zu scheiden.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Begründung</h2>
                                <p>Die Ehe ist gescheitert. Die Wiederherstellung einer ehelichen Lebensgemeinschaft ist nicht zu erwarten.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Antragsteller (durch Rechtsanwalt)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Statement of Claim for Divorce',
                        'description' => 'Sample statement of claim for initiating divorce proceedings before the Family Court in Germany. Requires mandatory legal representation.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STATEMENT OF CLAIM FOR DIVORCE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Applicant: <strong>[[applicant_full_name]]</strong><br>DOB: [[applicant_dob]]<br>Address: [[applicant_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To the:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Against:<br>Spouse: <strong>[[spouse_full_name]]</strong><br>DOB: [[spouse_dob]]<br>Address: [[spouse_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Facts of the Case</h2>
                                <p>The marriage between the applicant and the spouse was concluded on <strong>[[marriage_date]]</strong> in <strong>[[marriage_place]]</strong>.</p>
                                <p>The spouses have been living separately since <strong>[[separation_start_date]]</strong>.</p>
                                <p>Details of common children (if applicable): [[children_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Motion</h2>
                                <p>It is requested that the marriage of the parties be dissolved.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Justification</h2>
                                <p>The marriage has irretrievably broken down. A restoration of marital cohabitation is not to be expected.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Applicant (by lawyer)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Позовна заява про розірвання шлюбу',
                        'description' => 'Зразок позовної заяви для початку процедури розлучення в Сімейному суді Німеччини. Вимагає обов\'язкового представництва адвокатом.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОЗОВНА ЗАЯВА ПРО РОЗІРВАННЯ ШЛЮБУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Заявник: <strong>[[applicant_full_name]]</strong><br>Дата народження: [[applicant_dob]]<br>Адреса: [[applicant_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Проти:<br>Чоловіка/Дружини: <strong>[[spouse_full_name]]</strong><br>Дата народження: [[spouse_dob]]<br>Адреса: [[spouse_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Обставини справи</h2>
                                <p>Шлюб між заявником та чоловіком/дружиною був укладений <strong>[[marriage_date]]</strong> у <strong>[[marriage_place]]</strong>.</p>
                                <p>Подружжя проживає окремо з <strong>[[separation_start_date]]</strong>.</p>
                                <p>Деталі спільних дітей (якщо застосовно): [[children_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Клопотання</h2>
                                <p>Просимо розірвати шлюб сторін.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Обґрунтування</h2>
                                <p>Шлюб розпався. Відновлення подружнього життя не очікується.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Заявник (через адвоката)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Pozew o rozwód',
                        'description' => 'Wzór pozwu o wszczęcie postępowania rozwodowego przed Sądem Rodzinnym w Niemczech. Wymaga obowiązkowego reprezentowania przez adwokata.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POZEW O ROZWÓD</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wnioskodawca: <strong>[[applicant_full_name]]</strong><br>Data ur.: [[applicant_dob]]<br>Adres: [[applicant_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Przeciwko:<br>Małżonek: <strong>[[spouse_full_name]]</strong><br>Data ur.: [[spouse_dob]]<br>Adres: [[spouse_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Stan faktyczny</h2>
                                <p>Małżeństwo pomiędzy wnioskodawcą a małżonkiem zostało zawarte w dniu <strong>[[marriage_date]]</strong> w <strong>[[marriage_place]]</strong>.</p>
                                <p>Małżonkowie żyją w separacji od dnia <strong>[[separation_start_date]]</strong>.</p>
                                <p>Dane dotyczące wspólnych dzieci (jeśli dotyczy): [[children_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Wniosek</h2>
                                <p>Wnosi się o orzeczenie rozwodu stron.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Uzasadnienie</h2>
                                <p>Małżeństwo rozpadło się. Przywrócenie wspólnego pożycia małżeńskiego nie jest spodziewane.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wnioskodawca (przez adwokata)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Исковое заявление о взыскании алиментов / Statement of Claim for Alimony Recovery (Unterhaltsklage) ---
            [
                'slug' => 'alimony-claim-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"claimant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko powoda","en":"Claimant\'s Full Name","uk":"ПІБ позивача","de":"Vollständiger Name des Klägers"}},
                    {"name":"claimant_address","type":"text","required":true,"labels":{"pl":"Adres powoda","en":"Claimant\'s Address","uk":"Адреса позивача","de":"Adresse des Klägers"}},
                    {"name":"defendant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pozwanego (zobowiązanego do alimentów)","en":"Defendant\'s Full Name (obligated to pay alimony)","uk":"ПІБ відповідача (зобов\'язаного сплачувати аліменти)","de":"Vollständiger Name des Beklagten (Unterhaltspflichtiger)"}},
                    {"name":"defendant_address","type":"text","required":true,"labels":{"pl":"Adres pozwanego","en":"Defendant\'s Address","uk":"Адреса відповідача","de":"Adresse des Beklagten"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka/dzieci (jeśli dotyczy)","en":"Child\'s/Children\'s Full Name (if applicable)","uk":"ПІБ дитини/дітей (якщо застосовно)","de":"Vollständiger Name des Kindes/der Kinder (falls zutreffend)"}},
                    {"name":"alimony_period_from","type":"date","required":true,"labels":{"pl":"Okres, za który żądane są alimenty (od)","en":"Period for which alimony is claimed (from)","uk":"Період, за який вимагаються аліменти (від)","de":"Zeitraum, für den Unterhalt gefordert wird (von)"}},
                    {"name":"alimony_period_to","type":"date","required":true,"labels":{"pl":"Okres, za który żądane są alimenty (do)","en":"Period for which alimony is claimed (to)","uk":"Період, за який вимагаються аліменти (до)","de":"Zeitraum, für den Unterhalt gefordert wird (bis)"}},
                    {"name":"monthly_alimony_amount","type":"number","required":true,"labels":{"pl":"Żądana kwota alimentów miesięcznie (PLN)","en":"Requested monthly alimony amount (PLN)","uk":"Затребувана сума аліментів щомісячно (PLN)","de":"Geforderter monatlicher Unterhaltsbetrag (PLN)"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"alimony_justification","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie roszczenia alimentacyjnego (potrzeby dziecka/powoda, dochody stron)","en":"Justification of alimony claim (needs of child/claimant, parties\' income)","uk":"Обґрунтування вимоги про аліменти (потреби дитини/позивача, доходи сторін)","de":"Begründung der Unterhaltsforderung (Bedürfnisse des Kindes/Klägers, Einkommen der Parteien)"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa sądu rodzinnego (Familiengericht)","en":"Family Court Name (Familiengericht)","uk":"Назва сімейного суду (Familiengericht)","de":"Name des Familiengerichts"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres sądu","en":"Court Address","uk":"Адреса суду","de":"Adresse des Gerichts"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Unterhaltsklage',
                        'description' => 'Muster einer Klageschrift zur Geltendmachung von Unterhaltsansprüchen vor dem Familiengericht in Deutschland. Erfordert Anwaltszwang.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UNTERHALTSKLAGE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Kläger: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An das:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Beklagter: <strong>[[defendant_full_name]]</strong><br>[[defendant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Klagegegenstand</h2>
                                <p>Der Kläger macht gegen den Beklagten Unterhaltsansprüche für [[child_full_name]] (falls zutreffend) für den Zeitraum von <strong>[[alimony_period_from]]</strong> bis <strong>[[alimony_period_to]]</strong> geltend.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Begründung der Klage</h2>
                                <p>[[alimony_justification]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Antrag</h2>
                                <p>Es wird beantragt, den Beklagten zur Zahlung von monatlichem Unterhalt in Höhe von <strong>[[monthly_alimony_amount]] [[currency]]</strong> zu verurteilen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Kläger (durch Rechtsanwalt)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Statement of Claim for Alimony Recovery',
                        'description' => 'Sample statement of claim for asserting alimony claims before the Family Court in Germany. Requires mandatory legal representation.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STATEMENT OF CLAIM FOR ALIMONY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Claimant: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To the:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Defendant: <strong>[[defendant_full_name]]</strong><br>[[defendant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Subject of the Claim</h2>
                                <p>The claimant asserts alimony claims against the defendant for [[child_full_name]] (if applicable) for the period from <strong>[[alimony_period_from]]</strong> to <strong>[[alimony_period_to]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Justification of the Claim</h2>
                                <p>[[alimony_justification]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Motion</h2>
                                <p>It is requested that the defendant be ordered to pay monthly alimony in the amount of <strong>[[monthly_alimony_amount]] [[currency]]</strong>.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Claimant (by lawyer)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Позовна заява про стягнення аліментів',
                        'description' => 'Зразок позовної заяви про стягнення аліментів у Сімейному суді Німеччини. Вимагає обов\'язкового представництва адвокатом.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОЗОВНА ЗАЯВА ПРО СТЯГНЕННЯ АЛІМЕНТІВ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Позивач: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Відповідач: <strong>[[defendant_full_name]]</strong><br>[[defendant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Предмет позову</h2>
                                <p>Позивач заявляє вимоги про стягнення аліментів з відповідача на користь [[child_full_name]] (якщо застосовно) за період з <strong>[[alimony_period_from]]</strong> по <strong>[[alimony_period_to]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Обґрунтування позову</h2>
                                <p>[[alimony_justification]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Клопотання</h2>
                                <p>Просимо зобов\'язати відповідача сплачувати щомісячні аліменти в сумі <strong>[[monthly_alimony_amount]] [[currency]]</strong>.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Позивач (через адвоката)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"> </div>'
                    ],
                    'pl' => [
                        'title' => 'Pozew o alimenty',
                        'description' => 'Wzór pozwu o dochodzenie roszczeń alimentacyjnych przed Sądem Rodzinnym w Niemczech. Wymaga obowiązkowego reprezentowania przez adwokata.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POZEW O ALIMENTY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Powód: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Pozwany: <strong>[[defendant_full_name]]</strong><br>[[defendant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Przedmiot pozwu</h2>
                                <p>Powód dochodzi od pozwanego roszczeń alimentacyjnych na rzecz [[child_full_name]] (jeśli dotyczy) za okres od <strong>[[alimony_period_from]]</strong> do <strong>[[alimony_period_to]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Uzasadnienie pozwu</h2>
                                <p>[[alimony_justification]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Wniosek</h2>
                                <p>Wnosi się o zasądzenie od pozwanego miesięcznych alimentów w wysokości <strong>[[monthly_alimony_amount]] [[currency]]</strong>.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Powód (przez adwokata)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Исковое заявление о возмещении ущерба при ДТП / Statement of Claim for Damages in a Car Accident (Schadensersatzklage nach Verkehrsunfall) ---
            [
                'slug' => 'damages-car-accident-claim-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"claimant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko powoda","en":"Claimant\'s Full Name","uk":"ПІБ позивача","de":"Vollständiger Name des Klägers"}},
                    {"name":"claimant_address","type":"text","required":true,"labels":{"pl":"Adres powoda","en":"Claimant\'s Address","uk":"Адреса позивача","de":"Adresse des Klägers"}},
                    {"name":"defendant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pozwanego","en":"Defendant\'s Full Name","uk":"ПІБ відповідача","de":"Vollständiger Name des Beklagten"}},
                    {"name":"defendant_address","type":"text","required":true,"labels":{"pl":"Adres pozwanego","en":"Defendant\'s Address","uk":"Адреса відповідача","de":"Adresse des Beklagten"}},
                    {"name":"accident_date","type":"date","required":true,"labels":{"pl":"Data wypadku","en":"Accident Date","uk":"Дата ДТП","de":"Unfalldatum"}},
                    {"name":"accident_location","type":"text","required":true,"labels":{"pl":"Miejsce wypadku","en":"Accident Location","uk":"Місце ДТП","de":"Unfallort"}},
                    {"name":"accident_description","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis przebiegu wypadku","en":"Detailed description of the accident","uk":"Детальний опис перебігу ДТП","de":"Detaillierte Beschreibung des Unfallhergangs"}},
                    {"name":"damage_description","type":"textarea","required":true,"labels":{"pl":"Opis powstałych szkód (pojazd, obrażenia, inne)","en":"Description of damages incurred (vehicle, injuries, other)","uk":"Опис завданих збитків (транспортний засіб, травми, інше)","de":"Beschreibung der entstandenen Schäden (Fahrzeug, Verletzungen, Sonstiges)"}},
                    {"name":"requested_compensation_amount","type":"number","required":true,"labels":{"pl":"Żądana kwota odszkodowania (PLN)","en":"Requested compensation amount (PLN)","uk":"Затребувана сума відшкодування (PLN)","de":"Geforderter Entschädigungsbetrag (PLN)"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa sądu (np. Sąd Rejonowy)","en":"Court Name (e.g., District Court)","uk":"Назва суду (напр., Районний суд)","de":"Name des Gerichts (z.B. Amtsgericht)"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres sądu","en":"Court Address","uk":"Адреса суду","de":"Adresse des Gerichts"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (np. protokół policji, zdjęcia, kosztorys naprawy, zaświadczenia lekarskie)","en":"Attachments (e.g., police report, photos, repair estimate, medical certificates)","uk":"Додатки (напр., протокол поліції, фото, кошторис ремонту, медичні довідки)","de":"Anhänge (z.B. Polizeibericht, Fotos, Reparaturkostenvoranschlag, ärztliche Atteste)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Schadensersatzklage nach Verkehrsunfall',
                        'description' => 'Muster einer Klageschrift zur Geltendmachung von Schadensersatzansprüchen nach einem Verkehrsunfall vor Gericht in Deutschland. Erfordert Anwaltszwang.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SCHADENSERSATZKLAGE NACH VERKEHRSUNFALL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Kläger: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An das:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Beklagter: <strong>[[defendant_full_name]]</strong><br>[[defendant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Sachverhalt</h2>
                                <p>Am <strong>[[accident_date]]</strong> ereignete sich in <strong>[[accident_location]]</strong> ein Verkehrsunfall.</p>
                                <p>Unfallhergang: [[accident_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Entstandener Schaden</h2>
                                <p>Durch den Unfall sind folgende Schäden entstanden: [[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Antrag</h2>
                                <p>Es wird beantragt, den Beklagten zur Zahlung von Schadensersatz in Höhe von <strong>[[requested_compensation_amount]] [[currency]]</strong> zu verurteilen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Anlagen</h2>
                                <p>[[attachments]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Kläger (durch Rechtsanwalt)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Statement of Claim for Damages in a Car Accident',
                        'description' => 'Sample statement of claim for asserting damages after a car accident in court in Germany. Requires mandatory legal representation.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STATEMENT OF CLAIM FOR DAMAGES AFTER CAR ACCIDENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Claimant: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To the:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Defendant: <strong>[[defendant_full_name]]</strong><br>[[defendant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Facts of the Case</h2>
                                <p>On <strong>[[accident_date]]</strong>, a car accident occurred in <strong>[[accident_location]]</strong>.</p>
                                <p>Accident circumstances: [[accident_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Damages Incurred</h2>
                                <p>The following damages were incurred due to the accident: [[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Motion</h2>
                                <p>It is requested that the defendant be ordered to pay damages in the amount of <strong>[[requested_compensation_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Attachments</h2>
                                <p>[[attachments]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Claimant (by lawyer)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Позовна заява про відшкодування шкоди при ДТП',
                        'description' => 'Зразок позовної заяви про відшкодування шкоди після ДТП в суді Німеччини. Вимагає обов\'язкового представництва адвокатом.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОЗОВНА ЗАЯВА ПРО ВІДШКОДУВАННЯ ШКОДИ ПРИ ДТП</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Позивач: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Відповідач: <strong>[[defendant_full_name]]</strong><br>[[defendant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Обставини справи</h2>
                                <p><strong>[[accident_date]]</strong> у <strong>[[accident_location]]</strong> сталася дорожньо-транспортна пригода.</p>
                                <p>Перебіг ДТП: [[accident_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Завдана шкода</h2>
                                <p>Внаслідок ДТП були завдані наступні збитки: [[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Клопотання</h2>
                                <p>Просимо зобов\'язати відповідача сплатити відшкодування шкоди в сумі <strong>[[requested_compensation_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Додатки</h2>
                                <p>[[attachments]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Позивач (через адвоката)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Pozew o odszkodowanie po wypadku drogowym',
                        'description' => 'Wzór pozwu o dochodzenie roszczeń odszkodowawczych po wypadku drogowym przed sądem w Niemczech. Wymaga obowiązkowego reprezentowania przez adwokata.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POZEW O ODSZKODOWANIE PO WYPADKU DROGOWYM</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Powód: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Pozwany: <strong>[[defendant_full_name]]</strong><br>[[defendant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Stan faktyczny</h2>
                                <p>W dniu <strong>[[accident_date]]</strong> w <strong>[[accident_location]]</strong> doszło do wypadku drogowego.</p>
                                <p>Przebieg wypadku: [[accident_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Powstała szkoda</h2>
                                <p>W wyniku wypadku powstały następujące szkody: [[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Wniosek</h2>
                                <p>Wnosi się o zasądzenie od pozwanego odszkodowania w wysokości <strong>[[requested_compensation_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Załączniki</h2>
                                <p>[[attachments]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Powód (przez adwokata)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Исковое заявление о защите прав потребителей / Statement of Claim for Consumer Protection (Verbraucherschutzklage) ---
            [
                'slug' => 'consumer-protection-claim-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"consumer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko konsumenta","en":"Consumer\'s Full Name","uk":"ПІБ споживача","de":"Vollständiger Name des Verbrauchers"}},
                    {"name":"consumer_address","type":"text","required":true,"labels":{"pl":"Adres konsumenta","en":"Consumer\'s Address","uk":"Адреса споживача","de":"Adresse des Verbrauchers"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy (sprzedawcy/usługodawcy)","en":"Company Name (seller/service provider)","uk":"Назва компанії (продавця/надавача послуг)","de":"Firmenname (Verkäufer/Dienstleister)"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Company Address","uk":"Адреса компанії","de":"Adresse des Unternehmens"}},
                    {"name":"product_service_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły produktu/usługi (nazwa, data zakupu/zawarcia umowy)","en":"Product/service details (name, purchase/contract date)","uk":"Деталі продукту/послуги (назва, дата покупки/укладення договору)","de":"Produktdetails/Dienstleistungsdetails (Name, Kauf-/Vertragsdatum)"}},
                    {"name":"issue_description","type":"textarea","required":true,"labels":{"pl":"Opis problemu/naruszenia praw konsumenta","en":"Description of the problem/violation of consumer rights","uk":"Опис проблеми/порушення прав споживача","de":"Beschreibung des Problems/der Verletzung von Verbraucherrechten"}},
                    {"name":"requested_action","type":"textarea","required":true,"labels":{"pl":"Żądane działania (np. zwrot pieniędzy, wymiana, naprawa)","en":"Requested action (e.g., refund, replacement, repair)","uk":"Затребувані дії (напр., повернення грошей, заміна, ремонт)","de":"Gewünschte Maßnahmen (z.B. Rückerstattung, Umtausch, Reparatur)"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa sądu (np. Sąd Rejonowy)","en":"Court Name (e.g., District Court)","uk":"Назва суду (напр., Районний суд)","de":"Name des Gerichts (z.B. Amtsgericht)"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres sądu","en":"Court Address","uk":"Адреса суду","de":"Adresse des Gerichts"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (np. dowód zakupu, korespondencja, zdjęcia)","en":"Attachments (e.g., proof of purchase, correspondence, photos)","uk":"Додатки (напр., доказ покупки, листування, фото)","de":"Anhänge (z.B. Kaufbeleg, Korrespondenz, Fotos)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Verbraucherschutzklage',
                        'description' => 'Muster einer Klageschrift zur Geltendmachung von Verbraucherrechten vor Gericht in Deutschland. Erfordert Anwaltszwang.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VERBRAUCHERSCHUTZKLAGE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Kläger: <strong>[[consumer_full_name]]</strong><br>[[consumer_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An das:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Beklagter: <strong>[[company_name]]</strong><br>[[company_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Sachverhalt</h2>
                                <p>Betreffend Produkt/Dienstleistung: [[product_service_details]]</p>
                                <p>Problem/Verletzung der Verbraucherrechte: [[issue_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Antrag</h2>
                                <p>Es wird beantragt, [[requested_action]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Anlagen</h2>
                                <p>[[attachments]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Kläger (durch Rechtsanwalt)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Statement of Claim for Consumer Protection',
                        'description' => 'Sample statement of claim for asserting consumer rights in court in Germany. Requires mandatory legal representation.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STATEMENT OF CLAIM FOR CONSUMER PROTECTION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Claimant: <strong>[[consumer_full_name]]</strong><br>[[consumer_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To the:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Defendant: <strong>[[company_name]]</strong><br>[[company_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Facts of the Case</h2>
                                <p>Concerning product/service: [[product_service_details]]</p>
                                <p>Problem/violation of consumer rights: [[issue_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Motion</h2>
                                <p>It is requested that [[requested_action]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Attachments</h2>
                                <p>[[attachments]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Claimant (by lawyer)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Позовна заява про захист прав споживачів',
                        'description' => 'Зразок позовної заяви про захист прав споживачів у суді Німеччини. Вимагає обов\'язкового представництва адвокатом.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОЗОВНА ЗАЯВА ПРО ЗАХИСТ ПРАВ СПОЖИВАЧІВ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Позивач: <strong>[[consumer_full_name]]</strong><br>[[consumer_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Відповідач: <strong>[[company_name]]</strong><br>[[company_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Обставини справи</h2>
                                <p>Щодо продукту/послуги: [[product_service_details]]</p>
                                <p>Проблема/порушення прав споживача: [[issue_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Клопотання</h2>
                                <p>Просимо: [[requested_action]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Додатки</h2>
                                <p>[[attachments]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Позивач (через адвоката)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Pozew o ochronę praw konsumenta',
                        'description' => 'Wzór pozwu o dochodzenie praw konsumenta przed sądem w Niemczech. Wymaga obowiązkowego reprezentowania przez adwokata.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POZEW O OCHRONĘ PRAW KONSUMENTA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Powód: <strong>[[consumer_full_name]]</strong><br>[[consumer_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                        <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                        <br/>
                                        <p>Pozwany: <strong>[[company_name]]</strong><br>[[company_address]]</p>
                                        <br/>
                                        <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Stan faktyczny</h2>
                                        <p>Dotyczy produktu/usługi: [[product_service_details]]</p>
                                        <p>Problem/naruszenie praw konsumenta: [[issue_description]]</p>
                                        <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Wniosek</h2>
                                        <p>Wnosi się o: [[requested_action]]</p>
                                        <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Załączniki</h2>
                                        <p>[[attachments]]</p>
                                        <br/>
                                        <p>Z poważaniem,</p>
                                    </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                        <table width="100%" style="text-align: center;"><tr>
                                        <td width="50%"><p>___________________<br>Powód (przez adwokata)</p></td>
                                        </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

// --- Генеральная доверенность / General Power of Attorney (Generalvollmacht) ---
            [
                'slug' => 'general-power-of-attorney-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"poa_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pełnomocnictwa","en":"POA Date","uk":"Дата видачі довіреності","de":"Datum der Vollmacht"}},
                    {"name":"principal_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko mocodawcy","en":"Principal\'s Full Name","uk":"ПІБ довірителя","de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"pl":"Adres mocodawcy","en":"Principal\'s Address","uk":"Адреса довірителя","de":"Adresse des Vollmachtgebers"}},
                    {"name":"principal_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia mocodawcy","en":"Principal\'s Date of Birth","uk":"Дата народження довірителя","de":"Geburtsdatum des Vollmachtgebers"}},
                    {"name":"agent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pełnomocnika","en":"Agent\'s Full Name","uk":"ПІБ повіреного","de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"agent_address","type":"text","required":true,"labels":{"pl":"Adres pełnomocnika","en":"Agent\'s Address","uk":"Адреса повіреного","de":"Adresse des Bevollmächtigten"}},
                    {"name":"agent_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia pełnomocnika","en":"Agent\'s Date of Birth","uk":"Дата народження повіреного","de":"Geburtsdatum des Bevollmächtigten"}},
                    {"name":"scope_of_authority_details","type":"textarea","required":true,"labels":{"pl":"Szczegółowy zakres pełnomocnictwa (np. wszystkie czynności prawne, bankowe, urzędowe)","en":"Detailed scope of authority (e.g., all legal, banking, official acts)","uk":"Детальний обсяг повноважень (напр., всі юридичні, банківські, офіційні дії)","de":"Detaillierter Umfang der Vollmacht (z.B. alle rechtlichen, bankbezogenen, behördlichen Handlungen)"}},
                    {"name":"validity_period","type":"text","required":false,"labels":{"pl":"Okres ważności pełnomocnictwa (opcjonalnie, np. bezterminowo)","en":"Validity period of power of attorney (optional, e.g., indefinitely)","uk":"Термін дії довіреності (необов\'язково, напр., безстроково)","de":"Gültigkeitsdauer der Vollmacht (optional, z.B. unbefristet)"}},
                    {"name":"notarization_note","type":"textarea","required":true,"labels":{"pl":"Uwaga o konieczności notarialnego poświadczenia dla niektórych czynności","en":"Note on the necessity of notarization for certain acts","uk":"Примітка про необхідність нотаріального посвідчення для певних дій","de":"Hinweis zur Notwendigkeit der notariellen Beurkundung für bestimmte Handlungen"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Generalvollmacht',
                        'description' => 'Umfassende Vollmacht, die den Bevollmächtigten zur Vornahme aller rechtlichen Handlungen im Namen des Vollmachtgebers ermächtigt. Für bestimmte Geschäfte ist eine notarielle Beurkundung erforderlich.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GENERALVOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vollmachtgeber: <strong>[[principal_full_name]]</strong><br>Geb. am: [[principal_dob]]<br>Adresse: [[principal_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Bevollmächtigter: <strong>[[agent_full_name]]</strong><br>Geb. am: [[agent_dob]]<br>Adresse: [[agent_address]]</p>
                                <br/>
                                <p>Hiermit erteile ich, [[principal_full_name]], Herrn/Frau <strong>[[agent_full_name]]</strong> Generalvollmacht, mich in allen Angelegenheiten umfassend zu vertreten.</p>
                                <p>Der Bevollmächtigte ist insbesondere berechtigt, folgende Handlungen vorzunehmen: [[scope_of_authority_details]]</p>
                                <p>Diese Vollmacht ist gültig [[validity_period]].</p>
                                <br/>
                                <p><strong>Wichtiger Hinweis:</strong> [[notarization_note]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vollmachtgeber</p></td>
                                <td width="50%"><p>___________________<br>Bevollmächtigter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'General Power of Attorney',
                        'description' => 'Comprehensive power of attorney authorizing the agent to perform all legal acts on behalf of the principal. Notarization is required for certain transactions.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GENERAL POWER OF ATTORNEY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Principal: <strong>[[principal_full_name]]</strong><br>DOB: [[principal_dob]]<br>Address: [[principal_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Agent: <strong>[[agent_full_name]]</strong><br>DOB: [[agent_dob]]<br>Address: [[agent_address]]</p>
                                <br/>
                                <p>I, [[principal_full_name]], hereby grant Mr./Ms. <strong>[[agent_full_name]]</strong> general power of attorney to represent me comprehensively in all matters.</p>
                                <p>The agent is particularly authorized to perform the following acts: [[scope_of_authority_details]]</p>
                                <p>This Power of Attorney is valid [[validity_period]].</p>
                                <br/>
                                <p><strong>Important Note:</strong> [[notarization_note]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Principal</p></td>
                                <td width="50%"><p>___________________<br>Agent</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Генеральна довіреність',
                        'description' => 'Комплексна довіреність, що уповноважує повіреного на вчинення всіх юридичних дій від імені довірителя. Для певних операцій необхідне нотаріальне посвідчення.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ГЕНЕРАЛЬНА ДОВІРЕНІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Довіритель: <strong>[[principal_full_name]]</strong><br>Дата народження: [[principal_dob]]<br>Адреса: [[principal_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Повірений: <strong>[[agent_full_name]]</strong><br>Дата народження: [[agent_dob]]<br>Адреса: [[agent_address]]</p>
                                <br/>
                                <p>Цим я, [[principal_full_name]], надаю Пану/Пані <strong>[[agent_full_name]]</strong> генеральну довіреність представляти мене у всіх справах.</p>
                                <p>Повірений, зокрема, уповноважений вчиняти такі дії: [[scope_of_authority_details]]</p>
                                <p>Ця довіреність дійсна [[validity_period]].</p>
                                <br/>
                                <p><strong>Важлива примітка:</strong> [[notarization_note]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Довіритель</p></td>
                                <td width="50%"><p>___________________<br>Повірений</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"> </div>'
                    ],
                    'pl' => [
                        'title' => 'Pełnomocnictwo ogólne',
                        'description' => 'Kompleksowe pełnomocnictwo upoważniające pełnomocnika do wykonywania wszelkich czynności prawnych w imieniu mocodawcy. W przypadku niektórych transakcji wymagane jest notarialne poświadczenie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO OGÓLNE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Mocodawca: <strong>[[principal_full_name]]</strong><br>Data ur.: [[principal_dob]]<br>Adres: [[principal_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Pełnomocnik: <strong>[[agent_full_name]]</strong><br>Data ur.: [[agent_dob]]<br>Adres: [[agent_address]]</p>
                                <br/>
                                <p>Niniejszym ja, [[principal_full_name]], udzielam Panu/Pani <strong>[[agent_full_name]]</strong> pełnomocnictwa ogólnego do reprezentowania mnie we wszystkich sprawach.</p>
                                <p>Pełnomocnik jest w szczególności uprawniony do wykonywania następujących czynności: [[scope_of_authority_details]]</p>
                                <p>Niniejsze pełnomocnictwo jest ważne [[validity_period]].</p>
                                <br/>
                                <p><strong>Ważna uwaga:</strong> [[notarization_note]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Mocodawca</p></td>
                                <td width="50%"><p>___________________<br>Pełnomocnik</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Доверенность на представление интересов в суде / Power of Attorney for Representation in Court (Prozessvollmacht) ---
            [
                'slug' => 'poa-court-representation-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"poa_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pełnomocnictwa","en":"POA Date","uk":"Дата видачі довіреності","de":"Datum der Vollmacht"}},
                    {"name":"principal_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko mocodawcy","en":"Principal\'s Full Name","uk":"ПІБ довірителя","de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"pl":"Adres mocodawcy","en":"Principal\'s Address","uk":"Адреса довірителя","de":"Adresse des Vollmachtgebers"}},
                    {"name":"principal_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia mocodawcy","en":"Principal\'s Date of Birth","uk":"Дата народження довірителя","de":"Geburtsdatum des Vollmachtgebers"}},
                    {"name":"lawyer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko adwokata/pełnomocnika procesowego","en":"Lawyer\'s/Process Agent\'s Full Name","uk":"ПІБ адвоката/процесуального представника","de":"Vollständiger Name des Rechtsanwalts/Prozessbevollmächtigten"}},
                    {"name":"lawyer_firm_address","type":"text","required":true,"labels":{"pl":"Nazwa kancelarii/adres","en":"Law Firm Name/Address","uk":"Назва адвокатського бюро/адреса","de":"Name der Kanzlei/Adresse"}},
                    {"name":"case_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły sprawy (np. numer akt, strony, przedmiot sporu)","en":"Case details (e.g., file number, parties, subject of dispute)","uk":"Деталі справи (напр., номер справи, сторони, предмет спору)","de":"Falldetails (z.B. Aktenzeichen, Parteien, Streitgegenstand)"}},
                    {"name":"scope_of_authority_details","type":"textarea","required":true,"labels":{"pl":"Zakres pełnomocnictwa procesowego","en":"Scope of procedural power of attorney","uk":"Обсяг процесуальної довіреності","de":"Umfang der Prozessvollmacht"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Prozessvollmacht (Vollmacht zur Vertretung vor Gericht)',
                        'description' => 'Vollmacht, die einem Rechtsanwalt erteilt wird, um eine Partei in einem Gerichtsverfahren in Deutschland zu vertreten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROZESSVOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vollmachtgeber: <strong>[[principal_full_name]]</strong><br>Geb. am: [[principal_dob]]<br>Adresse: [[principal_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit erteile ich, [[principal_full_name]], Herrn/Frau Rechtsanwalt/in <strong>[[lawyer_full_name]]</strong>, ansässig in [[lawyer_firm_address]],</p>
                                <p>Prozessvollmacht in der Angelegenheit betreffend: [[case_details]]</p>
                                <p>Die Vollmacht umfasst insbesondere: [[scope_of_authority_details]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vollmachtgeber</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney for Representation in Court (Procedural Power of Attorney)',
                        'description' => 'Power of attorney granted to a lawyer to represent a party in court proceedings in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROCEDURAL POWER OF ATTORNEY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Principal: <strong>[[principal_full_name]]</strong><br>DOB: [[principal_dob]]<br>Address: [[principal_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby grant power of attorney to Attorney-at-Law <strong>[[lawyer_full_name]]</strong>, located at [[lawyer_firm_address]],</p>
                                <p>procedural power of attorney in the matter concerning: [[case_details]]</p>
                                <p>The scope of authority includes, in particular: [[scope_of_authority_details]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Principal</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Довіреність на представництво інтересів у суді (Процесуальна довіреність)',
                        'description' => 'Довіреність, що надається адвокату для представництва сторони в судовому процесі в Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПРОЦЕСУАЛЬНА ДОВІРЕНІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Довіритель: <strong>[[principal_full_name]]</strong><br>Дата народження: [[principal_dob]]<br>Адреса: [[principal_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим я надаю адвокату Пану/Пані <strong>[[lawyer_full_name]]</strong>, за адресою [[lawyer_firm_address]],</p>
                                <p>процесуальну довіреність у справі, що стосується: [[case_details]]</p>
                                <p>Обсяг повноважень включає, зокрема: [[scope_of_authority_details]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Довіритель</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"> </div>'
                    ],
                    'pl' => [
                        'title' => 'Pełnomocnictwo procesowe (do reprezentacji w sądzie)',
                        'description' => 'Pełnomocnictwo udzielane adwokatowi w celu reprezentowania strony w postępowaniu sądowym w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO PROCESOWE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Mocodawca: <strong>[[principal_full_name]]</strong><br>Data ur.: [[principal_dob]]<br>Adres: [[principal_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym udzielam adwokatowi Panu/Pani <strong>[[lawyer_full_name]]</strong>, z kancelarii pod adresem [[lawyer_firm_address]],</p>
                                <p>pełnomocnictwa procesowego w sprawie dotyczącej: [[case_details]]</p>
                                <p>Zakres pełnomocnictwa obejmuje w szczególności: [[scope_of_authority_details]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Mocodawca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Доверенность на получение документов / Power of Attorney for Document Collection (Abholungsvollmacht) ---
            [
                'slug' => 'poa-document-collection-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"poa_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pełnomocnictwa","en":"POA Date","uk":"Дата видачі довіреності","de":"Datum der Vollmacht"}},
                    {"name":"principal_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko mocodawcy","en":"Principal\'s Full Name","uk":"ПІБ довірителя","de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"pl":"Adres mocodawcy","en":"Principal\'s Address","uk":"Адреса довірителя","de":"Adresse des Vollmachtgebers"}},
                    {"name":"agent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pełnomocnika","en":"Agent\'s Full Name","uk":"ПІБ повіреного","de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"agent_address","type":"text","required":true,"labels":{"pl":"Adres pełnomocnika","en":"Agent\'s Address","uk":"Адреса повіреного","de":"Adresse des Bevollmächtigten"}},
                    {"name":"document_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły dokumentów do odbioru (rodzaj, data wydania, numer)","en":"Details of documents to be collected (type, issue date, number)","uk":"Деталі документів для отримання (тип, дата видачі, номер)","de":"Details der abzuholenden Dokumente (Art, Ausstellungsdatum, Nummer)"}},
                    {"name":"issuing_authority_name","type":"text","required":true,"labels":{"pl":"Nazwa organu/instytucji wydającej dokumenty","en":"Name of issuing authority/institution","uk":"Назва органу/установи, що видає документи","de":"Name der ausstellenden Behörde/Institution"}},
                    {"name":"issuing_authority_address","type":"text","required":true,"labels":{"pl":"Adres organu/instytucji","en":"Issuing Authority/Institution Address","uk":"Адреса органу/установи","de":"Adresse der ausstellenden Behörde/Institution"}},
                    {"name":"validity_period","type":"text","required":false,"labels":{"pl":"Okres ważności pełnomocnictwa (opcjonalnie)","en":"Validity period of power of attorney (optional)","uk":"Термін дії довіреності (необов\'язково)","de":"Gültigkeitsdauer der Vollmacht (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Abholungsvollmacht (Vollmacht zur Abholung von Dokumenten)',
                        'description' => 'Vollmacht, die einer Person erteilt wird, um Dokumente im Namen des Vollmachtgebers abzuholen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ABHOLUNGSVOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vollmachtgeber: <strong>[[principal_full_name]]</strong><br>[[principal_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Bevollmächtigter: <strong>[[agent_full_name]]</strong><br>[[agent_address]]</p>
                                <br/>
                                <p>Hiermit erteile ich, [[principal_full_name]], Herrn/Frau <strong>[[agent_full_name]]</strong> Vollmacht, in meinem Namen folgende Dokumente bei <strong>[[issuing_authority_name]]</strong>, [[issuing_authority_address]], abzuholen:</p>
                                <p>[[document_details]]</p>
                                <p>Diese Vollmacht ist gültig [[validity_period]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vollmachtgeber</p></td>
                                <td width="50%"><p>___________________<br>Bevollmächtigter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney for Document Collection',
                        'description' => 'Power of attorney granted to a person to collect documents on behalf of the principal.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY FOR DOCUMENT COLLECTION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Principal: <strong>[[principal_full_name]]</strong><br>[[principal_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Agent: <strong>[[agent_full_name]]</strong><br>[[agent_address]]</p>
                                <br/>
                                <p>I, [[principal_full_name]], hereby grant power of attorney to Mr./Ms. <strong>[[agent_full_name]]</strong> to collect the following documents on my behalf from <strong>[[issuing_authority_name]]</strong>, [[issuing_authority_address]]:</p>
                                <p>[[document_details]]</p>
                                <p>This Power of Attorney is valid [[validity_period]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Principal</p></td>
                                <td width="50%"><p>___________________<br>Agent</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Довіреність на отримання документів',
                        'description' => 'Довіреність, що надається особі для отримання документів від імені довірителя.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ НА ОТРИМАННЯ ДОКУМЕНТІВ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Довіритель: <strong>[[principal_full_name]]</strong><br>[[principal_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Повірений: <strong>[[agent_full_name]]</strong><br>[[agent_address]]</p>
                                <br/>
                                <p>Цим я, [[principal_full_name]], надаю Пану/Пані <strong>[[agent_full_name]]</strong> довіреність на отримання від мого імені наступних документів від <strong>[[issuing_authority_name]]</strong>, [[issuing_authority_address]]:</p>
                                <p>[[document_details]]</p>
                                <p>Ця довіреність дійсна [[validity_period]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Довіритель</p></td>
                                <td width="50%"><p>___________________<br>Повірений</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Pełnomocnictwo do odbioru dokumentów',
                        'description' => 'Pełnomocnictwo udzielane osobie w celu odbioru dokumentów w imieniu mocodawcy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO DO ODBIORU DOKUMENTÓW</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Mocodawca: <strong>[[principal_full_name]]</strong><br>[[principal_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Pełnomocnik: <strong>[[agent_full_name]]</strong><br>[[agent_address]]</p>
                                <br/>
                                <p>Niniejszym ja, [[principal_full_name]], udzielam Panu/Pani <strong>[[agent_full_name]]</strong> pełnomocnictwa do odbioru w moim imieniu następujących dokumentów od <strong>[[issuing_authority_name]]</strong>, [[issuing_authority_address]]:</p>
                                <p>[[document_details]]</p>
                                <p>Niniejsze pełnomocnictwo jest ważne [[validity_period]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Mocodawca</p></td>
                                <td width="50%"><p>___________________<br>Pełnomocnik</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Отзыв доверенности / Revocation of Power of Attorney (Widerruf der Vollmacht) ---
            [
                'slug' => 'revocation-poa-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"revocation_date","type":"date","required":true,"labels":{"pl":"Data odwołania","en":"Revocation Date","uk":"Дата відкликання","de":"Datum des Widerrufs"}},
                    {"name":"principal_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko mocodawcy","en":"Principal\'s Full Name","uk":"ПІБ довірителя","de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"pl":"Adres mocodawcy","en":"Principal\'s Address","uk":"Адреса довірителя","de":"Adresse des Vollmachtgebers"}},
                    {"name":"agent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pełnomocnika","en":"Agent\'s Full Name","uk":"ПІБ повіреного","de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"agent_address","type":"text","required":true,"labels":{"pl":"Adres pełnomocnika","en":"Agent\'s Address","uk":"Адреса повіреного","de":"Adresse des Bevollmächtigten"}},
                    {"name":"original_poa_date","type":"date","required":true,"labels":{"pl":"Data wystawienia odwoływanego pełnomocnictwa","en":"Original POA Date","uk":"Дата видачі відкликаної довіреності","de":"Datum der ursprünglichen Vollmacht"}},
                    {"name":"original_poa_scope","type":"textarea","required":false,"labels":{"pl":"Zakres odwoływanego pełnomocnictwa (opcjonalnie)","en":"Scope of revoked power of attorney (optional)","uk":"Обсяг відкликаної довіреності (необов\'язково)","de":"Umfang der widerrufenen Vollmacht (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Widerruf der Vollmacht',
                        'description' => 'Formelle Erklärung über den Widerruf einer erteilten Vollmacht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WIDERRUF DER VOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vollmachtgeber: <strong>[[principal_full_name]]</strong><br>[[principal_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[revocation_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br>Herrn/Frau <strong>[[agent_full_name]]</strong><br>[[agent_address]]</p>
                                <br/>
                                <p>Sehr geehrte/r Herr/Frau [[agent_full_name]],</p>
                                <p>hiermit widerrufe ich die Ihnen am <strong>[[original_poa_date]]</strong> erteilte Vollmacht [[original_poa_scope]] mit sofortiger Wirkung.</p>
                                <p>Ich bitte Sie, die Originalvollmacht unverzüglich an mich zurückzusenden.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vollmachtgeber</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Revocation of Power of Attorney',
                        'description' => 'Formal declaration of revocation of a granted power of attorney.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REVOCATION OF POWER OF ATTORNEY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Principal: <strong>[[principal_full_name]]</strong><br>[[principal_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[revocation_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br>Mr./Ms. <strong>[[agent_full_name]]</strong><br>[[agent_address]]</p>
                                <br/>
                                <p>Dear Mr./Ms. [[agent_full_name]],</p>
                                <p>I hereby revoke the power of attorney granted to you on <strong>[[original_poa_date]]</strong> [[original_poa_scope]] with immediate effect.</p>
                                <p>I kindly request you to return the original power of attorney to me without delay.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Principal</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Відкликання довіреності',
                        'description' => 'Формальна заява про відкликання виданої довіреності.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ВІДКЛИКАННЯ ДОВІРЕНОСТІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Довіритель: <strong>[[principal_full_name]]</strong><br>[[principal_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br>Пану/Пані <strong>[[agent_full_name]]</strong><br>[[agent_address]]</p>
                                <br/>
                                <p>Шановний/а Пане/Пані [[agent_full_name]],</p>
                                <p>цим я відкликаю видану Вам <strong>[[original_poa_date]]</strong> довіреність [[original_poa_scope]] з негайною дією.</p>
                                <p>Прошу Вас негайно повернути оригінал довіреності мені.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Довіритель</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"> </div>'
                    ],
                    'pl' => [
                        'title' => 'Odwołanie pełnomocnictwa',
                        'description' => 'Formalne oświadczenie o odwołaniu udzielonego pełnomocnictwa.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ODWOŁANIE PEŁNOMOCNICTWA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Mocodawca: <strong>[[principal_full_name]]</strong><br>[[principal_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br>Pana/Pani <strong>[[agent_full_name]]</strong><br>[[agent_address]]</p>
                                <br/>
                                <p>Szanowny/a Panie/Pani [[agent_full_name]],</p>
                                <p>niniejszym odwołuję udzielone Panu/Pani w dniu <strong>[[original_poa_date]]</strong> pełnomocnictwo [[original_poa_scope]] ze skutkiem natychmiastowym.</p>
                                <p>Proszę o niezwłoczne odesłanie oryginału pełnomocnictwa na mój adres.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Mocodawca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Завещание (общая форма) / Will (General Form) (Testament) ---
            [
                'slug' => 'will-general-form-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"will_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia testamentu","en":"Will Date","uk":"Дата складання заповіту","de":"Datum des Testaments"}},
                    {"name":"testator_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko testatora","en":"Testator\'s Full Name","uk":"ПІБ заповідача","de":"Vollständiger Name des Erblassers"}},
                    {"name":"testator_address","type":"text","required":true,"labels":{"pl":"Adres testatora","en":"Testator\'s Address","uk":"Адреса заповідача","de":"Adresse des Erblassers"}},
                    {"name":"testator_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia testatora","en":"Testator\'s Date of Birth","uk":"Дата народження заповідача","de":"Geburtsdatum des Erblassers"}},
                    {"name":"heirs_details","type":"textarea","required":true,"labels":{"pl":"Dane spadkobierców (imię, nazwisko, stopień pokrewieństwa, udział)","en":"Heirs\' details (name, relationship, share)","uk":"Дані спадкоємців (ім\'я, прізвище, ступінь споріднення, частка)","de":"Details zu Erben (Name, Verwandtschaftsgrad, Anteil)"}},
                    {"name":"asset_distribution","type":"textarea","required":true,"labels":{"pl":"Rozdysponowanie majątku (szczegółowy opis, co komu)","en":"Asset distribution (detailed description, who gets what)","uk":"Розподіл майна (детальний опис, що кому)","de":"Vermögensverteilung (detaillierte Beschreibung, wer was erhält)"}},
                    {"name":"executor_full_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko wykonawcy testamentu (opcjonalnie)","en":"Executor\'s Full Name (optional)","uk":"ПІБ виконавця заповіту (необов\'язково)","de":"Vollständiger Name des Testamentsvollstreckers (optional)"}},
                    {"name":"executor_address","type":"text","required":false,"labels":{"pl":"Adres wykonawcy testamentu (opcjonalnie)","en":"Executor\'s Address (optional)","uk":"Адреса виконавця заповіту (необов\'язково)","de":"Adresse des Testamentsvollstreckers (optional)"}},
                    {"name":"notary_note","type":"textarea","required":true,"labels":{"pl":"Uwaga o konieczności formy notarialnej lub własnoręcznego sporządzenia","en":"Note on the necessity of notarial form or handwritten preparation","uk":"Примітка про необхідність нотаріальної форми або власноручного складання","de":"Hinweis zur Notwendigkeit der notariellen Form oder eigenhändigen Errichtung"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Testament (Allgemeine Form)',
                        'description' => 'Muster eines Testaments, das die Verteilung des Vermögens regelt. In Deutschland muss ein Testament entweder eigenhändig verfasst oder notariell beurkundet sein.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TESTAMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Erblasser: <strong>[[testator_full_name]]</strong><br>Geb. am: [[testator_dob]]<br>Adresse: [[testator_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[will_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, [[testator_full_name]], erkläre hiermit meinen letzten Willen wie folgt:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Erben</h2>
                                <p>Ich setze als meine Erben ein:</p>
                                <p>[[heirs_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Vermögensverteilung</h2>
                                <p>Mein Vermögen soll wie folgt verteilt werden:</p>
                                <p>[[asset_distribution]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Testamentsvollstrecker (optional)</h2>
                                <p>Als Testamentsvollstrecker benenne ich: [[executor_full_name]], [[executor_address]]</p>
                                <br/>
                                <p><strong>Wichtiger Hinweis zur Form:</strong> [[notary_note]]</p>
                                <br/>
                                <p>Dies ist mein letzter Wille. Alle früheren Testamente oder Verfügungen von Todes wegen werden hiermit widerrufen.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Unterschrift des Erblassers</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Will (General Form)',
                        'description' => 'Sample will regulating the distribution of assets. In Germany, a will must either be handwritten or notarized.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WILL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Testator: <strong>[[testator_full_name]]</strong><br>DOB: [[testator_dob]]<br>Address: [[testator_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[will_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, [[testator_full_name]], hereby declare my last will as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Heirs</h2>
                                <p>I appoint as my heirs:</p>
                                <p>[[heirs_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Asset Distribution</h2>
                                <p>My assets shall be distributed as follows:</p>
                                <p>[[asset_distribution]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Executor (optional)</h2>
                                <p>I appoint as executor of my will: [[executor_full_name]], [[executor_address]]</p>
                                <br/>
                                <p><strong>Important Note on Form:</strong> [[notary_note]]</p>
                                <br/>
                                <p>This is my last will. All previous wills or testamentary dispositions are hereby revoked.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Testator\'s Signature</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Заповіт (загальна форма)',
                        'description' => 'Зразок заповіту, що регулює розподіл майна. У Німеччині заповіт повинен бути або власноручно написаний, або нотаріально посвідчений.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАПОВІТ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Заповідач: <strong>[[testator_full_name]]</strong><br>Дата народження: [[testator_dob]]<br>Адреса: [[testator_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, [[testator_full_name]], цим заявляю свою останню волю наступним чином:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Спадкоємці</h2>
                                <p>Я призначаю своїми спадкоємцями:</p>
                                <p>[[heirs_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Розподіл майна</h2>
                                <p>Моє майно має бути розподілено наступним чином:</p>
                                <p>[[asset_distribution]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Виконавець заповіту (необов\'язково)</h2>
                                <p>Виконавцем мого заповіту я призначаю: [[executor_full_name]], [[executor_address]]</p>
                                <br/>
                                <p><strong>Важлива примітка щодо форми:</strong> [[notary_note]]</p>
                                <br/>
                                <p>Це моя остання воля. Усі попередні заповіти або розпорядження на випадок смерті цим скасовуються.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Підпис заповідача</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Testament (forma ogólna)',
                        'description' => 'Wzór testamentu regulujący podział majątku. W Niemczech testament musi być albo sporządzony własnoręcznie, albo notarialnie poświadczony.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TESTAMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Testator: <strong>[[testator_full_name]]</strong><br>Data ur.: [[testator_dob]]<br>Adres: [[testator_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, [[testator_full_name]], niniejszym oświadczam moją ostatnią wolę w następujący sposób:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Spadkobiercy</h2>
                                <p>Ustanawiam moimi spadkobiercami:</p>
                                <p>[[heirs_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Rozdysponowanie majątku</h2>
                                <p>Mój majątek ma zostać rozdysponowany w następujący sposób:</p>
                                <p>[[asset_distribution]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Wykonawca testamentu (opcjonalnie)</h2>
                                <p>Na wykonawcę mojego testamentu powołuję: [[executor_full_name]], [[executor_address]]</p>
                                <br/>
                                <p><strong>Ważna uwaga dotycząca formy:</strong> [[notary_note]]</p>
                                <br/>
                                <p>To jest moja ostatnia wola. Wszystkie wcześniejsze testamenty lub rozporządzenia na wypadek śmierci zostają niniejszym odwołane.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Podpis testatora</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Ходатайство об отложении судебного заседания / Motion for Postponement of Court Hearing (Antrag auf Terminsverlegung) ---
            [
                'slug' => 'motion-postponement-hearing-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy/adwokata","en":"Applicant\'s/Lawyer\'s Full Name","uk":"ПІБ заявника/адвоката","de":"Vollständiger Name des Antragstellers/Rechtsanwalts"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy/kancelarii","en":"Applicant\'s/Law Firm\'s Address","uk":"Адреса заявника/адвокатського бюро","de":"Adresse des Antragstellers/der Kanzlei"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa sądu","en":"Court Name","uk":"Назва суду","de":"Name des Gerichts"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres sądu","en":"Court Address","uk":"Адреса суду","de":"Adresse des Gerichts"}},
                    {"name":"case_number","type":"text","required":true,"labels":{"pl":"Numer akt sprawy","en":"Case File Number","uk":"Номер справи","de":"Aktenzeichen"}},
                    {"name":"current_hearing_date","type":"date","required":true,"labels":{"pl":"Obecna data rozprawy","en":"Current Hearing Date","uk":"Поточна дата засідання","de":"Aktuelles Verhandlungsdatum"}},
                    {"name":"reason_for_postponement","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie wniosku o odroczenie","en":"Reason for postponement application","uk":"Обґрунтування клопотання про відкладення","de":"Begründung des Antrags auf Verlegung"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Terminsverlegung (Gerichtsverhandlung)',
                        'description' => 'Muster eines Antrags auf Verlegung eines Gerichtstermins.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG AUF TERMINSVERLEGUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Antragsteller: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An das:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Aktenzeichen: <strong>[[case_number]]</strong></p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>in der oben genannten Angelegenheit beantrage ich hiermit die Verlegung des für den <strong>[[current_hearing_date]]</strong> anberaumten Termins.</p>
                                <p>Begründung des Antrags:</p>
                                <p>[[reason_for_postponement]]</p>
                                <br/>
                                <p>Ich bitte um wohlwollende Prüfung meines Antrags.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Antragsteller/Rechtsanwalt</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Motion for Postponement of Court Hearing',
                        'description' => 'Sample motion for postponing a court hearing.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MOTION FOR POSTPONEMENT OF COURT HEARING</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Applicant: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To the:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Case File Number: <strong>[[case_number]]</strong></p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>In the above-mentioned matter, I hereby request the postponement of the hearing scheduled for <strong>[[current_hearing_date]]</strong>.</p>
                                <p>Reason for the application:</p>
                                <p>[[reason_for_postponement]]</p>
                                <br/>
                                <p>I kindly request a favorable consideration of my application.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Applicant/Lawyer</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Клопотання про відкладення судового засідання',
                        'description' => 'Зразок клопотання про відкладення судового засідання.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">КЛОПОТАННЯ ПРО ВІДКЛАДЕННЯ СУДОВОГО ЗАСІДАННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Заявник: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Номер справи: <strong>[[case_number]]</strong></p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>у вищезазначеній справі я цим клопочу про відкладення засідання, призначеного на <strong>[[current_hearing_date]]</strong>.</p>
                                <p>Обґрунтування клопотання:</p>
                                <p>[[reason_for_postponement]]</p>
                                <br/>
                                <p>Прошу Вас позитивно розглянути моє клопотання.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Заявник/Адвокат</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o odroczenie rozprawy sądowej',
                        'description' => 'Wzór wniosku o odroczenie rozprawy sądowej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WNIOSEK O ODROCZENIE ROZPRAWY SĄDOWEJ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wnioskodawca: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Numer akt sprawy: <strong>[[case_number]]</strong></p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>w wyżej wymienionej sprawie niniejszym wnoszę o odroczenie terminu rozprawy wyznaczonej na dzień <strong>[[current_hearing_date]]</strong>.</p>
                                <p>Uzasadnienie wniosku:</p>
                                <p>[[reason_for_postponement]]</p>
                                <br/>
                                <p>Proszę o życzliwe rozpatrzenie mojego wniosku.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wnioskodawca/Adwokat</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Ходатайство о приобщении документов к делу / Motion for Inclusion of Documents in Case File (Antrag auf Beifügung von Unterlagen zur Akte) ---
            [
                'slug' => 'motion-include-documents-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy/adwokata","en":"Applicant\'s/Lawyer\'s Full Name","uk":"ПІБ заявника/адвоката","de":"Vollständiger Name des Antragstellers/Rechtsanwalts"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy/kancelarii","en":"Applicant\'s/Law Firm\'s Address","uk":"Адреса заявника/адвокатського бюро","de":"Adresse des Antragstellers/der Kanzlei"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa sądu","en":"Court Name","uk":"Назва суду","de":"Name des Gerichts"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres sądu","en":"Court Address","uk":"Адреса суду","de":"Adresse des Gerichts"}},
                    {"name":"case_number","type":"text","required":true,"labels":{"pl":"Numer akt sprawy","en":"Case File Number","uk":"Номер справи","de":"Aktenzeichen"}},
                    {"name":"document_list","type":"textarea","required":true,"labels":{"pl":"Lista dokumentów do przyłączenia (nazwa, data, liczba stron)","en":"List of documents to be attached (name, date, number of pages)","uk":"Список документів для долучення (назва, дата, кількість сторінок)","de":"Liste der beizufügenden Dokumente (Name, Datum, Seitenzahl)"}},
                    {"name":"reason_for_inclusion","type":"textarea","required":false,"labels":{"pl":"Uzasadnienie przyłączenia (opcjonalnie)","en":"Reason for inclusion (optional)","uk":"Обґрунтування долучення (необов\'язково)","de":"Begründung der Beifügung (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Beifügung von Unterlagen zur Akte',
                        'description' => 'Muster eines Antrags auf Beifügung von Dokumenten zu den Gerichtsakten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG AUF BEIFÜGUNG VON UNTERLAGEN ZUR AKTE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Antragsteller: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An das:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Aktenzeichen: <strong>[[case_number]]</strong></p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>in der oben genannten Angelegenheit beantrage ich hiermit, folgende Unterlagen zur Akte zu nehmen:</p>
                                <pre>[[document_list]]</pre>
                                <p>Begründung (optional): [[reason_for_inclusion]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Antragsteller/Rechtsanwalt</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Motion for Inclusion of Documents in Case File',
                        'description' => 'Sample motion for including documents in the court file.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MOTION FOR INCLUSION OF DOCUMENTS IN CASE FILE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Applicant: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To the:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Case File Number: <strong>[[case_number]]</strong></p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>In the above-mentioned matter, I hereby request that the following documents be included in the case file:</p>
                                <pre>[[document_list]]</pre>
                                <p>Reason (optional): [[reason_for_inclusion]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Applicant/Lawyer</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Клопотання про долучення документів до справи',
                        'description' => 'Зразок клопотання про долучення документів до судової справи.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">КЛОПОТАННЯ ПРО ДОЛУЧЕННЯ ДОКУМЕНТІВ ДО СПРАВИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Заявник: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Номер справи: <strong>[[case_number]]</strong></p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>у вищезазначеній справі я цим клопочу про долучення до справи наступних документів:</p>
                                <pre>[[document_list]]</pre>
                                <p>Обґрунтування (необов\'язково): [[reason_for_inclusion]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Заявник/Адвокат</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o dołączenie dokumentów do akt sprawy',
                        'description' => 'Wzór wniosku o dołączenie dokumentów do akt sprawy sądowej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WNIOSEK O DOŁĄCZENIE DOKUMENTÓW DO AKT SPRAWY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wnioskodawca: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Numer akt sprawy: <strong>[[case_number]]</strong></p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>w wyżej wymienionej sprawie niniejszym wnoszę o dołączenie do akt sprawy następujących dokumentów:</p>
                                <pre>[[document_list]]</pre>
                                <p>Uzasadnienie (opcjonalnie): [[reason_for_inclusion]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wnioskodawca/Adwokat</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Апелляционная жалоба (структура) / Appeal (Structure) (Berufungsschrift) ---
            [
                'slug' => 'appeal-structure-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"appeal_date","type":"date","required":true,"labels":{"pl":"Data złożenia apelacji","en":"Appeal Date","uk":"Дата подання апеляції","de":"Datum der Berufung"}},
                    {"name":"appellant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko odwołującego","en":"Appellant\'s Full Name","uk":"ПІБ апелянта","de":"Vollständiger Name des Berufungsführers"}},
                    {"name":"appellant_address","type":"text","required":true,"labels":{"pl":"Adres odwołującego","en":"Appellant\'s Address","uk":"Адреса апелянта","de":"Adresse des Berufungsführers"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa sądu apelacyjnego","en":"Appeal Court Name","uk":"Назва апеляційного суду","de":"Name des Berufungsgerichts"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres sądu apelacyjnego","en":"Appeal Court Address","uk":"Адреса апеляційного суду","de":"Adresse des Berufungsgerichts"}},
                    {"name":"original_court_name","type":"text","required":true,"labels":{"pl":"Nazwa sądu pierwszej instancji","en":"First Instance Court Name","uk":"Назва суду першої інстанції","de":"Name des erstinstanzlichen Gerichts"}},
                    {"name":"original_case_number","type":"text","required":true,"labels":{"pl":"Numer akt sprawy pierwszej instancji","en":"First Instance Case File Number","uk":"Номер справи першої інстанції","de":"Aktenzeichen der ersten Instanz"}},
                    {"name":"original_judgment_date","type":"date","required":true,"labels":{"pl":"Data wyroku pierwszej instancji","en":"Date of First Instance Judgment","uk":"Дата рішення першої інстанції","de":"Datum des erstinstanzlichen Urteils"}},
                    {"name":"grounds_for_appeal","type":"textarea","required":true,"labels":{"pl":"Podstawy apelacji (naruszenie prawa materialnego/procesowego, błędy w ustaleniach faktycznych)","en":"Grounds for appeal (violation of substantive/procedural law, errors in factual findings)","uk":"Підстави для апеляції (порушення матеріального/процесуального права, помилки у встановленні фактів)","de":"Berufungsgründe (Verletzung materiellen/formellen Rechts, Fehler bei der Tatsachenfeststellung)"}},
                    {"name":"requested_outcome","type":"textarea","required":true,"labels":{"pl":"Żądany wynik apelacji (np. zmiana wyroku, uchylenie wyroku)","en":"Requested outcome of appeal (e.g., amendment of judgment, reversal of judgment)","uk":"Бажаний результат апеляції (напр., зміна рішення, скасування рішення)","de":"Gewünschtes Ergebnis der Berufung (z.B. Änderung des Urteils, Aufhebung des Urteils)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Berufungsschrift (Struktur)',
                        'description' => 'Muster einer Berufungsschrift zur Anfechtung eines erstinstanzlichen Urteils vor dem nächsthöheren Gericht in Deutschland. Erfordert Anwaltszwang.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BERUFUNGSSCHRIFT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Berufungsführer: <strong>[[appellant_full_name]]</strong><br>[[appellant_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[appeal_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An das:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Betreff: Berufung gegen das Urteil des [[original_court_name]] vom [[original_judgment_date]]<br>Aktenzeichen: <strong>[[original_case_number]]</strong></p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>gegen das oben genannte Urteil wird hiermit Berufung eingelegt.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Berufungsgründe</h2>
                                <p>[[grounds_for_appeal]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Antrag</h2>
                                <p>Es wird beantragt, [[requested_outcome]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Berufungsführer (durch Rechtsanwalt)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Appeal (Structure)',
                        'description' => 'Sample appeal brief to challenge a first-instance judgment before the next higher court in Germany. Requires mandatory legal representation.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APPEAL BRIEF</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Appellant: <strong>[[appellant_full_name]]</strong><br>[[appellant_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[appeal_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To the:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Subject: Appeal against the judgment of [[original_court_name]] dated [[original_judgment_date]]<br>Case File Number: <strong>[[original_case_number]]</strong></p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>An appeal is hereby filed against the above-mentioned judgment.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Grounds for Appeal</h2>
                                <p>[[grounds_for_appeal]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Motion</h2>
                                <p>It is requested that [[requested_outcome]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Appellant (by lawyer)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Апеляційна скарга (структура)',
                        'description' => 'Зразок апеляційної скарги для оскарження рішення суду першої інстанції до вищого суду в Німеччичині. Вимагає обов\'язкового представництва адвокатом.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">АПЕЛЯЦІЙНА СКАРГА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Апелянт: <strong>[[appellant_full_name]]</strong><br>[[appellant_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Тема: Апеляція на рішення [[original_court_name]] від [[original_judgment_date]]<br>Номер справи: <strong>[[original_case_number]]</strong></p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим подається апеляція на вищезазначене рішення.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Підстави для апеляції</h2>
                                <p>[[grounds_for_appeal]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Клопотання</h2>
                                <p>Просимо: [[requested_outcome]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Апелянт (через адвоката)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Apelacja (struktura)',
                        'description' => 'Wzór pisma apelacyjnego do zaskarżenia wyroku sądu pierwszej instancji przed sądem wyższej instancji w Niemczech. Wymaga obowiązkowego reprezentowania przez adwokata.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APELACJA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Apelujący: <strong>[[appellant_full_name]]</strong><br>[[appellant_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p>Dotyczy: Apelacja od wyroku [[original_court_name]] z dnia [[original_judgment_date]]<br>Numer akt sprawy: <strong>[[original_case_number]]</strong></p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>od wyżej wymienionego wyroku wnosi się niniejszym apelację.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Podstawy apelacji</h2>
                                <p>[[grounds_for_appeal]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Wniosek</h2>
                                <p>Wnosi się o: [[requested_outcome]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Apelujący (przez adwokata)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

// --- Кассационная жалоба (структура) / Revision Appeal (Structure) ---
            [
                'slug' => 'revision-appeal-structure-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"appeal_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia skargi","en":"Appeal Date","uk":"Дата складання скарги","de":"Datum der Beschwerde"}},
                    {"name":"appellant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko skarżącego","en":"Appellant\'s Full Name","uk":"ПІБ скаржника","de":"Vollständiger Name des Beschwerdeführers"}},
                    {"name":"appellant_address","type":"text","required":true,"labels":{"pl":"Adres skarżącego","en":"Appellant\'s Address","uk":"Адреса скаржника","de":"Adresse des Beschwerdeführers"}},
                    {"name":"appellant_lawyer_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko adwokata skarżącego (jeśli dotyczy)","en":"Appellant\'s Lawyer\'s Name (if applicable)","uk":"ПІБ адвоката скаржника (якщо застосовно)","de":"Name des Anwalts des Beschwerdeführers (falls zutreffend)"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa sądu, do którego składana jest skarga","en":"Name of the court to which the appeal is submitted","uk":"Назва суду, до якого подається скарга","de":"Name des Gerichts, an das die Beschwerde gerichtet ist"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres sądu","en":"Court Address","uk":"Адреса суду","de":"Adresse des Gerichts"}},
                    {"name":"case_reference_number","type":"text","required":true,"labels":{"pl":"Sygnatura akt sprawy","en":"Case Reference Number","uk":"Номер справи","de":"Aktenzeichen"}},
                    {"name":"previous_decision_date","type":"date","required":true,"labels":{"pl":"Data zaskarżonego orzeczenia","en":"Date of appealed decision","uk":"Дата оскаржуваного рішення","de":"Datum der angefochtenen Entscheidung"}},
                    {"name":"grounds_for_appeal","type":"textarea","required":true,"labels":{"pl":"Podstawy skargi (naruszenia prawa, błędy proceduralne)","en":"Grounds for appeal (violations of law, procedural errors)","uk":"Підстави скарги (порушення закону, процесуальні помилки)","de":"Beschwerdegründe (Rechtsverletzungen, Verfahrensfehler)"}},
                    {"name":"requested_decision","type":"textarea","required":true,"labels":{"pl":"Żądane rozstrzygnięcie (np. uchylenie wyroku, przekazanie do ponownego rozpoznania)","en":"Requested decision (e.g., annulment of judgment, remand for retrial)","uk":"Затребуване рішення (напр., скасування вироку, направлення на новий розгляд)","de":"Gewünschte Entscheidung (z.B. Aufhebung des Urteils, Zurückverweisung zur erneuten Verhandlung)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Revisionsschrift (Struktur)',
                        'description' => 'Struktur einer Revisionsschrift im deutschen Zivil- oder Strafverfahrensrecht. Dieses Dokument ist hochkomplex und erfordert zwingend einen Rechtsanwalt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REVISIONSSCHRIFT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Absender: <strong>[[appellant_full_name]]</strong><br>[[appellant_address]]<br>Rechtsanwalt: [[appellant_lawyer_name]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[appeal_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An das:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Betreff: Revision im Verfahren [[case_reference_number]] gegen das Urteil vom [[previous_decision_date]]</strong></p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">I. Sachverhalt</h2>
                                <p>Kurze Darstellung des Sachverhalts, soweit für die Revision relevant.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">II. Revisionsgründe</h2>
                                <p>[[grounds_for_appeal]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">III. Antrag</h2>
                                <p>Es wird beantragt: [[requested_decision]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Unterschrift des Beschwerdeführers</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Revision Appeal (Structure)',
                        'description' => 'Structure of a revision appeal in German civil or criminal procedural law. This document is highly complex and strictly requires a lawyer.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REVISION APPEAL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Appellant: <strong>[[appellant_full_name]]</strong><br>[[appellant_address]]<br>Lawyer: [[appellant_lawyer_name]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[appeal_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To the:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Subject: Appeal in case [[case_reference_number]] against the judgment of [[previous_decision_date]]</strong></p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">I. Facts of the Case</h2>
                                <p>Brief presentation of the facts, as far as relevant for the appeal.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">II. Grounds for Appeal</h2>
                                <p>[[grounds_for_appeal]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">III. Application</h2>
                                <p>It is requested: [[requested_decision]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Appellant\'s Signature</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Касаційна скарга (структура)',
                        'description' => 'Структура касаційної скарги в німецькому цивільному або кримінальному процесуальному праві. Цей документ є дуже складним і вимагає обов\'язкової участі адвоката.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">КАСАЦІЙНА СКАРГА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Скаржник: <strong>[[appellant_full_name]]</strong><br>[[appellant_address]]<br>Адвокат: [[appellant_lawyer_name]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Тема: Касаційна скарга у справі [[case_reference_number]] проти рішення від [[previous_decision_date]]</strong></p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">I. Обставини справи</h2>
                                <p>Короткий виклад обставин справи, наскільки це стосується касаційної скарги.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">II. Підстави для скарги</h2>
                                <p>[[grounds_for_appeal]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">III. Клопотання</h2>
                                <p>Просимо: [[requested_decision]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Підпис скаржника</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Skarga kasacyjna (struktura)',
                        'description' => 'Struktura skargi kasacyjnej w niemieckim prawie cywilnym lub karnym procesowym. Dokument ten jest wysoce złożony i wymaga bezwzględnie adwokata.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SKARGA KASACYJNA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Skarżący: <strong>[[appellant_full_name]]</strong><br>[[appellant_address]]<br>Adwokat: [[appellant_lawyer_name]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Temat: Skarga kasacyjna w sprawie [[case_reference_number]] przeciwko wyrokowi z dnia [[previous_decision_date]]</strong></p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">I. Stan faktyczny</h2>
                                <p>Krótkie przedstawienie stanu faktycznego, o ile jest to istotne dla skargi kasacyjnej.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">II. Podstawy skargi kasacyjnej</h2>
                                <p>[[grounds_for_appeal]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">III. Wniosek</h2>
                                <p>Wnosi się o: [[requested_decision]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Podpis skarżącego</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'

                    ]
                ]
            ],

            // --- Жалоба в прокуратуру / Complaint to the Prosecutor's Office (Strafanzeige) ---
            [
                'slug' => 'complaint-prosecutors-office-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"complaint_date","type":"date","required":true,"labels":{"pl":"Data złożenia skargi","en":"Complaint Date","uk":"Дата подання скарги","de":"Datum der Anzeige"}},
                    {"name":"complainant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko zgłaszającego","en":"Complainant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Anzeigenerstatters"}},
                    {"name":"complainant_address","type":"text","required":true,"labels":{"pl":"Adres zgłaszającego","en":"Complainant\'s Address","uk":"Адреса заявника","de":"Adresse des Anzeigenerstatters"}},
                    {"name":"complainant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail zgłaszającego","en":"Complainant\'s Phone & Email","uk":"Телефон та e-mail заявника","de":"Telefon und E-Mail des Anzeigenerstatters"}},
                    {"name":"prosecutor_office_name","type":"text","required":true,"labels":{"pl":"Nazwa właściwej Prokuratury","en":"Name of the competent Prosecutor\'s Office","uk":"Назва компетентної Прокуратури","de":"Name der zuständigen Staatsanwaltschaft"}},
                    {"name":"prosecutor_office_address","type":"text","required":true,"labels":{"pl":"Adres Prokuratury","en":"Prosecutor\'s Office Address","uk":"Адреса Прокуратури","de":"Adresse der Staatsanwaltschaft"}},
                    {"name":"incident_description","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis zdarzenia/czynu karalnego","en":"Detailed description of the event/criminal act","uk":"Детальний опис події/кримінального діяння","de":"Detaillierte Beschreibung des Ereignisses/der Straftat"}},
                    {"name":"accused_full_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko/nazwa oskarżonego (jeśli znane)","en":"Accused\'s Full Name/Company Name (if known)","uk":"ПІБ/назва обвинуваченого (якщо відомо)","de":"Vollständiger Name/Firmenname des Beschuldigten (falls bekannt)"}},
                    {"name":"accused_address","type":"text","required":false,"labels":{"pl":"Adres oskarżonego (jeśli znany)","en":"Accused\'s Address (if known)","uk":"Адреса обвинуваченого (якщо відомо)","de":"Adresse des Beschuldigten (falls bekannt)"}},
                    {"name":"evidence_details","type":"textarea","required":false,"labels":{"pl":"Dowody (np. świadkowie, dokumenty, zdjęcia)","en":"Evidence (e.g., witnesses, documents, photos)","uk":"Докази (напр., свідки, документи, фото)","de":"Beweismittel (z.B. Zeugen, Dokumente, Fotos)"}},
                    {"name":"requested_action","type":"textarea","required":true,"labels":{"pl":"Żądane działania (np. wszczęcie postępowania, ściganie sprawcy)","en":"Requested actions (e.g., initiation of proceedings, prosecution of perpetrator)","uk":"Затребувані дії (напр., порушення провадження, переслідування винного)","de":"Gewünschte Maßnahmen (z.B. Einleitung eines Verfahrens, Verfolgung des Täters)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Strafanzeige / Antrag auf Strafverfolgung',
                        'description' => 'Formelle Anzeige eines mutmaßlichen Straftatbestands bei der Staatsanwaltschaft oder Polizei in Deutschland. Kann auch einen Strafantrag beinhalten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STRAFANZEIGE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Anzeigenerstatter: <strong>[[complainant_full_name]]</strong><br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[complaint_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An die:<br><strong>[[prosecutor_office_name]]</strong><br>[[prosecutor_office_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit erstatte ich Strafanzeige wegen des folgenden Sachverhalts:</p>
                                <p>[[incident_description]]</p>
                                <p>Der/Die Beschuldigte (falls bekannt): [[accused_full_name]], wohnhaft in [[accused_address]].</p>
                                <p>Beweismittel: [[evidence_details]]</p>
                                <br/>
                                <p>Ich beantrage hiermit die Einleitung eines Ermittlungsverfahrens und die Verfolgung des/der Verantwortlichen. [[requested_action]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Anzeigenerstatter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Criminal Complaint / Request for Prosecution',
                        'description' => 'Formal notification of a suspected criminal offense to the prosecutor\'s office or police in Germany. May also include a formal request for prosecution.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CRIMINAL COMPLAINT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Complainant: <strong>[[complainant_full_name]]</strong><br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[complaint_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To the:<br><strong>[[prosecutor_office_name]]</strong><br>[[prosecutor_office_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby file a criminal complaint regarding the following facts:</p>
                                <p>[[incident_description]]</p>
                                <p>The accused (if known): [[accused_full_name]], residing at [[accused_address]].</p>
                                <p>Evidence: [[evidence_details]]</p>
                                <br/>
                                <p>I hereby request the initiation of investigative proceedings and the prosecution of the responsible party/parties. [[requested_action]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Complainant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про злочин / Клопотання про притягнення до кримінальної відповідальності',
                        'description' => 'Формальне повідомлення про підозрюваний злочин до прокуратури або поліції в Німеччині. Може також включати офіційне клопотання про притягнення до кримінальної відповідальності.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА ПРО ЗЛОЧИН</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Заявник: <strong>[[complainant_full_name]]</strong><br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[prosecutor_office_name]]</strong><br>[[prosecutor_office_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я подаю заяву про злочин щодо наступних фактів:</p>
                                <p>[[incident_description]]</p>
                                <p>Обвинувачений (якщо відомо): [[accused_full_name]], що проживає за адресою [[accused_address]].</p>
                                <p>Докази: [[evidence_details]]</p>
                                <br/>
                                <p>Цим я прошу розпочати розслідування та притягнути до відповідальності винну(их) сторону(и). [[requested_action]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Заявник</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Zawiadomienie o przestępstwie / Wniosek o ściganie',
                        'description' => 'Formalne zgłoszenie podejrzenia przestępstwa do prokuratury lub policji w Niemczech. Może również zawierać formalny wniosek o ściganie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZAWIADOMIENIE O PRZESTĘPSTWIE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zgłaszający: <strong>[[complainant_full_name]]</strong><br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[prosecutor_office_name]]</strong><br>[[prosecutor_office_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym składam zawiadomienie o przestępstwie dotyczące następującego stanu faktycznego:</p>
                                <p>[[incident_description]]</p>
                                <p>Oskarżony (jeśli znany): [[accused_full_name]], zamieszkały/a w [[accused_address]].</p>
                                <p>Dowody: [[evidence_details]]</p>
                                <br/>
                                <p>Wnoszę o wszczęcie postępowania przygotowawczego i ściganie sprawcy/sprawców. [[requested_action]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Zgłaszający</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Мировое соглашение / Settlement Agreement (Vergleich) ---
            [
                'slug' => 'settlement-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia ugody","en":"Agreement Date","uk":"Дата укладення угоди","de":"Datum der Vereinbarung"}},
                    {"name":"party_one_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa Strony 1","en":"Party 1 Full Name/Company Name","uk":"ПІБ/назва Сторони 1","de":"Vollständiger Name/Firmenname Partei 1"}},
                    {"name":"party_one_address","type":"text","required":true,"labels":{"pl":"Adres Strony 1","en":"Party 1 Address","uk":"Адреса Сторони 1","de":"Adresse Partei 1"}},
                    {"name":"party_one_id_details","type":"text","required":true,"labels":{"pl":"Dane identyfikacyjne Strony 1 (np. PESEL, NIP, numer rejestrowy)","en":"Party 1 ID details (e.g., PESEL, NIP, registration number)","uk":"Ідентифікаційні дані Сторони 1 (напр., ПЕСЕЛЬ, ІПН, реєстраційний номер)","de":"Identifikationsdaten Partei 1 (z.B. Personalausweis, Steuernummer, Registernummer)"}},
                    {"name":"party_two_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa Strony 2","en":"Party 2 Full Name/Company Name","uk":"ПІБ/назва Сторони 2","de":"Vollständiger Name/Firmenname Partei 2"}},
                    {"name":"party_two_address","type":"text","required":true,"labels":{"pl":"Adres Strony 2","en":"Party 2 Address","uk":"Адреса Сторони 2","de":"Adresse Partei 2"}},
                    {"name":"party_two_id_details","type":"text","required":true,"labels":{"pl":"Dane identyfikacyjne Strony 2 (np. PESEL, NIP, numer rejestrowy)","en":"Party 2 ID details (e.g., PESEL, NIP, registration number)","uk":"Ідентифікаційні дані Сторони 2 (напр., ПЕСЕЛЬ, ІПН, реєстраційний номер)","de":"Identifikationsdaten Partei 2 (z.B. Personalausweis, Steuernummer, Registernummer)"}},
                    {"name":"subject_of_dispute","type":"textarea","required":true,"labels":{"pl":"Przedmiot sporu/rozbieżności","en":"Subject of dispute/discrepancy","uk":"Предмет спору/розбіжностей","de":"Gegenstand des Streits/der Meinungsverschiedenheit"}},
                    {"name":"settlement_terms","type":"textarea","required":true,"labels":{"pl":"Warunki ugody (szczegółowy opis, np. kwoty, terminy, świadczenia)","en":"Terms of settlement (detailed description, e.g., amounts, deadlines, services)","uk":"Умови мирової угоди (детальний опис, напр., суми, терміни, послуги)","de":"Bedingungen des Vergleichs (detaillierte Beschreibung, z.B. Beträge, Fristen, Leistungen)"}},
                    {"name":"mutual_release_of_claims","type":"textarea","required":true,"labels":{"pl":"Wzajemne zrzeczenie się dalszych roszczeń","en":"Mutual release of further claims","uk":"Взаємна відмова від подальших претензій","de":"Gegenseitiger Verzicht auf weitere Ansprüche"}},
                    {"name":"legal_consequences_note","type":"textarea","required":true,"labels":{"pl":"Uwaga o skutkach prawnych ugody (np. § 779 BGB)","en":"Note on legal consequences of settlement (e.g., § 779 BGB)","uk":"Примітка про правові наслідки мирової угоди (напр., § 779 BGB)","de":"Hinweis zu den rechtlichen Folgen des Vergleichs (z.B. § 779 BGB)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Vergleichsvereinbarung',
                        'description' => 'Eine Vereinbarung zur gütlichen Beilegung eines Streits zwischen Parteien, ohne dass ein Gerichtsverfahren erforderlich ist, gemäß deutschem Recht (insbesondere §§ 779 BGB).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VERGLEICHSVEREINBARUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Partei 1: <strong>[[party_one_full_name]]</strong><br>[[party_one_address]]<br>Identifikation: [[party_one_id_details]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Partei 2: <strong>[[party_two_full_name]]</strong><br>[[party_two_address]]<br>Identifikation: [[party_two_id_details]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Gegenstand des Streits</h2>
                                <p>Zwischen den Parteien bestand ein Streit/Meinungsverschiedenheiten bezüglich: [[subject_of_dispute]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Bedingungen des Vergleichs</h2>
                                <p>Die Parteien einigen sich einvernehmlich auf die Beilegung des Streits zu folgenden Bedingungen:</p>
                                <p>[[settlement_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Gegenseitiger Verzicht auf weitere Ansprüche</h2>
                                <p>[[mutual_release_of_claims]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Rechtliche Hinweise</h2>
                                <p>[[legal_consequences_note]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Schlussbestimmungen</h2>
                                <p>Dieser Vergleich unterliegt deutschem Recht. Er wurde in zwei gleichlautenden Ausfertigungen erstellt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Partei 1</p></td>
                                <td width="50%"><p>___________________<br>Partei 2</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Settlement Agreement',
                        'description' => 'An agreement to amicably resolve a dispute between parties without the need for court proceedings, according to German law (in particular § 779 BGB).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SETTLEMENT AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Party 1: <strong>[[party_one_full_name]]</strong><br>[[party_one_address]]<br>Identification: [[party_one_id_details]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Party 2: <strong>[[party_two_full_name]]</strong><br>[[party_two_address]]<br>Identification: [[party_two_id_details]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Subject of the Dispute</h2>
                                <p>A dispute/discrepancy existed between the parties regarding: [[subject_of_dispute]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Terms of Settlement</h2>
                                <p>The parties mutually agree to resolve the dispute on the following terms:</p>
                                <p>[[settlement_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Mutual Release of Further Claims</h2>
                                <p>[[mutual_release_of_claims]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Legal Notes</h2>
                                <p>[[legal_consequences_note]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Final Provisions</h2>
                                <p>This settlement is subject to German law. It has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Party 1</p></td>
                                <td width="50%"><p>___________________<br>Party 2</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Мирова угода',
                        'description' => 'Угода про мирне врегулювання спору між сторонами без необхідності судового розгляду, згідно з німецьким законодавством (зокрема § 779 BGB).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">МИРОВА УГОДА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Сторона 1: <strong>[[party_one_full_name]]</strong><br>[[party_one_address]]<br>Ідентифікація: [[party_one_id_details]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Сторона 2: <strong>[[party_two_full_name]]</strong><br>[[party_two_address]]<br>Ідентифікація: [[party_two_id_details]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Предмет спору</h2>
                                <p>Між сторонами існував спір/розбіжності щодо: [[subject_of_dispute]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Умови мирової угоди</h2>
                                <p>Сторони за взаємною згодою вирішують спір на наступних умовах:</p>
                                <p>[[settlement_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Взаємна відмова від подальших претензій</h2>
                                <p>[[mutual_release_of_claims]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Правові примітки</h2>
                                <p>[[legal_consequences_note]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Прикінцеві положення</h2>
                                <p>Ця мирова угода регулюється німецьким законодавством. Вона складена у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Сторона 1</p></td>
                                <td width="50%"><p>___________________<br>Сторона 2</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Ugoda pozasądowa',
                        'description' => 'Umowa zawierana w celu polubownego rozwiązania sporu między stronami, bez konieczności postępowania sądowego, zgodnie z prawem niemieckim (w szczególności § 779 BGB).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UGODA POZASĄDOWA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Strona 1: <strong>[[party_one_full_name]]</strong><br>[[party_one_address]]<br>Identyfikacja: [[party_one_id_details]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Strona 2: <strong>[[party_two_full_name]]</strong><br>[[party_two_address]]<br>Identyfikacja: [[party_two_id_details]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Przedmiot sporu</h2>
                                <p>Między stronami istniał spór/rozbieżności dotyczące: [[subject_of_dispute]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Warunki ugody</h2>
                                <p>Strony zgodnie postanawiają rozwiązać spór na następujących warunkach:</p>
                                <p>[[settlement_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Wzajemne zrzeczenie się dalszych roszczeń</h2>
                                <p>[[mutual_release_of_claims]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Uwagi prawne</h2>
                                <p>[[legal_consequences_note]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Postanowienia końcowe</h2>
                                <p>Niniejsza ugoda podlega prawu niemieckiemu. Została sporządzona w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Strona 1</p></td>
                                <td width="50%"><p>___________________<br>Strona 2</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
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
