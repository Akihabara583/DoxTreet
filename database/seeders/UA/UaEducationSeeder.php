<?php

namespace Database\Seeders\UA;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;
use Illuminate\Support\Arr;

class UaEducationSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'school-education')->first();
        if (!$category) {
            $this->command->error('Category with slug "school-education" not found.');
            return;
        }

        $templatesData = [
            // --- 1. Заявление на академический отпуск ---
            [
                'slug' => 'academic-leave-application-ua',
                'fields' => '[
                    {"name":"university_name","type":"text","required":true,"labels":{"uk":"Назва ВНЗ","en":"University Name", "pl":"Nazwa uczelni", "de":"Name der Universität"}},
                    {"name":"rector_name","type":"text","required":true,"labels":{"uk":"ПІБ ректора","en":"Rector\'s Full Name", "pl":"Imię i nazwisko rektora", "de":"Vollständiger Name des Rektors"}},
                    {"name":"student_name","type":"text","required":true,"labels":{"uk":"ПІБ студента","en":"Student\'s Full Name", "pl":"Imię i nazwisko studenta", "de":"Vollständiger Name des Studenten"}},
                    {"name":"faculty_name","type":"text","required":true,"labels":{"uk":"Назва факультету","en":"Faculty Name", "pl":"Nazwa wydziału", "de":"Fakultätsname"}},
                    {"name":"specialty_name","type":"text","required":true,"labels":{"uk":"Назва спеціальності","en":"Specialty Name", "pl":"Nazwa specjalności", "de":"Name der Fachrichtung"}},
                    {"name":"course_number","type":"number","required":true,"labels":{"uk":"Курс","en":"Course Number", "pl":"Rok studiów", "de":"Studienjahr"}},
                    {"name":"group_number","type":"text","required":true,"labels":{"uk":"Номер групи","en":"Group Number", "pl":"Numer grupy", "de":"Gruppennummer"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"uk":"Дата початку академічної відпустки","en":"Academic Leave Start Date", "pl":"Data rozpoczęcia urlopu dziekańskiego", "de":"Beginn des Urlaubssemesters"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"uk":"Дата закінчення академічної відпустки","en":"Academic Leave End Date", "pl":"Data zakończenia urlopu dziekańskiego", "de":"Ende des Urlaubssemesters"}},
                    {"name":"reason_for_leave","type":"textarea","required":true,"labels":{"uk":"Причина надання академічної відпустки (напр., за станом здоров\'я, сімейні обставини)","en":"Reason for Academic Leave (e.g., health reasons, family circumstances)", "pl":"Przyczyna urlopu dziekańskiego (np. stan zdrowia, okoliczności rodzinne)", "de":"Grund für das Urlaubssemester (z.B. Gesundheitsgründe, familiäre Umstände)"}},
                    {"name":"supporting_documents","type":"textarea","required":false,"labels":{"uk":"Додатки (копії документів, що підтверджують причину)","en":"Attachments (copies of supporting documents)", "pl":"Załączniki (kopie dokumentów potwierdzających przyczynę)", "de":"Anhänge (Kopien der Belege)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява на академічну відпустку',
                        'description' => 'Заява студента про надання академічної відпустки.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Ректору [[university_name]]</p>
                                <p style="text-align: right;">[[rector_name]]</p>
                                <br/>
                                <p style="text-align: right;">від студента(ки) [[student_name]]</p>
                                <p style="text-align: right;">факультету [[faculty_name]]</p>
                                <p style="text-align: right;">спеціальності [[specialty_name]], [[course_number]] курсу, група [[group_number]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу надати мені академічну відпустку за [[reason_for_leave]] з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong>.</p>
                                [[supporting_documents]]<p>Додатки: [[supporting_documents]].</p>[[/supporting_documents]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[student_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Academic Leave',
                        'description' => 'Student\'s application for academic leave.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Rector of [[university_name]]</p>
                                <p style="text-align: right;">[[rector_name]]</p>
                                <br/>
                                <p style="text-align: right;">from student [[student_name]]</p>
                                <p style="text-align: right;">Faculty of [[faculty_name]]</p>
                                <p style="text-align: right;">Specialty [[specialty_name]], Course [[course_number]], Group [[group_number]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask for academic leave due to [[reason_for_leave]] from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong>.</p>
                                [[supporting_documents]]<p>Attachments: [[supporting_documents]].</p>[[/supporting_documents]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[student_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o urlop dziekański',
                        'description' => 'Wniosek studenta o udzielenie urlopu dziekańskiego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Rektora [[university_name]]</p>
                                <p style="text-align: right;">[[rector_name]]</p>
                                <br/>
                                <p style="text-align: right;">od studenta(ki) [[student_name]]</p>
                                <p style="text-align: right;">Wydziału [[faculty_name]]</p>
                                <p style="text-align: right;">specjalności [[specialty_name]], [[course_number]] roku, grupa [[group_number]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o udzielenie mi urlopu dziekańskiego z powodu [[reason_for_leave]] od <strong>[[leave_start_date]]</strong> do <strong>[[leave_end_date]]</strong>.</p>
                                [[supporting_documents]]<p>Załączniki: [[supporting_documents]].</p>[[/supporting_documents]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[student_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Urlaubssemester',
                        'description' => 'Antrag eines Studenten auf ein Urlaubssemester.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Rektor von [[university_name]]</p>
                                <p style="text-align: right;">[[rector_name]]</p>
                                <br/>
                                <p style="text-align: right;">von Student(in) [[student_name]]</p>
                                <p style="text-align: right;">Fakultät [[faculty_name]]</p>
                                <p style="text-align: right;">Studiengang [[specialty_name]], [[course_number]]. Semester, Gruppe [[group_number]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit ein Urlaubssemester aufgrund von [[reason_for_leave]] vom <strong>[[leave_start_date]]</strong> bis zum <strong>[[leave_end_date]]</strong>.</p>
                                [[supporting_documents]]<p>Anhänge: [[supporting_documents]].</p>[[/supporting_documents]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[student_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 2. Заявление о переводе на другую специальность ---
            [
                'slug' => 'transfer-specialty-application-ua',
                'fields' => '[
                    {"name":"university_name","type":"text","required":true,"labels":{"uk":"Назва ВНЗ","en":"University Name", "pl":"Nazwa uczelni", "de":"Name der Universität"}},
                    {"name":"rector_name","type":"text","required":true,"labels":{"uk":"ПІБ ректора","en":"Rector\'s Full Name", "pl":"Imię i nazwisko rektora", "de":"Vollständiger Name des Rektors"}},
                    {"name":"student_name","type":"text","required":true,"labels":{"uk":"ПІБ студента","en":"Student\'s Full Name", "pl":"Imię i nazwisko studenta", "de":"Vollständiger Name des Studenten"}},
                    {"name":"current_faculty","type":"text","required":true,"labels":{"uk":"Поточний факультет","en":"Current Faculty", "pl":"Obecny wydział", "de":"Aktuelle Fakultät"}},
                    {"name":"current_specialty","type":"text","required":true,"labels":{"uk":"Поточна спеціальність","en":"Current Specialty", "pl":"Obecna specjalność", "de":"Aktuelle Fachrichtung"}},
                    {"name":"current_course","type":"number","required":true,"labels":{"uk":"Поточний курс","en":"Current Course", "pl":"Obecny rok studiów", "de":"Aktuelles Studienjahr"}},
                    {"name":"new_faculty","type":"text","required":true,"labels":{"uk":"Новий факультет","en":"New Faculty", "pl":"Nowy wydział", "de":"Neue Fakultät"}},
                    {"name":"new_specialty","type":"text","required":true,"labels":{"uk":"Нова спеціальність","en":"New Specialty", "pl":"Nowa specjalność", "de":"Neue Fachrichtung"}},
                    {"name":"transfer_reason","type":"textarea","required":true,"labels":{"uk":"Причина переведення","en":"Reason for Transfer", "pl":"Przyczyna przeniesienia", "de":"Grund der Versetzung"}},
                    {"name":"academic_difference","type":"textarea","required":false,"labels":{"uk":"Академічна різниця (якщо є)","en":"Academic Difference (if any)", "pl":"Różnica programowa (jeśli dotyczy)", "de":"Akademische Differenz (falls zutreffend)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява про переведення на іншу спеціальність',
                        'description' => 'Заява студента про переведення на іншу спеціальність в межах одного ВНЗ.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Ректору [[university_name]]</p>
                                <p style="text-align: right;">[[rector_name]]</p>
                                <br/>
                                <p style="text-align: right;">від студента(ки) [[student_name]]</p>
                                <p style="text-align: right;">факультету [[current_faculty]]</p>
                                <p style="text-align: right;">спеціальності [[current_specialty]], [[current_course]] курсу</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу перевести мене з факультету [[current_faculty]], спеціальності [[current_specialty]], [[current_course]] курсу на факультет [[new_faculty]], спеціальність <strong>[[new_specialty]]</strong>.</p>
                                <p>Причина переведення: [[transfer_reason]].</p>
                                [[academic_difference]]<p>Академічна різниця: [[academic_difference]].</p>[[/academic_difference]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[student_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Transfer to Another Specialty',
                        'description' => 'Student\'s application for transfer to another specialty within the same university.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Rector of [[university_name]]</p>
                                <p style="text-align: right;">[[rector_name]]</p>
                                <br/>
                                <p style="text-align: right;">from student [[student_name]]</p>
                                <p style="text-align: right;">Faculty of [[current_faculty]]</p>
                                <p style="text-align: right;">Specialty [[current_specialty]], Course [[current_course]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to transfer me from the Faculty of [[current_faculty]], Specialty [[current_specialty]], Course [[current_course]] to the Faculty of [[new_faculty]], Specialty <strong>[[new_specialty]]</strong>.</p>
                                <p>Reason for transfer: [[transfer_reason]].</p>
                                [[academic_difference]]<p>Academic difference: [[academic_difference]].</p>[[/academic_difference]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[student_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o przeniesienie na inną specjalność',
                        'description' => 'Wniosek studenta o przeniesienie na inną specjalność w ramach tej samej uczelni.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Rektora [[university_name]]</p>
                                <p style="text-align: right;">[[rector_name]]</p>
                                <br/>
                                <p style="text-align: right;">od studenta(ki) [[student_name]]</p>
                                <p style="text-align: right;">Wydziału [[current_faculty]]</p>
                                <p style="text-align: right;">specjalności [[current_specialty]], [[current_course]] roku</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o przeniesienie mnie z Wydziału [[current_faculty]], specjalności [[current_specialty]], [[current_course]] roku na Wydział [[new_faculty]], specjalność <strong>[[new_specialty]]</strong>.</p>
                                <p>Przyczyna przeniesienia: [[transfer_reason]].</p>
                                [[academic_difference]]<p>Różnica programowa: [[academic_difference]].</p>[[/academic_difference]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[student_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Fachrichtungswechsel',
                        'description' => 'Antrag eines Studenten auf Wechsel der Fachrichtung innerhalb derselben Universität.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Rektor von [[university_name]]</p>
                                <p style="text-align: right;">[[rector_name]]</p>
                                <br/>
                                <p style="text-align: right;">von Student(in) [[student_name]]</p>
                                <p style="text-align: right;">Fakultät [[current_faculty]]</p>
                                <p style="text-align: right;">Studiengang [[current_specialty]], [[current_course]]. Semester</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit meine Versetzung von der Fakultät [[current_faculty]], Studiengang [[current_specialty]], [[current_course]]. Semester an die Fakultät [[new_faculty]], Studiengang <strong>[[new_specialty]]</strong>.</p>
                                <p>Grund der Versetzung: [[transfer_reason]].</p>
                                [[academic_difference]]<p>Akademische Differenz: [[academic_difference]].</p>[[/academic_difference]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Unterschrift: ___________________ ([[student_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 3. Заявление о переводе в другой ВУЗ ---
            [
                'slug' => 'transfer-university-application-ua',
                'fields' => '[
                    {"name":"current_university_name","type":"text","required":true,"labels":{"uk":"Назва поточного ВНЗ","en":"Current University Name", "pl":"Nazwa obecnej uczelni", "de":"Name der aktuellen Universität"}},
                    {"name":"current_rector_name","type":"text","required":true,"labels":{"uk":"ПІБ ректора поточного ВНЗ","en":"Current Rector\'s Full Name", "pl":"Imię i nazwisko rektora obecnej uczelni", "de":"Vollständiger Name des aktuellen Rektors"}},
                    {"name":"student_name","type":"text","required":true,"labels":{"uk":"ПІБ студента","en":"Student\'s Full Name", "pl":"Imię i nazwisko studenta", "de":"Vollständiger Name des Studenten"}},
                    {"name":"current_faculty","type":"text","required":true,"labels":{"uk":"Поточний факультет","en":"Current Faculty", "pl":"Obecny wydział", "de":"Aktuelle Fakultät"}},
                    {"name":"current_specialty","type":"text","required":true,"labels":{"uk":"Поточна спеціальність","en":"Current Specialty", "pl":"Obecna specjalność", "de":"Aktuelle Fachrichtung"}},
                    {"name":"current_course","type":"number","required":true,"labels":{"uk":"Поточний курс","en":"Current Course", "pl":"Obecny rok studiów", "de":"Aktuelles Studienjahr"}},
                    {"name":"new_university_name","type":"text","required":true,"labels":{"uk":"Назва нового ВНЗ","en":"New University Name", "pl":"Nazwa nowej uczelni", "de":"Name der neuen Universität"}},
                    {"name":"new_faculty","type":"text","required":true,"labels":{"uk":"Новий факультет","en":"New Faculty", "pl":"Nowy wydział", "de":"Neue Fakultät"}},
                    {"name":"new_specialty","type":"text","required":true,"labels":{"uk":"Нова спеціальність","en":"New Specialty", "pl":"Nowa specjalność", "de":"Neue Fachrichtung"}},
                    {"name":"transfer_reason","type":"textarea","required":true,"labels":{"uk":"Причина переведення","en":"Reason for Transfer", "pl":"Przyczyna przeniesienia", "de":"Grund der Versetzung"}},
                    {"name":"academic_difference","type":"textarea","required":false,"labels":{"uk":"Академічна різниця (якщо є)","en":"Academic Difference (if any)", "pl":"Różnica programowa (jeśli dotyczy)", "de":"Akademische Differenz (falls zutreffend)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява про переведення в інший ВНЗ',
                        'description' => 'Заява студента про переведення з одного ВНЗ до іншого.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Ректору [[current_university_name]]</p>
                                <p style="text-align: right;">[[current_rector_name]]</p>
                                <br/>
                                <p style="text-align: right;">від студента(ки) [[student_name]]</p>
                                <p style="text-align: right;">факультету [[current_faculty]]</p>
                                <p style="text-align: right;">спеціальності [[current_specialty]], [[current_course]] курсу</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу відрахувати мене з [[current_university_name]] та перевести до <strong>[[new_university_name]]</strong> на факультет [[new_faculty]], спеціальність <strong>[[new_specialty]]</strong>.</p>
                                <p>Причина переведення: [[transfer_reason]].</p>
                                [[academic_difference]]<p>Академічна різниця: [[academic_difference]].</p>[[/academic_difference]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[student_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Transfer to Another University',
                        'description' => 'Student\'s application for transfer from one university to another.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Rector of [[current_university_name]]</p>
                                <p style="text-align: right;">[[current_rector_name]]</p>
                                <br/>
                                <p style="text-align: right;">from student [[student_name]]</p>
                                <p style="text-align: right;">Faculty of [[current_faculty]]</p>
                                <p style="text-align: right;">Specialty [[current_specialty]], Course [[current_course]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to dismiss me from [[current_university_name]] and transfer me to <strong>[[new_university_name]]</strong> to the Faculty of [[new_faculty]], Specialty <strong>[[new_specialty]]</strong>.</p>
                                <p>Reason for transfer: [[transfer_reason]].</p>
                                [[academic_difference]]<p>Academic difference: [[academic_difference]].</p>[[/academic_difference]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[student_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o przeniesienie na inną uczelnię',
                        'description' => 'Wniosek studenta o przeniesienie z jednej uczelni na inną.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Rektora [[current_university_name]]</p>
                                <p style="text-align: right;">[[current_rector_name]]</p>
                                <br/>
                                <p style="text-align: right;">od studenta(ki) [[student_name]]</p>
                                <p style="text-align: right;">Wydziału [[current_faculty]]</p>
                                <p style="text-align: right;">specjalności [[current_specialty]], [[current_course]] roku</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o skreślenie mnie z listy studentów [[current_university_name]] i przeniesienie do <strong>[[new_university_name]]</strong> na Wydział [[new_faculty]], specjalność <strong>[[new_specialty]]</strong>.</p>
                                <p>Przyczyna przeniesienia: [[transfer_reason]].</p>
                                [[academic_difference]]<p>Różnica programowa: [[academic_difference]].</p>[[/academic_difference]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[student_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Hochschulwechsel',
                        'description' => 'Antrag eines Studenten auf Wechsel von einer Universität zu einer anderen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Rektor von [[current_university_name]]</p>
                                <p style="text-align: right;">[[current_rector_name]]</p>
                                <br/>
                                <p style="text-align: right;">von Student(in) [[student_name]]</p>
                                <p style="text-align: right;">Fakultät [[current_faculty]]</p>
                                <p style="text-align: right;">Studiengang [[current_specialty]], [[current_course]]. Semester</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit meine Exmatrikulation von der [[current_university_name]] und meine Versetzung an die <strong>[[new_university_name]]</strong> an die Fakultät [[new_faculty]], Studiengang <strong>[[new_specialty]]</strong>.</p>
                                <p>Grund der Versetzung: [[transfer_reason]].</p>
                                [[academic_difference]]<p>Akademische Differenz: [[academic_difference]].</p>[[/academic_difference]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Unterschrift: ___________________ ([[student_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 4. План курсовой работы ---
            [
                'slug' => 'coursework-plan-ua',
                'fields' => '[
                    {"name":"university_name","type":"text","required":true,"labels":{"uk":"Назва ВНЗ","en":"University Name", "pl":"Nazwa uczelni", "de":"Name der Universität"}},
                    {"name":"faculty_name","type":"text","required":true,"labels":{"uk":"Назва факультету","en":"Faculty Name", "pl":"Nazwa wydziału", "de":"Fakultätsname"}},
                    {"name":"specialty_name","type":"text","required":true,"labels":{"uk":"Назва спеціальності","en":"Specialty Name", "pl":"Nazwa specjalności", "de":"Name der Fachrichtung"}},
                    {"name":"student_name","type":"text","required":true,"labels":{"uk":"ПІБ студента","en":"Student\'s Full Name", "pl":"Imię i nazwisko studenta", "de":"Vollständiger Name des Studenten"}},
                    {"name":"course_number","type":"number","required":true,"labels":{"uk":"Курс","en":"Course Number", "pl":"Rok studiów", "de":"Studienjahr"}},
                    {"name":"group_number","type":"text","required":true,"labels":{"uk":"Номер групи","en":"Group Number", "pl":"Numer grupy", "de":"Gruppennummer"}},
                    {"name":"work_topic","type":"text","required":true,"labels":{"uk":"Тема курсової роботи","en":"Coursework Topic", "pl":"Temat pracy zaliczeniowej", "de":"Thema der Semesterarbeit"}},
                    {"name":"supervisor_name","type":"text","required":true,"labels":{"uk":"ПІБ наукового керівника","en":"Supervisor\'s Full Name", "pl":"Imię i nazwisko promotora", "de":"Vollständiger Name des Betreuers"}},
                    {"name":"plan_sections","type":"textarea","required":true,"labels":{"uk":"Розділи плану (Вступ, Розділ 1, Розділ 2, Висновки, Список літератури)","en":"Plan Sections (Introduction, Chapter 1, Chapter 2, Conclusions, References)", "pl":"Sekcje planu (Wstęp, Rozdział 1, Rozdział 2, Wnioski, Bibliografia)", "de":"Planabschnitte (Einleitung, Kapitel 1, Kapitel 2, Schlussfolgerungen, Literaturverzeichnis)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'План курсової роботи',
                        'description' => 'Структурований план курсової роботи з основними розділами та підрозділами.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПЛАН КУРСОВОЇ РОБОТИ</h1><p>з дисципліни "..."</p><p>Тема: "[[work_topic]]"</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Студент(ка): [[student_name]]</p><p>Курс: [[course_number]], Група: [[group_number]]</p></td><td style="text-align: right;"><p>Науковий керівник: [[supervisor_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>[[university_name]]</strong></p>
                                <p>Факультет [[faculty_name]]</p>
                                <p>Спеціальність [[specialty_name]]</p>
                                <br/>
                                <p><strong>План:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    [[plan_sections]]
                                </ol>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис студента: ___________________ ([[student_name]])</p>
                                <p>Підпис наукового керівника: ___________________ ([[supervisor_name]])</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Coursework Plan',
                        'description' => 'Structured plan of coursework with main sections and subsections.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">COURSEWORK PLAN</h1><p>on discipline "..."</p><p>Topic: "[[work_topic]]"</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Student: [[student_name]]</p><p>Course: [[course_number]], Group: [[group_number]]</p></td><td style="text-align: right;"><p>Supervisor: [[supervisor_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>[[university_name]]</strong></p>
                                <p>Faculty of [[faculty_name]]</p>
                                <p>Specialty [[specialty_name]]</p>
                                <br/>
                                <p><strong>Plan:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    [[plan_sections]]
                                </ol>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Student\'s Signature: ___________________ ([[student_name]])</p>
                                <p>Supervisor\'s Signature: ___________________ ([[supervisor_name]])</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Plan pracy zaliczeniowej',
                        'description' => 'Ustrukturyzowany plan pracy zaliczeniowej z głównymi sekcjami i podsekcjami.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PLAN PRACY ZALICZENIOWEJ</h1><p>z przedmiotu "..."</p><p>Temat: "[[work_topic]]"</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Student(ka): [[student_name]]</p><p>Rok: [[course_number]], Grupa: [[group_number]]</p></td><td style="text-align: right;"><p>Promotor: [[supervisor_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>[[university_name]]</strong></p>
                                <p>Wydział [[faculty_name]]</p>
                                <p>Specjalność [[specialty_name]]</p>
                                <br/>
                                <p><strong>Plan:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    [[plan_sections]]
                                </ol>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis studenta: ___________________ ([[student_name]])</p>
                                <p>Podpis promotora: ___________________ ([[supervisor_name]])</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Semesterarbeitsplan',
                        'description' => 'Strukturierter Plan der Semesterarbeit mit Hauptabschnitten und Unterabschnitten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SEMESTERARBEITSPLAN</h1><p>zum Fach "..."</p><p>Thema: "[[work_topic]]"</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Student(in): [[student_name]]</p><p>Semester: [[course_number]], Gruppe: [[group_number]]</p></td><td style="text-align: right;"><p>Betreuer: [[supervisor_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>[[university_name]]</strong></p>
                                <p>Fakultät [[faculty_name]]</p>
                                <p>Studiengang [[specialty_name]]</p>
                                <br/>
                                <p><strong>Plan:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    [[plan_sections]]
                                </ol>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Studenten: ___________________ ([[student_name]])</p>
                                <p>Unterschrift des Betreuers: ___________________ ([[supervisor_name]])</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 5. План дипломной работы ---
            [
                'slug' => 'diploma-work-plan-ua',
                'fields' => '[
                    {"name":"university_name","type":"text","required":true,"labels":{"uk":"Назва ВНЗ","en":"University Name", "pl":"Nazwa uczelni", "de":"Name der Universität"}},
                    {"name":"faculty_name","type":"text","required":true,"labels":{"uk":"Назва факультету","en":"Faculty Name", "pl":"Nazwa wydziału", "de":"Fakultätsname"}},
                    {"name":"specialty_name","type":"text","required":true,"labels":{"uk":"Назва спеціальності","en":"Specialty Name", "pl":"Nazwa specjalności", "de":"Name der Fachrichtung"}},
                    {"name":"student_name","type":"text","required":true,"labels":{"uk":"ПІБ студента","en":"Student\'s Full Name", "pl":"Imię i nazwisko studenta", "de":"Vollständiger Name des Studenten"}},
                    {"name":"group_number","type":"text","required":true,"labels":{"uk":"Номер групи","en":"Group Number", "pl":"Numer grupy", "de":"Gruppennummer"}},
                    {"name":"work_topic","type":"text","required":true,"labels":{"uk":"Тема дипломної роботи","en":"Diploma Work Topic", "pl":"Temat pracy dyplomowej", "de":"Thema der Diplomarbeit"}},
                    {"name":"supervisor_name","type":"text","required":true,"labels":{"uk":"ПІБ наукового керівника","en":"Supervisor\'s Full Name", "pl":"Imię i nazwisko promotora", "de":"Vollständiger Name des Betreuers"}},
                    {"name":"plan_sections","type":"textarea","required":true,"labels":{"uk":"Розділи плану (Вступ, Розділ 1, Розділ 2, Висновки, Список літератури)","en":"Plan Sections (Introduction, Chapter 1, Chapter 2, Conclusions, References)", "pl":"Sekcje planu (Wstęp, Rozdział 1, Rozdział 2, Wnioski, Bibliografia)", "de":"Planabschnitte (Einleitung, Kapitel 1, Kapitel 2, Schlussfolgerungen, Literaturverzeichnis)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'План дипломної роботи',
                        'description' => 'Структурований план дипломної роботи з основними розділами та підрозділами.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПЛАН ДИПЛОМНОЇ РОБОТИ</h1><p>Тема: "[[work_topic]]"</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Студент(ка): [[student_name]]</p><p>Група: [[group_number]]</p></td><td style="text-align: right;"><p>Науковий керівник: [[supervisor_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>[[university_name]]</strong></p>
                                <p>Факультет [[faculty_name]]</p>
                                <p>Спеціальність [[specialty_name]]</p>
                                <br/>
                                <p><strong>План:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    [[plan_sections]]
                                </ol>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис студента: ___________________ ([[student_name]])</p>
                                <p>Підпис наукового керівника: ___________________ ([[supervisor_name]])</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Diploma Work Plan',
                        'description' => 'Structured plan of diploma work with main sections and subsections.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DIPLOMA WORK PLAN</h1><p>Topic: "[[work_topic]]"</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Student: [[student_name]]</p><p>Group: [[group_number]]</p></td><td style="text-align: right;"><p>Supervisor: [[supervisor_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>[[university_name]]</strong></p>
                                <p>Faculty of [[faculty_name]]</p>
                                <p>Specialty [[specialty_name]]</p>
                                <br/>
                                <p><strong>Plan:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    [[plan_sections]]
                                </ol>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Student\'s Signature: ___________________ ([[student_name]])</p>
                                <p>Supervisor\'s Signature: ___________________ ([[supervisor_name]])</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Plan pracy dyplomowej',
                        'description' => 'Ustrukturyzowany plan pracy dyplomowej z głównymi sekcjami i podsekcjami.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PLAN PRACY DYPLOMOWEJ</h1><p>Temat: "[[work_topic]]"</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Student(ka): [[student_name]]</p><p>Grupa: [[group_number]]</p></td><td style="text-align: right;"><p>Promotor: [[supervisor_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>[[university_name]]</strong></p>
                                <p>Wydział [[faculty_name]]</p>
                                <p>Specjalność [[specialty_name]]</p>
                                <br/>
                                <p><strong>Plan:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    [[plan_sections]]
                                </ol>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis studenta: ___________________ ([[student_name]])</p>
                                <p>Podpis promotora: ___________________ ([[supervisor_name]])</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Diplomarbeitsplan',
                        'description' => 'Strukturierter Plan der Diplomarbeit mit Hauptabschnitten und Unterabschnitten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DIPLOMARBEITSPLAN</h1><p>Thema: "[[work_topic]]"</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Student(in): [[student_name]]</p><p>Gruppe: [[group_number]]</p></td><td style="text-align: right;"><p>Betreuer: [[supervisor_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>[[university_name]]</strong></p>
                                <p>Fakultät [[faculty_name]]</p>
                                <p>Studiengang [[specialty_name]]</p>
                                <br/>
                                <p><strong>Plan:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    [[plan_sections]]
                                </ol>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Studenten: ___________________ ([[student_name]])</p>
                                <p>Unterschrift des Betreuers: ___________________ ([[supervisor_name]])</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 6. Титульный лист для реферата ---
            [
                'slug' => 'abstract-title-page-ua',
                'fields' => '[
                    {"name":"university_name","type":"text","required":true,"labels":{"uk":"Назва ВНЗ","en":"University Name", "pl":"Nazwa uczelni", "de":"Name der Universität"}},
                    {"name":"faculty_name","type":"text","required":true,"labels":{"uk":"Назва факультету","en":"Faculty Name", "pl":"Nazwa wydziału", "de":"Fakultätsname"}},
                    {"name":"department_name","type":"text","required":true,"labels":{"uk":"Назва кафедри","en":"Department Name", "pl":"Nazwa katedry", "de":"Lehrstuhlname"}},
                    {"name":"discipline_name","type":"text","required":true,"labels":{"uk":"Назва дисципліни","en":"Discipline Name", "pl":"Nazwa przedmiotu", "de":"Fachname"}},
                    {"name":"work_type","type":"text","required":true,"labels":{"uk":"Вид роботи (Реферат)","en":"Type of Work (Abstract)", "pl":"Rodzaj pracy (Referat)", "de":"Art der Arbeit (Referat)"}},
                    {"name":"work_topic","type":"text","required":true,"labels":{"uk":"Тема роботи","en":"Work Topic", "pl":"Temat pracy", "de":"Thema der Arbeit"}},
                    {"name":"student_name","type":"text","required":true,"labels":{"uk":"ПІБ студента","en":"Student\'s Full Name", "pl":"Imię i nazwisko studenta", "de":"Vollständiger Name des Studenten"}},
                    {"name":"group_number","type":"text","required":true,"labels":{"uk":"Номер групи","en":"Group Number", "pl":"Numer grupy", "de":"Gruppennummer"}},
                    {"name":"supervisor_name","type":"text","required":true,"labels":{"uk":"ПІБ викладача","en":"Lecturer\'s Full Name", "pl":"Imię i nazwisko wykładowcy", "de":"Vollständiger Name des Dozenten"}},
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто","en":"City", "pl":"Miejscowość", "de":"Ort"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Титульний лист для реферату',
                        'description' => 'Стандартний титульний лист для реферату.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;">
                                <p>МІНІСТЕРСТВО ОСВІТИ І НАУКИ УКРАЇНИ</p>
                                <p><strong>[[university_name]]</strong></p>
                                <p>Факультет [[faculty_name]]</p>
                                <p>Кафедра [[department_name]]</p>
                                <br/><br/><br/>
                                <p>З дисципліни: "[[discipline_name]]"</p>
                                <br/><br/>
                                <h1 style="font-size: 20px; font-weight: bold;">[[work_type]]</h1>
                                <h2 style="font-size: 18px; font-weight: bold;">на тему: "[[work_topic]]"</h2>
                                <br/><br/><br/>
                                <p style="text-align: right;">Виконав(ла): студент(ка) [[course_number]] курсу</p>
                                <p style="text-align: right;">групи [[group_number]]</p>
                                <p style="text-align: right;">[[student_name]]</p>
                                <br/>
                                <p style="text-align: right;">Перевірив(ла): [[supervisor_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '', // Титульный лист не имеет тела
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; margin-top: 40px;">
                                <p>[[city]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Title Page for Abstract',
                        'description' => 'Standard title page for an abstract.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;">
                                <p>MINISTRY OF EDUCATION AND SCIENCE OF UKRAINE</p>
                                <p><strong>[[university_name]]</strong></p>
                                <p>Faculty of [[faculty_name]]</p>
                                <p>Department of [[department_name]]</p>
                                <br/><br/><br/>
                                <p>On discipline: "[[discipline_name]]"</p>
                                <br/><br/>
                                <h1 style="font-size: 20px; font-weight: bold;">[[work_type]]</h1>
                                <h2 style="font-size: 18px; font-weight: bold;">Topic: "[[work_topic]]"</h2>
                                <br/><br/><br/>
                                <p style="text-align: right;">Performed by: student of [[course_number]] course</p>
                                <p style="text-align: right;">Group [[group_number]]</p>
                                <p style="text-align: right;">[[student_name]]</p>
                                <br/>
                                <p style="text-align: right;">Checked by: [[supervisor_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; margin-top: 40px;">
                                <p>[[city]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Strona tytułowa referatu',
                        'description' => 'Standardowa strona tytułowa referatu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;">
                                <p>MINISTERSTWO EDUKACJI I NAUKI UKRAINY</p>
                                <p><strong>[[university_name]]</strong></p>
                                <p>Wydział [[faculty_name]]</p>
                                <p>Katedra [[department_name]]</p>
                                <br/><br/><br/>
                                <p>Z przedmiotu: "[[discipline_name]]"</p>
                                <br/><br/>
                                <h1 style="font-size: 20px; font-weight: bold;">[[work_type]]</h1>
                                <h2 style="font-size: 18px; font-weight: bold;">na temat: "[[work_topic]]"</h2>
                                <br/><br/><br/>
                                <p style="text-align: right;">Wykonawca: student(ka) [[course_number]] roku</p>
                                <p style="text-align: right;">grupy [[group_number]]</p>
                                <p style="text-align: right;">[[student_name]]</p>
                                <br/>
                                <p style="text-align: right;">Sprawdził(a): [[supervisor_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; margin-top: 40px;">
                                <p>[[city]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Titelseite für Referat',
                        'description' => 'Standard-Titelseite für ein Referat.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;">
                                <p>MINISTERIUM FÜR BILDUNG UND WISSENSCHAFT DER UKRAINE</p>
                                <p><strong>[[university_name]]</strong></p>
                                <p>Fakultät [[faculty_name]]</p>
                                <p>Lehrstuhl [[department_name]]</p>
                                <br/><br/><br/>
                                <p>Zum Fach: "[[discipline_name]]"</p>
                                <br/><br/>
                                <h1 style="font-size: 20px; font-weight: bold;">[[work_type]]</h1>
                                <h2 style="font-size: 18px; font-weight: bold;">Thema: "[[work_topic]]"</h2>
                                <br/><br/><br/>
                                <p style="text-align: right;">Erstellt von: Student(in) [[course_number]]. Semesters</p>
                                <p style="text-align: right;">Gruppe [[group_number]]</p>
                                <p style="text-align: right;">[[student_name]]</p>
                                <br/>
                                <p style="text-align: right;">Geprüft von: [[supervisor_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; margin-top: 40px;">
                                <p>[[city]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],
            // --- 7. Титульный лист для курсовой работы ---
            [
                'slug' => 'coursework-title-page-ua',
                'fields' => '[
                    {"name":"university_name","type":"text","required":true,"labels":{"uk":"Назва ВНЗ","en":"University Name", "pl":"Nazwa uczelni", "de":"Name der Universität"}},
                    {"name":"faculty_name","type":"text","required":true,"labels":{"uk":"Назва факультету","en":"Faculty Name", "pl":"Nazwa wydziału", "de":"Fakultätsname"}},
                    {"name":"department_name","type":"text","required":true,"labels":{"uk":"Назва кафедри","en":"Department Name", "pl":"Nazwa katedry", "de":"Lehrstuhlname"}},
                    {"name":"discipline_name","type":"text","required":true,"labels":{"uk":"Назва дисципліни","en":"Discipline Name", "pl":"Nazwa przedmiotu", "de":"Fachname"}},
                    {"name":"work_type","type":"text","required":true,"labels":{"uk":"Вид роботи (Курсова робота)","en":"Type of Work (Coursework)", "pl":"Rodzaj pracy (Praca zaliczeniowa)", "de":"Art der Arbeit (Semesterarbeit)"}},
                    {"name":"work_topic","type":"text","required":true,"labels":{"uk":"Тема роботи","en":"Work Topic", "pl":"Temat pracy", "de":"Thema der Arbeit"}},
                    {"name":"student_name","type":"text","required":true,"labels":{"uk":"ПІБ студента","en":"Student\'s Full Name", "pl":"Imię i nazwisko studenta", "de":"Vollständiger Name des Studenten"}},
                    {"name":"course_number","type":"number","required":true,"labels":{"uk":"Курс","en":"Course Number", "pl":"Rok studiów", "de":"Studienjahr"}},
                    {"name":"group_number","type":"text","required":true,"labels":{"uk":"Номер групи","en":"Group Number", "pl":"Numer grupy", "de":"Gruppennummer"}},
                    {"name":"supervisor_name","type":"text","required":true,"labels":{"uk":"ПІБ викладача/керівника","en":"Lecturer/Supervisor\'s Full Name", "pl":"Imię i nazwisko wykładowcy/promotora", "de":"Vollständiger Name des Dozenten/Betreuers"}},
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто","en":"City", "pl":"Miejscowość", "de":"Ort"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Титульний лист для курсової роботи',
                        'description' => 'Стандартний титульний лист для курсової роботи.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;">
                                <p>МІНІСТЕРСТВО ОСВІТИ І НАУКИ УКРАЇНИ</p>
                                <p><strong>[[university_name]]</strong></p>
                                <p>Факультет [[faculty_name]]</p>
                                <p>Кафедра [[department_name]]</p>
                                <br/><br/><br/>
                                <p>З дисципліни: "[[discipline_name]]"</p>
                                <br/><br/>
                                <h1 style="font-size: 20px; font-weight: bold;">[[work_type]]</h1>
                                <h2 style="font-size: 18px; font-weight: bold;">на тему: "[[work_topic]]"</h2>
                                <br/><br/><br/>
                                <p style="text-align: right;">Виконав(ла): студент(ка) [[course_number]] курсу</p>
                                <p style="text-align: right;">групи [[group_number]]</p>
                                <p style="text-align: right;">[[student_name]]</p>
                                <br/>
                                <p style="text-align: right;">Перевірив(ла): [[supervisor_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; margin-top: 40px;">
                                <p>[[city]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Title Page for Coursework',
                        'description' => 'Standard title page for coursework.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;">
                                <p>MINISTRY OF EDUCATION AND SCIENCE OF UKRAINE</p>
                                <p><strong>[[university_name]]</strong></p>
                                <p>Faculty of [[faculty_name]]</p>
                                <p>Department of [[department_name]]</p>
                                <br/><br/><br/>
                                <p>On discipline: "[[discipline_name]]"</p>
                                <br/><br/>
                                <h1 style="font-size: 20px; font-weight: bold;">[[work_type]]</h1>
                                <h2 style="font-size: 18px; font-weight: bold;">Topic: "[[work_topic]]"</h2>
                                <br/><br/><br/>
                                <p style="text-align: right;">Performed by: student of [[course_number]] course</p>
                                <p style="text-align: right;">Group [[group_number]]</p>
                                <p style="text-align: right;">[[student_name]]</p>
                                <br/>
                                <p style="text-align: right;">Checked by: [[supervisor_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; margin-top: 40px;">
                                <p>[[city]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Strona tytułowa pracy zaliczeniowej',
                        'description' => 'Standardowa strona tytułowa pracy zaliczeniowej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;">
                                <p>MINISTERSTWO EDUKACJI I NAUKI UKRAINY</p>
                                <p><strong>[[university_name]]</strong></p>
                                <p>Wydział [[faculty_name]]</p>
                                <p>Katedra [[department_name]]</p>
                                <br/><br/><br/>
                                <p>Z przedmiotu: "[[discipline_name]]"</p>
                                <br/><br/>
                                <h1 style="font-size: 20px; font-weight: bold;">[[work_type]]</h1>
                                <h2 style="font-size: 18px; font-weight: bold;">na temat: "[[work_topic]]"</h2>
                                <br/><br/><br/>
                                <p style="text-align: right;">Wykonawca: student(ka) [[course_number]] roku</p>
                                <p style="text-align: right;">grupy [[group_number]]</p>
                                <p style="text-align: right;">[[student_name]]</p>
                                <br/>
                                <p style="text-align: right;">Sprawdził(a): [[supervisor_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; margin-top: 40px;">
                                <p>[[city]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Titelseite für Semesterarbeit',
                        'description' => 'Standard-Titelseite für eine Semesterarbeit.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;">
                                <p>MINISTERIUM FÜR BILDUNG UND WISSENSCHAFT DER UKRAINE</p>
                                <p><strong>[[university_name]]</strong></p>
                                <p>Fakultät [[faculty_name]]</p>
                                <p>Lehrstuhl [[department_name]]</p>
                                <br/><br/><br/>
                                <p>Zum Fach: "[[discipline_name]]"</p>
                                <br/><br/>
                                <h1 style="font-size: 20px; font-weight: bold;">[[work_type]]</h1>
                                <h2 style="font-size: 18px; font-weight: bold;">Thema: "[[work_topic]]"</h2>
                                <br/><br/><br/>
                                <p style="text-align: right;">Erstellt von: Student(in) [[course_number]]. Semesters</p>
                                <p style="text-align: right;">Gruppe [[group_number]]</p>
                                <p style="text-align: right;">[[student_name]]</p>
                                <br/>
                                <p style="text-align: right;">Geprüft von: [[supervisor_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; margin-top: 40px;">
                                <p>[[city]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 8. Титульный лист для дипломной работы ---
            [
                'slug' => 'diploma-title-page-ua',
                'fields' => '[
                    {"name":"university_name","type":"text","required":true,"labels":{"uk":"Назва ВНЗ","en":"University Name", "pl":"Nazwa uczelni", "de":"Name der Universität"}},
                    {"name":"faculty_name","type":"text","required":true,"labels":{"uk":"Назва факультету","en":"Faculty Name", "pl":"Nazwa wydziału", "de":"Fakultätsname"}},
                    {"name":"department_name","type":"text","required":true,"labels":{"uk":"Назва кафедри","en":"Department Name", "pl":"Nazwa katedry", "de":"Lehrstuhlname"}},
                    {"name":"work_type","type":"text","required":true,"labels":{"uk":"Вид роботи (Дипломна робота)","en":"Type of Work (Diploma Work)", "pl":"Rodzaj pracy (Praca dyplomowa)", "de":"Art der Arbeit (Diplomarbeit)"}},
                    {"name":"work_topic","type":"text","required":true,"labels":{"uk":"Тема роботи","en":"Work Topic", "pl":"Temat pracy", "de":"Thema der Arbeit"}},
                    {"name":"student_name","type":"text","required":true,"labels":{"uk":"ПІБ студента","en":"Student\'s Full Name", "pl":"Imię i nazwisko studenta", "de":"Vollständiger Name des Studenten"}},
                    {"name":"group_number","type":"text","required":true,"labels":{"uk":"Номер групи","en":"Group Number", "pl":"Numer grupy", "de":"Gruppennummer"}},
                    {"name":"supervisor_name","type":"text","required":true,"labels":{"uk":"ПІБ наукового керівника","en":"Supervisor\'s Full Name", "pl":"Imię i nazwisko promotora", "de":"Vollständiger Name des Betreuers"}},
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто","en":"City", "pl":"Miejscowość", "de":"Ort"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Титульний лист для дипломної роботи',
                        'description' => 'Стандартний титульний лист для дипломної роботи.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;">
                                <p>МІНІСТЕРСТВО ОСВІТИ І НАУКИ УКРАЇНИ</p>
                                <p><strong>[[university_name]]</strong></p>
                                <p>Факультет [[faculty_name]]</p>
                                <p>Кафедра [[department_name]]</p>
                                <br/><br/><br/>
                                <h1 style="font-size: 20px; font-weight: bold;">[[work_type]]</h1>
                                <h2 style="font-size: 18px; font-weight: bold;">на тему: "[[work_topic]]"</h2>
                                <br/><br/><br/>
                                <p style="text-align: right;">Виконав(ла): студент(ка) групи [[group_number]]</p>
                                <p style="text-align: right;">[[student_name]]</p>
                                <br/>
                                <p style="text-align: right;">Науковий керівник: [[supervisor_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; margin-top: 40px;">
                                <p>[[city]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Title Page for Diploma Work',
                        'description' => 'Standard title page for diploma work.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;">
                                <p>MINISTRY OF EDUCATION AND SCIENCE OF UKRAINE</p>
                                <p><strong>[[university_name]]</strong></p>
                                <p>Faculty of [[faculty_name]]</p>
                                <p>Department of [[department_name]]</p>
                                <br/><br/><br/>
                                <h1 style="font-size: 20px; font-weight: bold;">[[work_type]]</h1>
                                <h2 style="font-size: 18px; font-weight: bold;">Topic: "[[work_topic]]"</h2>
                                <br/><br/><br/>
                                <p style="text-align: right;">Performed by: student of group [[group_number]]</p>
                                <p style="text-align: right;">[[student_name]]</p>
                                <br/>
                                <p style="text-align: right;">Supervisor: [[supervisor_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; margin-top: 40px;">
                                <p>[[city]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Strona tytułowa pracy dyplomowej',
                        'description' => 'Standardowa strona tytułowa pracy dyplomowej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;">
                                <p>MINISTERSTWO EDUKACJI I NAUKI UKRAINY</p>
                                <p><strong>[[university_name]]</strong></p>
                                <p>Wydział [[faculty_name]]</p>
                                <p>Katedra [[department_name]]</p>
                                <br/><br/><br/>
                                <h1 style="font-size: 20px; font-weight: bold;">[[work_type]]</h1>
                                <h2 style="font-size: 18px; font-weight: bold;">na temat: "[[work_topic]]"</h2>
                                <br/><br/><br/>
                                <p style="text-align: right;">Wykonawca: student(ka) grupy [[group_number]]</p>
                                <p style="text-align: right;">[[student_name]]</p>
                                <br/>
                                <p style="text-align: right;">Promotor: [[supervisor_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; margin-top: 40px;">
                                <p>[[city]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Titelseite für Diplomarbeit',
                        'description' => 'Standard-Titelseite für eine Diplomarbeit.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;">
                                <p>MINISTERIUM FÜR BILDUNG UND WISSENSCHAFT DER UKRAINE</p>
                                <p><strong>[[university_name]]</strong></p>
                                <p>Fakultät [[faculty_name]]</p>
                                <p>Lehrstuhl [[department_name]]</p>
                                <br/><br/><br/>
                                <h1 style="font-size: 20px; font-weight: bold;">[[work_type]]</h1>
                                <h2 style="font-size: 18px; font-weight: bold;">Thema: "[[work_topic]]"</h2>
                                <br/><br/><br/>
                                <p style="text-align: right;">Erstellt von: Student(in) Gruppe [[group_number]]</p>
                                <p style="text-align: right;">[[student_name]]</p>
                                <br/>
                                <p style="text-align: right;">Betreuer: [[supervisor_name]]</p>
                                <br/><br/><br/>
                            </div>',
                        'body_html' => '',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; margin-top: 40px;">
                                <p>[[city]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 9. Рецензия на научную работу ---
            [
                'slug' => 'scientific-work-review-ua',
                'fields' => '[
                    {"name":"reviewer_name","type":"text","required":true,"labels":{"uk":"ПІБ рецензента","en":"Reviewer\'s Full Name", "pl":"Imię i nazwisko recenzenta", "de":"Vollständiger Name des Gutachters"}},
                    {"name":"reviewer_position","type":"text","required":true,"labels":{"uk":"Посада рецензента","en":"Reviewer\'s Position", "pl":"Stanowisko recenzenta", "de":"Position des Gutachters"}},
                    {"name":"work_author_name","type":"text","required":true,"labels":{"uk":"ПІБ автора роботи","en":"Work Author\'s Full Name", "pl":"Imię i nazwisko autora pracy", "de":"Vollständiger Name des Verfassers"}},
                    {"name":"work_topic","type":"text","required":true,"labels":{"uk":"Тема наукової роботи","en":"Scientific Work Topic", "pl":"Temat pracy naukowej", "de":"Thema der wissenschaftlichen Arbeit"}},
                    {"name":"review_content","type":"textarea","required":true,"labels":{"uk":"Зміст рецензії (актуальність, новизна, структура, висновки)","en":"Review Content (relevance, novelty, structure, conclusions)", "pl":"Treść recenzji (aktualność, nowość, struktura, wnioski)", "de":"Inhalt der Rezension (Relevanz, Neuheit, Struktur, Schlussfolgerungen)"}},
                    {"name":"recommendation","type":"textarea","required":true,"labels":{"uk":"Рекомендації (до захисту, доопрацювати)","en":"Recommendations (for defense, for revision)", "pl":"Zalecenia (do obrony, do poprawy)", "de":"Empfehlungen (zur Verteidigung, zur Überarbeitung)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Рецензія на наукову роботу',
                        'description' => 'Офіційна оцінка наукової роботи, її актуальності, змісту та висновків.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РЕЦЕНЗІЯ</h1><p style="font-size: 14px;">на наукову роботу</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Рецензент: <strong>[[reviewer_name]]</strong>, [[reviewer_position]]</p>
                                <p>На наукову роботу [[work_author_name]] на тему: "[[work_topic]]".</p>
                                <br/>
                                <p>[[review_content]]</p>
                                <p>Рекомендації: [[recommendation]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис рецензента: ___________________ ([[reviewer_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Review of Scientific Work',
                        'description' => 'Official assessment of a scientific work, its relevance, content, and conclusions.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REVIEW</h1><p style="font-size: 14px;">of scientific work</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Reviewer: <strong>[[reviewer_name]]</strong>, [[reviewer_position]]</p>
                                <p>On the scientific work of [[work_author_name]] on the topic: "[[work_topic]]".</p>
                                <br/>
                                <p>[[review_content]]</p>
                                <p>Recommendations: [[recommendation]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Reviewer\'s Signature: ___________________ ([[reviewer_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Recenzja pracy naukowej',
                        'description' => 'Oficjalna ocena pracy naukowej, jej aktualności, treści i wniosków.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECENZJA</h1><p style="font-size: 14px;">pracy naukowej</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Recenzent: <strong>[[reviewer_name]]</strong>, [[reviewer_position]]</p>
                                <p>Pracy naukowej [[work_author_name]] na temat: "[[work_topic]]".</p>
                                <br/>
                                <p>[[review_content]]</p>
                                <p>Zalecenia: [[recommendation]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis recenzenta: ___________________ ([[reviewer_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Gutachten zur wissenschaftlichen Arbeit',
                        'description' => 'Offizielle Bewertung einer wissenschaftlichen Arbeit, ihrer Relevanz, ihres Inhalts und ihrer Schlussfolgerungen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GUTACHTEN</h1><p style="font-size: 14px;">zur wissenschaftlichen Arbeit</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Gutachter: <strong>[[reviewer_name]]</strong>, [[reviewer_position]]</p>
                                <p>Zur wissenschaftlichen Arbeit von [[work_author_name]] zum Thema: "[[work_topic]]".</p>
                                <br/>
                                <p>[[review_content]]</p>
                                <p>Empfehlungen: [[recommendation]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Gutachters: ___________________ ([[reviewer_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 10. Отзыв научного руководителя ---
            [
                'slug' => 'supervisor-review-ua',
                'fields' => '[
                    {"name":"supervisor_name","type":"text","required":true,"labels":{"uk":"ПІБ наукового керівника","en":"Supervisor\'s Full Name", "pl":"Imię i nazwisko promotora", "de":"Vollständiger Name des Betreuers"}},
                    {"name":"supervisor_position","type":"text","required":true,"labels":{"uk":"Посада наукового керівника","en":"Supervisor\'s Position", "pl":"Stanowisko promotora", "de":"Position des Betreuers"}},
                    {"name":"student_name","type":"text","required":true,"labels":{"uk":"ПІБ студента","en":"Student\'s Full Name", "pl":"Imię i nazwisko studenta", "de":"Vollständiger Name des Studenten"}},
                    {"name":"work_topic","type":"text","required":true,"labels":{"uk":"Тема роботи","en":"Work Topic", "pl":"Temat pracy", "de":"Thema der Arbeit"}},
                    {"name":"review_content","type":"textarea","required":true,"labels":{"uk":"Зміст відгуку (самостійність, якість роботи, рекомендації)","en":"Review Content (independence, work quality, recommendations)", "pl":"Treść opinii (samodzielność, jakość pracy, zalecenia)", "de":"Inhalt des Gutachtens (Selbstständigkeit, Arbeitsqualität, Empfehlungen)"}},
                    {"name":"recommendation","type":"textarea","required":true,"labels":{"uk":"Рекомендації (до захисту, доопрацювати)","en":"Recommendations (for defense, for revision)", "pl":"Zalecenia (do obrony, do poprawy)", "de":"Empfehlungen (zur Verteidigung, zur Überarbeitung)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Відгук наукового керівника',
                        'description' => 'Офіційна оцінка наукової роботи студента науковим керівником.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ВІДГУК</h1><p style="font-size: 14px;">наукового керівника</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Науковий керівник: <strong>[[supervisor_name]]</strong>, [[supervisor_position]]</p>
                                <p>На роботу студента(ки) [[student_name]] на тему: "[[work_topic]]".</p>
                                <br/>
                                <p>[[review_content]]</p>
                                <p>Рекомендації: [[recommendation]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис наукового керівника: ___________________ ([[supervisor_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Supervisor\'s Review',
                        'description' => 'Official assessment of a student\'s scientific work by the supervisor.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REVIEW</h1><p style="font-size: 14px;">by supervisor</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Supervisor: <strong>[[supervisor_name]]</strong>, [[supervisor_position]]</p>
                                <p>On the work of student [[student_name]] on the topic: "[[work_topic]]".</p>
                                <br/>
                                <p>[[review_content]]</p>
                                <p>Recommendations: [[recommendation]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Supervisor\'s Signature: ___________________ ([[supervisor_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Opinia promotora',
                        'description' => 'Oficjalna ocena pracy naukowej studenta przez promotora.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OPINIA</h1><p style="font-size: 14px;">promotora</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Promotor: <strong>[[supervisor_name]]</strong>, [[supervisor_position]]</p>
                                <p>Do pracy studenta(ki) [[student_name]] na temat: "[[work_topic]]".</p>
                                <br/>
                                <p>[[review_content]]</p>
                                <p>Zalecenia: [[recommendation]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis promotora: ___________________ ([[supervisor_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Gutachten des Betreuers',
                        'description' => 'Offizielle Bewertung der wissenschaftlichen Arbeit eines Studenten durch den Betreuer.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GUTACHTEN</h1><p style="font-size: 14px;">des Betreuers</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Betreuer: <strong>[[supervisor_name]]</strong>, [[supervisor_position]]</p>
                                <p>Zur Arbeit des Studenten [[student_name]] zum Thema: "[[work_topic]]".</p>
                                <br/>
                                <p>[[review_content]]</p>
                                <p>Empfehlungen: [[recommendation]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Betreuers: ___________________ ([[supervisor_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 11. Портфолио студента/ученика ---
            [
                'slug' => 'student-portfolio-ua',
                'fields' => '[
                    {"name":"student_name","type":"text","required":true,"labels":{"uk":"ПІБ студента/учня","en":"Student\'s/Pupil\'s Full Name", "pl":"Imię i nazwisko studenta/ucznia", "de":"Vollständiger Name des Studenten/Schülers"}},
                    {"name":"institution_name","type":"text","required":true,"labels":{"uk":"Назва навчального закладу","en":"Educational Institution Name", "pl":"Nazwa instytucji edukacyjnej", "de":"Name der Bildungseinrichtung"}},
                    {"name":"specialty_grade","type":"text","required":true,"labels":{"uk":"Спеціальність/Клас","en":"Specialty/Grade", "pl":"Specjalność/Klasa", "de":"Fachrichtung/Klasse"}},
                    {"name":"achievements","type":"textarea","required":true,"labels":{"uk":"Досягнення (наукові, спортивні, творчі)","en":"Achievements (academic, sports, creative)", "pl":"Osiągnięcia (naukowe, sportowe, twórcze)", "de":"Leistungen (akademisch, sportlich, kreativ)"}},
                    {"name":"projects","type":"textarea","required":false,"labels":{"uk":"Виконані проекти","en":"Completed Projects", "pl":"Zrealizowane projekty", "de":"Abgeschlossene Projekte"}},
                    {"name":"skills","type":"textarea","required":true,"labels":{"uk":"Навички (професійні, особистісні)","en":"Skills (professional, personal)", "pl":"Umiejętności (zawodowe, osobiste)", "de":"Fähigkeiten (beruflich, persönlich)"}},
                    {"name":"hobbies","type":"textarea","required":false,"labels":{"uk":"Інтереси та хобі","en":"Interests and Hobbies", "pl":"Zainteresowania i hobby", "de":"Interessen und Hobbys"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Портфоліо студента/учня',
                        'description' => 'Збірка робіт та досягнень студента або учня.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОРТФОЛІО</h1><p>студента/учня</p><p><strong>[[student_name]]</strong></p><p>[[institution_name]]</p><p>[[specialty_grade]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ДОСЯГНЕННЯ</h2>
                                <p>[[achievements]]</p>
                                [[projects]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ВИКОНАНІ ПРОЕКТИ</h2>
                                <p>[[projects]]</p>[[/projects]]
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">НАВИЧКИ</h2>
                                <p>[[skills]]</p>
                                [[hobbies]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ІНТЕРЕСИ ТА ХОБІ</h2>
                                <p>[[hobbies]]</p>[[/hobbies]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Student/Pupil Portfolio',
                        'description' => 'Collection of works and achievements of a student or pupil.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PORTFOLIO</h1><p>student/pupil</p><p><strong>[[student_name]]</strong></p><p>[[institution_name]]</p><p>[[specialty_grade]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ACHIEVEMENTS</h2>
                                <p>[[achievements]]</p>
                                [[projects]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">COMPLETED PROJECTS</h2>
                                <p>[[projects]]</p>[[/projects]]
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">SKILLS</h2>
                                <p>[[skills]]</p>
                                [[hobbies]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">INTERESTS AND HOBBIES</h2>
                                <p>[[hobbies]]</p>[[/hobbies]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Portfolio studenta/ucznia',
                        'description' => 'Zbiór prac i osiągnięć studenta lub ucznia.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PORTFOLIO</h1><p>studenta/ucznia</p><p><strong>[[student_name]]</strong></p><p>[[institution_name]]</p><p>[[specialty_grade]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">OSIĄGNIĘCIA</h2>
                                <p>[[achievements]]</p>
                                [[projects]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ZREALIZOWANE PROJEKTY</h2>
                                <p>[[projects]]</p>[[/projects]]
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">UMIEJĘTNOŚCI</h2>
                                <p>[[skills]]</p>
                                [[hobbies]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ZAINTERESOWANIA I HOBBY</h2>
                                <p>[[hobbies]]</p>[[/hobbies]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Portfolio Student/Schüler',
                        'description' => 'Sammlung von Arbeiten und Leistungen eines Studenten oder Schülers.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PORTFOLIO</h1><p>Student/Schüler</p><p><strong>[[student_name]]</strong></p><p>[[institution_name]]</p><p>[[specialty_grade]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">LEISTUNGEN</h2>
                                <p>[[achievements]]</p>
                                [[projects]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ABGESCHLOSSENE PROJEKTE</h2>
                                <p>[[projects]]</p>[[/projects]]
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">FÄHIGKEITEN</h2>
                                <p>[[skills]]</p>
                                [[hobbies]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">INTERESSEN UND HOBBYS</h2>
                                <p>[[hobbies]]</p>[[/hobbies]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 12. Мотивационное письмо для поступления в ВУЗ ---
            [
                'slug' => 'motivation-letter-university-ua',
                'fields' => '[
                    {"name":"university_name","type":"text","required":true,"labels":{"uk":"Назва ВНЗ","en":"University Name", "pl":"Nazwa uczelni", "de":"Name der Universität"}},
                    {"name":"rector_name","type":"text","required":true,"labels":{"uk":"ПІБ ректора","en":"Rector\'s Full Name", "pl":"Imię i nazwisko rektora", "de":"Vollständiger Name des Rektors"}},
                    {"name":"applicant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"uk":"Адреса заявника","en":"Applicant\'s Address", "pl":"Adres wnioskodawcy", "de":"Adresse des Antragstellers"}},
                    {"name":"applicant_phone","type":"text","required":false,"labels":{"uk":"Телефон заявника","en":"Applicant\'s Phone", "pl":"Telefon wnioskodawcy", "de":"Telefon des Antragstellers"}},
                    {"name":"applicant_email","type":"email","required":false,"labels":{"uk":"Email заявника","en":"Applicant\'s Email", "pl":"E-mail wnioskodawcy", "de":"E-Mail des Antragstellers"}},
                    {"name":"specialty_name","type":"text","required":true,"labels":{"uk":"Назва спеціальності, на яку вступаєте","en":"Name of Specialty Applying For", "pl":"Nazwa specjalności, na którą aplikujesz", "de":"Name der Fachrichtung, für die Sie sich bewerben"}},
                    {"name":"motivation_text","type":"textarea","required":true,"labels":{"uk":"Зміст мотиваційного листа (чому обрали ВНЗ, спеціальність, ваші досягнення, плани)","en":"Motivation Letter Content (why you chose the university, specialty, your achievements, plans)", "pl":"Treść listu motywacyjnego (dlaczego wybrałeś uczelnię, specjalność, Twoje osiągnięcia, plany)", "de":"Inhalt des Motivationsschreibens (Warum Sie die Universität, Fachrichtung gewählt haben, Ihre Leistungen, Pläne)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Мотиваційний лист для вступу до ВНЗ',
                        'description' => 'Особистий лист, що пояснює мотивацію абітурієнта до вступу у ВНЗ на певну спеціальність.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Ректору [[university_name]]</p>
                                <p style="text-align: right;">[[rector_name]]</p>
                                <br/>
                                <p style="text-align: right;">від [[applicant_name]]</p>
                                <p style="text-align: right;">[[applicant_address]]</p>
                                <p style="text-align: right;">Телефон: [[applicant_phone]]</p>
                                <p style="text-align: right;">Email: [[applicant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">МОТИВАЦІЙНИЙ ЛИСТ</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний(а) Ректоре [[rector_name]],</p>
                                <p>Цим листом висловлюю свою зацікавленість у вступі до Вашого університету на спеціальність <strong>[[specialty_name]]</strong>.</p>
                                <p>[[motivation_text]]</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>[[applicant_name]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Motivation Letter for University Admission',
                        'description' => 'Personal letter explaining the applicant\'s motivation to enroll in a university for a specific specialty.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MOTIVATION LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>To the Rector of [[university_name]]</p></td><td style="text-align: right;"><p>[[rector_name]]</p></td></tr></table><br/><p style="text-align: right;">from [[applicant_name]]</p><p style="text-align: right;">[[applicant_address]]</p><p style="text-align: right;">Phone: [[applicant_phone]]</p><p style="text-align: right;">Email: [[applicant_email]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Rector [[rector_name]],</p>
                                <p>I am writing to express my strong interest in enrolling in your university for the specialty <strong>[[specialty_name]]</strong>.</p>
                                <p>[[motivation_text]]</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>[[applicant_name]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'List motywacyjny na studia',
                        'description' => 'Osobisty list wyjaśniający motywację kandydata do podjęcia studiów na określonej specjalności.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LIST MOTYWACYJNY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Do Rektora [[university_name]]</p></td><td style="text-align: right;"><p>[[rector_name]]</p></td></tr></table><br/><p style="text-align: right;">od [[applicant_name]]</p><p style="text-align: right;">[[applicant_address]]</p><p style="text-align: right;">Telefon: [[applicant_phone]]</p><p style="text-align: right;">E-mail: [[applicant_email]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny(a) Panie/Pani Rektorze [[rector_name]],</p>
                                <p>Niniejszym listem wyrażam swoje głębokie zainteresowanie podjęciem studiów na Państwa uczelni na specjalności <strong>[[specialty_name]]</strong>.</p>
                                <p>[[motivation_text]]</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>[[applicant_name]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Motivationsschreiben für die Hochschulzulassung',
                        'description' => 'Persönliches Schreiben, das die Motivation des Bewerbers für die Zulassung zu einer Universität für eine bestimmte Fachrichtung erläutert.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MOTIVATIONSSCHREIBEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>An den Rektor von [[university_name]]</p></td><td style="text-align: right;"><p>[[rector_name]]</p></td></tr></table><br/><p style="text-align: right;">von [[applicant_name]]</p><p style="text-align: right;">[[applicant_address]]</p><p style="text-align: right;">Telefon: [[applicant_phone]]</p><p style="text-align: right;">E-Mail: [[applicant_email]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte(r) Herr/Frau Rektor [[rector_name]],</p>
                                <p>Mit diesem Schreiben bekunde ich mein großes Interesse an der Zulassung zu Ihrer Universität für den Studiengang <strong>[[specialty_name]]</strong>.</p>
                                <p>[[motivation_text]]</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>[[applicant_name]]</p>
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

