<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Очищаємо таблиці перед наповненням, щоб уникнути дублікатів
        DB::table('template_translations')->delete();
        DB::table('templates')->delete();

        // Отримуємо всі категорії один раз для ефективності
        $categories = Category::all()->keyBy('slug');

        // Перевіряємо, чи існують категорії, щоб уникнути помилок
        $workCategory = $categories['work'] ?? null;
        $housingCategory = $categories['housing-issues'] ?? null;
        $schoolCategory = $categories['school-education'] ?? null;
        $govCategory = $categories['government-agencies'] ?? null;
        $legalCategory = $categories['legal-claims'] ?? null;
        $medicineCategory = $categories['medicine'] ?? null;

        // --- Категорія: Work (Робота) ---
        if ($workCategory) {
            $this->createTemplate(
                $workCategory->id,
                'vacation-request',
                'pdf.templates.work.vacation-request',
                '[{"name":"director_position","type":"text","required":true,"labels":{"en":"Director\'s Position","uk":"Посада Директора","pl":"Stanowisko dyrektora"}},{"name":"director_name","type":"text","required":true,"labels":{"en":"Director\'s Full Name (genitive)","uk":"ПІБ Директора (в род. відмінку)","pl":"Imię i nazwisko dyrektora (dopełniacz)"}},{"name":"employee_position","type":"text","required":true,"labels":{"en":"Employee\'s Position","uk":"Посада Працівника","pl":"Stanowisko pracownika"}},{"name":"employee_name","type":"text","required":true,"labels":{"en":"Employee\'s Full Name (genitive)","uk":"ПІБ Працівника (в род. відмінку)","pl":"Imię i nazwisko pracownika (dopełniacz)"}},{"name":"start_date","type":"date","required":true,"labels":{"en":"Vacation Start Date","uk":"Дата початку відпустки","pl":"Data rozpoczęcia urlopu"}},{"name":"duration_days","type":"number","required":true,"labels":{"en":"Duration (calendar days)","uk":"Тривалість (календарних днів)","pl":"Czas trwania (dni kalendarzowe)"}}]',
                [
                    'en' => ['title' => 'Annual Vacation Request', 'description' => 'A formal application to request time off from work for an annual paid vacation.'],
                    'uk' => ['title' => 'Заява на щорічну відпустку', 'description' => 'Офіційна заява на отримання щорічної оплачуваної відпустки.'],
                    'pl' => ['title' => 'Wniosek o urlop wypoczynkowy', 'description' => 'Formalny wniosek o udzielenie corocznego płatnego urlopu wypoczynkowego.'],
                ]
            );
            $this->createTemplate(
                $workCategory->id,
                'resignation-letter',
                'pdf.templates.work.resignation-letter',
                '[{"name":"director_position","type":"text","required":true,"labels":{"en":"Director\'s Position","uk":"Посада директора","pl":"Stanowisko dyrektora"}},{"name":"director_name","type":"text","required":true,"labels":{"en":"Director\'s Full Name (genitive)","uk":"ПІБ директора (в род. відмінку)","pl":"Imię i nazwisko dyrektora (dopełniacz)"}},{"name":"employee_position","type":"text","required":true,"labels":{"en":"Employee\'s Position","uk":"Посада працівника","pl":"Stanowisko pracownika"}},{"name":"employee_name","type":"text","required":true,"labels":{"en":"Employee\'s Full Name (genitive)","uk":"ПІБ працівника (в род. відмінку)","pl":"Imię i nazwisko pracownika (dopełniacz)"}},{"name":"employee_name_short","type":"text","required":true,"labels":{"en":"Employee\'s Short Name (I. Surname)","uk":"Прізвище та ініціали працівника","pl":"Nazwisko i inicjały pracownika"}},{"name":"resignation_date","type":"date","required":true,"labels":{"en":"Resignation Date","uk":"Дата звільнення","pl":"Data zwolnienia"}}]',
                [
                    'en' => ['title' => 'Resignation Letter', 'description' => 'A formal document to terminate employment with a two-week notice period.'],
                    'uk' => ['title' => 'Заява на звільнення', 'description' => 'Офіційний документ для припинення трудових відносин з відпрацюванням у два тижні.'],
                    'pl' => ['title' => 'Wypowiedzenie umowy o pracę', 'description' => 'Formalny dokument o rozwiązaniu stosunku pracy z dwutygodniowym okresem wypowiedzenia.'],
                ]
            );
            $this->createTemplate(
                $workCategory->id,
                'unpaid-leave-request',
                'pdf.templates.work.unpaid-leave-request',
                '[{"name":"director_position","type":"text","required":true,"labels":{"en":"Director\'s Position","uk":"Посада директора","pl":"Stanowisko dyrektora"}},{"name":"director_name","type":"text","required":true,"labels":{"en":"Director\'s Full Name (genitive)","uk":"ПІБ директора (в род. відмінку)","pl":"Imię i nazwisko dyrektora (dopełniacz)"}},{"name":"employee_position","type":"text","required":true,"labels":{"en":"Employee\'s Position","uk":"Посада працівника","pl":"Stanowisko pracownika"}},{"name":"employee_name","type":"text","required":true,"labels":{"en":"Employee\'s Full Name (genitive)","uk":"ПІБ працівника (в род. відмінку)","pl":"Imię i nazwisko pracownika (dopełniacz)"}},{"name":"start_date","type":"date","required":true,"labels":{"en":"Start Date","uk":"Дата початку","pl":"Data rozpoczęcia"}},{"name":"duration_days","type":"number","required":true,"labels":{"en":"Duration (days)","uk":"Тривалість (днів)","pl":"Czas trwania (dni)"}},{"name":"reason","type":"textarea","required":true,"labels":{"en":"Reason for leave","uk":"Причина відпустки","pl":"Powód urlopu"}}]',
                [
                    'en' => ['title' => 'Unpaid Leave Request', 'description' => 'An application for a leave of absence without pay for family or other reasons.'],
                    'uk' => ['title' => 'Заява на відпустку за власний рахунок', 'description' => 'Заява про надання відпустки без збереження заробітної плати за сімейними чи іншими обставинами.'],
                    'pl' => ['title' => 'Wniosek o urlop bezpłatny', 'description' => 'Wniosek o udzielenie urlopu bezpłatnego z powodów rodzinnych lub innych.'],
                ]
            );
        }

        // --- Категорія: School & Education ---
        if ($schoolCategory) {
            $this->createTemplate(
                $schoolCategory->id,
                'school-absence-note',
                'pdf.templates.school.absence-note',
                '[{"name":"director_name","type":"text","required":true,"labels":{"en":"School Director\'s Full Name (dative)","uk":"Директору школи (в дав. відмінку)","pl":"Dyrektor szkoły (celownik)"}},{"name":"school_number","type":"text","required":true,"labels":{"en":"School Number","uk":"Номер школи","pl":"Numer szkoły"}},{"name":"parent_name","type":"text","required":true,"labels":{"en":"Parent\'s Full Name (genitive)","uk":"ПІБ батьків (в род. відмінку)","pl":"Imię i nazwisko rodzica (dopełniacz)"}},{"name":"parent_address","type":"text","required":true,"labels":{"en":"Parent\'s Address","uk":"Адреса батьків","pl":"Adres rodzica"}},{"name":"student_name","type":"text","required":true,"labels":{"en":"Student\'s Full Name","uk":"ПІБ учня/учениці","pl":"Imię i nazwisko ucznia"}},{"name":"student_class","type":"text","required":true,"labels":{"en":"Student\'s Class","uk":"Клас учня/учениці","pl":"Klasa ucznia"}},{"name":"start_date","type":"date","required":true,"labels":{"en":"Absence Start Date","uk":"Дата початку відсутності","pl":"Data rozpoczęcia nieobecności"}},{"name":"end_date","type":"date","required":true,"labels":{"en":"Absence End Date","uk":"Дата закінчення відсутності","pl":"Data zakończenia nieobecności"}},{"name":"reason","type":"textarea","required":true,"labels":{"en":"Reason for absence","uk":"Причина відсутності","pl":"Powód nieobecności"}}]',
                [
                    'en' => ['title' => 'School Absence Note', 'description' => 'An explanatory note from parents to the school about a child\'s absence from classes.'],
                    'uk' => ['title' => 'Записка про відсутність у школі', 'description' => 'Пояснювальна записка від батьків до школи щодо відсутності дитини на заняттях.'],
                    'pl' => ['title' => 'Usprawiedliwienie nieobecności w szkole', 'description' => 'Wyjaśnienie od rodziców do szkoły dotyczące nieobecności dziecka na lekcjach.'],
                ]
            );
            $this->createTemplate(
                $schoolCategory->id,
                'school-transfer-request',
                'pdf.templates.school.transfer-request',
                '[{"name":"director_name","type":"text","required":true,"labels":{"en":"School Director\'s Full Name (dative)","uk":"Директору школи (в дав. відмінку)","pl":"Dyrektor szkoły (celownik)"}},{"name":"school_number","type":"text","required":true,"labels":{"en":"School Number","uk":"Номер школи","pl":"Numer szkoły"}},{"name":"parent_name","type":"text","required":true,"labels":{"en":"Parent\'s Full Name (genitive)","uk":"ПІБ батьків (в род. відмінку)","pl":"Imię i nazwisko rodzica (dopełniacz)"}},{"name":"parent_name_short","type":"text","required":true,"labels":{"en":"Parent\'s Short Name (I. Surname)","uk":"Прізвище та ініціали батьків","pl":"Nazwisko i inicjały rodzica"}},{"name":"student_name","type":"text","required":true,"labels":{"en":"Student\'s Full Name","uk":"ПІБ учня/учениці","pl":"Imię i nazwisko ucznia"}},{"name":"student_name_short","type":"text","required":true,"labels":{"en":"Student\'s Short Name (I. Surname)","uk":"Прізвище та ініціали учня","pl":"Nazwisko i inicjały ucznia"}},{"name":"student_birth_year","type":"number","required":true,"labels":{"en":"Student\'s Year of Birth","uk":"Рік народження учня","pl":"Rok urodzenia ucznia"}},{"name":"target_class","type":"text","required":true,"labels":{"en":"Target Class","uk":"Клас для зарахування","pl":"Klasa docelowa"}},{"name":"previous_school_number","type":"text","required":true,"labels":{"en":"Previous School Number","uk":"Номер попередньої школи","pl":"Numer poprzedniej szkoły"}}]',
                [
                    'en' => ['title' => 'School Transfer Request', 'description' => 'Application to enroll a child in a new school due to relocation or other reasons.'],
                    'uk' => ['title' => 'Заява про зарахування до школи', 'description' => 'Заява про зарахування дитини до нової школи у зв\'язку з переїздом чи іншими причинами.'],
                    'pl' => ['title' => 'Wniosek o przyjęcie do szkoły', 'description' => 'Wniosek o przyjęcie dziecka do nowej szkoły z powodu przeprowadzki lub innych przyczyn.'],
                ]
            );
        }

        // --- Категорія: Housing Issues ---
        if ($housingCategory) {
            $this->createTemplate(
                $housingCategory->id,
                'neighbor-complaint',
                'pdf.templates.housing.neighbor-complaint',
                '[{"name":"authority_name","type":"text","required":true,"labels":{"en":"Authority Name (e.g., Police, Housing Association)","uk":"Назва органу (напр. Поліція, ЖЕК)","pl":"Nazwa organu (np. Policja, Spółdzielnia Mieszkaniowa)"}},{"name":"applicant_full_name","type":"text","required":true,"labels":{"en":"Your Full Name (genitive)","uk":"Ваше ПІБ (в род. відмінку)","pl":"Twoje imię i nazwisko (dopełniacz)"}},{"name":"applicant_name_short","type":"text","required":true,"labels":{"en":"Your Short Name (I. Surname)","uk":"Ваше прізвище та ініціали","pl":"Twoje nazwisko i inicjały"}},{"name":"applicant_address","type":"textarea","required":true,"labels":{"en":"Your Address","uk":"Ваша адреса","pl":"Twój adres"}},{"name":"applicant_phone","type":"text","required":true,"labels":{"en":"Your Phone Number","uk":"Ваш номер телефону","pl":"Twój numer telefonu"}},{"name":"neighbor_address","type":"text","required":true,"labels":{"en":"Neighbor\'s Address (Apartment number)","uk":"Адреса сусідів (номер квартири)","pl":"Adres sąsiada (numer mieszkania)"}},{"name":"incident_description","type":"textarea","required":true,"labels":{"en":"Description of the Incident","uk":"Опис інциденту","pl":"Opis incydentu"}}]',
                [
                    'en' => ['title' => 'Complaint About Neighbors', 'description' => 'A formal complaint regarding issues with neighbors, such as noise or inappropriate behavior.'],
                    'uk' => ['title' => 'Скарга на сусідів', 'description' => 'Офіційна скарга стосовно проблем із сусідами, таких як шум або неналежна поведінка.'],
                    'pl' => ['title' => 'Skarga na sąsiadów', 'description' => 'Formalna skarga dotycząca problemów z sąsiadami, takich jak hałas czy niewłaściwe zachowanie.'],
                ]
            );
            $this->createTemplate(
                $housingCategory->id,
                'leaking-roof-statement',
                'pdf.templates.housing.leaking-roof-statement',
                '[{"name":"utility_company_name","type":"text","required":true,"labels":{"en":"Utility Company Name (genitive)","uk":"Назва комунальної служби (в род. відмінку)","pl":"Nazwa firmy komunalnej (dopełniacz)"}},{"name":"resident_full_name","type":"text","required":true,"labels":{"en":"Resident\'s Full Name (genitive)","uk":"ПІБ мешканця (в род. відмінку)","pl":"Imię i nazwisko mieszkańca (dopełniacz)"}},{"name":"resident_address","type":"text","required":true,"labels":{"en":"Resident\'s Address","uk":"Адреса мешканця","pl":"Adres mieszkańca"}},{"name":"resident_phone","type":"text","required":true,"labels":{"en":"Resident\'s Phone","uk":"Телефон мешканця","pl":"Telefon mieszkańca"}},{"name":"leak_start_date","type":"date","required":true,"labels":{"en":"Approximate leak start date","uk":"Приблизна дата початку протікання","pl":"Przybliżona data rozpoczęcia przecieku"}},{"name":"leak_locations","type":"text","required":true,"labels":{"en":"Leak locations (e.g., kitchen, bedroom)","uk":"Місця протікання (напр. кухня, спальня)","pl":"Miejsca przecieku (np. kuchnia, sypialnia)"}},{"name":"damages_description","type":"textarea","required":true,"labels":{"en":"Description of damages","uk":"Опис завданих збитків","pl":"Opis szkód"}}]',
                [
                    'en' => ['title' => 'Leaking Roof Statement', 'description' => 'A formal claim to the utility company regarding a roof leak and resulting damages.'],
                    'uk' => ['title' => 'Заява про протікання даху', 'description' => 'Офіційна заява-претензія до комунальної служби щодо протікання даху та завданих збитків.'],
                    'pl' => ['title' => 'Zgłoszenie przeciekającego dachu', 'description' => 'Formalne roszczenie do przedsiębiorstwa komunalnego w sprawie przeciekającego dachu i wynikłych szkód.'],
                ]
            );
        }

        // --- Категорія: Government Agencies ---
        if ($govCategory) {
            $this->createTemplate(
                $govCategory->id,
                'information-request',
                'pdf.templates.government.info-request',
                '[{"name":"authority_full_name","type":"text","required":true,"labels":{"en":"Full Name of Authority/Official (dative)","uk":"Повна назва органу/посадової особи (в дав. відмінку)","pl":"Pełna nazwa organu/urzędnika (celownik)"}},{"name":"requester_full_name","type":"text","required":true,"labels":{"en":"Requester\'s Full Name (genitive)","uk":"ПІБ запитувача (в род. відмінку)","pl":"Imię i nazwisko wnioskodawcy (dopełniacz)"}},{"name":"requester_name_short","type":"text","required":true,"labels":{"en":"Requester\'s Short Name (I. Surname)","uk":"Прізвище та ініціали запитувача","pl":"Nazwisko i inicjały wnioskodawcy"}},{"name":"requester_address","type":"text","required":true,"labels":{"en":"Address for reply","uk":"Адреса для відповіді","pl":"Adres do odpowiedzi"}},{"name":"requester_email","type":"email","required":true,"labels":{"en":"Email for reply","uk":"Email для відповіді","pl":"Email do odpowiedzi"}},{"name":"information_details","type":"textarea","required":true,"labels":{"en":"Detailed description of the requested information","uk":"Детальний опис інформації, що запитується","pl":"Szczegółowy opis żądanej informacji"}}]',
                [
                    'en' => ['title' => 'Request for Public Information', 'description' => 'A request to a government body for public information under the Freedom of Information Act.'],
                    'uk' => ['title' => 'Запит на отримання публічної інформації', 'description' => 'Запит до органу влади на отримання публічної інформації відповідно до закону "Про доступ до публічної інформації".'],
                    'pl' => ['title' => 'Wniosek o udostępnienie informacji publicznej', 'description' => 'Wniosek do organu władzy o udostępnienie informacji publicznej na podstawie ustawy o dostępie do informacji publicznej.'],
                ]
            );
        }

        // --- Категорія: Legal & Claims ---
        if ($legalCategory) {
            $this->createTemplate(
                $legalCategory->id,
                'demand-letter-debt',
                'pdf.templates.legal.demand-letter-debt',
                '[{"name":"creditor_full_name","type":"text","required":true,"labels":{"en":"Creditor\'s Full Name/Company Name","uk":"ПІБ/Назва компанії кредитора","pl":"Imię i nazwisko/Nazwa firmy wierzyciela"}},{"name":"creditor_name_short","type":"text","required":true,"labels":{"en":"Creditor\'s Short Name (I. Surname)","uk":"Прізвище та ініціали кредитора","pl":"Nazwisko i inicjały wierzyciela"}},{"name":"creditor_address","type":"text","required":true,"labels":{"en":"Creditor\'s Address","uk":"Адреса кредитора","pl":"Adres wierzyciela"}},{"name":"debtor_full_name","type":"text","required":true,"labels":{"en":"Debtor\'s Full Name/Company Name","uk":"ПІБ/Назва компанії боржника","pl":"Imię i nazwisko/Nazwa firmy dłużnika"}},{"name":"debtor_address","type":"text","required":true,"labels":{"en":"Debtor\'s Address","uk":"Адреса боржника","pl":"Adres dłużnika"}},{"name":"debt_amount","type":"number","required":true,"labels":{"en":"Debt Amount","uk":"Сума боргу","pl":"Kwota długu"}},{"name":"debt_origin","type":"text","required":true,"labels":{"en":"Basis for the debt (e.g., loan agreement, receipt)","uk":"Підстава виникнення боргу (напр. договір позики, розписка)","pl":"Podstawa długu (np. umowa pożyczki, pokwitowanie)"}},{"name":"payment_due_date","type":"date","required":true,"labels":{"en":"Payment Due Date","uk":"Термін сплати боргу","pl":"Termin spłaty długu"}}]',
                [
                    'en' => ['title' => 'Debt Demand Letter', 'description' => 'A pre-trial claim demanding the repayment of a debt. The first step before going to court.'],
                    'uk' => ['title' => 'Досудова вимога про сплату боргу', 'description' => 'Досудова претензія з вимогою повернути борг. Перший крок перед зверненням до суду.'],
                    'pl' => ['title' => 'Wezwanie do zapłaty długu', 'description' => 'Przedsądowe wezwanie do zwrotu długu. Pierwszy krok przed skierowaniem sprawy do sądu.'],
                ]
            );
        }

        // --- Категорія: Medicine ---
        if ($medicineCategory) {
            $this->createTemplate(
                $medicineCategory->id,
                'medical-records-request',
                'pdf.templates.medicine.medical-records-request',
                '[{"name":"clinic_name","type":"text","required":true,"labels":{"en":"Medical Facility Name","uk":"Назва медичного закладу","pl":"Nazwa placówki medycznej"}},{"name":"clinic_head_name","type":"text","required":true,"labels":{"en":"Head Doctor\'s Full Name (dative)","uk":"ПІБ головного лікаря (в дав. відмінку)","pl":"Imię i nazwisko lekarza naczelnego (celownik)"}},{"name":"patient_full_name","type":"text","required":true,"labels":{"en":"Patient\'s Full Name (genitive)","uk":"ПІБ пацієнта (в род. відмінку)","pl":"Imię i nazwisko pacjenta (dopełniacz)"}},{"name":"patient_birth_date","type":"date","required":true,"labels":{"en":"Patient\'s Date of Birth","uk":"Дата народження пацієнта","pl":"Data urodzenia pacjenta"}},{"name":"patient_address","type":"text","required":true,"labels":{"en":"Patient\'s Address","uk":"Адреса пацієнта","pl":"Adres pacjenta"}},{"name":"period_start_date","type":"date","required":true,"labels":{"en":"Period Start Date","uk":"Дата початку періоду","pl":"Data rozpoczęcia okresu"}},{"name":"period_end_date","type":"date","required":true,"labels":{"en":"Period End Date","uk":"Дата закінчення періоду","pl":"Data zakończenia okresu"}},{"name":"reason","type":"text","required":true,"labels":{"en":"Reason for request (e.g., consultation with another specialist)","uk":"Причина запиту (напр. консультація в іншого фахівця)","pl":"Powód wniosku (np. konsultacja u innego specjalisty)"}}]',
                [
                    'en' => ['title' => 'Request for Medical Records', 'description' => 'A formal request to a medical facility for copies of a patient\'s medical records.'],
                    'uk' => ['title' => 'Запит на отримання медичної документації', 'description' => 'Офіційний запит до медичного закладу про надання копій медичної документації пацієнта.'],
                    'pl' => ['title' => 'Wniosek o udostępnienie dokumentacji medycznej', 'description' => 'Formalny wniosek do placówki medycznej o udostępnienie kopii dokumentacji medycznej pacjenta.'],
                ]
            );
        }
    }

    /**
     * Допоміжна функція для створення шаблону та його перекладів.
     *
     * @param integer $categoryId
     * @param string $slug
     * @param string $bladeView
     * @param string $fields
     * @param array $translations
     * @return void
     */
    private function createTemplate(int $categoryId, string $slug, string $bladeView, string $fields, array $translations): void
    {
        // Ця перевірка запобігає створенню дублікатів при повторному запуску сідера
        if (Template::where('slug', $slug)->exists()) {
            return;
        }

        $template = Template::create([
            'category_id' => $categoryId,
            'slug'        => $slug,
            'blade_view'  => $bladeView,
            'fields'      => $fields,
            'is_active'   => true,
        ]);

        foreach ($translations as $locale => $data) {
            $template->translations()->create([
                'locale'      => $locale,
                'title'       => $data['title'],
                'description' => $data['description'],
            ]);
        }
    }
}
