<?php

namespace Database\Seeders\DE;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class DeEducationSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'school-education-de')->first();
        if (!$category) {
            $this->command->error('Category with slug "school-education-de" not found.');
            return;
        }


        $templatesData = [
// --- Заявление на академический отпуск / Application for Academic Leave ---
            [
                'slug' => 'academic-leave-application-de',
        'access_level' => 'free',
                'fields' => json_encode([
                    ["name" => "city", "type" => "text", "required" => true, "labels" => ["pl" => "Miejscowość", "en" => "City", "uk" => "Місто", "de" => "Ort"]],
                    ["name" => "applicant_full_name", "type" => "text", "required" => true, "labels" => ["pl" => "Imię i nazwisko studenta", "en" => "Student's Full Name", "uk" => "ПІБ студента", "de" => "Vollständiger Name des Studenten"]],
                    ["name" => "student_id_number", "type" => "text", "required" => true, "labels" => ["pl" => "Numer albumu/indeksu", "en" => "Student ID Number", "uk" => "Номер залікової книжки/індексу", "de" => "Matrikelnummer/Indexnummer"]],
                    ["name" => "faculty_name", "type" => "text", "required" => true, "labels" => ["pl" => "Nazwa wydziału", "en" => "Faculty Name", "uk" => "Назва факультету", "de" => "Name der Fakultät"]],
                    ["name" => "field_of_study", "type" => "text", "required" => true, "labels" => ["pl" => "Kierunek studiów", "en" => "Field of Study", "uk" => "Напрямок навчання", "de" => "Studiengang"]],
                    ["name" => "semester", "type" => "text", "required" => true, "labels" => ["pl" => "Semestr", "en" => "Semester", "uk" => "Семестр", "de" => "Semester"]],
                    ["name" => "university_name", "type" => "text", "required" => true, "labels" => ["pl" => "Nazwa uczelni", "en" => "University Name", "uk" => "Назва ВНЗ", "de" => "Name der Universität"]],
                    ["name" => "university_address", "type" => "text", "required" => true, "labels" => ["pl" => "Adres uczelni", "en" => "University Address", "uk" => "Адреса ВНЗ", "de" => "Adresse der Universität"]],
                    ["name" => "leave_start_date", "type" => "date", "required" => true, "labels" => ["pl" => "Data rozpoczęcia urlopu", "en" => "Leave Start Date", "uk" => "Дата початку відпустки", "de" => "Urlaubsbeginn"]],
                    ["name" => "leave_end_date", "type" => "date", "required" => true, "labels" => ["pl" => "Data zakończenia urlopu", "en" => "Leave End Date", "uk" => "Дата закінчення відпустки", "de" => "Urlaubsende"]],
                    ["name" => "reason_for_leave", "type" => "textarea", "required" => true, "labels" => ["pl" => "Uzasadnienie wniosku (np. zdrowotne, osobiste)", "en" => "Reason for application (e.g., health, personal)", "uk" => "Обґрунтування заяви (напр., за станом здоров'я, особисті)", "de" => "Begründung des Antrags (z.B. gesundheitlich, persönlich)"]]
                ]),
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Beurlaubung',
                        'description' => 'Offizieller Antrag eines Studenten auf Beurlaubung unter Angabe des Grundes.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANTRAG AUF BEURLAUBUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Antragsteller: <strong>[[applicant_full_name]]</strong><br>Matrikelnummer: [[student_id_number]]<br>Fakultät: [[faculty_name]]<br>Studiengang: [[field_of_study]], Semester: [[semester]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br>Dekan der Fakultät [[faculty_name]]<br><strong>[[university_name]]</strong><br>[[university_address]]</p>
                                <br/>
                                <p>Hiermit beantrage ich höflich die Gewährung einer Beurlaubung für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis zum <strong>[[leave_end_date]]</strong>.</p>
                                <p>Begründung des Antrags:</p>
                                <p>[[reason_for_leave]]</p>
                                <p>Ich bitte Sie, meinen Antrag positiv zu prüfen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Academic Leave',
                        'description' => 'Official student application for academic leave, stating the reason.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">APPLICATION FOR ACADEMIC LEAVE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Student: <strong>[[applicant_full_name]]</strong><br>Student ID: [[student_id_number]]<br>Faculty: [[faculty_name]]<br>Field of Study: [[field_of_study]], Semester: [[semester]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br>Dean of the Faculty of [[faculty_name]]<br><strong>[[university_name]]</strong><br>[[university_address]]</p>
                                <br/>
                                <p>I hereby kindly request to be granted academic leave for the period from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong>.</p>
                                <p>Reason for the application:</p>
                                <p>[[reason_for_leave]]</p>
                                <p>Please kindly consider my application.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на академічну відпустку',
                        'description' => 'Офіційна заява студента про надання академічної відпустки із зазначенням причини.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАЯВА НА АКАДЕМІЧНУ ВІДПУСТКУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Студент: <strong>[[applicant_full_name]]</strong><br>Номер залікової книжки: [[student_id_number]]<br>Факультет: [[faculty_name]]<br>Напрямок: [[field_of_study]], семестр: [[semester]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br>Декана Факультету [[faculty_name]]<br><strong>[[university_name]]</strong><br>[[university_address]]</p>
                                <br/>
                                <p>Звертаюся з покірним проханням про надання мені академічної відпустки у період з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong>.</p>
                                <p>Обґрунтування заяви:</p>
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
                    'pl' => [
                        'title' => 'Wniosek o urlop dziekański',
                        'description' => 'Oficjalny wniosek studenta o udzielenie urlopu dziekańskiego z podaniem przyczyny.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O URLOP DZIEKAŃSKI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Student: <strong>[[applicant_full_name]]</strong><br>Nr albumu: [[student_id_number]]<br>Wydział: [[faculty_name]]<br>Kierunek: [[field_of_study]], semestr: [[semester]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br>Dziekana Wydziału [[faculty_name]]<br><strong>[[university_name]]</strong><br>[[university_address]]</p>
                                <br/>
                                <p>Zwracam się z uprzejmą prośbą o udzielenie mi urlopu dziekańskiego w okresie od dnia <strong>[[leave_start_date]]</strong> do dnia <strong>[[leave_end_date]]</strong>.</p>
                                <p>Uzasadnienie wniosku:</p>
                                <p>[[reason_for_leave]]</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku.</p>
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

            // --- Заявление о переводе на другую специальность / Application for Transfer to Another Specialization ---
            [
                'slug' => 'transfer-specialization-application-de',
        'access_level' => 'free',
                'fields' => json_encode([
                    ["name" => "city", "type" => "text", "required" => true, "labels" => ["pl" => "Miejscowość", "en" => "City", "uk" => "Місто", "de" => "Ort"]],
                    ["name" => "applicant_full_name", "type" => "text", "required" => true, "labels" => ["pl" => "Imię i nazwisko studenta", "en" => "Student's Full Name", "uk" => "ПІБ студента", "de" => "Vollständiger Name des Studenten"]],
                    ["name" => "student_id_number", "type" => "text", "required" => true, "labels" => ["pl" => "Numer albumu/indeksu", "en" => "Student ID Number", "uk" => "Номер залікової книжки/індексу", "de" => "Matrikelnummer/Indexnummer"]],
                    ["name" => "current_faculty", "type" => "text", "required" => true, "labels" => ["pl" => "Obecny wydział", "en" => "Current Faculty", "uk" => "Поточний факультет", "de" => "Aktuelle Fakultät"]],
                    ["name" => "current_field_of_study", "type" => "text", "required" => true, "labels" => ["pl" => "Obecny kierunek studiów", "en" => "Current Field of Study", "uk" => "Поточний напрямок навчання", "de" => "Aktueller Studiengang"]],
                    ["name" => "target_faculty", "type" => "text", "required" => true, "labels" => ["pl" => "Docelowy wydział", "en" => "Target Faculty", "uk" => "Цільовий факультет", "de" => "Zielfakultät"]],
                    ["name" => "target_field_of_study", "type" => "text", "required" => true, "labels" => ["pl" => "Docelowy kierunek studiów", "en" => "Target Field of Study", "uk" => "Цільовий напрямок навчання", "de" => "Zielstudiengang"]],
                    ["name" => "university_name", "type" => "text", "required" => true, "labels" => ["pl" => "Nazwa uczelni", "en" => "University Name", "uk" => "Назва ВНЗ", "de" => "Name der Universität"]],
                    ["name" => "university_address", "type" => "text", "required" => true, "labels" => ["pl" => "Adres uczelni", "en" => "University Address", "uk" => "Адреса ВНЗ", "de" => "Adresse der Universität"]],
                    ["name" => "reason_for_transfer", "type" => "textarea", "required" => true, "labels" => ["pl" => "Uzasadnienie wniosku o przeniesienie", "en" => "Reason for transfer application", "uk" => "Обґрунтування заяви про переведення", "de" => "Begründung des Versetzungsantrags"]]
                ]),
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Studiengangwechsel',
                        'description' => 'Offizieller Antrag eines Studenten auf Wechsel des Studiengangs innerhalb derselben Universität.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANTRAG AUF STUDIENGANGWECHSEL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Antragsteller: <strong>[[applicant_full_name]]</strong><br>Matrikelnummer: [[student_id_number]]<br>Aktueller Studiengang: [[current_field_of_study]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br>Dekan der Fakultät [[target_faculty]]<br><strong>[[university_name]]</strong><br>[[university_address]]</p>
                                <br/>
                                <p>Hiermit beantrage ich höflich, von dem Studiengang <strong>[[current_field_of_study]]</strong> zu dem Studiengang <strong>[[target_field_of_study]]</strong>, der an der Fakultät [[target_faculty]] angeboten wird, zu wechseln.</p>
                                <p>Begründung des Antrags:</p>
                                <p>[[reason_for_transfer]]</p>
                                <p>Ich bitte Sie, meinen Antrag positiv zu prüfen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Transfer to Another Specialization',
                        'description' => 'Official student application for transfer to another field of study within the same university.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">APPLICATION FOR TRANSFER TO ANOTHER FIELD OF STUDY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Student: <strong>[[applicant_full_name]]</strong><br>Student ID: [[student_id_number]]<br>Current Field: [[current_field_of_study]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br>Dean of the Faculty of [[target_faculty]]<br><strong>[[university_name]]</strong><br>[[university_address]]</p>
                                <br/>
                                <p>I hereby kindly request to be transferred from the field of study <strong>[[current_field_of_study]]</strong> to the field of study <strong>[[target_field_of_study]]</strong>, offered by the Faculty of [[target_faculty]].</p>
                                <p>Reason for the application:</p>
                                <p>[[reason_for_transfer]]</p>
                                <p>Please kindly consider my application.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про переведення на іншу спеціальність',
                        'description' => 'Офіційна заява студента про переведення на інший напрямок навчання в межах того ж ВНЗ.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАЯВА ПРО ПЕРЕВЕДЕННЯ НА ІНШУ СПЕЦІАЛЬНІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Студент: <strong>[[applicant_full_name]]</strong><br>Номер залікової книжки: [[student_id_number]]<br>Поточний напрямок: [[current_field_of_study]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br>Декана Факультету [[target_faculty]]<br><strong>[[university_name]]</strong><br>[[university_address]]</p>
                                <br/>
                                <p>Звертаюся з покірним проханням про переведення мене з напрямку <strong>[[current_field_of_study]]</strong> на напрямок <strong>[[target_field_of_study]]</strong>, що ведеться на Факультеті [[target_faculty]].</p>
                                <p>Обґрунтування заяви:</p>
                                <p>[[reason_for_transfer]]</p>
                                <p>Прошу позитивно розглянути мою заяву.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o przeniesienie na inny kierunek studiów',
                        'description' => 'Oficjalny wniosek studenta o przeniesienie na inny kierunek studiów w ramach tej samej uczelni.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O PRZENIESIENIE NA INNY KIERUNEK STUDIÓW</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Student: <strong>[[applicant_full_name]]</strong><br>Nr albumu: [[student_id_number]]<br>Obecny kierunek: [[current_field_of_study]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br>Dziekana Wydziału [[target_faculty]]<br><strong>[[university_name]]</strong><br>[[university_address]]</p>
                                <br/>
                                <p>Zwracam się z uprzejmą prośbą o przeniesienie mnie z kierunku <strong>[[current_field_of_study]]</strong> na kierunek <strong>[[target_field_of_study]]</strong>, prowadzony na Wydziale [[target_faculty]].</p>
                                <p>Uzasadnienie wniosku:</p>
                                <p>[[reason_for_transfer]]</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku.</p>
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

            // --- Заявление о переводе в другой ВУЗ / Application for Transfer to Another University ---
            [
                'slug' => 'transfer-university-application-de',
        'access_level' => 'free',
                'fields' => json_encode([
                    ["name" => "city", "type" => "text", "required" => true, "labels" => ["pl" => "Miejscowość", "en" => "City", "uk" => "Місто", "de" => "Ort"]],
                    ["name" => "applicant_full_name", "type" => "text", "required" => true, "labels" => ["pl" => "Imię i nazwisko studenta", "en" => "Student's Full Name", "uk" => "ПІБ студента", "de" => "Vollständiger Name des Studenten"]],
                    ["name" => "student_id_number", "type" => "text", "required" => true, "labels" => ["pl" => "Numer albumu/indeksu", "en" => "Student ID Number", "uk" => "Номер залікової книжки/індексу", "de" => "Matrikelnummer/Indexnummer"]],
                    ["name" => "current_university_name", "type" => "text", "required" => true, "labels" => ["pl" => "Obecna nazwa uczelni", "en" => "Current University Name", "uk" => "Поточна назва ВНЗ", "de" => "Aktueller Universitätsname"]],
                    ["name" => "current_faculty", "type" => "text", "required" => true, "labels" => ["pl" => "Obecny wydział", "en" => "Current Faculty", "uk" => "Поточний факультет", "de" => "Aktuelle Fakultät"]],
                    ["name" => "current_field_of_study", "type" => "text", "required" => true, "labels" => ["pl" => "Obecny kierunek studiów", "en" => "Current Field of Study", "uk" => "Поточний напрямок навчання", "de" => "Aktueller Studiengang"]],
                    ["name" => "target_university_name", "type" => "text", "required" => true, "labels" => ["pl" => "Docelowa nazwa uczelni", "en" => "Target University Name", "uk" => "Цільова назва ВНЗ", "de" => "Zieluniversitätsname"]],
                    ["name" => "target_university_address", "type" => "text", "required" => true, "labels" => ["pl" => "Adres docelowej uczelni", "en" => "Target University Address", "uk" => "Адреса цільового ВНЗ", "de" => "Adresse der Zieluniversität"]],
                    ["name" => "target_faculty", "type" => "text", "required" => true, "labels" => ["pl" => "Docelowy wydział", "en" => "Target Faculty", "uk" => "Цільовий факультет", "de" => "Zielfakultät"]],
                    ["name" => "target_field_of_study", "type" => "text", "required" => true, "labels" => ["pl" => "Docelowy kierunek studiów", "en" => "Target Field of Study", "uk" => "Цільовий напрямок навчання", "de" => "Zielstudiengang"]],
                    ["name" => "reason_for_transfer", "type" => "textarea", "required" => true, "labels" => ["pl" => "Uzasadnienie wniosku o przeniesienie", "en" => "Reason for transfer application", "uk" => "Обґрунтування заяви про переведення", "de" => "Begründung des Versetzungsantrags"]]
                ]),
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Hochschulwechsel',
                        'description' => 'Offizieller Antrag eines Studenten auf Wechsel zu einer anderen Universität.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANTRAG AUF HOCHSCHULWECHSEL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Antragsteller: <strong>[[applicant_full_name]]</strong><br>Matrikelnummer: [[student_id_number]]<br>Aktuelle Universität: [[current_university_name]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br>Rektor/Dekan der Fakultät [[target_faculty]]<br><strong>[[target_university_name]]</strong><br>[[target_university_address]]</p>
                                <br/>
                                <p>Hiermit beantrage ich höflich die Zustimmung zu meinem Wechsel von der Universität <strong>[[current_university_name]]</strong>, vom Studiengang [[current_field_of_study]], zu dem Studiengang <strong>[[target_field_of_study]]</strong>, der an der Fakultät [[target_faculty]] Ihrer Universität angeboten wird.</p>
                                <p>Begründung des Antrags:</p>
                                <p>[[reason_for_transfer]]</p>
                                <p>Ich bitte Sie, meinen Antrag positiv zu prüfen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Transfer to Another University',
                        'description' => 'Official student application for transfer to another university.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">APPLICATION FOR TRANSFER TO ANOTHER UNIVERSITY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Student: <strong>[[applicant_full_name]]</strong><br>Student ID: [[student_id_number]]<br>Current University: [[current_university_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br>Rector/Dean of the Faculty of [[target_faculty]]<br><strong>[[target_university_name]]</strong><br>[[target_university_address]]</p>
                                <br/>
                                <p>I hereby kindly request consent for my transfer from <strong>[[current_university_name]]</strong>, from the field of study [[current_field_of_study]], to the field of study <strong>[[target_field_of_study]]</strong>, offered by the Faculty of [[target_faculty]] at your university.</p>
                                <p>Reason for the application:</p>
                                <p>[[reason_for_transfer]]</p>
                                <p>Please kindly consider my application.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про переведення в інший ВНЗ',
                        'description' => 'Офіційна заява студента про переведення в інший ВНЗ.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАЯВА ПРО ПЕРЕВЕДЕННЯ В ІНШИЙ ВНЗ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Студент: <strong>[[applicant_full_name]]</strong><br>Номер залікової книжки: [[student_id_number]]<br>Поточний ВНЗ: [[current_university_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br>Ректора/Декана Факультету [[target_faculty]]<br><strong>[[target_university_name]]</strong><br>[[target_university_address]]</p>
                                <br/>
                                <p>Звертаюся з покірним проханням про надання згоди на моє переведення з ВНЗ <strong>[[current_university_name]]</strong>, з напрямку [[current_field_of_study]], на напрямок <strong>[[target_field_of_study]]</strong>, що ведеться на Факультеті [[target_faculty]] у Вашому ВНЗ.</p>
                                <p>Обґрунтування заяви:</p>
                                <p>[[reason_for_transfer]]</p>
                                <p>Прошу позитивно розглянути мою заяву.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o przeniesienie do innej uczelni',
                        'description' => 'Oficjalny wniosek studenta o przeniesienie na inną uczelnię.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O PRZENIESIENIE DO INNEJ UCZELNI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Student: <strong>[[applicant_full_name]]</strong><br>Nr albumu: [[student_id_number]]<br>Obecna uczelnia: [[current_university_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br>Rektora/Dziekana Wydziału [[target_faculty]]<br><strong>[[target_university_name]]</strong><br>[[target_university_address]]</p>
                                <br/>
                                <p>Zwracam się z uprzejmą prośbą o wyrażenie zgody na moje przeniesienie z uczelni <strong>[[current_university_name]]</strong>, z kierunku [[current_field_of_study]], na kierunek <strong>[[target_field_of_study]]</strong>, prowadzony na Wydziale [[target_faculty]] w Państwa uczelni.</p>
                                <p>Uzasadnienie wniosku:</p>
                                <p>[[reason_for_transfer]]</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku.</p>
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

            // --- План курсовой работы / Coursework Plan ---
            [
                'slug' => 'coursework-plan-de',
        'access_level' => 'free',
                'fields' => json_encode([
                    ["name" => "university_name", "type" => "text", "required" => true, "labels" => ["pl" => "Nazwa uczelni", "en" => "University Name", "uk" => "Назва ВНЗ", "de" => "Name der Universität"]],
                    ["name" => "faculty_name", "type" => "text", "required" => true, "labels" => ["pl" => "Nazwa wydziału", "en" => "Faculty Name", "uk" => "Назва факультету", "de" => "Name der Fakultät"]],
                    ["name" => "field_of_study", "type" => "text", "required" => true, "labels" => ["pl" => "Kierunek studiów", "en" => "Field of Study", "uk" => "Напрямок навчання", "de" => "Studiengang"]],
                    ["name" => "student_full_name", "type" => "text", "required" => true, "labels" => ["pl" => "Imię i nazwisko studenta", "en" => "Student's Full Name", "uk" => "ПІБ студента", "de" => "Vollständiger Name des Studenten"]],
                    ["name" => "student_id_number", "type" => "text", "required" => true, "labels" => ["pl" => "Numer albumu/indeksu", "en" => "Student ID Number", "uk" => "Номер залікової книжки/індексу", "de" => "Matrikelnummer/Indexnummer"]],
                    ["name" => "coursework_title", "type" => "text", "required" => true, "labels" => ["pl" => "Tytuł pracy zaliczeniowej/projektowej", "en" => "Coursework Title", "uk" => "Назва курсової роботи/проекту", "de" => "Titel der Studienarbeit/des Projekts"]],
                    ["name" => "supervisor_full_name", "type" => "text", "required" => true, "labels" => ["pl" => "Imię i nazwisko promotora/opiekuna", "en" => "Supervisor's Full Name", "uk" => "ПІБ керівника/наукового керівника", "de" => "Vollständiger Name des Betreuers/Mentors"]],
                    ["name" => "plan_sections", "type" => "textarea", "required" => true, "labels" => ["pl" => "Plan pracy (rozdziały, podrozdziały, opis)", "en" => "Work plan (chapters, subchapters, description)", "uk" => "План роботи (розділи, підрозділи, опис)", "de" => "Arbeitsplan (Kapitel, Unterkapitel, Beschreibung)"]],
                    ["name" => "bibliography", "type" => "textarea", "required" => true, "labels" => ["pl" => "Wstępna bibliografia", "en" => "Preliminary bibliography", "uk" => "Попередня бібліографія", "de" => "Vorläufige Bibliographie"]],
                    ["name" => "deadline", "type" => "date", "required" => true, "labels" => ["pl" => "Planowany termin złożenia", "en" => "Planned Submission Deadline", "uk" => "Планований термін подання", "de" => "Geplanter Abgabetermin"]]
                ]),
                'translations' => [
                    'de' => [
                        'title' => 'Plan der Studienarbeit/des Projekts',
                        'description' => 'Eine Vorlage zur Erstellung eines Plans für eine Studienarbeit oder ein Studentenprojekt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PLAN DER STUDIENARBEIT/DES PROJEKTS</h1><p style="font-size: 14px;"><strong>[[university_name]]</strong><br>Fakultät [[faculty_name]]<br>Studiengang: [[field_of_study]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Student: [[student_full_name]]<br>Matrikelnummer: [[student_id_number]]</p></td><td style="text-align: right;"><p>Betreuer: [[supervisor_full_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Titel der Arbeit: <br>[[coursework_title]]</h2>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. ARBEITSPLAN</h2>
                                <pre>[[plan_sections]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. VORLÄUFIGE BIBLIOGRAPHIE</h2>
                                <pre>[[bibliography]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">3. GEPLANTER ABGABETERMIN</h2>
                                <p><strong>[[deadline]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift des Studenten)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Coursework Plan',
                        'description' => 'A template for creating a plan for coursework or a student project.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">COURSEWORK PLAN</h1><p style="font-size: 14px;"><strong>[[university_name]]</strong><br>Faculty of [[faculty_name]]<br>Field of Study: [[field_of_study]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Student: [[student_full_name]]<br>Student ID: [[student_id_number]]</p></td><td style="text-align: right;"><p>Supervisor: [[supervisor_full_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Coursework Title: <br>[[coursework_title]]</h2>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. WORK PLAN</h2>
                                <pre>[[plan_sections]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. PRELIMINARY BIBLIOGRAPHY</h2>
                                <pre>[[bibliography]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">3. PLANNED SUBMISSION DEADLINE</h2>
                                <p><strong>[[deadline]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Student\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'План курсової роботи',
                        'description' => 'Шаблон для створення плану курсової роботи або студентського проекту.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПЛАН КУРСОВОЇ РОБОТИ</h1><p style="font-size: 14px;"><strong>[[university_name]]</strong><br>Факультет [[faculty_name]]<br>Напрямок: [[field_of_study]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Студент: [[student_full_name]]<br>Номер залікової книжки: [[student_id_number]]</p></td><td style="text-align: right;"><p>Керівник: [[supervisor_full_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Назва роботи: <br>[[coursework_title]]</h2>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. ПЛАН РОБОТИ</h2>
                                <pre>[[plan_sections]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. ПОПЕРЕДНЯ БІБЛІОГРАФІЯ</h2>
                                <pre>[[bibliography]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">3. ПЛАНОВАНИЙ ТЕРМІН ПОДАННЯ</h2>
                                <p><strong>[[deadline]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис студента)</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Plan pracy zaliczeniowej/projektowej',
                        'description' => 'Szablon do tworzenia planu pracy zaliczeniowej lub projektu studenckiego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PLAN PRACY ZALICZENIOWEJ/PROJEKTOWEJ</h1><p style="font-size: 14px;"><strong>[[university_name]]</strong><br>Wydział [[faculty_name]]<br>Kierunek: [[field_of_study]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Student: [[student_full_name]]<br>Nr albumu: [[student_id_number]]</p></td><td style="text-align: right;"><p>Promotor/Opiekun: [[supervisor_full_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Tytuł pracy: <br>[[coursework_title]]</h2>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. PLAN PRACY</h2>
                                <pre>[[plan_sections]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. WSTĘPNA BIBLIOGRAFIA</h2>
                                <pre>[[bibliography]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">3. PLANOWANY TERMIN ZŁOŻENIA</h2>
                                <p><strong>[[deadline]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis studenta)</p>
                            </div>'
                    ]
                ]
            ],

            // --- План дипломной работы / Diploma Thesis Plan ---
            [
                'slug' => 'diploma-thesis-plan-de',
        'access_level' => 'free',
                'fields' => json_encode([
                    ["name" => "university_name", "type" => "text", "required" => true, "labels" => ["pl" => "Nazwa uczelni", "en" => "University Name", "uk" => "Назва ВНЗ", "de" => "Name der Universität"]],
                    ["name" => "faculty_name", "type" => "text", "required" => true, "labels" => ["pl" => "Nazwa wydziału", "en" => "Faculty Name", "uk" => "Назва факультету", "de" => "Name der Fakultät"]],
                    ["name" => "field_of_study", "type" => "text", "required" => true, "labels" => ["pl" => "Kierunek studiów", "en" => "Field of Study", "uk" => "Напрямок навчання", "de" => "Studiengang"]],
                    ["name" => "student_full_name", "type" => "text", "required" => true, "labels" => ["pl" => "Imię i nazwisko studenta", "en" => "Student's Full Name", "uk" => "ПІБ студента", "de" => "Vollständiger Name des Studenten"]],
                    ["name" => "student_id_number", "type" => "text", "required" => true, "labels" => ["pl" => "Numer albumu/indeksu", "en" => "Student ID Number", "uk" => "Номер залікової книжки/індексу", "de" => "Matrikelnummer/Indexnummer"]],
                    ["name" => "thesis_title", "type" => "text", "required" => true, "labels" => ["pl" => "Tytuł pracy dyplomowej", "en" => "Thesis Title", "uk" => "Назва дипломної роботи", "de" => "Titel der Abschlussarbeit"]],
                    ["name" => "supervisor_full_name", "type" => "text", "required" => true, "labels" => ["pl" => "Imię i nazwisko promotora", "en" => "Supervisor's Full Name", "uk" => "ПІБ наукового керівника", "de" => "Vollständiger Name des Betreuers"]],
                    ["name" => "plan_sections", "type" => "textarea", "required" => true, "labels" => ["pl" => "Plan pracy (rozdziały, podrozdziały, opis)", "en" => "Work plan (chapters, subchapters, description)", "uk" => "План роботи (розділи, підрозділи, опис)", "de" => "Arbeitsplan (Kapitel, Unterkapitel, Beschreibung)"]],
                    ["name" => "bibliography", "type" => "textarea", "required" => true, "labels" => ["pl" => "Wstępna bibliografia", "en" => "Preliminary bibliography", "uk" => "Попередня бібліографія", "de" => "Vorläufige Bibliographie"]],
                    ["name" => "deadline", "type" => "date", "required" => true, "labels" => ["pl" => "Planowany termin złożenia", "en" => "Planned Submission Deadline", "uk" => "Планований термін подання", "de" => "Geplanter Abgabetermin"]]
                ]),
                'translations' => [
                    'de' => [
                        'title' => 'Plan der Abschlussarbeit',
                        'description' => 'Eine Vorlage zur Erstellung eines Plans für eine Abschlussarbeit (Bachelor-/Master-/Diplomarbeit).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PLAN DER ABSCHLUSSARBEIT</h1><p style="font-size: 14px;"><strong>[[university_name]]</strong><br>Fakultät [[faculty_name]]<br>Studiengang: [[field_of_study]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Student: [[student_full_name]]<br>Matrikelnummer: [[student_id_number]]</p></td><td style="text-align: right;"><p>Betreuer: [[supervisor_full_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Titel der Arbeit: <br>[[thesis_title]]</h2>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. ARBEITSPLAN</h2>
                                <pre>[[plan_sections]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. VORLÄUFIGE BIBLIOGRAPHIE</h2>
                                <pre>[[bibliography]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">3. GEPLANTER ABGABETERMIN</h2>
                                <p><strong>[[deadline]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift des Studenten)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Diploma Thesis Plan',
                        'description' => 'A template for creating a plan for a diploma thesis (bachelor\'s/master\'s/engineer\'s).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DIPLOMA THESIS PLAN</h1><p style="font-size: 14px;"><strong>[[university_name]]</strong><br>Faculty of [[faculty_name]]<br>Field of Study: [[field_of_study]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Student: [[student_full_name]]<br>Student ID: [[student_id_number]]</p></td><td style="text-align: right;"><p>Supervisor: [[supervisor_full_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Thesis Title: <br>[[thesis_title]]</h2>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. WORK PLAN</h2>
                                <pre>[[plan_sections]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. PRELIMINARY BIBLIOGRAPHY</h2>
                                <pre>[[bibliography]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">3. PLANNED SUBMISSION DEADLINE</h2>
                                <p><strong>[[deadline]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Student\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'План дипломної роботи',
                        'description' => 'Шаблон для створення плану дипломної роботи (бакалаврської/магістерської/інженерної).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПЛАН ДИПЛОМНОЇ РОБОТИ</h1><p style="font-size: 14px;"><strong>[[university_name]]</strong><br>Факультет [[faculty_name]]<br>Напрямок: [[field_of_study]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Студент: [[student_full_name]]<br>Номер залікової книжки: [[student_id_number]]</p></td><td style="text-align: right;"><p>Керівник: [[supervisor_full_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Назва роботи: <br>[[thesis_title]]</h2>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. ПЛАН РОБОТИ</h2>
                                <pre>[[plan_sections]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. ПОПЕРЕДНЯ БІБЛІОГРАФІЯ</h2>
                                <pre>[[bibliography]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">3. ПЛАНОВАНИЙ ТЕРМІН ПОДАННЯ</h2>
                                <p><strong>[[deadline]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис студента)</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Plan pracy dyplomowej',
                        'description' => 'Szablon do tworzenia planu pracy dyplomowej (licencjackiej/magisterskiej/inżynierskiej).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PLAN PRACY DYPLOMOWEJ</h1><p style="font-size: 14px;"><strong>[[university_name]]</strong><br>Wydział [[faculty_name]]<br>Kierunek: [[field_of_study]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Student: [[student_full_name]]<br>Nr albumu: [[student_id_number]]</p></td><td style="text-align: right;"><p>Promotor: [[supervisor_full_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Tytuł pracy: <br>[[thesis_title]]</h2>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. PLAN PRACY</h2>
                                <pre>[[plan_sections]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. WSTĘPNA BIBLIOGRAFIA</h2>
                                <pre>[[bibliography]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">3. PLANOWANY TERMIN ZŁOŻENIA</h2>
                                <p><strong>[[deadline]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis studenta)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Титульный лист для реферата / Title Page for Essay/Report ---
            [
                'slug' => 'essay-title-page-de',
        'access_level' => 'free',
                'fields' => json_encode([
                    ["name" => "university_name", "type" => "text", "required" => true, "labels" => ["pl" => "Nazwa uczelni", "en" => "University Name", "uk" => "Назва ВНЗ", "de" => "Name der Universität"]],
                    ["name" => "faculty_name", "type" => "text", "required" => true, "labels" => ["pl" => "Nazwa wydziału", "en" => "Faculty Name", "uk" => "Назва факультету", "de" => "Name der Fakultät"]],
                    ["name" => "field_of_study", "type" => "text", "required" => true, "labels" => ["pl" => "Kierunek studiów", "en" => "Field of Study", "uk" => "Напрямок навчання", "de" => "Studiengang"]],
                    ["name" => "course_name", "type" => "text", "required" => true, "labels" => ["pl" => "Nazwa przedmiotu", "en" => "Course Name", "uk" => "Назва предмета", "de" => "Name des Kurses"]],
                    ["name" => "essay_title", "type" => "text", "required" => true, "labels" => ["pl" => "Tytuł referatu/eseju", "en" => "Essay/Report Title", "uk" => "Назва реферату/есе", "de" => "Titel des Referats/Essays"]],
                    ["name" => "student_full_name", "type" => "text", "required" => true, "labels" => ["pl" => "Imię i nazwisko studenta", "en" => "Student's Full Name", "uk" => "ПІБ студента", "de" => "Vollständiger Name des Studenten"]],
                    ["name" => "student_id_number", "type" => "text", "required" => true, "labels" => ["pl" => "Numer albumu/indeksu", "en" => "Student ID Number", "uk" => "Номер залікової книжки/індексу", "de" => "Matrikelnummer/Indexnummer"]],
                    ["name" => "supervisor_full_name", "type" => "text", "required" => true, "labels" => ["pl" => "Imię i nazwisko prowadzącego zajęcia", "en" => "Course Instructor's Full Name", "uk" => "ПІБ викладача", "de" => "Vollständiger Name des Dozenten"]],
                    ["name" => "city", "type" => "text", "required" => true, "labels" => ["pl" => "Miejscowość", "en" => "City", "uk" => "Місто", "de" => "Ort"]],
                    ["name" => "year", "type" => "text", "required" => true, "labels" => ["pl" => "Rok akademicki", "en" => "Academic Year", "uk" => "Навчальний рік", "de" => "Akademisches Jahr"]]
                ]),
                'translations' => [
                    'de' => [
                        'title' => 'Titelseite für Referat/Essay',
                        'description' => 'Standardvorlage für die Titelseite eines Studentenreferats oder Essays.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-top: 50px;">
                                <p style="font-size: 14px; font-weight: bold;">[[university_name]]</p>
                                <p style="font-size: 12px;">Fakultät [[faculty_name]]</p>
                                <p style="font-size: 12px;">Studiengang: [[field_of_study]]</p>
                                <br/><br/>
                                <h1 style="font-size: 24px; font-weight: bold;">[[essay_title]]</h1>
                                <br/><br/>
                                <p style="font-size: 12px;">Fach: [[course_name]]</p>
                                <p style="font-size: 12px;">Dozent: [[supervisor_full_name]]</p>
                                <br/><br/>
                                <p style="font-size: 12px;">Autor: [[student_full_name]]</p>
                                <p style="font-size: 12px;">Matrikelnummer: [[student_id_number]]</p>
                                <br/><br/><br/><br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.6;">
                                <p>[[city]], [[year]]</p>
                            </div>',
                        'footer_html' => '' // Empty as per request
                    ],
                    'en' => [
                        'title' => 'Title Page for Essay/Report',
                        'description' => 'Standard title page template for a student essay or report.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-top: 50px;">
                                <p style="font-size: 14px; font-weight: bold;">[[university_name]]</p>
                                <p style="font-size: 12px;">Faculty of [[faculty_name]]</p>
                                <p style="font-size: 12px;">Field of Study: [[field_of_study]]</p>
                                <br/><br/>
                                <h1 style="font-size: 24px; font-weight: bold;">[[essay_title]]</h1>
                                <br/><br/>
                                <p style="font-size: 12px;">Course: [[course_name]]</p>
                                <p style="font-size: 12px;">Instructor: [[supervisor_full_name]]</p>
                                <br/><br/>
                                <p style="font-size: 12px;">Author: [[student_full_name]]</p>
                                <p style="font-size: 12px;">Student ID: [[student_id_number]]</p>
                                <br/><br/><br/><br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.6;">
                                <p>[[city]], [[year]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'uk' => [
                        'title' => 'Титульний лист для реферату',
                        'description' => 'Стандартний шаблон титульного листа для реферату або студентського есе.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-top: 50px;">
                                <p style="font-size: 14px; font-weight: bold;">[[university_name]]</p>
                                <p style="font-size: 12px;">Факультет [[faculty_name]]</p>
                                <p style="font-size: 12px;">Напрямок: [[field_of_study]]</p>
                                <br/><br/>
                                <h1 style="font-size: 24px; font-weight: bold;">[[essay_title]]</h1>
                                <br/><br/>
                                <p style="font-size: 12px;">Предмет: [[course_name]]</p>
                                <p style="font-size: 12px;">Викладач: [[supervisor_full_name]]</p>
                                <br/><br/>
                                <p style="font-size: 12px;">Автор: [[student_full_name]]</p>
                                <p style="font-size: 12px;">Номер залікової книжки: [[student_id_number]]</p>
                                <br/><br/><br/><br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.6;">
                                <p>[[city]], [[year]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'pl' => [
                        'title' => 'Strona tytułowa referatu/eseju',
                        'description' => 'Standardowy szablon strony tytułowej dla referatu lub eseju studenckiego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-top: 50px;">
                                <p style="font-size: 14px; font-weight: bold;">[[university_name]]</p>
                                <p style="font-size: 12px;">Wydział [[faculty_name]]</p>
                                <p style="font-size: 12px;">Kierunek: [[field_of_study]]</p>
                                <br/><br/>
                                <h1 style="font-size: 24px; font-weight: bold;">[[essay_title]]</h1>
                                <br/><br/>
                                <p style="font-size: 12px;">Przedmiot: [[course_name]]</p>
                                <p style="font-size: 12px;">Prowadzący: [[supervisor_full_name]]</p>
                                <br/><br/>
                                <p style="font-size: 12px;">Autor: [[student_full_name]]</p>
                                <p style="font-size: 12px;">Nr albumu: [[student_id_number]]</p>
                                <br/><br/><br/><br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.6;">
                                <p>[[city]], [[year]]</p>
                            </div>',
                        'footer_html' => ''
                    ]
                ]
            ],

            // --- Титульный лист для курсовой работы / Title Page for Coursework ---
            [
                'slug' => 'coursework-title-page-de',
        'access_level' => 'free',
                'fields' => json_encode([
                    ["name" => "university_name", "type" => "text", "required" => true, "labels" => ["pl" => "Nazwa uczelni", "en" => "University Name", "uk" => "Назва ВНЗ", "de" => "Name der Universität"]],
                    ["name" => "faculty_name", "type" => "text", "required" => true, "labels" => ["pl" => "Nazwa wydziału", "en" => "Faculty Name", "uk" => "Назва факультету", "de" => "Name der Fakultät"]],
                    ["name" => "field_of_study", "type" => "text", "required" => true, "labels" => ["pl" => "Kierunek studiów", "en" => "Field of Study", "uk" => "Напрямок навчання", "de" => "Studiengang"]],
                    ["name" => "coursework_title", "type" => "text", "required" => true, "labels" => ["pl" => "Tytuł pracy zaliczeniowej/projektowej", "en" => "Coursework Title", "uk" => "Назва курсової роботи/проекту", "de" => "Titel der Studienarbeit/des Projekts"]],
                    ["name" => "student_full_name", "type" => "text", "required" => true, "labels" => ["pl" => "Imię i nazwisko studenta", "en" => "Student's Full Name", "uk" => "ПІБ студента", "de" => "Vollständiger Name des Studenten"]],
                    ["name" => "student_id_number", "type" => "text", "required" => true, "labels" => ["pl" => "Numer albumu/indeksu", "en" => "Student ID Number", "uk" => "Номер залікової книжки/індексу", "de" => "Matrikelnummer/Indexnummer"]],
                    ["name" => "supervisor_full_name", "type" => "text", "required" => true, "labels" => ["pl" => "Imię i nazwisko promotora/opiekuna", "en" => "Supervisor's Full Name", "uk" => "ПІБ керівника/наукового керівника", "de" => "Vollständiger Name des Betreuers/Mentors"]],
                    ["name" => "city", "type" => "text", "required" => true, "labels" => ["pl" => "Miejscowość", "en" => "City", "uk" => "Місто", "de" => "Ort"]],
                    ["name" => "year", "type" => "text", "required" => true, "labels" => ["pl" => "Rok akademicki", "en" => "Academic Year", "uk" => "Навчальний рік", "de" => "Akademisches Jahr"]]
                ]),
                'translations' => [
                    'de' => [
                        'title' => 'Titelseite für Studienarbeit/Projekt',
                        'description' => 'Standardvorlage für die Titelseite einer Studienarbeit oder eines Studentenprojekts.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-top: 50px;">
                                <p style="font-size: 14px; font-weight: bold;">[[university_name]]</p>
                                <p style="font-size: 12px;">Fakultät [[faculty_name]]</p>
                                <p style="font-size: 12px;">Studiengang: [[field_of_study]]</p>
                                <br/><br/>
                                <h1 style="font-size: 24px; font-weight: bold;">STUDIENARBEIT/PROJEKT</h1>
                                <h2 style="font-size: 20px; font-weight: bold;">[[coursework_title]]</h2>
                                <br/><br/>
                                <p style="font-size: 12px;">Autor: [[student_full_name]]</p>
                                <p style="font-size: 12px;">Matrikelnummer: [[student_id_number]]</p>
                                <br/>
                                <p style="font-size: 12px;">Betreuer: [[supervisor_full_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.6;">
                                <p>[[city]], [[year]]</p>
                            </div>',
                        'footer_html' => '' // Empty as per request
                    ],
                    'en' => [
                        'title' => 'Title Page for Coursework',
                        'description' => 'Standard title page template for student coursework or project.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-top: 50px;">
                                <p style="font-size: 14px; font-weight: bold;">[[university_name]]</p>
                                <p style="font-size: 12px;">Faculty of [[faculty_name]]</p>
                                <p style="font-size: 12px;">Field of Study: [[field_of_study]]</p>
                                <br/><br/>
                                <h1 style="font-size: 24px; font-weight: bold;">COURSEWORK/PROJECT</h1>
                                <h2 style="font-size: 20px; font-weight: bold;">[[coursework_title]]</h2>
                                <br/><br/>
                                <p style="font-size: 12px;">Author: [[student_full_name]]</p>
                                <p style="font-size: 12px;">Student ID: [[student_id_number]]</p>
                                <br/>
                                <p style="font-size: 12px;">Supervisor: [[supervisor_full_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.6;">
                                <p>[[city]], [[year]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'uk' => [
                        'title' => 'Титульний лист для курсової роботи',
                        'description' => 'Стандартний шаблон титульного листа для курсової роботи або студентського проекту.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 24px; font-weight: bold;">КУРСОВА РОБОТА/ПРОЕКТ</h1><p style="font-size: 14px;"><strong>[[university_name]]</strong><br>Факультет [[faculty_name]]<br>Напрямок: [[field_of_study]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Студент: [[student_full_name]]<br>Номер залікової книжки: [[student_id_number]]</p></td><td style="text-align: right;"><p>Керівник: [[supervisor_full_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Назва роботи: <br>[[coursework_title]]</h2>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. ПЛАН РОБОТИ</h2>
                                <pre>[[plan_sections]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. ПОПЕРЕДНЯ БІБЛІОГРАФІЯ</h2>
                                <pre>[[bibliography]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">3. ПЛАНОВАНИЙ ТЕРМІН ПОДАННЯ</h2>
                                <p><strong>[[deadline]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис студента)</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Strona tytułowa pracy zaliczeniowej/projektowej',
                        'description' => 'Standardowy szablon strony tytułowej dla pracy zaliczeniowej lub projektu studenckiego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 24px; font-weight: bold;">PRACA ZALICZENIOWA/PROJEKTOWA</h1><p style="font-size: 14px;"><strong>[[university_name]]</strong><br>Wydział [[faculty_name]]<br>Kierunek: [[field_of_study]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Student: [[student_full_name]]<br>Nr albumu: [[student_id_number]]</p></td><td style="text-align: right;"><p>Promotor/Opiekun: [[supervisor_full_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Tytuł pracy: <br>[[coursework_title]]</h2>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. PLAN PRACY</h2>
                                <pre>[[plan_sections]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. WSTĘPNA BIBLIOGRAFIA</h2>
                                <pre>[[bibliography]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">3. PLANOWANY TERMIN ZŁOŻENIA</h2>
                                <p><strong>[[deadline]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis studenta)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Титульный лист для дипломной работы / Title Page for Diploma Thesis (Titelseite Abschlussarbeit) ---
            [
                'slug' => 'diploma-thesis-title-page-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"university_name","type":"text","required":true,"labels":{"pl":"Nazwa uczelni","en":"University Name","uk":"Назва ВНЗ","de":"Name der Universität"}},
                    {"name":"faculty_name","type":"text","required":true,"labels":{"pl":"Nazwa wydziału","en":"Faculty Name","uk":"Назва факультету","de":"Name der Fakultät"}},
                    {"name":"field_of_study","type":"text","required":true,"labels":{"pl":"Kierunek studiów","en":"Field of Study","uk":"Напрямок навчання","de":"Studiengang"}},
                    {"name":"thesis_type","type":"text","required":true,"labels":{"pl":"Typ pracy (np. licencjacka, inżynierska, magisterska)","en":"Thesis Type (e.g., bachelor\'s, engineering, master\'s)","uk":"Тип роботи (напр., бакалаврська, інженерна, магістерська)","de":"Art der Arbeit (z.B. Bachelor-, Ingenieur-, Masterarbeit)"}},
                    {"name":"thesis_title","type":"text","required":true,"labels":{"pl":"Tytuł pracy dyplomowej","en":"Thesis Title","uk":"Назва дипломної роботи","de":"Titel der Abschlussarbeit"}},
                    {"name":"student_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko studenta","en":"Student\'s Full Name","uk":"ПІБ студента","de":"Vollständiger Name des Studenten"}},
                    {"name":"student_id_number","type":"text","required":true,"labels":{"pl":"Numer albumu/indeksu","en":"Student ID Number","uk":"Номер залікової книжки/індексу","de":"Matrikelnummer/Indexnummer"}},
                    {"name":"supervisor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko promotora","en":"Supervisor\'s Full Name","uk":"ПІБ наукового керівника","de":"Vollständiger Name des Betreuers"}},
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"year","type":"text","required":true,"labels":{"pl":"Rok akademicki","en":"Academic Year","uk":"Навчальний рік","de":"Akademisches Jahr"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Titelseite Abschlussarbeit',
                        'description' => 'Standardvorlage für die Titelseite einer Abschlussarbeit (Bachelor-, Master-, Ingenieurarbeit) in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-top: 50px;">
                                <p style="font-size: 14px; font-weight: bold;">[[university_name]]</p>
                                <p style="font-size: 12px;">Fakultät [[faculty_name]]</p>
                                <p style="font-size: 12px;">Studiengang: [[field_of_study]]</p>
                                <br/><br/>
                                <h1 style="font-size: 24px; font-weight: bold;">[[thesis_type]] ARBEIT</h1>
                                <h2 style="font-size: 20px; font-weight: bold;">[[thesis_title]]</h2>
                                <br/><br/>
                                <p style="font-size: 12px;">Autor: [[student_full_name]]</p>
                                <p style="font-size: 12px;">Matrikelnummer: [[student_id_number]]</p>
                                <br/>
                                <p style="font-size: 12px;">Betreuer: [[supervisor_full_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.6;">
                                <p>[[city]], [[year]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'en' => [
                        'title' => 'Title Page Diploma Thesis',
                        'description' => 'Standard title page template for a diploma thesis (bachelor\'s, master\'s, engineering thesis) in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-top: 50px;">
                                <p style="font-size: 14px; font-weight: bold;">[[university_name]]</p>
                                <p style="font-size: 12px;">Faculty of [[faculty_name]]</p>
                                <p style="font-size: 12px;">Field of Study: [[field_of_study]]</p>
                                <br/><br/>
                                <h1 style="font-size: 24px; font-weight: bold;">[[thesis_type]] THESIS</h1>
                                <h2 style="font-size: 20px; font-weight: bold;">[[thesis_title]]</h2>
                                <br/><br/>
                                <p style="font-size: 12px;">Author: [[student_full_name]]</p>
                                <p style="font-size: 12px;">Student ID: [[student_id_number]]</p>
                                <br/>
                                <p style="font-size: 12px;">Supervisor: [[supervisor_full_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.6;">
                                <p>[[city]], [[year]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'uk' => [
                        'title' => 'Титульний лист дипломної роботи',
                        'description' => 'Стандартний шаблон титульного листа для дипломної роботи (бакалаврської, магістерської, інженерної) в Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-top: 50px;">
                                <p style="font-size: 14px; font-weight: bold;">[[university_name]]</p>
                                <p style="font-size: 12px;">Факультет [[faculty_name]]</p>
                                <p style="font-size: 12px;">Напрямок: [[field_of_study]]</p>
                                <br/><br/>
                                <h1 style="font-size: 24px; font-weight: bold;">ДИПЛОМНА РОБОТА [[thesis_type]]</h1>
                                <h2 style="font-size: 20px; font-weight: bold;">[[thesis_title]]</h2>
                                <br/><br/>
                                <p style="font-size: 12px;">Автор: [[student_full_name]]</p>
                                <p style="font-size: 12px;">Номер залікової книжки: [[student_id_number]]</p>
                                <br/>
                                <p style="font-size: 12px;">Керівник: [[supervisor_full_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.6;">
                                <p>[[city]], [[year]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'pl' => [
                        'title' => 'Strona tytułowa pracy dyplomowej',
                        'description' => 'Standardowy szablon strony tytułowej dla pracy dyplomowej (licencjackiej, inżynierskiej, magisterskiej) w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-top: 50px;">
                                <p style="font-size: 14px; font-weight: bold;">[[university_name]]</p>
                                <p style="font-size: 12px;">Wydział [[faculty_name]]</p>
                                <p style="font-size: 12px;">Kierunek: [[field_of_study]]</p>
                                <br/><br/>
                                <h1 style="font-size: 24px; font-weight: bold;">PRACA [[thesis_type]]</h1>
                                <h2 style="font-size: 20px; font-weight: bold;">[[thesis_title]]</h2>
                                <br/><br/>
                                <p style="font-size: 12px;">Autor: [[student_full_name]]</p>
                                <p style="font-size: 12px;">Nr albumu: [[student_id_number]]</p>
                                <br/>
                                <p style="font-size: 12px;">Promotor: [[supervisor_full_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.6;">
                                <p>[[city]], [[year]]</p>
                            </div>',
                        'footer_html' => ''
                    ]
                ]
            ],

            // --- Рецензия на научную работу / Review of Scientific Work (Gutachten über wissenschaftliche Arbeit) ---
            [
                'slug' => 'scientific-work-review-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"review_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia recenzji","en":"Review Date","uk":"Дата складання рецензії","de":"Datum des Gutachtens"}},
                    {"name":"reviewer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko recenzenta","en":"Reviewer\'s Full Name","uk":"ПІБ рецензента","de":"Vollständiger Name des Gutachters"}},
                    {"name":"reviewer_title_affiliation","type":"text","required":true,"labels":{"pl":"Tytuł naukowy/stanowisko i afiliacja recenzenta","en":"Reviewer\'s Title/Position and Affiliation","uk":"Науковий ступінь/посада та афіліація рецензента","de":"Akademischer Grad/Position und Zugehörigkeit des Gutachters"}},
                    {"name":"work_author_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko autora pracy","en":"Work Author\'s Full Name","uk":"ПІБ автора роботи","de":"Vollständiger Name des Autors der Arbeit"}},
                    {"name":"work_title","type":"text","required":true,"labels":{"pl":"Tytuł pracy naukowej","en":"Scientific Work Title","uk":"Назва наукової роботи","de":"Titel der wissenschaftlichen Arbeit"}},
                    {"name":"review_content","type":"textarea","required":true,"labels":{"pl":"Treść recenzji (ocena, mocne strony, słabe strony, wnioski)","en":"Review content (evaluation, strengths, weaknesses, conclusions)","uk":"Зміст рецензії (оцінка, сильні сторони, слабкі сторони, висновки)","de":"Inhalt des Gutachtens (Bewertung, Stärken, Schwächen, Schlussfolgerungen)"}},
                    {"name":"final_grade_recommendation","type":"text","required":true,"labels":{"pl":"Końcowa ocena/rekomendacja","en":"Final grade/recommendation","uk":"Підсумкова оцінка/рекомендація","de":"Endnote/Empfehlung"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Gutachten über wissenschaftliche Arbeit',
                        'description' => 'Vorlage für ein Gutachten über eine wissenschaftliche Arbeit, enthaltend eine inhaltliche und formale Bewertung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GUTACHTEN ÜBER WISSENSCHAFTLICHE ARBEIT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Gutachter: <strong>[[reviewer_full_name]]</strong><br>[[reviewer_title_affiliation]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[review_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Arbeitstitel: <br>[[work_title]]</h2>
                                <p style="text-align: center;">Autor: [[work_author_full_name]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. Inhalt des Gutachtens</h2>
                                <p>[[review_content]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. Endnote/Empfehlung</h2>
                                <p><strong>[[final_grade_recommendation]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift des Gutachters)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Review of Scientific Work',
                        'description' => 'A template for a review of a scientific work, including a substantive and formal evaluation.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REVIEW OF SCIENTIFIC WORK</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Reviewer: <strong>[[reviewer_full_name]]</strong><br>[[reviewer_title_affiliation]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[review_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Work Title: <br>[[work_title]]</h2>
                                <p style="text-align: center;">Author: [[work_author_full_name]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. Review Content</h2>
                                <p>[[review_content]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. Final Grade/Recommendation</h2>
                                <p><strong>[[final_grade_recommendation]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Reviewer\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Рецензія на наукову роботу',
                        'description' => 'Шаблон рецензії на наукову роботу, що містить змістовну та формальну оцінку.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РЕЦЕНЗІЯ НА НАУКОВУ РОБОТУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Рецензент: <strong>[[reviewer_full_name]]</strong><br>[[reviewer_title_affiliation]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: [[review_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Робота на тему: <br>[[work_title]]</h2>
                                <p style="text-align: center;">Автор: [[work_author_full_name]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. Зміст рецензії</h2>
                                <p>[[review_content]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. Підсумкова оцінка/Рекомендація</h2>
                                <p><strong>[[final_grade_recommendation]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис рецензента)</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Recenzja pracy naukowej',
                        'description' => 'Szablon recenzji pracy naukowej, zawierający ocenę merytoryczną i formalną.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECENZJA PRACY NAUKOWEJ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Recenzent: <strong>[[reviewer_full_name]]</strong><br>[[reviewer_title_affiliation]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: [[review_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Praca pt.: <br>[[work_title]]</h2>
                                <p style="text-align: center;">Autor: [[work_author_full_name]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. Treść recenzji</h2>
                                <p>[[review_content]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. Końcowa ocena/rekomendacja</h2>
                                <p><strong>[[final_grade_recommendation]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis recenzenta)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Отзыв научного руководителя / Supervisor's Review (Gutachten des Betreuers) ---
            [
                'slug' => 'supervisor-review-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"review_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia opinii","en":"Review Date","uk":"Дата складання відгуку","de":"Datum des Gutachtens"}},
                    {"name":"supervisor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko promotora/opiekuna","en":"Supervisor\'s Full Name","uk":"ПІБ наукового керівника","de":"Vollständiger Name des Betreuers"}},
                    {"name":"supervisor_title_affiliation","type":"text","required":true,"labels":{"pl":"Tytuł naukowy/stanowisko i afiliacja promotora","en":"Supervisor\'s Title/Position and Affiliation","uk":"Науковий ступінь/посада та афіліація наукового керівника","de":"Akademischer Grad/Position und Zugehörigkeit des Betreuers"}},
                    {"name":"student_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko studenta","en":"Student\'s Full Name","uk":"ПІБ студента","de":"Vollständiger Name des Studenten"}},
                    {"name":"student_id_number","type":"text","required":true,"labels":{"pl":"Numer albumu/indeksu","en":"Student ID Number","uk":"Номер залікової книжки/індексу","de":"Matrikelnummer/Indexnummer"}},
                    {"name":"work_title","type":"text","required":true,"labels":{"pl":"Tytuł pracy (np. dyplomowej, zaliczeniowej)","en":"Work Title (e.g., diploma, coursework)","uk":"Назва роботи (напр., дипломної, курсової)","de":"Titel der Arbeit (z.B. Diplomarbeit, Studienarbeit)"}},
                    {"name":"review_content","type":"textarea","required":true,"labels":{"pl":"Treść opinii (ocena współpracy, zaangażowania, samodzielności, efektów pracy)","en":"Review content (evaluation of cooperation, commitment, independence, work results)","uk":"Зміст відгуку (оцінка співпраці, залученості, самостійності, результатів роботи)","de":"Inhalt des Gutachtens (Bewertung der Zusammenarbeit, des Engagements, der Selbstständigkeit, der Arbeitsergebnisse)"}},
                    {"name":"final_grade_recommendation","type":"text","required":true,"labels":{"pl":"Końcowa ocena/rekomendacja","en":"Final grade/recommendation","uk":"Підсумкова оцінка/рекомендація","de":"Endnote/Empfehlung"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Gutachten des Betreuers',
                        'description' => 'Vorlage für ein Gutachten, das vom Betreuer oder Mentor einer studentischen Arbeit erstellt wird.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GUTACHTEN DES BETREUERS</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Betreuer: <strong>[[supervisor_full_name]]</strong><br>[[supervisor_title_affiliation]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[review_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Betrifft Arbeitstitel: <br>[[work_title]]</h2>
                                <p style="text-align: center;">Autor: [[student_full_name]] (Matrikelnummer: [[student_id_number]])</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. Inhalt des Gutachtens</h2>
                                <p>[[review_content]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. Endnote/Empfehlung</h2>
                                <p><strong>[[final_grade_recommendation]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift des Betreuers)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Supervisor\'s Review',
                        'description' => 'A template for a review issued by a supervisor or tutor of a student\'s work.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SUPERVISOR\'S REVIEW</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Supervisor: <strong>[[supervisor_full_name]]</strong><br>[[supervisor_title_affiliation]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[review_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Regarding Work Title: <br>[[work_title]]</h2>
                                <p style="text-align: center;">Author: [[student_full_name]] (Student ID: [[student_id_number]])</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. Review Content</h2>
                                <p>[[review_content]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. Final Grade/Recommendation</h2>
                                <p><strong>[[final_grade_recommendation]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Supervisor\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Відгук наукового керівника',
                        'description' => 'Шаблон відгуку, що надається науковим керівником або куратором студентської роботи.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ВІДГУК НАУКОВОГО КЕРІВНИКА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Керівник: <strong>[[supervisor_full_name]]</strong><br>[[supervisor_title_affiliation]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: [[review_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Щодо роботи на тему: <br>[[work_title]]</h2>
                                <p style="text-align: center;">Автор: [[student_full_name]] (Номер залікової книжки: [[student_id_number]])</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. Зміст відгуку</h2>
                                <p>[[review_content]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. Підсумкова оцінка/Рекомендація</h2>
                                <p><strong>[[final_grade_recommendation]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис наукового керівника)</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Opinia promotora/opiekuna pracy',
                        'description' => 'Szablon opinii wystawianej przez promotora lub opiekuna pracy studenckiej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OPINIA PROMOTORA/OPIEKUNA PRACY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Promotor/Opiekun: <strong>[[supervisor_full_name]]</strong><br>[[supervisor_title_affiliation]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: [[review_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; text-align: center; margin-top:20px;">Dotyczy pracy pt.: <br>[[work_title]]</h2>
                                <p style="text-align: center;">Autor: [[student_full_name]] (Nr albumu: [[student_id_number]])</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">1. Treść opinii</h2>
                                <p>[[review_content]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:20px;">2. Końcowa ocena/rekomendacja</h2>
                                <p><strong>[[final_grade_recommendation]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis promotora/opiekuna)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Портфолио студента/ученика / Student/Pupil Portfolio (Portfolio Student/Schüler) ---
            [
                'slug' => 'student-portfolio-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"portfolio_owner_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko właściciela portfolio","en":"Portfolio Owner\'s Full Name","uk":"ПІБ власника портфоліо","de":"Vollständiger Name des Portfolio-Inhabers"}},
                    {"name":"portfolio_owner_school_university","type":"text","required":true,"labels":{"pl":"Szkoła/Uczelnia","en":"School/University","uk":"Школа/ВНЗ","de":"Schule/Universität"}},
                    {"name":"portfolio_owner_field_of_study_class","type":"text","required":true,"labels":{"pl":"Kierunek/Klasa","en":"Field of Study/Class","uk":"Напрямок/Клас","de":"Studiengang/Klasse"}},
                    {"name":"portfolio_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia portfolio","en":"Portfolio Date","uk":"Дата створення портфоліо","de":"Datum der Portfolio-Erstellung"}},
                    {"name":"about_me","type":"textarea","required":true,"labels":{"pl":"O mnie (zainteresowania, cele, mocne strony)","en":"About me (interests, goals, strengths)","uk":"Про мене (інтереси, цілі, сильні сторони)","de":"Über mich (Interessen, Ziele, Stärken)"}},
                    {"name":"achievements","type":"textarea","required":true,"labels":{"pl":"Osiągnięcia (akademickie, pozaszkolne, projekty)","en":"Achievements (academic, extracurricular, projects)","uk":"Досягнення (академічні, позашкільні, проекти)","de":"Erfolge (akademisch, außerschulisch, Projekte)"}},
                    {"name":"skills","type":"textarea","required":true,"labels":{"pl":"Umiejętności (języki, programy, inne)","en":"Skills (languages, software, other)","uk":"Навички (мови, програми, інше)","de":"Fähigkeiten (Sprachen, Software, Sonstiges)"}},
                    {"name":"work_samples","type":"textarea","required":false,"labels":{"pl":"Przykłady prac/projektów (opcjonalnie)","en":"Work/project samples (optional)","uk":"Приклади робіт/проектів (необов\'язково)","de":"Arbeits-/Projektbeispiele (optional)"}},
                    {"name":"recommendations","type":"textarea","required":false,"labels":{"pl":"Rekomendacje/referencje (opcjonalnie)","en":"Recommendations/references (optional)","uk":"Рекомендації/відгуки (необов\'язково)","de":"Empfehlungen/Referenzen (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Portfolio Student/Schüler',
                        'description' => 'Vorlage zur Erstellung eines Portfolios, das die Leistungen und Fähigkeiten eines Studenten/Schülers präsentiert.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-top: 50px;">
                                <h1 style="font-size: 24px; font-weight: bold;">PORTFOLIO</h1>
                                <p style="font-size: 18px;">[[portfolio_owner_full_name]]</p>
                                <p style="font-size: 14px;">[[portfolio_owner_school_university]] - [[portfolio_owner_field_of_study_class]]</p>
                                <p style="font-size: 12px;">Datum der Erstellung: [[portfolio_date]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">1. Über mich</h2>
                                <p>[[about_me]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">2. Erfolge</h2>
                                <p>[[achievements]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">3. Fähigkeiten</h2>
                                <p>[[skills]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">4. Arbeits-/Projektbeispiele</h2>
                                <p>[[work_samples]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">5. Empfehlungen/Referenzen</h2>
                                <p>[[recommendations]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'en' => [
                        'title' => 'Student/Pupil Portfolio',
                        'description' => 'A template for creating a portfolio showcasing a student\'s/pupil\'s achievements and skills.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-top: 50px;">
                                <h1 style="font-size: 24px; font-weight: bold;">PORTFOLIO</h1>
                                <p style="font-size: 18px;">[[portfolio_owner_full_name]]</p>
                                <p style="font-size: 14px;">[[portfolio_owner_school_university]] - [[portfolio_owner_field_of_study_class]]</p>
                                <p style="font-size: 12px;">Date of Creation: [[portfolio_date]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">1. About Me</h2>
                                <p>[[about_me]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">2. Achievements</h2>
                                <p>[[achievements]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">3. Skills</h2>
                                <p>[[skills]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">4. Work/Project Samples</h2>
                                <p>[[work_samples]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">5. Recommendations/References</h2>
                                <p>[[recommendations]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'uk' => [
                        'title' => 'Портфоліо студента/учня',
                        'description' => 'Шаблон для створення портфоліо, що демонструє досягнення та навички студента/учня.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-top: 50px;">
                                <h1 style="font-size: 24px; font-weight: bold;">ПОРТФОЛІО</h1>
                                <p style="font-size: 18px;">[[portfolio_owner_full_name]]</p>
                                <p style="font-size: 14px;">[[portfolio_owner_school_university]] - [[portfolio_owner_field_of_study_class]]</p>
                                <p style="font-size: 12px;">Дата створення: [[portfolio_date]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">1. Про мене</h2>
                                <p>[[about_me]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">2. Досягнення</h2>
                                <p>[[achievements]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">3. Навички</h2>
                                <p>[[skills]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">4. Приклади робіт/проектів</h2>
                                <p>[[work_samples]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">5. Рекомендації/Відгуки</h2>
                                <p>[[recommendations]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'pl' => [
                        'title' => 'Portfolio studenta/ucznia',
                        'description' => 'Szablon do tworzenia portfolio prezentującego osiągnięcia i umiejętności studenta/ucznia.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-top: 50px;">
                                <h1 style="font-size: 24px; font-weight: bold;">PORTFOLIO</h1>
                                <p style="font-size: 18px;">[[portfolio_owner_full_name]]</p>
                                <p style="font-size: 14px;">[[portfolio_owner_school_university]] - [[portfolio_owner_field_of_study_class]]</p>
                                <p style="font-size: 12px;">Data sporządzenia: [[portfolio_date]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">1. O mnie</h2>
                                <p>[[about_me]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">2. Osiągnięcia</h2>
                                <p>[[achievements]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">3. Umiejętności</h2>
                                <p>[[skills]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">4. Przykłady prac/projektów</h2>
                                <p>[[work_samples]]</p>
                                <h2 style="font-size:16px; font-weight:bold; margin-top:20px;">5. Rekomendacje/Referencje</h2>
                                <p>[[recommendations]]</p>
                            </div>',
                        'footer_html' => ''
                    ]
                ]
            ],

            // --- Мотивационное письмо для поступления в ВУЗ / Motivation Letter for University Admission (Motivationsschreiben für die Hochschule) ---
            [
                'slug' => 'university-motivation-letter-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"letter_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia listu","en":"Letter Date","uk":"Дата складання листа","de":"Datum des Schreibens"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko kandydata","en":"Applicant\'s Full Name","uk":"ПІБ кандидата","de":"Vollständiger Name des Bewerbers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres kandydata","en":"Applicant\'s Address","uk":"Адреса кандидата","de":"Adresse des Bewerbers"}},
                    {"name":"applicant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail kandydata","en":"Applicant\'s Phone & Email","uk":"Телефон та e-mail кандидата","de":"Telefon und E-Mail des Bewerbers"}},
                    {"name":"university_name","type":"text","required":true,"labels":{"pl":"Nazwa uczelni","en":"University Name","uk":"Назва ВНЗ","de":"Name der Universität"}},
                    {"name":"university_address","type":"text","required":true,"labels":{"pl":"Adres uczelni","en":"University Address","uk":"Адреса ВНЗ","de":"Adresse der Universität"}},
                    {"name":"field_of_study","type":"text","required":true,"labels":{"pl":"Kierunek studiów, na który aplikujesz","en":"Field of Study you are applying for","uk":"Напрямок навчання, на який подаєте заяву","de":"Studiengang, für den Sie sich bewerben"}},
                    {"name":"motivation_content","type":"textarea","required":true,"labels":{"pl":"Treść listu motywacyjnego (dlaczego ten kierunek/uczelnia, cele, doświadczenia)","en":"Content of motivation letter (why this field/university, goals, experiences)","uk":"Зміст мотиваційного листа (чому цей напрямок/ВНЗ, цілі, досвід)","de":"Inhalt des Motivationsschreibens (warum dieser Studiengang/Universität, Ziele, Erfahrungen)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Motivationsschreiben für die Hochschule',
                        'description' => 'Offizielles Motivationsschreiben, das im Rahmen des Hochschulzulassungsverfahrens eingereicht wird.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">MOTIVATIONSSCHREIBEN</h1><p style="font-size: 14px;"><strong>Betreff:</strong> Bewerbung für den Studiengang [[field_of_study]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Bewerber: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[letter_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br>Zulassungsausschuss<br><strong>[[university_name]]</strong><br>[[university_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>ich schreibe Ihnen dieses Motivationsschreiben im Zusammenhang mit meiner Bewerbung für den Studiengang <strong>[[field_of_study]]</strong> an Ihrer Universität.</p>
                                <p>[[motivation_content]]</p>
                                <p>Ich freue mich sehr auf die Möglichkeit, an Ihrer Universität zu studieren und einen Beitrag zur akademischen Gemeinschaft zu leisten.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Motivation Letter for University Admission',
                        'description' => 'Official motivation letter submitted during the higher education admission process.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">MOTIVATION LETTER</h1><p style="font-size: 14px;"><strong>Subject:</strong> Application for [[field_of_study]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Applicant: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[letter_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br>Admissions Committee<br><strong>[[university_name]]</strong><br>[[university_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I am writing this motivation letter in connection with my application for the <strong>[[field_of_study]]</strong> program at your university.</p>
                                <p>[[motivation_content]]</p>
                                <p>I eagerly look forward to the opportunity to study at your university and contribute to its academic community.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Мотиваційний лист для вступу до ВНЗ',
                        'description' => 'Офіційний мотиваційний лист, що подається під час вступної кампанії до вищого навчального закладу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">МОТИВАЦІЙНИЙ ЛИСТ</h1><p style="font-size: 14px;"><strong>Щодо:</strong> Вступ на напрямок [[field_of_study]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Кандидат: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: [[letter_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br>Приймальної комісії<br><strong>[[university_name]]</strong><br>[[university_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>Звертаюся з цим мотиваційним листом у зв\'язку з моєю заявою на напрямок <strong>[[field_of_study]]</strong> у Вашому ВНЗ.</p>
                                <p>[[motivation_content]]</p>
                                <p>З нетерпінням чекаю на можливість навчатися у Вашому ВНЗ та зробити внесок у його академічну спільноту.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'List motywacyjny na studia',
                        'description' => 'Oficjalny list motywacyjny, składany w procesie rekrutacji na studia wyższe.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">LIST MOTYWACYJNY</h1><p style="font-size: 14px;"><strong>Dotyczy:</strong> Rekrutacja na kierunek [[field_of_study]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Kandydat: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: [[letter_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br>Komisji Rekrutacyjnej<br><strong>[[university_name]]</strong><br>[[university_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>Zwracam się z niniejszym listem motywacyjnym w związku z moją aplikacją na kierunek <strong>[[field_of_study]]</strong> na Państwa uczelni.</p>
                                <p>[[motivation_content]]</p>
                                <p>Z niecierpliwością oczekuję na możliwość studiowania na Państwa uczelni i wniesienia wkładu w jej społeczność akademicką.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
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
