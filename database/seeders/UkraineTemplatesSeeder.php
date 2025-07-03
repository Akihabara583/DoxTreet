<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Template;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UkraineTemplatesSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Starting Improved Ukraine Templates Seeder...');

        $categories = [
            'business-and-work' => Category::firstOrCreate(['slug' => 'business-and-work']),
            'personal-and-family' => Category::firstOrCreate(['slug' => 'personal-and-family']),
            'real-estate' => Category::firstOrCreate(['slug' => 'real-estate']),
            // ... добавьте остальные категории по аналогии, если они еще не созданы
            'legal-documents' => Category::firstOrCreate(['slug' => 'legal-documents']),
            'education' => Category::firstOrCreate(['slug' => 'education']),
            'health-and-medicine' => Category::firstOrCreate(['slug' => 'health-and-medicine']),
            'events-and-travel' => Category::firstOrCreate(['slug' => 'events-and-travel']),
            'automotive' => Category::firstOrCreate(['slug' => 'automotive']),
        ];

        $templatesData = $this->getTemplatesData();

        foreach ($templatesData as $catSlug => $templates) {
            if (!isset($categories[$catSlug])) {
                $this->command->warn("Category with slug '{$catSlug}' not found. Skipping templates.");
                continue;
            }
            $category = $categories[$catSlug];
            $this->command->info("Processing category: {$category->name_uk}"); // Используем украинское название для вывода

            foreach ($templates as $templateData) {
                $slugBase = Str::slug($templateData['name']);
                $slugForCountry = $slugBase . '-ua';

                // Ищем или создаем шаблон по слагу
                $template = Template::updateOrCreate(
                    ['slug' => $slugForCountry, 'country_code' => 'UA'],
                    [
                        'category_id' => $category->id,
                        'is_active' => true,
                        'fields' => $templateData['fields'],
                        'header_html' => $templateData['header_html'] ?? '',
                        'body_html' => $templateData['body_html'],
                        'footer_html' => $templateData['footer_html'] ?? '',
                    ]
                );

                // Обновляем или создаем переводы
                $template->translations()->updateOrCreate(
                    ['locale' => 'uk'],
                    [
                        'title' => $templateData['name'],
                        'description' => "Створити документ: {$templateData['name']}.",
                    ]
                );
                // Добавьте переводы для других языков по аналогии, если нужно

                $this->command->line("  - Processed template: {$templateData['name']}");
            }
        }

        $this->command->info('Improved Ukraine Templates Seeder finished successfully!');
    }

    /**
     * Возвращает полную структуру данных для каждого шаблона.
     * ВАША ГЛАВНАЯ ЗАДАЧА - НАПОЛНИТЬ ЭТОТ МАССИВ ДАННЫМИ ДЛЯ ВСЕХ ШАБЛОНОВ.
     */
    private function getTemplatesData(): array
    {
        // Я подготовил несколько примеров. Вам нужно будет по аналогии заполнить остальные.
        return [
            'business-and-work' => [

                // --- 1. РЕЗЮМЕ И СОПРОВОДИТЕЛЬНЫЕ ПИСЬМА ---
                [
                    'name' => 'Резюме (классическое)',
                    'fields' => json_encode([
                        ['name' => 'full_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Прізвище, ім\'я, по батькові']],
                        ['name' => 'position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Бажана посада']],
                        ['name' => 'city', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місто проживання']],
                        ['name' => 'phone', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Телефон']],
                        ['name' => 'email', 'type' => 'email', 'required' => true, 'labels' => ['uk' => 'Email']],
                        ['name' => 'linkedin', 'type' => 'text', 'required' => false, 'labels' => ['uk' => 'Профіль LinkedIn']],
                        ['name' => 'summary', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Профіль (коротка інформація про себе)']],
                        ['name' => 'experience', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Досвід роботи'], 'fields' => [
                            ['name' => 'job_title', 'type' => 'text', 'labels' => ['uk' => 'Посада']],
                            ['name' => 'company', 'type' => 'text', 'labels' => ['uk' => 'Компанія, місто']],
                            ['name' => 'period', 'type' => 'text', 'labels' => ['uk' => 'Період роботи (напр., 09.2020 - дотепер)']],
                            ['name' => 'duties', 'type' => 'textarea', 'labels' => ['uk' => 'Основні обов\'язки та досягнення']],
                        ]],
                        ['name' => 'education', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Освіта'], 'fields' => [
                            ['name' => 'institution', 'type' => 'text', 'labels' => ['uk' => 'Навчальний заклад']],
                            ['name' => 'degree', 'type' => 'text', 'labels' => ['uk' => 'Спеціальність']],
                            ['name' => 'grad_year', 'type' => 'text', 'labels' => ['uk' => 'Рік випуску']],
                        ]],
                        ['name' => 'skills', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Ключові навички']],
                        ['name' => 'languages', 'type' => 'textarea', 'required' => false, 'labels' => ['uk' => 'Володіння мовами']],
                    ]),
                    'body_html' => '
            <div style="font-family: Arial, sans-serif; padding: 20px;">
                <h1 style="text-align: center; margin-bottom: 5px;">[[full_name]]</h1>
                <h2 style="text-align: center; color: #333; font-size: 1.2em; margin-top: 0; font-weight: normal;">[[position]]</h2>
                <div style="text-align: center; color: #555; border-bottom: 1px solid #ccc; padding-bottom: 15px; margin-bottom: 15px;">
                    [[city]] | [[phone]] | [[email]] | [[linkedin]]
                </div>
                <h3>ПРОФІЛЬ</h3>
                <p>[[summary]]</p>
                <h3>ДОСВІД РОБОТИ</h3>
                <div style="margin-bottom: 15px;">
                    <p style="margin:0;"><strong>[[job_title]]</strong> | [[period]]</p>
                    <p style="margin:0; font-style: italic;">[[company]]</p>
                    <div style="padding-left: 20px;">[[duties]]</div>
                </div>
                <h3>ОСВІТА</h3>
                <div style="margin-bottom: 15px;">
                    <p style="margin:0;"><strong>[[institution]]</strong>, [[grad_year]]</p>
                    <p style="margin:0;">[[degree]]</p>
                </div>
                <h3>КЛЮЧОВІ НАВИЧКИ</h3>
                <p>[[skills]]</p>
                <h3>ВОЛОДІННЯ МОВАМИ</h3>
                <p>[[languages]]</p>
            </div>
        '
                ],
                [
                    'name' => 'Резюме (хронологическое)',
                    'fields' => json_encode([
                        ['name' => 'full_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ']],
                        ['name' => 'position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Бажана посада']],
                        ['name' => 'contacts', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Контактна інформація (телефон, email, LinkedIn)']],
                        ['name' => 'experience', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Досвід роботи (в зворотньому хронологічному порядку)'], 'fields' => [
                            ['name' => 'period', 'type' => 'text', 'labels' => ['uk' => 'Період роботи']],
                            ['name' => 'job_title', 'type' => 'text', 'labels' => ['uk' => 'Посада']],
                            ['name' => 'company', 'type' => 'text', 'labels' => ['uk' => 'Компанія, місто']],
                            ['name' => 'duties', 'type' => 'textarea', 'labels' => ['uk' => 'Обов\'язки та досягнення']],
                        ]],
                        ['name' => 'education', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Освіта'], 'fields' => [
                            ['name' => 'institution', 'type' => 'text', 'labels' => ['uk' => 'Навчальний заклад']],
                            ['name' => 'degree', 'type' => 'text', 'labels' => ['uk' => 'Спеціальність']],
                            ['name' => 'grad_year', 'type' => 'text', 'labels' => ['uk' => 'Рік випуску']],
                        ]],
                        ['name' => 'skills', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Навички']],
                    ]),
                    'body_html' => '
            <div style="font-family: Arial, sans-serif; padding: 20px;">
                <h1 style="text-align: center;">[[full_name]]</h1>
                <h2 style="text-align: center; font-weight: normal;">[[position]]</h2>
                <p style="text-align: center;">[[contacts]]</p>
                <hr>
                <h3>ДОСВІД РОБОТИ</h3>
                <div style="margin-bottom: 15px;">
                    <p style="margin:0;"><strong>[[period]]</strong></p>
                    <p style="margin:0;"><strong>[[job_title]]</strong>, <em>[[company]]</em></p>
                    <div style="padding-left: 20px;">[[duties]]</div>
                </div>
                <h3>ОСВІТА</h3>
                <div style="margin-bottom: 15px;">
                    <p style="margin:0;"><strong>[[institution]]</strong>, [[grad_year]]</p>
                    <p style="margin:0;">[[degree]]</p>
                </div>
                <h3>НАВИЧКИ</h3>
                <p>[[skills]]</p>
            </div>
        '
                ],
                [
                    'name' => 'Резюме (функциональное)',
                    'fields' => json_encode([
                        ['name' => 'full_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ']],
                        ['name' => 'position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Бажана посада']],
                        ['name' => 'contacts', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Контакти']],
                        ['name' => 'summary', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Профіль / Мета']],
                        ['name' => 'skills_summary', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Ключові компетенції'], 'fields' => [
                            ['name' => 'skill_area', 'type' => 'text', 'labels' => ['uk' => 'Сфера компетенції (напр., Управління проектами)']],
                            ['name' => 'skill_details', 'type' => 'textarea', 'labels' => ['uk' => 'Детальний опис навичок та досягнень в цій сфері']],
                        ]],
                        ['name' => 'experience', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Історія зайнятості'], 'fields' => [
                            ['name' => 'job_title', 'type' => 'text', 'labels' => ['uk' => 'Посада']],
                            ['name' => 'company', 'type' => 'text', 'labels' => ['uk' => 'Компанія']],
                            ['name' => 'period', 'type' => 'text', 'labels' => ['uk' => 'Період']],
                        ]],
                        ['name' => 'education', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Освіта']],
                    ]),
                    'body_html' => '
            <div style="font-family: Arial, sans-serif; padding: 20px;">
                <h1 style="text-align: center;">[[full_name]]</h1>
                <h2 style="text-align: center; font-weight: normal;">[[position]]</h2>
                <p style="text-align: center;">[[contacts]]</p>
                <hr>
                <h3>ПРОФІЛЬ</h3>
                <p>[[summary]]</p>
                <h3>КЛЮЧОВІ КОМПЕТЕНЦІЇ</h3>
                <div style="margin-bottom: 15px;">
                    <p style="margin:0;"><strong>[[skill_area]]</strong></p>
                    <div style="padding-left: 20px;">[[skill_details]]</div>
                </div>
                <h3>ІСТОРІЯ ЗАЙНЯТОСТІ</h3>
                <p><strong>[[job_title]]</strong>, <em>[[company]]</em>, [[period]]</p>
                <h3>ОСВІТА</h3>
                <p>[[education]]</p>
            </div>
        '
                ],
                [
                    'name' => 'Сопроводительное письмо к резюме',
                    'fields' => json_encode([
                        ['name' => 'applicant_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваше ПІБ']],
                        ['name' => 'applicant_contacts', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваш телефон та Email']],
                        ['name' => 'hiring_manager', 'type' => 'text', 'required' => false, 'labels' => ['uk' => 'ПІБ рекрутера або HR-менеджера (якщо відомо)']],
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва компанії']],
                        ['name' => 'position_applied', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва вакансії']],
                        ['name' => 'letter_body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Текст листа (розкажіть, чому ви підходите на цю посаду)']],
                    ]),
                    'body_html' => '
            <div style="text-align: right;">
                <p><strong>[[applicant_name]]</strong></p>
                <p>[[applicant_contacts]]</p>
                <p>[[current_date]]</p>
            </div>
            <div style="margin-top: 30px;">
                <p>[[hiring_manager]]</p>
                <p>[[company_name]]</p>
            </div>
            <h3 style="margin-top: 30px; margin-bottom: 20px;">Щодо вакансії «[[position_applied]]»</h3>
            <p>Шановний(а) [[hiring_manager]]!</p>
            <div>[[letter_body]]</div>
            <p style="margin-top: 30px;">Дякую за ваш час та увагу. З нетерпінням чекаю на можливість обговорити мою кандидатуру на співбесіді.</p>
            <p style="margin-top: 30px;">З повагою,</p>
            <p>[[applicant_name]]</p>
        '
                ],

                // --- 2. ТРУДОВЫЕ ОТНОШЕНИЯ (ПРИЕМ, ПЕРЕВОД, ОТПУСК, УВОЛЬНЕНИЕ) ---
                [
                    'name' => 'Заявление о приеме на работу',
                    'fields' => json_encode([
                        ['name' => 'director_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада керівника (у давальному відмінку)']],
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва компанії']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ керівника (у давальному відмінку)']],
                        ['name' => 'applicant_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваші ПІБ (у родовому відмінку)']],
                        ['name' => 'applicant_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша адреса проживання']],
                        ['name' => 'applicant_phone', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваш телефон']],
                        ['name' => 'position_to_take', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'На посаду']],
                        ['name' => 'department', 'type' => 'text', 'required' => false, 'labels' => ['uk' => 'У відділ / структурний підрозділ']],
                        ['name' => 'start_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата прийняття на роботу']],
                        ['name' => 'employment_type', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Умови роботи (напр., за основним місцем роботи, за сумісництвом)']],
                        ['name' => 'trial_period', 'type' => 'text', 'required' => false, 'labels' => ['uk' => 'З випробувальним терміном (напр., 3 місяці)']],
                    ]),
                    'body_html' => '
            <div style="text-align: right; margin-left: 50%;">
                <p>[[director_position]]</p>
                <p>[[company_name]]</p>
                <p>[[director_name]]</p>
                <p>[[applicant_name]]</p>
                <p>що мешкає за адресою: [[applicant_address]]</p>
                <p>тел.: [[applicant_phone]]</p>
            </div>
            <h2 style="text-align: center; margin-top: 50px; margin-bottom: 30px;">ЗАЯВА</h2>
            <p style="text-indent: 40px;">Прошу прийняти мене на роботу до [[company_name]] на посаду [[position_to_take]] [[department]] з [[start_date]] [[employment_type]] [[trial_period]].</p>
            <p style="text-indent: 40px;">До заяви додаю:</p>
            <ul>
                <li>Копія паспорта;</li>
                <li>Копія ідентифікаційного коду;</li>
                <li>Трудова книжка (за наявності);</li>
                <li>Інші документи.</li>
            </ul>
            <table style="width: 100%; margin-top: 80px; border: none;">
                <tr>
                    <td style="text-align: left;">[[current_date]]</td>
                    <td style="text-align: right;">___________ (Підпис)</td>
                </tr>
            </table>
        '
                ],
                [
                    'name' => 'Трудовой договор (бессрочный)',
                    'fields' => json_encode([
                        ['name' => 'city', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місто укладання']],
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Повна назва Роботодавця']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'В особі (посада, ПІБ)']],
                        ['name' => 'basis', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Що діє на підставі']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ Працівника']],
                        ['name' => 'employee_passport', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Паспортні дані Працівника']],
                        ['name' => 'employee_id_code', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ІПН Працівника']],
                        ['name' => 'employee_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада Працівника']],
                        ['name' => 'department', 'type' => 'text', 'required' => false, 'labels' => ['uk' => 'Структурний підрозділ']],
                        ['name' => 'salary', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Посадовий оклад (цифрами), грн']],
                        ['name' => 'salary_words', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посадовий оклад (прописом)']],
                        ['name' => 'start_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата початку роботи']],
                        ['name' => 'company_details', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Повні реквізити Роботодавця']],
                        ['name' => 'employee_details', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Повні реквізити Працівника']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ТРУДОВИЙ ДОГОВІР</h2>
            <p>м. [[city]] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [[current_date]]</p>
            <p>[[company_name]], надалі "Роботодавець", в особі [[director_name]], що діє на підставі [[basis]], з однієї сторони, та громадянин(ка) України <b>[[employee_name]]</b> (паспорт: [[employee_passport]], ІПН: [[employee_id_code]]), надалі "Працівник", з іншої сторони, разом іменовані "Сторони", уклали цей Трудовий договір про нижченаведене:</p>

            <h3>1. ЗАГАЛЬНІ ПОЛОЖЕННЯ</h3>
            <p>1.1. За цим Договором Працівник зобов\'язується виконувати роботу на посаді <b>[[employee_position]]</b> у структурному підрозділі <b>[[department]]</b>, а Роботодавець зобов\'язується виплачувати Працівникові заробітну плату і забезпечувати умови праці, необхідні для виконання роботи, передбачені законодавством про працю, колективним договором і угодою сторін.</p>
            <p>1.2. Цей договір є безстроковим. Робота за цим договором є для Працівника основним місцем роботи.</p>
            <p>1.3. Працівник зобов\'язується приступити до виконання своїх обов\'язків з <b>[[start_date]]</b>.</p>

            <h3>2. ПРАВА ТА ОБОВ\'ЯЗКИ СТОРІН</h3>
            <p>2.1. <b>Обов\'язки Працівника:</b> сумлінно виконувати свої трудові обов\'язки; дотримуватися правил внутрішнього трудового розпорядку; дбайливо ставитися до майна Роботодавця.</p>
            <p>2.2. <b>Обов\'язки Роботодавця:</b> забезпечити Працівника робочим місцем; своєчасно виплачувати заробітну плату; забезпечувати безпечні умови праці.</p>

            <h3>3. ОПЛАТА ПРАЦІ</h3>
            <p>3.1. За виконання своїх обов\'язків Працівнику встановлюється посадовий оклад у розмірі <b>[[salary]] грн. ([[salary_words]])</b> на місяць.</p>
            <p>3.2. Заробітна плата виплачується двічі на місяць: за першу половину місяця — 22 числа, за другу — 7 числа наступного місяця.</p>

            <h3>4. РОБОЧИЙ ЧАС І ЧАС ВІДПОЧИНКУ</h3>
            <p>4.1. Працівникові встановлюється п\'ятиденний робочий тиждень з двома вихідними днями (субота, неділя). Тривалість щоденної роботи — 8 годин.</p>
            <p>4.2. Працівникові надається щорічна основна відпустка тривалістю 24 календарних дні.</p>

            <h3>5. ВІДПОВІДАЛЬНІСТЬ СТОРІН І ПОРЯДОК ВИРІШЕННЯ СПОРІВ</h3>
            <p>5.1. У випадку невиконання або неналежного виконання обов\'язків, передбачених цим Договором, Сторони несуть відповідальність згідно з чинним законодавством України.</p>

            <h3>6. РЕКВІЗИТИ ТА ПІДПИСИ СТОРІN</h3>
            <table style="width: 100%; margin-top: 30px;">
                <tr style="vertical-align: top;">
                    <td style="width: 50%;">
                        <b>РОБОТОДАВЕЦЬ</b>
                        <div>[[company_details]]</div>
                        <p style="margin-top: 50px;">_______________ / [[director_name]]</p>
                    </td>
                    <td style="width: 50%;">
                        <b>ПРАЦІВНИК</b>
                        <div>[[employee_details]]</div>
                        <p style="margin-top: 50px;">_______________ / [[employee_name]]</p>
                    </td>
                </tr>
            </table>
        '
                ],
                [
                    'name' => 'Срочный трудовой договор',
                    'fields' => json_encode([
                        ['name' => 'city', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місто укладання']],
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Повна назва Роботодавця']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'В особі (посада, ПІБ)']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ Працівника']],
                        ['name' => 'employee_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада Працівника']],
                        ['name' => 'start_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата початку роботи']],
                        ['name' => 'end_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата закінчення роботи']],
                        ['name' => 'reason', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Причина укладення строкового договору']],
                        ['name' => 'salary', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Оклад (грн)']],
                        ['name' => 'company_details', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Реквізити Роботодавця']],
                        ['name' => 'employee_details', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Реквізити Працівника']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">СТРОКОВИЙ ТРУДОВИЙ ДОГОВІР</h2>
            <p>м. [[city]] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [[current_date]]</p>
            <p>[[company_name]], надалі "Роботодавець", в особі [[director_name]], та громадянин(ка) <b>[[employee_name]]</b>, надалі "Працівник", уклали цей договір про наступне:</p>
            <h3>1. ПРЕДМЕТ ДОГОВОРУ</h3>
            <p>1.1. Працівник приймається на роботу на посаду <b>[[employee_position]]</b>.</p>
            <p>1.2. Цей договір укладається на строк з <b>[[start_date]]</b> до <b>[[end_date]]</b>.</p>
            <p>1.3. Укладення строкового договору обумовлено: [[reason]].</p>
            <h3>2. ОПЛАТА ПРАЦІ</h3>
            <p>2.1. Працівнику встановлюється оклад у розмірі <b>[[salary]] грн.</b> на місяць.</p>
            <h3>3. РЕКВІЗИТИ СТОРІН</h3>
            <table style="width: 100%; margin-top: 30px;"><tr style="vertical-align: top;"><td style="width: 50%;"><b>РОБОТОДАВЕЦЬ</b><div>[[company_details]]</div><p style="margin-top: 50px;">_______________</p></td><td style="width: 50%;"><b>ПРАЦІВНИК</b><div>[[employee_details]]</div><p style="margin-top: 50px;">_______________</p></td></tr></table>
        '
                ],
                [
                    'name' => 'Договор о неразглашении (NDA)',
                    'fields' => json_encode([
                        ['name' => 'city', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місто']],
                        ['name' => 'party_disclosing', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Сторона, що розкриває інформацію (повна назва)']],
                        ['name' => 'party_receiving', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Сторона, що одержує інформацію (повна назва)']],
                        ['name' => 'info_definition', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Визначення Конфіденційної інформації']],
                        ['name' => 'purpose', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Мета розкриття інформації']],
                        ['name' => 'term_years', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Термін зобов\'язань щодо нерозголошення (років)']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ДОГОВІР ПРО НЕРОЗГОЛОШЕННЯ КОНФІДЕНЦІЙНОЇ ІНФОРМАЦІЇ</h2>
            <p>м. [[city]] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [[current_date]]</p>
            <p><b>[[party_disclosing]]</b> (надалі – «Розкриваюча Сторона») та <b>[[party_receiving]]</b> (надалі – «Одержуюча Сторона»), уклали цей Договір про наступне:</p>

            <h3>1. ПРЕДМЕТ ДОГОВОРУ</h3>
            <p>1.1. За цим Договором Одержуюча Сторона зобов\'язується не розголошувати та захищати Конфіденційну інформацію, отриману від Розкриваючої Сторони у зв\'язку з [[purpose]].</p>
            <p>1.2. Для цілей цього Договору «Конфіденційна інформація» означає: [[info_definition]].</p>

            <h3>2. ЗОБОВ\'ЯЗАННЯ СТОРІН</h3>
            <p>2.1. Одержуюча Сторона зобов’язується:
            <ul>
                <li>Зберігати Конфіденційну інформацію в суворій таємниці.</li>
                <li>Не розголошувати Конфіденційну інформацію будь-яким третім особам без попередньої письмової згоди Розкриваючої Сторони.</li>
                <li>Використовувати Конфіденційну інформацію виключно з Метою, визначеною в п. 1.1.</li>
            </ul>
            </p>

            <h3>3. ВІДПОВІДАЛЬНІСТЬ</h3>
            <p>3.1. У разі порушення умов цього Договору Одержуюча Сторона зобов\'язується відшкодувати Розкриваючій Стороні всі завдані таким порушенням збитки.</p>

            <h3>4. СТРОК ДІЇ ДОГОВОРУ</h3>
            <p>4.1. Зобов\'язання щодо збереження таємниці Конфіденційної інформації діють протягом <b>[[term_years]]</b> років з моменту підписання цього Договору.</p>

            <h3>5. ПІДПИСИ СТОРІН</h3>
            <p style="margin-top: 30px;"><b>Розкриваюча Сторона:</b> ____________________</p>
            <p style="margin-top: 30px;"><b>Одержуюча Сторона:</b> ____________________</p>
        '
                ],
                [
                    'name' => 'Договор о материальной ответственности',
                    'fields' => json_encode([
                        ['name' => 'city', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місто']],
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Роботодавець (назва)']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'В особі']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Працівник (ПІБ)']],
                        ['name' => 'employee_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада працівника']],
                        ['name' => 'valuables', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Перелік цінностей, що передаються']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ДОГОВІР ПРО ПОВНУ ІНДИВІДУАЛЬНУ МАТЕРІАЛЬНУ ВІДПОВІДАЛЬНІСТЬ</h2>
            <p>м. [[city]] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [[current_date]]</p>
            <p>[[company_name]], в особі [[director_name]], надалі "Роботодавець", та Працівник [[employee_name]], що обіймає посаду [[employee_position]], надалі "Працівник", уклали цей договір про наступне:</p>
            <p>1. Працівник приймає на себе повну матеріальну відповідальність за незабезпечення збереження ввірених йому Роботодавцем матеріальних цінностей: [[valuables]].</p>
            <p>2. Працівник зобов\'язується дбайливо ставитися до переданих йому цінностей і вживати заходів для запобігання збиткам.</p>
            <p>3. Роботодавець зобов\'язується створити Працівникові умови, необхідні для нормальної роботи і забезпечення повного збереження ввірених йому цінностей.</p>
        '
                ],
                [
                    'name' => 'Должностная инструкция',
                    'fields' => json_encode([
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва компанії']],
                        ['name' => 'position_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва посади']],
                        ['name' => 'general_provisions', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => '1. Загальні положення']],
                        ['name' => 'duties', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => '2. Завдання та обов\'язки']],
                        ['name' => 'rights', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => '3. Права']],
                        ['name' => 'responsibility', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => '4. Відповідальність']],
                        ['name' => 'director_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада керівника']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ керівника']],
                    ]),
                    'body_html' => '
            <div style="text-align: right;">ЗАТВЕРДЖУЮ<br>[[director_position]]<br>[[company_name]]<br>___________ [[director_name]]<br>"___" ____________ 20__ р.</div>
            <h2 style="text-align: center;">ПОСАДОВА ІНСТРУКЦІЯ</h2>
            <h3 style="text-align: center;">[[position_name]]</h3>
            <h3>1. Загальні положення</h3><div>[[general_provisions]]</div>
            <h3>2. Завдання та обов\'язки</h3><div>[[duties]]</div>
            <h3>3. Права</h3><div>[[rights]]</div>
            <h3>4. Відповідальність</h3><div>[[responsibility]]</div>
            <p style="margin-top: 30px;">З інструкцією ознайомлений(а):<br><br>_______________ (Підпис)<br><br>"___" ____________ 20__ р.</p>
        '
                ],
                [
                    'name' => 'Приказ о приеме на работу',
                    'fields' => json_encode([
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва підприємства']],
                        ['name' => 'order_number', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Номер наказу']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ працівника']],
                        ['name' => 'position_to_take', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'На посаду']],
                        ['name' => 'department', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'У структурний підрозділ']],
                        ['name' => 'start_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата прийняття']],
                        ['name' => 'salary', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'З посадовим окладом']],
                        ['name' => 'basis', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Підстава']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ директора']],
                    ]),
                    'body_html' => '
            <p>[[company_name]]</p>
            <h2 style="text-align: center;">НАКАЗ № [[order_number]]</h2>
            <p>[[current_date]]</p>
            <h3 style="text-align: center;">Про прийняття на роботу</h3>
            <p>НАКАЗУЮ:</p>
            <p>1. Прийняти [[employee_name]] на посаду [[position_to_take]] у [[department]] з [[start_date]].</p>
            <p>2. Встановити посадовий оклад у розмірі [[salary]].</p>
            <p>Підстава: [[basis]].</p>
            <p style="margin-top: 50px;">Директор _________________ [[director_name]]</p>
            <p>З наказом ознайомлений(а): _________________</p>
        '
                ],
                [
                    'name' => 'Приказ о переводе на другую должность',
                    'fields' => json_encode([
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва підприємства']],
                        ['name' => 'order_number', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Номер наказу']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ працівника']],
                        ['name' => 'old_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Попередня посада']],
                        ['name' => 'new_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Нова посада']],
                        ['name' => 'transfer_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата переведення']],
                        ['name' => 'new_salary', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Новий посадовий оклад']],
                        ['name' => 'basis', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Підстава']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ директора']],
                    ]),
                    'body_html' => '
            <p>[[company_name]]</p>
            <h2 style="text-align: center;">НАКАЗ № [[order_number]]</h2>
            <p>[[current_date]]</p>
            <h3 style="text-align: center;">Про переведення на іншу посаду</h3>
            <p>НАКАЗУЮ:</p>
            <p>1. Перевести [[employee_name]], [[old_position]], на посаду [[new_position]] з [[transfer_date]].</p>
            <p>2. Встановити посадовий оклад у розмірі [[new_salary]].</p>
            <p>Підстава: [[basis]].</p>
            <p style="margin-top: 50px;">Директор _________________ [[director_name]]</p>
            <p>З наказом ознайомлений(а): _________________</p>
        '
                ],
                [
                    'name' => 'Заявление на ежегодный оплачиваемый отпуск',
                    'fields' => json_encode([
                        ['name' => 'director_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада керівника']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ керівника (у давальному відмінку)']],
                        ['name' => 'employee_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша посада']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваші ПІБ (у родовому відмінку)']],
                        ['name' => 'start_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата початку відпустки']],
                        ['name' => 'duration_days', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Тривалість відпустки (календарних днів)']],
                    ]),
                    'body_html' => '<div style="text-align: right; margin-left: 50%;">
                                <p>[[director_position]]</p>
                                <p>[[director_name]]</p>
                                <p>[[employee_position]]</p>
                                <p>[[employee_name]]</p>
                            </div>
                            <h2 style="text-align: center; margin-top: 50px; margin-bottom: 30px;">ЗАЯВА</h2>
                            <p style="text-indent: 40px;">Прошу надати мені щорічну основну оплачувану відпустку з [[start_date]] тривалістю [[duration_days]] календарних днів.</p>
                            <table style="width: 100%; margin-top: 80px; border: none;">
                                <tr>
                                    <td style="text-align: left;">[[current_date]]</td>
                                    <td style="text-align: right;">___________ ([[employee_name]])</td>
                                </tr>
                            </table>'
                ],
                [
                    'name' => 'Заявление на отпуск за свой счет (без сохранения заработной платы)',
                    'fields' => json_encode([
                        ['name' => 'director_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада керівника']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ керівника (у давальному відмінку)']],
                        ['name' => 'employee_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша посада']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваші ПІБ (у родовому відмінку)']],
                        ['name' => 'start_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата початку відпустки']],
                        ['name' => 'duration_days', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Тривалість відпустки (днів)']],
                        ['name' => 'reason', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Причина (напр., за сімейними обставинами)']],
                    ]),
                    'body_html' => '<div style="text-align: right; margin-left: 50%;">
                                <p>[[director_position]]</p>
                                <p>[[director_name]]</p>
                                <p>[[employee_position]]</p>
                                <p>[[employee_name]]</p>
                            </div>
                            <h2 style="text-align: center; margin-top: 50px; margin-bottom: 30px;">ЗАЯВА</h2>
                            <p style="text-indent: 40px;">Прошу надати мені відпустку без збереження заробітної плати [[reason]] з [[start_date]] тривалістю [[duration_days]] календарних днів.</p>
                            <table style="width: 100%; margin-top: 80px; border: none;">
                                <tr>
                                    <td style="text-align: left;">[[current_date]]</td>
                                    <td style="text-align: right;">___________ ([[employee_name]])</td>
                                </tr>
                            </table>'
                ],
                [
                    'name' => 'Заявление на учебный отпуск',
                    'fields' => json_encode([
                        ['name' => 'director_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада керівника']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ керівника (у давальному відмінку)']],
                        ['name' => 'employee_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша посада']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваші ПІБ (у родовому відмінку)']],
                        ['name' => 'start_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата початку відпустки']],
                        ['name' => 'end_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата закінчення відпустки']],
                        ['name' => 'reason', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Причина (напр., для підготовки та захисту дипломної роботи)']],
                    ]),
                    'body_html' => '<div style="text-align: right; margin-left: 50%;">
                                <p>[[director_position]]</p>
                                <p>[[director_name]]</p>
                                <p>[[employee_position]]</p>
                                <p>[[employee_name]]</p>
                            </div>
                            <h2 style="text-align: center; margin-top: 50px; margin-bottom: 30px;">ЗАЯВА</h2>
                            <p style="text-indent: 40px;">Прошу надати мені додаткову оплачувану відпустку у зв\'язку з навчанням з [[start_date]] по [[end_date]] [[reason]]. Довідка-виклик з навчального закладу додається.</p>
                            <table style="width: 100%; margin-top: 80px; border: none;">
                                <tr>
                                    <td style="text-align: left;">[[current_date]]</td>
                                    <td style="text-align: right;">___________ ([[employee_name]])</td>
                                </tr>
                            </table>'
                ],
                [
                    'name' => 'Заявление на отпуск по уходу за ребенком',
                    'fields' => json_encode([
                        ['name' => 'director_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада керівника']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ керівника (у давальному відмінку)']],
                        ['name' => 'employee_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша посада']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваші ПІБ (у родовому відмінку)']],
                        ['name' => 'child_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ дитини']],
                        ['name' => 'child_birth_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата народження дитини']],
                        ['name' => 'start_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата початку відпустки']],
                        ['name' => 'end_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата закінчення відпустки (до досягнення 3-річного віку)']],
                    ]),
                    'body_html' => '<div style="text-align: right; margin-left: 50%;">
                                <p>[[director_position]]</p>
                                <p>[[director_name]]</p>
                                <p>[[employee_position]]</p>
                                <p>[[employee_name]]</p>
                            </div>
                            <h2 style="text-align: center; margin-top: 50px; margin-bottom: 30px;">ЗАЯВА</h2>
                            <p style="text-indent: 40px;">Прошу надати мені відпустку для догляду за дитиною [[child_name]], [[child_birth_date]] року народження, до досягнення нею трирічного віку, з [[start_date]] по [[end_date]]. Копія свідоцтва про народження дитини додається.</p>
                            <table style="width: 100%; margin-top: 80px; border: none;">
                                <tr>
                                    <td style="text-align: left;">[[current_date]]</td>
                                    <td style="text-align: right;">___________ ([[employee_name]])</td>
                                </tr>
                            </table>'
                ],
                [
                    'name' => 'Приказ на отпуск',
                    'fields' => json_encode([
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва підприємства']],
                        ['name' => 'order_number', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Номер наказу']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ працівника']],
                        ['name' => 'employee_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада працівника']],
                        ['name' => 'vacation_type', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Вид відпустки']],
                        ['name' => 'start_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата початку відпустки']],
                        ['name' => 'duration_days', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Тривалість (днів)']],
                        ['name' => 'basis', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Підстава']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ директора']],
                    ]),
                    'body_html' => '
            <p>[[company_name]]</p>
            <h2 style="text-align: center;">НАКАЗ № [[order_number]]</h2>
            <p>[[current_date]]</p>
            <h3 style="text-align: center;">Про надання відпустки</h3>
            <p>НАКАЗУЮ:</p>
            <p>1. Надати [[employee_name]], [[employee_position]], [[vacation_type]] тривалістю [[duration_days]] календарних днів з [[start_date]].</p>
            <p>Підстава: [[basis]].</p>
            <p style="margin-top: 50px;">Директор _________________ [[director_name]]</p>
            <p>З наказом ознайомлений(а): _________________</p>
        '
                ],
                [
                    'name' => 'Заявление на увольнение по собственному желанию',
                    'fields' => json_encode([
                        ['name' => 'director_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада керівника']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ керівника (у давальному відмінку)']],
                        ['name' => 'employee_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша посада']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваші ПІБ (у родовому відмінку)']],
                        ['name' => 'dismissal_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата звільнення']],
                    ]),
                    'body_html' => '<div style="text-align: right; margin-left: 50%;">
                                <p>[[director_position]]</p>
                                <p>[[director_name]]</p>
                                <p>[[employee_position]]</p>
                                <p>[[employee_name]]</p>
                            </div>
                            <h2 style="text-align: center; margin-top: 50px; margin-bottom: 30px;">ЗАЯВА</h2>
                            <p style="text-indent: 40px;">Прошу звільнити мене з займаної посади за власним бажанням з [[dismissal_date]].</p>
                            <table style="width: 100%; margin-top: 80px; border: none;">
                                <tr>
                                    <td style="text-align: left;">[[current_date]]</td>
                                    <td style="text-align: right;">___________ ([[employee_name]])</td>
                                </tr>
                            </table>'
                ],
                [
                    'name' => 'Заявление на увольнение по соглашению сторон',
                    'fields' => json_encode([
                        ['name' => 'director_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада керівника']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ керівника (у давальному відмінку)']],
                        ['name' => 'employee_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша посада']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваші ПІБ (у родовому відмінку)']],
                        ['name' => 'dismissal_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата звільнення']],
                    ]),
                    'body_html' => '<div style="text-align: right; margin-left: 50%;">
                                <p>[[director_position]]</p>
                                <p>[[director_name]]</p>
                                <p>[[employee_position]]</p>
                                <p>[[employee_name]]</p>
                            </div>
                            <h2 style="text-align: center; margin-top: 50px; margin-bottom: 30px;">ЗАЯВА</h2>
                            <p style="text-indent: 40px;">Прошу звільнити мене з займаної посади за угодою сторін (п. 1 ст. 36 КЗпП України) [[dismissal_date]].</p>
                            <table style="width: 100%; margin-top: 80px; border: none;">
                                <tr>
                                    <td style="text-align: left;">[[current_date]]</td>
                                    <td style="text-align: right;">___________ ([[employee_name]])</td>
                                </tr>
                            </table>'
                ],
                [
                    'name' => 'Соглашение о расторжении трудового договора',
                    'fields' => json_encode([
                        ['name' => 'city', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місто']],
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Роботодавець']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'В особі']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Працівник']],
                        ['name' => 'dismissal_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата розірвання договору']],
                        ['name' => 'compensation', 'type' => 'text', 'required' => false, 'labels' => ['uk' => 'Розмір компенсації (якщо є)']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">УГОДА ПРО РОЗІРВАННЯ ТРУДОВОГО ДОГОВОРУ</h2>
            <p>м. [[city]] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [[current_date]]</p>
            <p>[[company_name]], в особі [[director_name]], та Працівник [[employee_name]], домовилися про наступне:</p>
            <p>1. Розірвати трудовий договір за угодою сторін з [[dismissal_date]].</p>
            <p>2. Роботодавець зобов\'язується виплатити Працівнику компенсацію в розмірі [[compensation]].</p>
            <p>3. Сторони підтверджують відсутність взаємних претензій.</p>
        '
                ],
                [
                    'name' => 'Приказ об увольнении',
                    'fields' => json_encode([
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва підприємства']],
                        ['name' => 'order_number', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Номер наказу']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ працівника']],
                        ['name' => 'employee_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада працівника']],
                        ['name' => 'dismissal_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата звільнення']],
                        ['name' => 'reason', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Причина звільнення (стаття КЗпП)']],
                        ['name' => 'basis', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Підстава (напр., заява працівника)']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ директора']],
                    ]),
                    'body_html' => '
            <p>[[company_name]]</p>
            <h2 style="text-align: center;">НАКАЗ № [[order_number]]</h2>
            <p>[[current_date]]</p>
            <h3 style="text-align: center;">Про припинення трудового договору (звільнення)</h3>
            <p>НАКАЗУЮ:</p>
            <p>1. Звільнити [[employee_name]], [[employee_position]], [[dismissal_date]] за [[reason]].</p>
            <p>2. Бухгалтерії провести повний розрахунок.</p>
            <p>Підстава: [[basis]].</p>
            <p style="margin-top: 50px;">Директор _________________ [[director_name]]</p>
            <p>З наказом ознайомлений(а): _________________</p>
        '
                ],

                // --- 3. ВНУТРЕННЯЯ ДОКУМЕНТАЦИЯ И КОРРЕСПОНДЕНЦИЯ ---
                [
                    'name' => 'Рекомендательное письмо',
                    'fields' => json_encode([
                        ['name' => 'recommender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ рекомендателя']],
                        ['name' => 'recommender_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада рекомендателя']],
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Компанія']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ співробітника']],
                        ['name' => 'work_period', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Період роботи співробітника']],
                        ['name' => 'body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Текст рекомендації']],
                        ['name' => 'recommender_contacts', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Контакти рекомендателя']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">РЕКОМЕНДАЦІЙНИЙ ЛИСТ</h2>
            <p>[[current_date]]</p>
            <p>Цим листом я, [[recommender_name]], [[recommender_position]] компанії [[company_name]], підтверджую, що [[employee_name]] працював(ла) в нашій компанії в період з [[work_period]].</p>
            <div>[[body]]</div>
            <p>Я впевнено рекомендую [[employee_name]] як цінного фахівця. За додатковою інформацією звертайтесь за контактами: [[recommender_contacts]].</p>
            <p style="margin-top: 50px;">З повагою,<br>[[recommender_name]]<br>[[recommender_position]]</p>
        '
                ],
                [
                    'name' => 'Характеристика на сотрудника',
                    'fields' => json_encode([
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва компанії']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ співробітника']],
                        ['name' => 'employee_birth_year', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Рік народження']],
                        ['name' => 'employee_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада']],
                        ['name' => 'work_period', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Період роботи']],
                        ['name' => 'body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Текст характеристики']],
                        ['name' => 'destination', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місце надання (напр., для пред\'явлення за місцем вимоги)']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ директора']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ХАРАКТЕРИСТИКА</h2>
            <p>на [[employee_name]], [[employee_birth_year]] року народження, що працює в [[company_name]] на посаді [[employee_position]] з [[work_period]].</p>
            <div>[[body]]</div>
            <p>Характеристика видана [[destination]].</p>
            <p style="margin-top: 50px;">Директор [[company_name]] _________________ [[director_name]]</p>
        '
                ],
                [
                    'name' => 'Служебная записка',
                    'fields' => json_encode([
                        ['name' => 'recipient_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада отримувача']],
                        ['name' => 'recipient_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ отримувача']],
                        ['name' => 'sender_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша посада']],
                        ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваше ПІБ']],
                        ['name' => 'subject', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Тема записки']],
                        ['name' => 'body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Текст записки']],
                    ]),
                    'body_html' => '
            <div style="text-align: right;">
                <p>[[recipient_position]]</p>
                <p>[[recipient_name]]</p>
                <p>[[sender_position]]</p>
                <p>[[sender_name]]</p>
            </div>
            <h2 style="text-align: center;">СЛУЖБОВА ЗАПИСКА</h2>
            <p>[[current_date]]</p>
            <p><strong>Тема:</strong> [[subject]]</p>
            <p>Шановний(а) [[recipient_name]]!</p>
            <div>[[body]]</div>
            <p style="margin-top: 50px;">[[sender_position]] _________________ [[sender_name]]</p>
        '
                ],
                [
                    'name' => 'Объяснительная записка',
                    'fields' => json_encode([
                        ['name' => 'recipient_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада отримувача']],
                        ['name' => 'recipient_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ отримувача']],
                        ['name' => 'sender_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша посада']],
                        ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваше ПІБ']],
                        ['name' => 'body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Текст пояснення (детально опишіть ситуацію)']],
                    ]),
                    'body_html' => '
            <div style="text-align: right;">
                <p>[[recipient_position]]</p>
                <p>[[recipient_name]]</p>
                <p>[[sender_position]]</p>
                <p>[[sender_name]]</p>
            </div>
            <h2 style="text-align: center;">ПОЯСНЮВАЛЬНА ЗАПИСКА</h2>
            <p>Я, [[sender_name]], надаю пояснення щодо ситуації, що склалася:</p>
            <div>[[body]]</div>
            <p style="margin-top: 50px;">[[current_date]] _________________ [[sender_name]]</p>
        '
                ],
                [
                    'name' => 'Табель учета рабочего времени',
                    'fields' => json_encode([
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва підприємства']],
                        ['name' => 'department', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Структурний підрозділ']],
                        ['name' => 'month_year', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місяць, рік']],
                        ['name' => 'employees', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Працівники'], 'fields' => [
                            ['name' => 'employee_name', 'type' => 'text', 'labels' => ['uk' => 'ПІБ']],
                            ['name' => 'position', 'type' => 'text', 'labels' => ['uk' => 'Посада']],
                            ['name' => 'days', 'type' => 'textarea', 'labels' => ['uk' => 'Відмітки по днях (1-31)']],
                            ['name' => 'total_hours', 'type' => 'text', 'labels' => ['uk' => 'Всього годин']],
                        ]],
                        ['name' => 'responsible_person', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Відповідальна особа']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ТАБЕЛЬ ОБЛІКУ РОБОЧОГО ЧАСУ</h2>
            <p>за [[month_year]]</p>
            <p>Підприємство: [[company_name]]</p>
            <p>Підрозділ: [[department]]</p>
            <table style="width: 100%; border-collapse: collapse;" border="1">
                <thead><tr><th>ПІБ</th><th>Посада</th><th>Дні місяця</th><th>Всього годин</th></tr></thead>
                <tbody>
                <tr><td>[[employee_name]]</td><td>[[position]]</td><td>[[days]]</td><td>[[total_hours]]</td></tr>
                </tbody>
            </table>
            <p style="margin-top: 30px;">Відповідальна особа: _________________ [[responsible_person]]</p>
        '
                ],
                [
                    'name' => 'Командировочное удостоверение',
                    'fields' => json_encode([
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва підприємства']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ працівника']],
                        ['name' => 'employee_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада']],
                        ['name' => 'destination', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місце призначення']],
                        ['name' => 'purpose', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Мета відрядження']],
                        ['name' => 'start_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата початку']],
                        ['name' => 'end_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата закінчення']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ директора']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ПОСВІДЧЕННЯ ПРО ВІДРЯДЖЕННЯ</h2>
            <p>Видано: [[employee_name]], [[employee_position]]</p>
            <p>Підприємство: [[company_name]]</p>
            <p>Направляється у: [[destination]]</p>
            <p>Мета: [[purpose]]</p>
            <p>Термін відрядження: з [[start_date]] по [[end_date]]</p>
            <p style="margin-top: 50px;">Директор _________________ [[director_name]]</p>
        '
                ],

                // --- 4. КОММЕРЧЕСКИЕ ПРЕДЛОЖЕНИЯ И ПИСЬМА ---
                [
                    'name' => 'Коммерческое предложение',
                    'fields' => json_encode([
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва вашої компанії']],
                        ['name' => 'company_contacts', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Ваші контакти']],
                        ['name' => 'client_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва компанії клієнта']],
                        ['name' => 'subject', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Тема пропозиції']],
                        ['name' => 'body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Текст пропозиції']],
                        ['name' => 'price_list', 'type' => 'textarea', 'required' => false, 'labels' => ['uk' => 'Таблиця з цінами (якщо потрібно)']],
                        ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваше ПІБ та посада']],
                    ]),
                    'body_html' => '
            <p>[[company_name]]<br>[[company_contacts]]</p>
            <h2 style="text-align: center;">КОМЕРЦІЙНА ПРОПОЗИЦІЯ</h2>
            <p>[[current_date]]</p>
            <p>Для: [[client_name]]</p>
            <p><strong>Тема:</strong> [[subject]]</p>
            <div>[[body]]</div>
            <div>[[price_list]]</div>
            <p style="margin-top: 30px;">З повагою,<br>[[sender_name]]</p>
        '
                ],
                [
                    'name' => 'Письмо-претензия',
                    'fields' => json_encode([
                        ['name' => 'recipient_company', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Кому (назва компанії)']],
                        ['name' => 'recipient_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Адреса отримувача']],
                        ['name' => 'sender_company', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Від кого (назва вашої компанії)']],
                        ['name' => 'sender_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша адреса']],
                        ['name' => 'subject', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Предмет претензії']],
                        ['name' => 'basis', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'На підставі (договір, рахунок)']],
                        ['name' => 'body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Суть претензії']],
                        ['name' => 'demands', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Вимоги']],
                        ['name' => 'sender_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада підписанта']],
                        ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ підписанта']],
                    ]),
                    'body_html' => '
            <div style="text-align: right;">
                <p>[[recipient_company]]</p>
                <p>[[recipient_address]]</p>
            </div>
            <p>Від: [[sender_company]]<br>[[sender_address]]</p>
            <h2 style="text-align: center;">ПРЕТЕНЗІЯ</h2>
            <p><strong>Предмет:</strong> [[subject]]</p>
            <p>На підставі [[basis]], [[body]].</p>
            <p>На підставі вищевикладеного, вимагаємо: [[demands]].</p>
            <p style="margin-top: 50px;">[[sender_position]] _________________ [[sender_name]]</p>
        '
                ],
                [
                    'name' => 'Гарантийное письмо',
                    'fields' => json_encode([
                        ['name' => 'recipient_company', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Кому (назва компанії)']],
                        ['name' => 'sender_company', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Від кого (назва вашої компанії)']],
                        ['name' => 'body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Текст гарантії (напр., гарантуємо оплату за...)']],
                        ['name' => 'sender_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада підписанта']],
                        ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ підписанта']],
                    ]),
                    'body_html' => '
            <p>[[recipient_company]]</p>
            <h2 style="text-align: center;">ГАРАНТІЙНИЙ ЛИСТ</h2>
            <p>[[sender_company]] цим листом гарантує:</p>
            <div>[[body]]</div>
            <p style="margin-top: 50px;">[[sender_position]] _________________ [[sender_name]]</p>
        '
                ],
                [
                    'name' => 'Официальный запрос',
                    'fields' => json_encode([
                        ['name' => 'recipient_company', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Кому (назва організації)']],
                        ['name' => 'sender_company', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Від кого (назва вашої організації)']],
                        ['name' => 'body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Текст запиту']],
                        ['name' => 'sender_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада підписанта']],
                        ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ підписанта']],
                    ]),
                    'body_html' => '
            <p>[[recipient_company]]</p>
            <h2 style="text-align: center;">ОФІЦІЙНИЙ ЗАПИТ</h2>
            <p>Просимо надати наступну інформацію:</p>
            <div>[[body]]</div>
            <p>Відповідь просимо надіслати у встановлений законом термін.</p>
            <p style="margin-top: 50px;">[[sender_position]] _________________ [[sender_name]]</p>
        '
                ],
                [
                    'name' => 'Письмо-уведомление',
                    'fields' => json_encode([
                        ['name' => 'recipient_company', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Кому (назва компанії)']],
                        ['name' => 'sender_company', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Від кого (назва вашої компанії)']],
                        ['name' => 'body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Текст повідомлення']],
                        ['name' => 'sender_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада підписанта']],
                        ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ підписанта']],
                    ]),
                    'body_html' => '
            <p>[[recipient_company]]</p>
            <h2 style="text-align: center;">ПОВІДОМЛЕННЯ</h2>
            <p>[[sender_company]] цим листом повідомляє Вас про наступне:</p>
            <div>[[body]]</div>
            <p style="margin-top: 50px;">[[sender_position]] _________________ [[sender_name]]</p>
        '
                ],
                [
                    'name' => 'Письмо-извинение',
                    'fields' => json_encode([
                        ['name' => 'recipient_company', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Кому (назва компанії)']],
                        ['name' => 'sender_company', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Від кого (назва вашої компанії)']],
                        ['name' => 'body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Текст вибачення']],
                        ['name' => 'sender_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада підписанта']],
                        ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ підписанта']],
                    ]),
                    'body_html' => '
            <p>[[recipient_company]]</p>
            <h2 style="text-align: center;">ЛИСТ-ВИБАЧЕННЯ</h2>
            <p>[[sender_company]] приносить свої вибачення за ситуацію, що склалася.</p>
            <div>[[body]]</div>
            <p>Сподіваємося на подальшу співпрацю.</p>
            <p style="margin-top: 50px;">[[sender_position]] _________________ [[sender_name]]</p>
        '
                ],
                [
                    'name' => 'Благодарственное письмо',
                    'fields' => json_encode([
                        ['name' => 'recipient_company', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Кому (назва компанії)']],
                        ['name' => 'sender_company', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Від кого (назва вашої компанії)']],
                        ['name' => 'body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Текст подяки']],
                        ['name' => 'sender_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада підписанта']],
                        ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ підписанта']],
                    ]),
                    'body_html' => '
            <p>[[recipient_company]]</p>
            <h2 style="text-align: center;">ЛИСТ-ПОДЯКА</h2>
            <p>[[sender_company]] висловлює щиру подяку за:</p>
            <div>[[body]]</div>
            <p>Сподіваємося на подальшу плідну співпрацю.</p>
            <p style="margin-top: 50px;">[[sender_position]] _________________ [[sender_name]]</p>
        '
                ],

                // --- 5. ФИНАНСОВЫЕ И ТОВАРНЫЕ ДОКУМЕНТЫ ---
                [
                    'name' => 'Счет на оплату (Инвойс)',
                    'fields' => json_encode([
                        ['name' => 'invoice_number', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Рахунок №']],
                        ['name' => 'invoice_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'від']],
                        ['name' => 'provider_details', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Реквізити Постачальника (назва, ІПН/ЄДРПОУ, IBAN, банк)']],
                        ['name' => 'customer_details', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Реквізити Платника (назва, ІПН/ЄДРПОУ)']],
                        ['name' => 'contract_details', 'type' => 'text', 'required' => false, 'labels' => ['uk' => 'Підстава (напр., Договір №123 від 01.01.2025)']],
                        ['name' => 'items', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Список товарів/послуг'], 'fields' => [
                            ['name' => 'item_name', 'type' => 'text', 'labels' => ['uk' => 'Найменування товару/послуги']],
                            ['name' => 'item_qty', 'type' => 'number', 'labels' => ['uk' => 'Кількість']],
                            ['name' => 'item_unit', 'type' => 'text', 'labels' => ['uk' => 'Од. вим.']],
                            ['name' => 'item_price', 'type' => 'number', 'labels' => ['uk' => 'Ціна без ПДВ']],
                            ['name' => 'item_total', 'type' => 'number', 'labels' => ['uk' => 'Сума без ПДВ']],
                        ]],
                        ['name' => 'subtotal', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Сума без ПДВ']],
                        ['name' => 'vat_amount', 'type' => 'number', 'required' => false, 'labels' => ['uk' => 'ПДВ']],
                        ['name' => 'total_amount', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Всього до сплати']],
                        ['name' => 'total_amount_words', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Сума прописом']],
                        ['name' => 'signer_position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада підписанта']],
                        ['name' => 'signer_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ підписанта']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">Рахунок-фактура № [[invoice_number]] від [[invoice_date]]</h2>
            <hr>
            <table style="width: 100%; border-collapse: collapse;">
                <tr style="vertical-align: top;">
                    <td style="width: 120px;"><b>Постачальник:</b></td>
                    <td>[[provider_details]]</td>
                </tr>
                <tr style="vertical-align: top;">
                    <td><b>Платник:</b></td>
                    <td>[[customer_details]]</td>
                </tr>
                 <tr style="vertical-align: top;">
                    <td><b>Підстава:</b></td>
                    <td>[[contract_details]]</td>
                </tr>
            </table>
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px; text-align: center;" border="1">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Найменування</th>
                        <th>Кількість</th>
                        <th>Од. вим.</th>
                        <th>Ціна без ПДВ</th>
                        <th>Сума без ПДВ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>[[loop_index]]</td>
                        <td style="text-align: left; padding-left: 5px;">[[item_name]]</td>
                        <td>[[item_qty]]</td>
                        <td>[[item_unit]]</td>
                        <td>[[item_price]]</td>
                        <td>[[item_total]]</td>
                    </tr>
                    </tbody>
            </table>
            <table style="width: 100%; margin-top: 15px;">
                <tr>
                    <td style="text-align: right;"><b>Разом без ПДВ:</b></td>
                    <td style="width: 120px; text-align: right;">[[subtotal]] грн</td>
                </tr>
                <tr>
                    <td style="text-align: right;"><b>ПДВ:</b></td>
                    <td style="width: 120px; text-align: right;">[[vat_amount]] грн</td>
                </tr>
                 <tr>
                    <td style="text-align: right; font-weight: bold;"><b>Всього до сплати:</b></td>
                    <td style="width: 120px; text-align: right; font-weight: bold;">[[total_amount]] грн</td>
                </tr>
            </table>
            <p>Всього на суму: <b>[[total_amount_words]]</b>.</p>
            <p style="margin-top: 50px;">[[signer_position]] ____________________ [[signer_name]]</p>
        '
                ],
                [
                    'name' => 'Акт выполненных работ / оказанных услуг',
                    'fields' => json_encode([
                        ['name' => 'act_number', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Акт №']],
                        ['name' => 'act_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'від']],
                        ['name' => 'contract_details', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'до Договору №']],
                        ['name' => 'executor_details', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Реквізити Виконавця']],
                        ['name' => 'customer_details', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Реквізити Замовника']],
                        ['name' => 'items', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Список робіт/послуг'], 'fields' => [
                            ['name' => 'item_name', 'type' => 'text', 'labels' => ['uk' => 'Найменування роботи/послуги']],
                            ['name' => 'item_qty', 'type' => 'number', 'labels' => ['uk' => 'Кількість']],
                            ['name' => 'item_unit', 'type' => 'text', 'labels' => ['uk' => 'Од. вим.']],
                            ['name' => 'item_price', 'type' => 'number', 'labels' => ['uk' => 'Ціна']],
                            ['name' => 'item_total', 'type' => 'number', 'labels' => ['uk' => 'Сума']],
                        ]],
                        ['name' => 'total_amount', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Загальна вартість']],
                        ['name' => 'total_amount_words', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Загальна вартість (прописом)']],
                        ['name' => 'vat_info', 'type' => 'text', 'required' => false, 'labels' => ['uk' => 'Інформація про ПДВ (напр., без ПДВ)']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">АКТ ПРИЙМАННЯ-ПЕРЕДАЧІ ВИКОНАНИХ РОБІТ (НАДАНИХ ПОСЛУГ)</h2>
            <h3 style="text-align: center;">№ [[act_number]] від [[act_date]]</h3>
            <p style="text-align: center;">до Договору № [[contract_details]]</p>
            <p>Ми, що нижче підписалися, представник Виконавця, в особі [[executor_details]], з одного боку, і представник Замовника, в особі [[customer_details]], з іншого боку, склали цей акт про те, що Виконавець виконав, а Замовник прийняв наступні роботи (послуги):</p>
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px; text-align: center;" border="1">
                <thead><tr><th>№</th><th>Найменування</th><th>Кількість</th><th>Од. вим.</th><th>Ціна</th><th>Сума</th></tr></thead>
                <tbody>
                <tr><td>[[loop_index]]</td><td style="text-align: left; padding-left: 5px;">[[item_name]]</td><td>[[item_qty]]</td><td>[[item_unit]]</td><td>[[item_price]]</td><td>[[item_total]]</td></tr>
                </tbody>
            </table>
            <p style="text-align: right; font-weight: bold;">Загальна вартість робіт (послуг): [[total_amount]] грн. ([[total_amount_words]]). [[vat_info]].</p>
            <p>Роботи (послуги) виконані повністю і в строк. Замовник претензій по об\'єму, якості та строкам виконання робіт (надання послуг) не має.</p>
            <table style="width: 100%; margin-top: 50px; vertical-align: top;">
                <tr>
                    <td style="width: 50%;"><b>ВИКОНАВЕЦЬ</b><br><br>____________________</td>
                    <td style="width: 50%;"><b>ЗАМОВНИК</b><br><br>____________________</td>
                </tr>
            </table>
        '
                ],
                [
                    'name' => 'Счет-фактура',
                    'fields' => json_encode([
                        ['name' => 'invoice_number', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Рахунок-фактура №']],
                        ['name' => 'invoice_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'від']],
                        ['name' => 'provider_details', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Постачальник']],
                        ['name' => 'customer_details', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Вантажоодержувач']],
                        ['name' => 'payer_details', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Платник']],
                        ['name' => 'items', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Товари'], 'fields' => [
                            ['name' => 'item_name', 'type' => 'text', 'labels' => ['uk' => 'Назва']],
                            ['name' => 'item_unit', 'type' => 'text', 'labels' => ['uk' => 'Од. вим.']],
                            ['name' => 'item_qty', 'type' => 'number', 'labels' => ['uk' => 'К-сть']],
                            ['name' => 'item_price', 'type' => 'number', 'labels' => ['uk' => 'Ціна']],
                            ['name' => 'item_total', 'type' => 'number', 'labels' => ['uk' => 'Сума']],
                        ]],
                        ['name' => 'total_amount', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Всього']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">Рахунок-фактура № [[invoice_number]] від [[invoice_date]]</h2>
            <p>Постачальник: [[provider_details]]</p>
            <p>Вантажоодержувач: [[customer_details]]</p>
            <p>Платник: [[payer_details]]</p>
            <table style="width: 100%; border-collapse: collapse;" border="1">
                <thead><tr><th>Назва</th><th>Од.</th><th>К-сть</th><th>Ціна</th><th>Сума</th></tr></thead>
                <tbody>
                <tr><td>[[item_name]]</td><td>[[item_unit]]</td><td>[[item_qty]]</td><td>[[item_price]]</td><td>[[item_total]]</td></tr>
                </tbody>
            </table>
            <p style="text-align: right;">Всього: [[total_amount]]</p>
        '
                ],
                [
                    'name' => 'Товарная накладная',
                    'fields' => json_encode([
                        ['name' => 'doc_number', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Накладна №']],
                        ['name' => 'doc_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'від']],
                        ['name' => 'provider', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Постачальник']],
                        ['name' => 'customer', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Покупець']],
                        ['name' => 'items', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Товари'], 'fields' => [
                            ['name' => 'item_name', 'type' => 'text', 'labels' => ['uk' => 'Назва']],
                            ['name' => 'item_unit', 'type' => 'text', 'labels' => ['uk' => 'Од. вим.']],
                            ['name' => 'item_qty', 'type' => 'number', 'labels' => ['uk' => 'К-сть']],
                            ['name' => 'item_price', 'type' => 'number', 'labels' => ['uk' => 'Ціна']],
                            ['name' => 'item_total', 'type' => 'number', 'labels' => ['uk' => 'Сума']],
                        ]],
                        ['name' => 'total_amount', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Всього']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ВИДАТКОВА НАКЛАДНА № [[doc_number]] від [[doc_date]]</h2>
            <p>Постачальник: [[provider]]</p>
            <p>Покупець: [[customer]]</p>
            <table style="width: 100%; border-collapse: collapse;" border="1">
                <thead><tr><th>Назва</th><th>Од.</th><th>К-сть</th><th>Ціна</th><th>Сума</th></tr></thead>
                <tbody>
                <tr><td>[[item_name]]</td><td>[[item_unit]]</td><td>[[item_qty]]</td><td>[[item_price]]</td><td>[[item_total]]</td></tr>
                </tbody>
            </table>
            <p style="text-align: right;">Всього: [[total_amount]]</p>
            <p style="margin-top: 30px;">Відпустив: _________________</p>
            <p style="margin-top: 30px;">Отримав: _________________</p>
        '
                ],
                [
                    'name' => 'Договор займа между юридическими лицами',
                    'fields' => json_encode([
                        ['name' => 'city', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місто']],
                        ['name' => 'lender', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Позикодавець']],
                        ['name' => 'borrower', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Позичальник']],
                        ['name' => 'amount', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Сума позики']],
                        ['name' => 'return_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата повернення']],
                        ['name' => 'interest_rate', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Відсоткова ставка']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ДОГОВІР ПОЗИКИ</h2>
            <p>м. [[city]] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [[current_date]]</p>
            <p>Позикодавець [[lender]] та Позичальник [[borrower]] уклали цей договір про наступне:</p>
            <p>1. Позикодавець передає Позичальнику грошові кошти в сумі [[amount]] грн.</p>
            <p>2. Позичальник зобов\'язується повернути суму позики до [[return_date]].</p>
            <p>3. За користування позикою встановлюється [[interest_rate]].</p>
        '
                ],
                [
                    'name' => 'Авансовый отчет',
                    'fields' => json_encode([
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Підприємство']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Підзвітна особа']],
                        ['name' => 'position', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посада']],
                        ['name' => 'purpose', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Призначення авансу']],
                        ['name' => 'expenses', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Витрати'], 'fields' => [
                            ['name' => 'doc_date', 'type' => 'date', 'labels' => ['uk' => 'Дата документа']],
                            ['name' => 'doc_number', 'type' => 'text', 'labels' => ['uk' => 'Номер документа']],
                            ['name' => 'expense_description', 'type' => 'text', 'labels' => ['uk' => 'Кому, за що і по якому документу сплачено']],
                            ['name' => 'amount', 'type' => 'number', 'labels' => ['uk' => 'Сума']],
                        ]],
                        ['name' => 'total_spent', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Всього витрачено']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">АВАНСОВИЙ ЗВІТ</h2>
            <p>Підприємство: [[company_name]]</p>
            <p>Підзвітна особа: [[employee_name]], [[position]]</p>
            <p>Призначення авансу: [[purpose]]</p>
            <table style="width: 100%; border-collapse: collapse;" border="1">
                <thead><tr><th>Дата</th><th>Номер</th><th>Опис витрати</th><th>Сума</th></tr></thead>
                <tbody>
                <tr><td>[[doc_date]]</td><td>[[doc_number]]</td><td>[[expense_description]]</td><td>[[amount]]</td></tr>
                </tbody>
            </table>
            <p>Всього витрачено: [[total_spent]]</p>
        '
                ],
                [
                    'name' => 'Доверенность на получение ТМЦ',
                    'fields' => json_encode([
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва організації']],
                        ['name' => 'doc_number', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Довіреність №']],
                        ['name' => 'issue_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата видачі']],
                        ['name' => 'expiry_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дійсна до']],
                        ['name' => 'employee_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ довіреної особи']],
                        ['name' => 'employee_passport', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Паспортні дані']],
                        ['name' => 'supplier', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Постачальник']],
                        ['name' => 'basis_doc', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Документ-підстава']],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ директора']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ДОВІРЕНІСТЬ № [[doc_number]]</h2>
            <p>Дата видачі: [[issue_date]] &nbsp;&nbsp;&nbsp;&nbsp; Дійсна до: [[expiry_date]]</p>
            <p>[[company_name]] довіряє [[employee_name]] (паспорт: [[employee_passport]]) отримати від [[supplier]] товарно-матеріальні цінності на підставі [[basis_doc]].</p>
            <p>Підпис довіреної особи _______________ засвідчую.</p>
            <p style="margin-top: 50px;">Директор _________________ [[director_name]]</p>
        '
                ],
                [
                    'name' => 'Протокол разногласий к договору',
                    'fields' => json_encode([
                        ['name' => 'contract_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва договору']],
                        ['name' => 'contract_number', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Номер договору']],
                        ['name' => 'contract_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата договору']],
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва вашої компанії']],
                        ['name' => 'disagreements', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Розбіжності'], 'fields' => [
                            ['name' => 'clause', 'type' => 'text', 'labels' => ['uk' => 'Пункт договору']],
                            ['name' => 'original_wording', 'type' => 'textarea', 'labels' => ['uk' => 'Редакція контрагента']],
                            ['name' => 'proposed_wording', 'type' => 'textarea', 'labels' => ['uk' => 'Запропонована редакція']],
                        ]],
                        ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ директора']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ПРОТОКОЛ РОЗБІЖНОСТЕЙ</h2>
            <p>до [[contract_name]] № [[contract_number]] від [[contract_date]]</p>
            <p>[[company_name]] пропонує наступну редакцію пунктів договору:</p>
            <table style="width: 100%; border-collapse: collapse;" border="1">
                <thead><tr><th>Пункт</th><th>Редакція контрагента</th><th>Запропонована редакція</th></tr></thead>
                <tbody>
                <tr><td>[[clause]]</td><td>[[original_wording]]</td><td>[[proposed_wording]]</td></tr>
                </tbody>
            </table>
            <p style="margin-top: 50px;">Директор _________________ [[director_name]]</p>
        '
                ],

                // --- 6. IT И РАЗРАБОТКА ---
                [
                    'name' => 'Договор на разработку программного обеспечения',
                    'fields' => json_encode([
                        ['name' => 'city', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місто']],
                        ['name' => 'customer', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Замовник']],
                        ['name' => 'developer', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Виконавець']],
                        ['name' => 'subject', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Предмет договору (опис ПЗ)']],
                        ['name' => 'cost', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Вартість робіт']],
                        ['name' => 'timeline', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Терміни виконання']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ДОГОВІР НА РОЗРОБКУ ПРОГРАМНОГО ЗАБЕЗПЕЧЕННЯ</h2>
            <p>м. [[city]] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [[current_date]]</p>
            <p>Замовник [[customer]] та Виконавець [[developer]] уклали цей договір про наступне:</p>
            <p>1. Виконавець зобов\'язується розробити, а Замовник прийняти та оплатити програмне забезпечення: [[subject]].</p>
            <p>2. Вартість робіт складає [[cost]] грн.</p>
            <p>3. Терміни виконання: [[timeline]].</p>
        '
                ],
                [
                    'name' => 'Договор на создание и поддержку сайта',
                    'fields' => json_encode([
                        ['name' => 'city', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місто']],
                        ['name' => 'customer', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Замовник']],
                        ['name' => 'developer', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Виконавець']],
                        ['name' => 'site_description', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Опис сайту']],
                        ['name' => 'development_cost', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Вартість розробки']],
                        ['name' => 'support_cost', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Вартість підтримки (на місяць)']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ДОГОВІР НА СТВОРЕННЯ ТА ПІДТРИМКУ САЙТУ</h2>
            <p>м. [[city]] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [[current_date]]</p>
            <p>Замовник [[customer]] та Виконавець [[developer]] уклали цей договір про наступне:</p>
            <p>1. Виконавець зобов\'язується розробити сайт: [[site_description]]. Вартість розробки: [[development_cost]] грн.</p>
            <p>2. Виконавець надає послуги з технічної підтримки сайту. Вартість підтримки: [[support_cost]] грн/міс.</p>
        '
                ],
                [
                    'name' => 'Техническое задание (ТЗ) на разработку',
                    'fields' => json_encode([
                        ['name' => 'project_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва проекту']],
                        ['name' => 'purpose', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => '1. Мета та призначення']],
                        ['name' => 'functional_reqs', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => '2. Функціональні вимоги']],
                        ['name' => 'non_functional_reqs', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => '3. Нефункціональні вимоги']],
                        ['name' => 'customer', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Замовник']],
                        ['name' => 'developer', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Виконавець']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ТЕХНІЧНЕ ЗАВДАННЯ</h2>
            <p>на розробку «[[project_name]]»</p>
            <h3>1. Мета та призначення</h3><div>[[purpose]]</div>
            <h3>2. Функціональні вимоги</h3><div>[[functional_reqs]]</div>
            <h3>3. Нефункціональні вимоги</h3><div>[[non_functional_reqs]]</div>
            <p style="margin-top: 50px;">Замовник: _________________ [[customer]]</p>
            <p style="margin-top: 30px;">Виконавець: _________________ [[developer]]</p>
        '
                ],
                [
                    'name' => 'Пользовательское соглашение для сайта',
                    'fields' => json_encode([
                        ['name' => 'site_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва сайту/сервісу']],
                        ['name' => 'terms', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Основні положення (умови використання, права та обов\'язки)']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">УГОДА КОРИСТУВАЧА</h2>
            <p>Ця Угода користувача регулює відносини з використання сайту [[site_name]].</p>
            <div>[[terms]]</div>
        '
                ],
                [
                    'name' => 'Политика конфиденциальности',
                    'fields' => json_encode([
                        ['name' => 'site_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва сайту/сервісу']],
                        ['name' => 'data_collected', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Які дані збираються']],
                        ['name' => 'data_usage', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Як дані використовуються']],
                        ['name' => 'company_details', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Реквізити компанії-власника']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ПОЛІТИКА КОНФІДЕНЦІЙНОСТІ</h2>
            <p>Ця Політика конфіденційності описує, як [[site_name]] збирає, використовує та захищає вашу особисту інформацію.</p>
            <h3>Які дані ми збираємо</h3><div>[[data_collected]]</div>
            <h3>Як ми використовуємо ваші дані</h3><div>[[data_usage]]</div>
            <p>Контакти: [[company_details]]</p>
        '
                ],
                [
                    'name' => 'Договор оферты',
                    'fields' => json_encode([
                        ['name' => 'company_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва компанії/ФОП']],
                        ['name' => 'subject', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Предмет оферти']],
                        ['name' => 'price_terms', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Ціна та порядок розрахунків']],
                        ['name' => 'acceptance_terms', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Порядок акцепту оферти']],
                        ['name' => 'company_details', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Реквізити']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ПУБЛІЧНИЙ ДОГОВІР (ОФЕРТА)</h2>
            <p>[[company_name]], надалі "Виконавець", пропонує необмеженому колу осіб укласти цей договір про наступне:</p>
            <h3>1. Предмет договору</h3><div>[[subject]]</div>
            <h3>2. Ціна та порядок розрахунків</h3><div>[[price_terms]]</div>
            <h3>3. Порядок акцепту оферти</h3><div>[[acceptance_terms]]</div>
            <h3>РЕКВІЗИТИ ВИКОНАВЦЯ</h3><div>[[company_details]]</div>
        '
                ],
                [
                    'name' => 'Соглашение об уровне обслуживания (SLA)',
                    'fields' => json_encode([
                        ['name' => 'service_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва послуги']],
                        ['name' => 'availability', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Гарантований рівень доступності (напр., 99.5%)']],
                        ['name' => 'response_time', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Час реакції на інциденти']],
                        ['name' => 'compensation', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Компенсація за порушення SLA']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">УГОДА ПРО РІВЕНЬ НАДАННЯ ПОСЛУГ (SLA)</h2>
            <p>для послуги «[[service_name]]»</p>
            <p>1. Гарантований рівень доступності: [[availability]].</p>
            <p>2. Час реакції на інциденти: [[response_time]].</p>
            <p>3. Компенсація за порушення: [[compensation]].</p>
        '
                ],
                [
                    'name' => 'Договор с фрилансером (Gig-контракт)',
                    'fields' => json_encode([
                        ['name' => 'city', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місто']],
                        ['name' => 'customer', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Замовник']],
                        ['name' => 'freelancer', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Виконавець (ФОП)']],
                        ['name' => 'tasks', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Перелік робіт/послуг']],
                        ['name' => 'cost', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Вартість']],
                        ['name' => 'payment_terms', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Умови оплати']],
                    ]),
                    'body_html' => '
            <h2 style="text-align: center;">ДОГОВІР ПРО НАДАННЯ ПОСЛУГ</h2>
            <p>м. [[city]] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [[current_date]]</p>
            <p>Замовник [[customer]] та Виконавець [[freelancer]] уклали цей договір про наступне:</p>
            <p>1. Виконавець зобов\'язується надати наступні послуги: [[tasks]].</p>
            <p>2. Вартість послуг складає [[cost]] грн. Умови оплати: [[payment_terms]].</p>
        '
                ],
                'personal-and-family' => [
                    // --- 1. ОБЩЕНИЕ С ГОСУДАРСТВЕННЫМИ ОРГАНАМИ ---
                    [
                        'name' => 'Запрос на получение публичной информации',
                        'fields' => json_encode([
                            ['name' => 'recipient_org', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва розпорядника інформації (орган влади)']],
                            ['name' => 'recipient_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Адреса розпорядника']],
                            ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваше ПІБ']],
                            ['name' => 'sender_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша поштова адреса для відповіді']],
                            ['name' => 'sender_email', 'type' => 'email', 'required' => false, 'labels' => ['uk' => 'Ваш Email для відповіді']],
                            ['name' => 'request_body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Текст запиту (яку інформацію ви просите надати)']],
                        ]),
                        'body_html' => '
            <div style="text-align: right; margin-left: 50%;">
                <p>[[recipient_org]]</p>
                <p>[[recipient_address]]</p>
                <p>Запитувача: [[sender_name]]</p>
                <p>Адреса: [[sender_address]]</p>
                <p>Email: [[sender_email]]</p>
            </div>
            <h2 style="text-align: center; margin-top: 50px;">ЗАПИТ НА ОТРИМАННЯ ПУБЛІЧНОЇ ІНФОРМАЦІЇ</h2>
            <p style="text-indent: 40px;">Відповідно до статті 19 Закону України «Про доступ до публічної інформації», прошу надати наступну інформацію (наступні документи):</p>
            <div style="padding-left: 40px;">[[request_body]]</div>
            <p style="text-indent: 40px;">Відповідь на запит прошу надіслати у встановлений законом строк на вказану вище адресу.</p>
            <table style="width: 100%; margin-top: 80px; border: none;">
                <tr>
                    <td style="text-align: left;">[[current_date]]</td>
                    <td style="text-align: right;">___________ ([[sender_name]])</td>
                </tr>
            </table>
        '
                    ],
                    [
                        'name' => 'Жалоба на бездействие должностного лица',
                        'fields' => json_encode([
                            ['name' => 'recipient_org', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва вищого органу або прокуратури']],
                            ['name' => 'recipient_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Адреса отримувача']],
                            ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваше ПІБ']],
                            ['name' => 'sender_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша адреса']],
                            ['name' => 'offender_details', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Посадова особа, на яку скаржитесь (ПІБ, посада)']],
                            ['name' => 'complaint_body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Опис ситуації та фактів бездіяльності']],
                            ['name' => 'demands', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Ваші вимоги (напр., провести перевірку, притягнути до відповідальності)']],
                        ]),
                        'body_html' => '
            <div style="text-align: right; margin-left: 50%;">
                <p>[[recipient_org]]</p>
                <p>[[recipient_address]]</p>
                <p>Скаржник: [[sender_name]]</p>
                <p>Адреса: [[sender_address]]</p>
            </div>
            <h2 style="text-align: center; margin-top: 50px;">СКАРГА</h2>
            <h3 style="text-align: center;">на бездіяльність посадової особи</h3>
            <p>Я, [[sender_name]], звертався(лась) до [[offender_details]] з приводу наступного питання:</p>
            <div>[[complaint_body]]</div>
            <p>Вважаю таку бездіяльність неправомірною та такою, що порушує мої права.</p>
            <p>На підставі вищевикладеного, прошу:</p>
            <div>[[demands]]</div>
            <table style="width: 100%; margin-top: 80px; border: none;">
                <tr>
                    <td style="text-align: left;">[[current_date]]</td>
                    <td style="text-align: right;">___________ ([[sender_name]])</td>
                </tr>
            </table>
        '
                    ],
                    [
                        'name' => 'Заявление на получение справки о несудимости',
                        'fields' => json_encode([
                            ['name' => 'recipient_org', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва територіального сервісного центру МВС']],
                            ['name' => 'full_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваше ПІБ (українською)']],
                            ['name' => 'previous_name', 'type' => 'text', 'required' => false, 'labels' => ['uk' => 'Попереднє ПІБ (якщо змінювалось)']],
                            ['name' => 'birth_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата народження']],
                            ['name' => 'birth_place', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місце народження']],
                            ['name' => 'address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місце реєстрації та проживання']],
                            ['name' => 'phone', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Телефон']],
                            ['name' => 'purpose', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Мета отримання довідки (напр., для оформлення візи)']],
                        ]),
                        'body_html' => '
            <div style="text-align: right; margin-left: 50%;">
                <p>Начальнику [[recipient_org]]</p>
                <p>[[full_name]]</p>
                <p>Адреса: [[address]]</p>
                <p>Тел: [[phone]]</p>
            </div>
            <h2 style="text-align: center; margin-top: 50px;">ЗАЯВА</h2>
            <p>Прошу надати довідку про притягнення до кримінальної відповідальності, відсутність (наявність) судимості або обмежень, передбачених кримінально-процесуальним законодавством України.</p>
            <p><strong>Відомості про себе:</strong></p>
            <ul>
                <li>ПІБ: [[full_name]]</li>
                <li>Попереднє ПІБ: [[previous_name]]</li>
                <li>Дата народження: [[birth_date]]</li>
                <li>Місце народження: [[birth_place]]</li>
            </ul>
            <p>Мета отримання довідки: [[purpose]].</p>
            <p>Даю згоду на обробку моїх персональних даних.</p>
            <p style="margin-top: 50px;">[[current_date]] _________________ ([[full_name]])</p>
        '
                    ],
                    [
                        'name' => 'Заявление на получение справки о составе семьи',
                        'fields' => json_encode([
                            ['name' => 'recipient_org', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва ЦНАП або іншого органу']],
                            ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваше ПІБ']],
                            ['name' => 'sender_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Адреса реєстрації']],
                            ['name' => 'family_members', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Члени сім\'ї, що зареєстровані за адресою'], 'fields' => [
                                ['name' => 'member_name', 'type' => 'text', 'labels' => ['uk' => 'ПІБ']],
                                ['name' => 'relation', 'type' => 'text', 'labels' => ['uk' => 'Ступінь споріднення']],
                                ['name' => 'birth_date', 'type' => 'date', 'labels' => ['uk' => 'Дата народження']],
                            ]],
                            ['name' => 'purpose', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Мета отримання довідки']],
                        ]),
                        'body_html' => '
        <div style="text-align: right; margin-left: 50%;">
            <p>[[recipient_org]]</p>
            <p>від [[sender_name]]</p>
            <p>що проживає за адресою: [[sender_address]]</p>
        </div>
        <h2 style="text-align: center; margin-top: 50px;">ЗАЯВА</h2>
        <p>Прошу видати довідку про склад сім\'ї (зареєстрованих у житловому приміщенні/будинку осіб) за адресою: [[sender_address]].</p>
        <p><strong>Склад сім\'ї:</strong></p>
        <p>[[relation]]: [[member_name]], [[birth_date]] р.н.</p>
        <p style="margin-top: 20px;">Довідка потрібна для пред\'явлення в [[purpose]].</p>
        <p style="margin-top: 50px;">[[current_date]] _________________ ([[sender_name]])</p>
    '
                    ],
    [
        'name' => 'Заявление на смену имени / фамилии',
        'fields' => json_encode([
            ['name' => 'recipient_org', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва відділу ДРАЦС']],
            ['name' => 'current_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваші поточні ПІБ']],
            ['name' => 'address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Адреса реєстрації']],
            ['name' => 'desired_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Бажані ПІБ']],
            ['name' => 'reason', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Причина зміни']],
        ]),
        'body_html' => '
    < div style = "text-align: right; margin-left: 50%;" >
                <p > До [[recipient_org]]</p >
                <p > від [[current_name]]</p >
                <p > Адреса: [[address]] </p >
            </div >
            <h2 style = "text-align: center; margin-top: 50px;" > ЗАЯВА ПРО ЗМІНУ ІМЕНІ </h2 >
            <p > Я, [[current_name]], прошу змінити моє ім\'я (прізвище, власне ім\'я, по батькові) на <b>[[desired_name]]</b> у зв\'язку з [[reason]].</p>
            <p>Про відповідальність за надання неправдивих відомостей попереджений(а).</p>
            <p style="margin-top: 50px;">[[current_date]] _________________ ([[current_name]])</p>
        '
    ],
    [
        'name' => 'Заявление на регистрацию/снятие с регистрации места жительства',
        'fields' => json_encode([
            ['name' => 'recipient_org', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва органу реєстрації (ЦНАП)']],
            ['name' => 'action_type', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Тип дії (Реєстрація/Зняття з реєстрації)']],
            ['name' => 'person_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ особи']],
            ['name' => 'birth_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата народження']],
            ['name' => 'old_address', 'type' => 'text', 'required' => false, 'labels' => ['uk' => 'Адреса, з якої знімаєтесь з реєстрації']],
            ['name' => 'new_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Адреса, за якою реєструєтесь']],
        ]),
        'body_html' => '
            <div style="text-align: right; margin-left: 50%;">
                <p>До [[recipient_org]]</p>
                <p>від [[person_name]]</p>
            </div>
            <h2 style="text-align: center; margin-top: 50px;">ЗАЯВА</h2>
            <h3 style="text-align: center;">про [[action_type]] місця проживання</h3>
            <p>Прошу [[action_type]] мого місця проживання.</p>
            <p><strong>Відомості про особу:</strong> [[person_name]], [[birth_date]] р.н.</p>
            <p><strong>Зняти з реєстрації за адресою:</strong> [[old_address]]</p>
            <p><strong>Зареєструвати за адресою:</strong> [[new_address]]</p>
            <p>Даю згоду на обробку персональних даних.</p>
            <p style="margin-top: 50px;">[[current_date]] _________________ ([[person_name]])</p>
        '
    ],
    [
        'name' => 'Заявление на получение загранпаспорта (общая форма)',
        'fields' => json_encode([
            ['name' => 'full_name_ukr', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ українською']],
            ['name' => 'full_name_lat', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ латиницею (як у поточному паспорті)']],
            ['name' => 'birth_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата народження']],
            ['name' => 'id_code', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ІПН']],
            ['name' => 'address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Адреса реєстрації']],
            ['name' => 'phone', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Телефон']],
        ]),
        'body_html' => '
            <h2 style="text-align: center;">ЗАЯВА-АНКЕТА</h2>
            <h3 style="text-align: center;">для оформлення паспорта громадянина України для виїзду за кордон</h3>
            <p style="color: red;"><strong>Увага!</strong> Це лише загальний шаблон для збору даних. Подача заяви відбувається через офіційні сервіси ДМС або ЦНАП на спеціальних бланках.</p>
            <p><strong>ПІБ (укр):</strong> [[full_name_ukr]]</p>
            <p><strong>ПІБ (лат):</strong> [[full_name_lat]]</p>
            <p><strong>Дата народження:</strong> [[birth_date]]</p>
            <p><strong>ІПН:</strong> [[id_code]]</p>
            <p><strong>Адреса:</strong> [[address]]</p>
            <p><strong>Телефон:</strong> [[phone]]</p>
            <p>Прошу оформити мені паспорт громадянина України для виїзду за кордон.</p>
        '
    ],
    [
        'name' => 'Заявление на получение идентификационного кода (ИНН)',
        'fields' => json_encode([
            ['name' => 'recipient_org', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва органу ДПС']],
            ['name' => 'full_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваше ПІБ']],
            ['name' => 'birth_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата народження']],
            ['name' => 'birth_place', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місце народження']],
            ['name' => 'address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Адреса реєстрації']],
        ]),
        'body_html' => '
            <div style="text-align: right; margin-left: 50%;">
                <p>Начальнику [[recipient_org]]</p>
                <p>від [[full_name]]</p>
            </div>
            <h2 style="text-align: center; margin-top: 50px;">ЗАЯВА (Форма № 1ДР)</h2>
            <p>Прошу зареєструвати мене у Державному реєстрі фізичних осіб – платників податків та видати картку платника податків.</p>
            <p><strong>Відомості про особу:</strong><br>ПІБ: [[full_name]]<br>Дата народження: [[birth_date]]<br>Місце народження: [[birth_place]]<br>Адреса: [[address]]</p>
            <p style="margin-top: 50px;">[[current_date]] _________________ ([[full_name]])</p>
        '
    ],
    [
        'name' => 'Заявление о приеме ребенка в детский сад',
        'fields' => json_encode([
            ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Завідувачу ДНЗ (ПІБ)']],
            ['name' => 'kindergarten_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва дитячого садка']],
            ['name' => 'parent_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ одного з батьків']],
            ['name' => 'address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Адреса проживання']],
            ['name' => 'child_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ дитини']],
            ['name' => 'child_birth_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата народження дитини']],
        ]),
        'body_html' => '
            <div style="text-align: right; margin-left: 50%;">
                <p>Завідувачу [[kindergarten_name]]</p>
                <p>[[director_name]]</p>
                <p>від [[parent_name]]</p>
            </div>
            <h2 style="text-align: center; margin-top: 50px;">ЗАЯВА</h2>
            <p>Прошу зарахувати мою дитину, [[child_name]], [[child_birth_date]] року народження, до Вашого дошкільного навчального закладу.</p>
            <p>Зі статутом та умовами перебування дитини в закладі ознайомлений(а).</p>
            <p style="margin-top: 50px;">[[current_date]] _________________ ([[parent_name]])</p>
        '
    ],
    [
        'name' => 'Заявление о приеме ребенка в школу',
        'fields' => json_encode([
            ['name' => 'director_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Директору школи (ПІБ)']],
            ['name' => 'school_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва школи']],
            ['name' => 'parent_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ одного з батьків']],
            ['name' => 'address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Адреса проживання']],
            ['name' => 'child_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ дитини']],
            ['name' => 'child_birth_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата народження дитини']],
        ]),
        'body_html' => '
            <div style="text-align: right; margin-left: 50%;">
                <p>Директору [[school_name]]</p>
                <p>[[director_name]]</p>
                <p>від [[parent_name]]</p>
            </div>
            <h2 style="text-align: center; margin-top: 50px;">ЗАЯВА</h2>
            <p>Прошу зарахувати мою дитину, [[child_name]], [[child_birth_date]] року народження, до 1-го класу Вашого закладу загальної середньої освіти.</p>
            <p>Зі статутом та правилами внутрішнього розпорядку закладу ознайомлений(а).</p>
            <p style="margin-top: 50px;">[[current_date]] _________________ ([[parent_name]])</p>
        '
    ],
    [
        'name' => 'Записка в школу об отсутствии ребенка',
        'fields' => json_encode([
            ['name' => 'teacher_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Класному керівнику (ПІБ)']],
            ['name' => 'parent_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваше ПІБ']],
            ['name' => 'child_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ учня/учениці']],
            ['name' => 'child_class', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Клас']],
            ['name' => 'absence_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата відсутності']],
            ['name' => 'reason', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Причина відсутності']],
        ]),
        'body_html' => '
            <div style="text-align: right; margin-left: 50%;">
                <p>Класному керівнику [[child_class]] класу</p>
                <p>[[teacher_name]]</p>
                <p>від [[parent_name]]</p>
            </div>
            <h2 style="text-align: center; margin-top: 50px;">ПОЯСНЮВАЛЬНА ЗАПИСКА</h2>
            <p>Мій син/моя донька, [[child_name]], учень/учениця [[child_class]] класу, був(ла) відсутній(я) на заняттях [[absence_date]] у зв\'язку з [[reason]].</p>
            <p style="margin-top: 50px;">[[current_date]] _________________ ([[parent_name]])</p>
        '
    ],
    [
        'name' => 'Согласие родителей на выезд ребенка за границу',
        'fields' => json_encode([
            ['name' => 'city', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місто']],
            ['name' => 'parent1_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ Матері/Батька 1']],
            ['name' => 'parent2_name', 'type' => 'text', 'required' => false, 'labels' => ['uk' => 'ПІБ Матері/Батька 2 (якщо згода від обох)']],
            ['name' => 'child_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ дитини']],
            ['name' => 'child_birth_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата народження дитини']],
            ['name' => 'destination_country', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Країна(и) призначення']],
            ['name' => 'travel_period', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Період поїздки']],
            ['name' => 'accompanying_person', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ супроводжуючої особи']],
        ]),
        'body_html' => '
            <h2 style="text-align: center;">ЗАЯВА-ЗГОДА</h2>
            <p style="color: red; text-align: center;"><strong>УВАГА! Цей документ підлягає обов\'язковому нотаріальному посвідченню.</strong></p>
            <p>м. [[city]] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [[current_date]]</p>
            <p>Я (ми), [[parent1_name]] та [[parent2_name]], як законні представники нашої неповнолітньої дитини <b>[[child_name]]</b>, [[child_birth_date]] року народження, даємо свою згоду на її/його тимчасову поїздку за кордон до <b>[[destination_country]]</b> у період з <b>[[travel_period]]</b>.</p>
            <p>Поїздка відбудеться у супроводі громадянина(ки) <b>[[accompanying_person]]</b>, на що ми також даємо свою згоду.</p>
            <p>Ми ознайомлені з правилами перетину державного кордону та несемо відповідальність за життя та здоров\'я дитини під час поїздки.</p>
            <p style="margin-top: 50px;">Підпис: _________________ ([[parent1_name]])</p>
            <p style="margin-top: 30px;">Підпис: _________________ ([[parent2_name]])</p>
        '
    ],
    [
        'name' => 'Согласие на медицинское вмешательство для ребенка',
        'fields' => json_encode([
            ['name' => 'hospital_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва медичного закладу']],
            ['name' => 'parent_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ одного з батьків']],
            ['name' => 'child_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ дитини']],
            ['name' => 'intervention_type', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Вид втручання (напр., профілактичне щеплення, медичний огляд)']],
        ]),
        'body_html' => '
            <h2 style="text-align: center;">ІНФОРМОВАНА ДОБРОВІЛЬНА ЗГОДА</h2>
            <h3 style="text-align: center;">на проведення медичного втручання</h3>
            <p>Я, [[parent_name]], законний представник дитини [[child_name]], даю свою згоду на проведення моїй дитині [[intervention_type]] в [[hospital_name]].</p>
            <p>Мені в доступній формі роз\'яснено мету, характер, ризики та можливі наслідки даного медичного втручання. Я мав(ла) можливість ставити будь-які питання і отримав(ла) на них вичерпні відповіді.</p>
            <p style="margin-top: 50px;">[[current_date]] _________________ ([[parent_name]])</p>
        '
    ],
    [
        'name' => 'Соглашение об уплате алиментов',
        'fields' => json_encode([
            ['name' => 'city', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місто']],
            ['name' => 'parent1_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ платника аліментів']],
            ['name' => 'parent2_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ отримувача аліментів']],
            ['name' => 'child_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ дитини']],
            ['name' => 'amount_terms', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Розмір та форма аліментів (фіксована сума або % від доходу)']],
            ['name' => 'payment_terms', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Строки та порядок сплати']],
        ]),
        'body_html' => '
            <h2 style="text-align: center;">ДОГОВІР ПРО СПЛАТУ АЛІМЕНТІВ НА ДИТИНУ</h2>
             <p style="color: red; text-align: center;"><strong>УВАГА! Договір про сплату аліментів підлягає нотаріальному посвідченню.</strong></p>
            <p>м. [[city]] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [[current_date]]</p>
            <p>[[parent1_name]] (Платник) та [[parent2_name]] (Отримувач), що діє в інтересах неповнолітньої дитини [[child_name]], домовилися про наступне:</p>
            <p>1. Платник зобов\'язується сплачувати аліменти на утримання дитини в наступному розмірі та формі: [[amount_terms]].</p>
            <p>2. Аліменти сплачуються в такі строки та в такому порядку: [[payment_terms]].</p>
        '
    ],
    [
        'name' => 'Брачный договор (общая структура)',
        'fields' => json_encode([
            ['name' => 'city', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місто укладання']],
            ['name' => 'party1_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ Нареченого/Чоловіка']],
            ['name' => 'party1_details', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Паспортні дані та ІПН Сторони 1']],
            ['name' => 'party2_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ Нареченої/Дружини']],
            ['name' => 'party2_details', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Паспортні дані та ІПН Сторони 2']],
            ['name' => 'premarital_property', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Правовий режим майна, набутого до шлюбу']],
            ['name' => 'marital_property', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Правовий режим майна, набутого під час шлюбу']],
            ['name' => 'maintenance_terms', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Порядок утримання одного з подружжя']],
            ['name' => 'divorce_terms', 'type' => 'textarea', 'required' => false, 'labels' => ['uk' => 'Правові наслідки на випадок розірвання шлюбу']],
        ]),
        'body_html' => '
            <h2 style="text-align: center;">ШЛЮБНИЙ ДОГОВІР</h2>
            <p style="color: red; text-align: center;"><strong>УВАГА! Цей документ є лише загальною структурою. Укладення шлюбного договору вимагає обов\'язкового нотаріального посвідчення та консультації з юристом.</strong></p>
            <p>м. [[city]] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [[current_date]]</p>
            <p>Ми, [[party1_name]] ([[party1_details]]), надалі "Сторона 1", та [[party2_name]] ([[party2_details]]), надалі "Сторона 2", укладаємо цей договір для врегулювання майнових відносин між нами як подружжям.</p>
            <h3>1. ПРАВОВИЙ РЕЖИМ МАЙНА</h3>
            <p>1.1. Майно, набуте до шлюбу: [[premarital_property]].</p>
            <p>1.2. Майно, набуте під час шлюбу: [[marital_property]].</p>
            <h3>2. ПРАВА ТА ОБОВ\'ЯЗКИ ПОДРУЖЖЯ</h3>
            <p>2.1. Порядок утримання: [[maintenance_terms]].</p>
            <h3>3. УМОВИ НА ВИПАДОК РОЗІРВАННЯ ШЛЮБУ</h3>
            <p>3.1. У випадку розірвання шлюбу: [[divorce_terms]].</p>
            <table style="width: 100%; margin-top: 50px; vertical-align: top;">
                <tr>
                    <td style="width: 50%;"><b>Сторона 1</b><br><br>____________________<br>([[party1_name]])</td>
                    <td style="width: 50%;"><b>Сторона 2</b><br><br>____________________<br>([[party2_name]])</td>
                </tr>
            </table>
        '
    ],
    [
        'name' => 'Заявление о регистрации брака',
        'fields' => json_encode([
            ['name' => 'recipient_org', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва відділу ДРАЦС']],
            ['name' => 'groom_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ нареченого']],
            ['name' => 'bride_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ нареченої']],
            ['name' => 'groom_birth_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата народження нареченого']],
            ['name' => 'bride_birth_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата народження нареченої']],
            ['name' => 'desired_surnames', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Бажані прізвища після реєстрації шлюбу']],
        ]),
        'body_html' => '
            <div style="text-align: right; margin-left: 50%;">
                <p>До [[recipient_org]]</p>
            </div>
            <h2 style="text-align: center; margin-top: 50px;">СПІЛЬНА ЗАЯВА ПРО РЕЄСТРАЦІЮ ШЛЮБУ</h2>
            <p>Ми, [[groom_name]] (наречений) та [[bride_name]] (наречена), просимо зареєструвати наш шлюб.</p>
            <p>Підтверджуємо, що ми взаємно згодні на укладення шлюбу і не маємо перешкод, передбачених Сімейним кодексом України.</p>
            <p>Після реєстрації шлюбу просимо присвоїти прізвища: [[desired_surnames]].</p>
            <p style="margin-top: 50px;">Підпис нареченого: _________________</p>
            <p style="margin-top: 30px;">Підпис нареченої: _________________</p>
        '
    ],
    [
        'name' => 'Заявление о расторжении брака (в ЗАГС)',
        'fields' => json_encode([
            ['name' => 'recipient_org', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва відділу ДРАЦС']],
            ['name' => 'husband_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ чоловіка']],
            ['name' => 'wife_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ дружини']],
            ['name' => 'desired_surnames', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Бажані прізвища після розірвання шлюбу']],
        ]),
        'body_html' => '
            <div style="text-align: right; margin-left: 50%;">
                <p>До [[recipient_org]]</p>
            </div>
            <h2 style="text-align: center; margin-top: 50px;">СПІЛЬНА ЗАЯВА ПРО РОЗІРВАННЯ ШЛЮБУ ПОДРУЖЖЯ, ЯКЕ НЕ МАЄ ДІТЕЙ</h2>
            <p>Ми, [[husband_name]] (чоловік) та [[wife_name]] (дружина), просимо розірвати наш шлюб.</p>
            <p>Підтверджуємо, що спільних неповнолітніх дітей не маємо, і що згода на розірвання шлюбу є взаємною.</p>
            <p>Після розірвання шлюбу просимо залишити прізвища: [[desired_surnames]].</p>
            <p style="margin-top: 50px;">Підпис чоловіка: _________________</p>
            <p style="margin-top: 30px;">Підпис дружини: _________________</p>
        '
    ],

    // --- 3. ДОЛГОВЫЕ ОБЯЗАТЕЛЬСТВА ---
    [
        'name' => 'Расписка в получении денежных средств в долг',
        'fields' => json_encode([
            ['name' => 'city', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місто']],
            ['name' => 'borrower_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ Позичальника (хто бере в борг)']],
            ['name' => 'borrower_details', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Паспорт та ІПН Позичальника']],
            ['name' => 'lender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ Позикодавця (хто дає в борг)']],
            ['name' => 'lender_details', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Паспорт та ІПН Позикодавця']],
            ['name' => 'amount_numeric', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Сума боргу (цифрами)']],
            ['name' => 'amount_words', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Сума боргу (прописом)']],
            ['name' => 'currency', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Валюта (напр., гривень)']],
            ['name' => 'return_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата повернення боргу']],
        ]),
        'body_html' => '
            <h2 style="text-align: center;">РОЗПИСКА</h2>
            <p>м. [[city]] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [[current_date]]</p>
            <p>Я, <b>[[borrower_name]]</b> (паспорт: [[borrower_details]]), отримав(ла) від громадянина(ки) <b>[[lender_name]]</b> (паспорт: [[lender_details]]) грошові кошти в сумі <b>[[amount_numeric]] ([[amount_words]]) [[currency]]</b>.</p>
            <p>Зобов\'язуюся повернути вказану суму в повному обсязі до <b>[[return_date]]</b>.</p>
            <p>Розписка складена у двох примірниках, по одному для кожної зі сторін.</p>
            <p style="margin-top: 50px;">Підпис Позичальника: _________________ ([[borrower_name]])</p>
        '
    ],
    [
        'name' => 'Расписка о возврате денежного долга',
        'fields' => json_encode([
            ['name' => 'city', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місто']],
            ['name' => 'lender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ Позикодавця (хто отримує гроші)']],
            ['name' => 'borrower_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ Позичальника (хто повертає борг)']],
            ['name' => 'amount_numeric', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Сума боргу (цифрами)']],
            ['name' => 'amount_words', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Сума боргу (прописом)']],
            ['name' => 'original_doc', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'На підставі (напр., розписки від 01.01.2025)']],
        ]),
        'body_html' => '
            <h2 style="text-align: center;">РОЗПИСКА</h2>
            <p>м. [[city]] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [[current_date]]</p>
            <p>Я, <b>[[lender_name]]</b>, отримав(ла) від громадянина(ки) <b>[[borrower_name]]</b> грошові кошти в сумі <b>[[amount_numeric]] ([[amount_words]])</b> в рахунок повного погашення боргу згідно з [[original_doc]].</p>
            <p>Фінансових претензій до [[borrower_name]] не маю.</p>
            <p style="margin-top: 50px;">Підпис Позикодавця: _________________ ([[lender_name]])</p>
        '
    ],
    [
        'name' => 'Досудебная претензия о возврате долга',
        'fields' => json_encode([
            ['name' => 'recipient_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Кому (ПІБ боржника)']],
            ['name' => 'recipient_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Адреса боржника']],
            ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Від кого (ваше ПІБ)']],
            ['name' => 'sender_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша адреса']],
            ['name' => 'original_doc', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'На підставі (напр., розписки від 01.01.2025)']],
            ['name' => 'amount', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Сума боргу']],
            ['name' => 'deadline_days', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Термін для сплати (днів)']],
        ]),
        'body_html' => '
            <div style="text-align: right;">
                <p>[[recipient_name]]</p>
                <p>[[recipient_address]]</p>
            </div>
            <p>Від: [[sender_name]]<br>[[sender_address]]</p>
            <h2 style="text-align: center;">ДОСУДОВА ПРЕТЕНЗІЯ (ВИМОГА)</h2>
            <p>Згідно з [[original_doc]], Ваша заборгованість переді мною становить [[amount]] грн.</p>
            <p>Вимагаю сплатити вказану суму протягом [[deadline_days]] днів з моменту отримання цієї претензії.</p>
            <p>У випадку невиконання цієї вимоги, я буду змушений(а) звернутися до суду для примусового стягнення боргу, що призведе до додаткових судових витрат для Вас.</p>
            <p style="margin-top: 50px;">[[current_date]] _________________ ([[sender_name]])</p>
        '
    ],

    // --- 4. ВЗАИМОДЕЙСТВИЕ С ОРГАНИЗАЦИЯМИ (БАНКИ, МАГАЗИНЫ) ---
    [
        'name' => 'Заявление в банк на реструктуризацию кредита',
        'fields' => json_encode([
            ['name' => 'bank_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва банку']],
            ['name' => 'branch_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Адреса відділення']],
            ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваше ПІБ']],
            ['name' => 'sender_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша адреса']],
            ['name' => 'contract_number', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Номер кредитного договору']],
            ['name' => 'reason', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Причина звернення (втрата роботи, хвороба тощо)']],
        ]),
        'body_html' => '
            <div style="text-align: right;">
                <p>Голові правління [[bank_name]]</p>
                <p>[[sender_name]]</p>
                <p>[[sender_address]]</p>
            </div>
            <h2 style="text-align: center;">ЗАЯВА</h2>
            <p>Я, [[sender_name]], є позичальником за кредитним договором № [[contract_number]].</p>
            <p>У зв\'язку з [[reason]], я не маю можливості виконувати зобов\'язання за договором у повному обсязі.</p>
            <p>Прошу розглянути можливість реструктуризації мого боргу (наприклад, шляхом надання кредитних канікул або зменшення щомісячного платежу).</p>
            <p style="margin-top: 50px;">[[current_date]] _________________ ([[sender_name]])</p>
        '
    ],
    [
        'name' => 'Заявление в банк о спорной транзакции (чарджбэк)',
        'fields' => json_encode([
            ['name' => 'bank_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва банку']],
            ['name' => 'cardholder_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'ПІБ власника картки']],
            ['name' => 'card_number', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Номер картки (перші 6 та останні 4 цифри)']],
            ['name' => 'transaction_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата транзакції']],
            ['name' => 'transaction_amount', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Сума транзакції']],
            ['name' => 'merchant_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва торговця']],
            ['name' => 'reason', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Причина оскарження (товар не отримано, послугу не надано, інше)']],
        ]),
        'body_html' => '
            <div style="text-align: right; margin-left: 50%;">
                <p>До [[bank_name]]</p>
                <p>від [[cardholder_name]]</p>
            </div>
            <h2 style="text-align: center; margin-top: 50px;">ЗАЯВА ПРО СПІРНУ ТРАНЗАКЦІЮ</h2>
            <p>Я, [[cardholder_name]], прошу опротестувати транзакцію за наступними реквізитами:</p>
            <ul>
                <li>Платіжна картка: [[card_number]]</li>
                <li>Дата: [[transaction_date]]</li>
                <li>Сума: [[transaction_amount]]</li>
                <li>Торговець: [[merchant_name]]</li>
            </ul>
            <p>Причина оскарження: [[reason]].</p>
            <p>Прошу провести розслідування та повернути кошти на мій рахунок.</p>
            <p style="margin-top: 50px;">[[current_date]] _________________ ([[cardholder_name]])</p>
        '
    ],
    [
        'name' => 'Заявление на возврат товара надлежащего качества',
        'fields' => json_encode([
            ['name' => 'seller_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва магазину/ФОП']],
            ['name' => 'seller_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Адреса магазину']],
            ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваше ПІБ']],
            ['name' => 'sender_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша адреса']],
            ['name' => 'product_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва товару']],
            ['name' => 'purchase_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата покупки']],
            ['name' => 'reason', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Причина повернення (не підійшов за формою, кольором тощо)']],
        ]),
        'body_html' => '
            <div style="text-align: right;">
                <p>Директору [[seller_name]]</p>
                <p>[[sender_name]]</p>
                <p>[[sender_address]]</p>
            </div>
            <h2 style="text-align: center;">ЗАЯВА</h2>
            <p>[[purchase_date]] я придбав(ла) у вашому магазині [[product_name]].</p>
            <p>Відповідно до ст. 9 Закону України «Про захист прав споживачів», я маю право обміняти або повернути товар належної якості протягом 14 днів. Товар не використовувався, його товарний вигляд, споживчі властивості, пломби, ярлики, а також розрахунковий документ збережені.</p>
            <p>Причина повернення: [[reason]].</p>
            <p>Прошу повернути мені кошти за товар у повному обсязі.</p>
            <p style="margin-top: 50px;">[[current_date]] _________________ ([[sender_name]])</p>
        '
    ],
    [
        'name' => 'Претензия на некачественный товар',
        'fields' => json_encode([
            ['name' => 'seller_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва магазину/ФОП']],
            ['name' => 'seller_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Адреса магазину']],
            ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваше ПІБ']],
            ['name' => 'sender_address', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша адреса']],
            ['name' => 'product_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва товару']],
            ['name' => 'purchase_date', 'type' => 'date', 'required' => true, 'labels' => ['uk' => 'Дата покупки']],
            ['name' => 'defect_description', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Опис недоліків']],
            ['name' => 'demand', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваша вимога (повернути гроші / замінити товар / безоплатно усунути недоліки)']],
        ]),
        'body_html' => '
            <div style="text-align: right;">
                <p>Директору [[seller_name]]</p>
                <p>[[sender_name]]</p>
                <p>[[sender_address]]</p>
            </div>
            <h2 style="text-align: center;">ПРЕТЕНЗІЯ</h2>
            <p>[[purchase_date]] я придбав(ла) у вашому магазині [[product_name]], в якому виявились наступні недоліки: [[defect_description]].</p>
            <p>Відповідно до ст. 8 Закону України «Про захист прав споживачів», у разі виявлення протягом встановленого гарантійного строку істотних недоліків, які виникли з вини виробника (продавця), я маю право за своїм вибором вимагати розірвання договору та повернення сплаченої за товар грошової суми.</p>
            <p>Прошу: [[demand]].</p>
            <p style="margin-top: 50px;">[[current_date]] _________________ ([[sender_name]])</p>
        '
    ],

    // --- 5. ПЛАНИРОВАНИЕ И ОРГАНИЗАЦИЯ ---
    [
        'name' => 'Бюджет на месяц (личный/семейный)',
        'fields' => json_encode([
            ['name' => 'month_year', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Місяць та рік']],
            ['name' => 'incomes', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Доходи'], 'fields' => [
                ['name' => 'income_source', 'type' => 'text', 'labels' => ['uk' => 'Джерело доходу']],
                ['name' => 'income_amount', 'type' => 'number', 'labels' => ['uk' => 'Сума']],
            ]],
            ['name' => 'expenses', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Заплановані витрати'], 'fields' => [
                ['name' => 'expense_category', 'type' => 'text', 'labels' => ['uk' => 'Категорія витрат']],
                ['name' => 'expense_amount', 'type' => 'number', 'labels' => ['uk' => 'Сума']],
            ]],
            ['name' => 'total_income', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Всього доходів']],
            ['name' => 'total_expenses', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Всього витрат']],
            ['name' => 'balance', 'type' => 'number', 'required' => true, 'labels' => ['uk' => 'Баланс (доходи - витрати)']],
        ]),
        'body_html' => '
            <h2 style="text-align: center;">БЮДЖЕТ НА [[month_year]]</h2>
            <h3>ДОХОДИ</h3>
            <table style="width: 100%; border-collapse: collapse;" border="1">
                <thead><tr><th>Джерело</th><th>Сума</th></tr></thead>
                <tbody>
                <tr><td>[[income_source]]</td><td>[[income_amount]]</td></tr>
                </tbody>
                <tfoot><tr><td style="font-weight: bold;">Всього доходів:</td><td style="font-weight: bold;">[[total_income]]</td></tr></tfoot>
            </table>
            <h3 style="margin-top: 30px;">ВИТРАТИ</h3>
            <table style="width: 100%; border-collapse: collapse;" border="1">
                <thead><tr><th>Категорія</th><th>Сума</th></tr></thead>
                <tbody>
                <tr><td>[[expense_category]]</td><td>[[expense_amount]]</td></tr>
                </tbody>
                <tfoot><tr><td style="font-weight: bold;">Всього витрат:</td><td style="font-weight: bold;">[[total_expenses]]</td></tr></tfoot>
            </table>
            <h3 style="margin-top: 30px; text-align: right;">БАЛАНС: [[balance]]</h3>
        '
    ],
    [
        'name' => 'Список покупок',
        'fields' => json_encode([
            ['name' => 'list_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Назва списку (напр., Продукти на тиждень)']],
            ['name' => 'items', 'type' => 'repeater', 'required' => true, 'labels' => ['uk' => 'Покупки'], 'fields' => [
                ['name' => 'item_name', 'type' => 'text', 'labels' => ['uk' => 'Назва товару']],
                ['name' => 'quantity', 'type' => 'text', 'labels' => ['uk' => 'Кількість']],
            ]],
        ]),
        'body_html' => '
            <h2 style="text-align: center;">[[list_name]]</h2>
            <table style="width: 100%;">
            <tr>
                <td style="width: 30px; border-bottom: 1px solid #ccc;">[ ]</td>
                <td style="border-bottom: 1px solid #ccc;">[[item_name]]</td>
                <td style="width: 100px; border-bottom: 1px solid #ccc; text-align: right;">[[quantity]]</td>
            </tr>
            </table>
        '
    ],
    [
        'name' => 'Личное благодарственное письмо',
        'fields' => json_encode([
            ['name' => 'recipient_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ім\'я отримувача']],
            ['name' => 'body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Текст подяки']],
            ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваше ім\'я']],
        ]),
        'body_html' => '
            <p>Дорогий(а) [[recipient_name]]!</p>
            <div>[[body]]</div>
            <p style="margin-top: 30px;">З найкращими побажаннями,</p>
            <p>[[sender_name]]</p>
        '
    ],
    [
        'name' => 'Личное письмо с извинениями',
        'fields' => json_encode([
            ['name' => 'recipient_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ім\'я отримувача']],
            ['name' => 'body', 'type' => 'textarea', 'required' => true, 'labels' => ['uk' => 'Текст вибачення']],
            ['name' => 'sender_name', 'type' => 'text', 'required' => true, 'labels' => ['uk' => 'Ваше ім\'я']],
        ]),
        'body_html' => '
            <p>Дорогий(а) [[recipient_name]]!</p>
            <div>[[body]]</div>
            <p style="margin-top: 30px;">Щиро,</p>
            <p>[[sender_name]]</p>
        '
    ],
],
            ]
        ];
    }
}
