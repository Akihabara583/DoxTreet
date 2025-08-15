<?php

namespace Database\Seeders\PL;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class PlStandardUniversityAdmissionTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds for the Polish University Admission Package 2025.
     */
    public function run(): void
    {
        // Предполагаем, что категории 'school-education-pl' и 'personal-family-pl' существуют
        $catEdu = Category::where('slug', 'school-education-pl')->firstOrFail();
        $catFamily = Category::where('slug', 'personal-family-pl')->firstOrFail();

        $templatesData = [
            // === ПАКЕТ "ПОСТУПЛЕНИЕ В УНИВЕРСИТЕТ" ===

            // 1. Заявление о приеме в ВУЗ (Formularz rekrutacyjny) - ОБНОВЛЕНО 2025
            [
                'category_id' => $catEdu->id,
                'slug' => 'pl-university-application-form-2025-updated',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"university_name","type":"text","required":true,"labels":{"pl":"Nazwa uczelni","en":"University Name","uk":"Назва університету","de":"Name der Universität"}},
                    {"name":"faculty_name","type":"text","required":true,"labels":{"pl":"Wydział","en":"Faculty","uk":"Факультет","de":"Fakultät"}},
                    {"name":"field_of_study","type":"text","required":true,"labels":{"pl":"Kierunek studiów","en":"Field of Study","uk":"Напрям навчання","de":"Studienrichtung"}},
                    {"name":"study_level","type":"select","options":{"pierwszego_stopnia":"Studia pierwszego stopnia (Licencjat/Inżynier)","drugiego_stopnia":"Studia drugiego stopnia (Magister)","jednolite_magisterskie":"Jednolite studia magisterskie","doktoranckie":"Studia doktoranckie"},"required":true,"labels":{"pl":"Poziom studiów","en":"Level of Study","uk":"Рівень навчання","de":"Studienebene"}},
                    {"name":"study_mode","type":"select","options":{"stacjonarne":"Stacjonarne (dzienne)","niestacjonarne":"Niestacjonarne (zaoczne)","wieczorowe":"Wieczorowe"},"required":true,"labels":{"pl":"Tryb studiów","en":"Mode of Study","uk":"Форма навчання","de":"Studienmodus"}},

                    {"name":"candidate_surname","type":"text","required":true,"labels":{"pl":"Nazwisko kandydata","en":"Candidate\'s Surname","uk":"Прізвище кандидата","de":"Nachname des Kandidaten"}},
                    {"name":"candidate_first_name","type":"text","required":true,"labels":{"pl":"Imię kandydata","en":"Candidate\'s First Name","uk":"Ім\'я кандидата","de":"Vorname des Kandidaten"}},
                    {"name":"candidate_birth_date","type":"date","required":true,"labels":{"pl":"Data urodzenia","en":"Date of Birth","uk":"Дата народження","de":"Geburtsdatum"}},
                    {"name":"candidate_birth_place","type":"text","required":true,"labels":{"pl":"Miejsce urodzenia","en":"Place of Birth","uk":"Місце народження","de":"Geburtsort"}},
                    {"name":"candidate_pesel","type":"text","required":false,"labels":{"pl":"Numer PESEL (jeśli posiada)","en":"PESEL Number (if applicable)","uk":"Номер PESEL (якщо є)","de":"PESEL-Nummer (falls vorhanden)"}},
                    {"name":"candidate_passport_no","type":"text","required":true,"labels":{"pl":"Numer paszportu","en":"Passport Number","uk":"Номер паспорта","de":"Reisepassnummer"}},
                    {"name":"candidate_citizenship","type":"text","required":true,"labels":{"pl":"Obywatelstwo","en":"Citizenship","uk":"Громадянство","de":"Staatsangehörigkeit"}},

                    {"name":"candidate_address","type":"textarea","required":true,"labels":{"pl":"Adres zamieszkania","en":"Address of Residence","uk":"Адреса проживання","de":"Wohnadresse"}},
                    {"name":"candidate_corr_address","type":"textarea","required":true,"labels":{"pl":"Adres do korespondencji","en":"Correspondence Address","uk":"Адреса для листування","de":"Korrespondenzadresse"}},
                    {"name":"candidate_email","type":"email","required":true,"labels":{"pl":"Adres e-mail","en":"E-mail Address","uk":"Електронна пошта","de":"E-Mail-Adresse"}},
                    {"name":"candidate_phone","type":"text","required":true,"labels":{"pl":"Numer telefonu","en":"Phone Number","uk":"Номер телефону","de":"Telefonnummer"}},

                    {"name":"high_school_diploma_no","type":"text","required":true,"labels":{"pl":"Numer świadectwa dojrzałości (atestatu)","en":"High School Diploma Number","uk":"Номер атестату","de":"Abiturzeugnisnummer"}},
                    {"name":"high_school_issue_date","type":"date","required":true,"labels":{"pl":"Data wystawienia świadectwa","en":"Diploma Issue Date","uk":"Дата видачі атестату","de":"Ausstellungsdatum des Zeugnisses"}},
                    {"name":"high_school_issuer","type":"text","required":true,"labels":{"pl":"Organ wydający świadectwo","en":"Issuing Authority","uk":"Орган, що видав атестат","de":"Ausstellende Behörde"}},
                    {"name":"education_legalization_status","type":"select","options":{"apostille":"Dokumenty zawerzone apostille","legalized":"Dokumenty zlegalizowane","in_process":"W trakcie legalizacji","not_required":"Legalizacja nie wymagana"},"required":true,"labels":{"pl":"Status legalizacji dokumentów","en":"Document Legalization Status","uk":"Статус легалізації документів","de":"Status der Dokumentenlegalisierung"}},

                    {"name":"language_certificate","type":"text","required":false,"labels":{"pl":"Certyfikat językowy (nazwa i wynik)","en":"Language Certificate (name and score)","uk":"Мовний сертифікат (назва та результат)","de":"Sprachzertifikat (Name und Ergebnis)"}},
                    {"name":"entrance_exam_required","type":"select","options":{"yes":"Tak","no":"Nie","exempt":"Zwolniony"},"required":true,"labels":{"pl":"Czy wymagany jest egzamin wstępny?","en":"Is entrance exam required?","uk":"Чи потрібен вступний іспит?","de":"Ist eine Aufnahmeprüfung erforderlich?"}},
                    {"name":"exemption_basis","type":"text","required":false,"labels":{"pl":"Podstawa zwolnienia z egzaminu (jeśli dotyczy)","en":"Basis for exam exemption (if applicable)","uk":"Підстава звільнення від іспиту (якщо застосовується)","de":"Grundlage für Prüfungsbefreiung (falls zutreffend)"}},

                    {"name":"additional_achievements","type":"textarea","required":false,"labels":{"pl":"Dodatkowe osiągnięcia/portfolio","en":"Additional achievements/portfolio","uk":"Додаткові досягнення/портфоліо","de":"Zusätzliche Leistungen/Portfolio"}},
                    {"name":"medical_certificate","type":"select","options":{"yes":"Tak","no":"Nie","not_applicable":"Nie dotyczy"},"required":false,"labels":{"pl":"Czy dołączono zaświadczenie lekarskie?","en":"Is medical certificate attached?","uk":"Чи додається медична довідка?","de":"Ist ein ärztliches Attest beigefügt?"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Formularz rekrutacyjny na studia',
                        'description' => 'Aktualny formularz aplikacyjny (podanie o przyjęcie) na studia wyższe w Polsce z uwzględnieniem nowych wymogów 2025.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">PODANIE O PRZYJĘCIE NA STUDIA</h1><p style="font-size: 12px; margin-top: 10px;">ROK AKADEMICKI 2025/2026</p></div>',
                        'body_html' => '
                        <p style="font-size: 12px;">Do Komisji Rekrutacyjnej<br><strong>[[university_name]]</strong><br>Wydział: [[faculty_name]]</p>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ A: DANE OSOBOWE KANDYDATA</h3>
                        <table style="width: 100%; font-size: 11px; border-collapse: collapse; margin-bottom: 15px;">
                            <tr><td style="padding: 6px; border: 1px solid #ccc; width: 30%; background-color: #f8f8f8;">Nazwisko:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[candidate_surname]]</strong></td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Imię:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[candidate_first_name]]</strong></td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Data urodzenia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_birth_date]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Miejsce urodzenia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_birth_place]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Obywatelstwo:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_citizenship]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Numer paszportu:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_passport_no]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Numer PESEL:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_pesel]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Adres zamieszkania:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_address]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Adres korespondencyjny:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_corr_address]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">E-mail:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_email]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Telefon:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_phone]]</td></tr>
                        </table>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ B: WYBRANY KIERUNEK STUDIÓW</h3>
                        <table style="width: 100%; font-size: 11px; border-collapse: collapse; margin-bottom: 15px;">
                            <tr><td style="padding: 6px; border: 1px solid #ccc; width: 30%; background-color: #f8f8f8;">Wydział:</td><td style="padding: 6px; border: 1px solid #ccc;">[[faculty_name]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Kierunek:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[field_of_study]]</strong></td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Poziom:</td><td style="padding: 6px; border: 1px solid #ccc;">[[study_level]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Tryb:</td><td style="padding: 6px; border: 1px solid #ccc;">[[study_mode]]</td></tr>
                        </table>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ C: WYKSZTAŁCENIE I DOKUMENTY</h3>
                        <div style="font-size: 11px; margin-bottom: 15px;">
                            <p><strong>Świadectwo dojrzałości/dokument równoważny:</strong></p>
                            <table style="width: 100%; border-collapse: collapse; margin-top: 8px;">
                                <tr><td style="padding: 6px; border: 1px solid #ccc; width: 30%; background-color: #f8f8f8;">Numer dokumentu:</td><td style="padding: 6px; border: 1px solid #ccc;">[[high_school_diploma_no]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Data wystawienia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[high_school_issue_date]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Organ wydający:</td><td style="padding: 6px; border: 1px solid #ccc;">[[high_school_issuer]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Status legalizacji:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[education_legalization_status]]</strong></td></tr>
                            </table>
                        </div>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ D: EGZAMINY WSTĘPNE I KWALIFIKACJE (obowiązuje od lipca 2025)</h3>
                        <div style="font-size: 11px; margin-bottom: 15px;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr><td style="padding: 6px; border: 1px solid #ccc; width: 40%; background-color: #f8f8f8;">Wymagany egzamin wstępny:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[entrance_exam_required]]</strong></td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Podstawa zwolnienia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[exemption_basis]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Certyfikat językowy:</td><td style="padding: 6px; border: 1px solid #ccc;">[[language_certificate]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Zaświadczenie lekarskie:</td><td style="padding: 6px; border: 1px solid #ccc;">[[medical_certificate]]</td></tr>
                            </table>
                            <div style="margin-top: 10px;">
                                <p><strong>Dodatkowe osiągnięcia/Portfolio:</strong></p>
                                <div style="border: 1px solid #ccc; padding: 8px; min-height: 40px; background-color: #fafafa;">[[additional_achievements]]</div>
                            </div>
                        </div>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">OŚWIADCZENIA</h3>
                        <div style="font-size: 11px; line-height: 1.6;">
                            <p style="margin-bottom: 10px;">1. Oświadczam, że podane dane są zgodne z prawdą. Jestem świadomy/a odpowiedzialności karnej za składanie fałszywych oświadczeń.</p>
                            <p style="margin-bottom: 10px;">2. Oświadczam, że zapoznałem/am się z regulaminem studiów oraz procedurą rekrutacyjną.</p>
                            <p style="margin-bottom: 10px;">3. <strong>ZGODA NA PRZETWARZANIE DANYCH OSOBOWYCH (RODO):</strong><br>
                            Wyrażam zgodę na przetwarzanie moich danych osobowych przez [[university_name]] w celu przeprowadzenia procesu rekrutacyjnego zgodnie z Rozporządzeniem Parlamentu Europejskiego i Rady (UE) 2016/679 (RODO). Zostałem/am poinformowany/a o prawie dostępu do swoich danych oraz ich poprawiania.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 40px; font-size: 12px;"><div style="display: flex; justify-content: space-between;"><div>Data: ........................</div><div style="text-align: right;">........................................<br>(Czytelny podpis kandydata)</div></div></div>'
                    ],
                    'en' => [
                        'title' => 'University Application Form ',
                        'description' => 'Current university application form for higher education in Poland including new 2025 requirements.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">PODANIE O PRZYJĘCIE NA STUDIA</h1><p style="font-size: 12px; margin-top: 10px;">ROK AKADEMICKI 2025/2026</p></div>',
                        'body_html' => '
                        <p style="font-size: 12px;">Do Komisji Rekrutacyjnej<br><strong>[[university_name]]</strong><br>Wydział: [[faculty_name]]</p>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ A: DANE OSOBOWE KANDYDATA</h3>
                        <table style="width: 100%; font-size: 11px; border-collapse: collapse; margin-bottom: 15px;">
                            <tr><td style="padding: 6px; border: 1px solid #ccc; width: 30%; background-color: #f8f8f8;">Nazwisko:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[candidate_surname]]</strong></td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Imię:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[candidate_first_name]]</strong></td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Data urodzenia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_birth_date]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Miejsce urodzenia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_birth_place]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Obywatelstwo:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_citizenship]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Numer paszportu:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_passport_no]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Numer PESEL:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_pesel]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Adres zamieszkania:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_address]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Adres korespondencyjny:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_corr_address]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">E-mail:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_email]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Telefon:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_phone]]</td></tr>
                        </table>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ B: WYBRANY KIERUNEK STUDIÓW</h3>
                        <table style="width: 100%; font-size: 11px; border-collapse: collapse; margin-bottom: 15px;">
                            <tr><td style="padding: 6px; border: 1px solid #ccc; width: 30%; background-color: #f8f8f8;">Wydział:</td><td style="padding: 6px; border: 1px solid #ccc;">[[faculty_name]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Kierunek:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[field_of_study]]</strong></td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Poziom:</td><td style="padding: 6px; border: 1px solid #ccc;">[[study_level]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Tryb:</td><td style="padding: 6px; border: 1px solid #ccc;">[[study_mode]]</td></tr>
                        </table>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ C: WYKSZTAŁCENIE I DOKUMENTY</h3>
                        <div style="font-size: 11px; margin-bottom: 15px;">
                            <p><strong>Świadectwo dojrzałości/dokument równoważny:</strong></p>
                            <table style="width: 100%; border-collapse: collapse; margin-top: 8px;">
                                <tr><td style="padding: 6px; border: 1px solid #ccc; width: 30%; background-color: #f8f8f8;">Numer dokumentu:</td><td style="padding: 6px; border: 1px solid #ccc;">[[high_school_diploma_no]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Data wystawienia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[high_school_issue_date]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Organ wydający:</td><td style="padding: 6px; border: 1px solid #ccc;">[[high_school_issuer]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Status legalizacji:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[education_legalization_status]]</strong></td></tr>
                            </table>
                        </div>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ D: EGZAMINY WSTĘPNE I KWALIFIKACJE (obowiązuje od lipca 2025)</h3>
                        <div style="font-size: 11px; margin-bottom: 15px;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr><td style="padding: 6px; border: 1px solid #ccc; width: 40%; background-color: #f8f8f8;">Wymagany egzamin wstępny:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[entrance_exam_required]]</strong></td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Podstawa zwolnienia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[exemption_basis]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Certyfikat językowy:</td><td style="padding: 6px; border: 1px solid #ccc;">[[language_certificate]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Zaświadczenie lekarskie:</td><td style="padding: 6px; border: 1px solid #ccc;">[[medical_certificate]]</td></tr>
                            </table>
                            <div style="margin-top: 10px;">
                                <p><strong>Dodatkowe osiągnięcia/Portfolio:</strong></p>
                                <div style="border: 1px solid #ccc; padding: 8px; min-height: 40px; background-color: #fafafa;">[[additional_achievements]]</div>
                            </div>
                        </div>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">OŚWIADCZENIA</h3>
                        <div style="font-size: 11px; line-height: 1.6;">
                            <p style="margin-bottom: 10px;">1. Oświadczam, że podane dane są zgodne z prawdą. Jestem świadomy/a odpowiedzialności karnej za składanie fałszywych oświadczeń.</p>
                            <p style="margin-bottom: 10px;">2. Oświadczam, że zapoznałem/am się z regulaminem studiów oraz procedurą rekrutacyjną.</p>
                            <p style="margin-bottom: 10px;">3. <strong>ZGODA NA PRZETWARZANIE DANYCH OSOBOWYCH (RODO):</strong><br>
                            Wyrażam zgodę na przetwarzanie moich danych osobowych przez [[university_name]] w celu przeprowadzenia procesu rekrutacyjnego zgodnie z Rozporządzeniem Parlamentu Europejskiego i Rady (UE) 2016/679 (RODO). Zostałem/am poinformowany/a o prawie dostępu do swoich danych oraz ich poprawiania.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 40px; font-size: 12px;"><div style="display: flex; justify-content: space-between;"><div>Data: ........................</div><div style="text-align: right;">........................................<br>(Czytelny podpis kandydata)</div></div></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на вступ до університету ',
                        'description' => 'Актуальна форма заяви на вступ до вищого навчального закладу Польщі з урахуванням нових вимог 2025 року.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">PODANIE O PRZYJĘCIE NA STUDIA</h1><p style="font-size: 12px; margin-top: 10px;">ROK AKADEMICKI 2025/2026</p></div>',
                        'body_html' => '
                        <p style="font-size: 12px;">Do Komisji Rekrutacyjnej<br><strong>[[university_name]]</strong><br>Wydział: [[faculty_name]]</p>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ A: DANE OSOBOWE KANDYDATA</h3>
                        <table style="width: 100%; font-size: 11px; border-collapse: collapse; margin-bottom: 15px;">
                            <tr><td style="padding: 6px; border: 1px solid #ccc; width: 30%; background-color: #f8f8f8;">Nazwisko:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[candidate_surname]]</strong></td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Imię:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[candidate_first_name]]</strong></td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Data urodzenia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_birth_date]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Miejsce urodzenia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_birth_place]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Obywatelstwo:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_citizenship]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Numer paszportu:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_passport_no]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Numer PESEL:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_pesel]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Adres zamieszkania:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_address]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Adres korespondencyjny:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_corr_address]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">E-mail:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_email]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Telefon:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_phone]]</td></tr>
                        </table>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ B: WYBRANY KIERUNEK STUDIÓW</h3>
                        <table style="width: 100%; font-size: 11px; border-collapse: collapse; margin-bottom: 15px;">
                            <tr><td style="padding: 6px; border: 1px solid #ccc; width: 30%; background-color: #f8f8f8;">Wydział:</td><td style="padding: 6px; border: 1px solid #ccc;">[[faculty_name]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Kierunek:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[field_of_study]]</strong></td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Poziom:</td><td style="padding: 6px; border: 1px solid #ccc;">[[study_level]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Tryb:</td><td style="padding: 6px; border: 1px solid #ccc;">[[study_mode]]</td></tr>
                        </table>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ C: WYKSZTAŁCENIE I DOKUMENTY</h3>
                        <div style="font-size: 11px; margin-bottom: 15px;">
                            <p><strong>Świadectwo dojrzałości/dokument równoważny:</strong></p>
                            <table style="width: 100%; border-collapse: collapse; margin-top: 8px;">
                                <tr><td style="padding: 6px; border: 1px solid #ccc; width: 30%; background-color: #f8f8f8;">Numer dokumentu:</td><td style="padding: 6px; border: 1px solid #ccc;">[[high_school_diploma_no]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Data wystawienia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[high_school_issue_date]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Organ wydający:</td><td style="padding: 6px; border: 1px solid #ccc;">[[high_school_issuer]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Status legalizacji:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[education_legalization_status]]</strong></td></tr>
                            </table>
                        </div>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ D: EGZAMINY WSTĘPNE I KWALIFIKACJE (obowiązuje od lipca 2025)</h3>
                        <div style="font-size: 11px; margin-bottom: 15px;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr><td style="padding: 6px; border: 1px solid #ccc; width: 40%; background-color: #f8f8f8;">Wymagany egzamin wstępny:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[entrance_exam_required]]</strong></td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Podstawa zwolnienia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[exemption_basis]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Certyfikat językowy:</td><td style="padding: 6px; border: 1px solid #ccc;">[[language_certificate]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Zaświadczenie lekarskie:</td><td style="padding: 6px; border: 1px solid #ccc;">[[medical_certificate]]</td></tr>
                            </table>
                            <div style="margin-top: 10px;">
                                <p><strong>Dodatkowe osiągnięcia/Portfolio:</strong></p>
                                <div style="border: 1px solid #ccc; padding: 8px; min-height: 40px; background-color: #fafafa;">[[additional_achievements]]</div>
                            </div>
                        </div>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">OŚWIADCZENIA</h3>
                        <div style="font-size: 11px; line-height: 1.6;">
                            <p style="margin-bottom: 10px;">1. Oświadczam, że podane dane są zgodne z prawdą. Jestem świadomy/a odpowiedzialności karnej za składanie fałszywych oświadczeń.</p>
                            <p style="margin-bottom: 10px;">2. Oświadczam, że zapoznałem/am się z regulaminem studiów oraz procedurą rekrutacyjną.</p>
                            <p style="margin-bottom: 10px;">3. <strong>ZGODA NA PRZETWARZANIE DANYCH OSOBOWYCH (RODO):</strong><br>
                            Wyrażam zgodę na przetwarzanie moich danych osobowych przez [[university_name]] w celu przeprowadzenia procesu rekrutacyjnego zgodnie z Rozporządzeniem Parlamentu Europejskiego i Rady (UE) 2016/679 (RODO). Zostałem/am poinformowany/a o prawie dostępu do swoich danych oraz ich poprawiania.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 40px; font-size: 12px;"><div style="display: flex; justify-content: space-between;"><div>Data: ........................</div><div style="text-align: right;">........................................<br>(Czytelny podpis kandydata)</div></div></div>'
                    ],
                    'de' => [
                        'title' => 'Universitätsbewerbungsformular ',
                        'description' => 'Aktuelles Bewerbungsformular für die Hochschulbildung in Polen unter Berücksichtigung der neuen Anforderungen 2025.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">PODANIE O PRZYJĘCIE NA STUDIA</h1><p style="font-size: 12px; margin-top: 10px;">ROK AKADEMICKI 2025/2026</p></div>',
                        'body_html' => '
                        <p style="font-size: 12px;">Do Komisji Rekrutacyjnej<br><strong>[[university_name]]</strong><br>Wydział: [[faculty_name]]</p>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ A: DANE OSOBOWE KANDYDATA</h3>
                        <table style="width: 100%; font-size: 11px; border-collapse: collapse; margin-bottom: 15px;">
                            <tr><td style="padding: 6px; border: 1px solid #ccc; width: 30%; background-color: #f8f8f8;">Nazwisko:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[candidate_surname]]</strong></td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Imię:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[candidate_first_name]]</strong></td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Data urodzenia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_birth_date]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Miejsce urodzenia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_birth_place]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Obywatelstwo:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_citizenship]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Numer paszportu:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_passport_no]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Numer PESEL:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_pesel]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Adres zamieszkania:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_address]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Adres korespondencyjny:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_corr_address]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">E-mail:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_email]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Telefon:</td><td style="padding: 6px; border: 1px solid #ccc;">[[candidate_phone]]</td></tr>
                        </table>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ B: WYBRANY KIERUNEK STUDIÓW</h3>
                        <table style="width: 100%; font-size: 11px; border-collapse: collapse; margin-bottom: 15px;">
                            <tr><td style="padding: 6px; border: 1px solid #ccc; width: 30%; background-color: #f8f8f8;">Wydział:</td><td style="padding: 6px; border: 1px solid #ccc;">[[faculty_name]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Kierunek:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[field_of_study]]</strong></td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Poziom:</td><td style="padding: 6px; border: 1px solid #ccc;">[[study_level]]</td></tr>
                            <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Tryb:</td><td style="padding: 6px; border: 1px solid #ccc;">[[study_mode]]</td></tr>
                        </table>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ C: WYKSZTAŁCENIE I DOKUMENTY</h3>
                        <div style="font-size: 11px; margin-bottom: 15px;">
                            <p><strong>Świadectwo dojrzałości/dokument równoważny:</strong></p>
                            <table style="width: 100%; border-collapse: collapse; margin-top: 8px;">
                                <tr><td style="padding: 6px; border: 1px solid #ccc; width: 30%; background-color: #f8f8f8;">Numer dokumentu:</td><td style="padding: 6px; border: 1px solid #ccc;">[[high_school_diploma_no]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Data wystawienia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[high_school_issue_date]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Organ wydający:</td><td style="padding: 6px; border: 1px solid #ccc;">[[high_school_issuer]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Status legalizacji:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[education_legalization_status]]</strong></td></tr>
                            </table>
                        </div>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">CZĘŚĆ D: EGZAMINY WSTĘPNE I KWALIFIKACJE (obowiązuje od lipca 2025)</h3>
                        <div style="font-size: 11px; margin-bottom: 15px;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr><td style="padding: 6px; border: 1px solid #ccc; width: 40%; background-color: #f8f8f8;">Wymagany egzamin wstępny:</td><td style="padding: 6px; border: 1px solid #ccc;"><strong>[[entrance_exam_required]]</strong></td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Podstawa zwolnienia:</td><td style="padding: 6px; border: 1px solid #ccc;">[[exemption_basis]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Certyfikat językowy:</td><td style="padding: 6px; border: 1px solid #ccc;">[[language_certificate]]</td></tr>
                                <tr><td style="padding: 6px; border: 1px solid #ccc; background-color: #f8f8f8;">Zaświadczenie lekarskie:</td><td style="padding: 6px; border: 1px solid #ccc;">[[medical_certificate]]</td></tr>
                            </table>
                            <div style="margin-top: 10px;">
                                <p><strong>Dodatkowe osiągnięcia/Portfolio:</strong></p>
                                <div style="border: 1px solid #ccc; padding: 8px; min-height: 40px; background-color: #fafafa;">[[additional_achievements]]</div>
                            </div>
                        </div>

                        <h3 style="font-size: 13px; margin-top: 25px; background-color: #f0f0f0; padding: 8px;">OŚWIADCZENIA</h3>
                        <div style="font-size: 11px; line-height: 1.6;">
                            <p style="margin-bottom: 10px;">1. Oświadczam, że podane dane są zgodne z prawdą. Jestem świadomy/a odpowiedzialności karnej za składanie fałszywych oświadczeń.</p>
                            <p style="margin-bottom: 10px;">2. Oświadczam, że zapoznałem/am się z regulaminem studiów oraz procedurą rekrutacyjną.</p>
                            <p style="margin-bottom: 10px;">3. <strong>ZGODA NA PRZETWARZANIE DANYCH OSOBOWYCH (RODO):</strong><br>
                            Wyrażam zgodę na przetwarzanie moich danych osobowych przez [[university_name]] w celu przeprowadzenia procesu rekrutacyjnego zgodnie z Rozporządzeniem Parlamentu Europejskiego i Rady (UE) 2016/679 (RODO). Zostałem/am poinformowany/a o prawie dostępu do swoich danych oraz ich poprawiania.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 40px; font-size: 12px;"><div style="display: flex; justify-content: space-between;"><div>Data: ........................</div><div style="text-align: right;">........................................<br>(Czytelny podpis kandydata)</div></div></div>'
                    ],
                ]
            ],

            // 2. Мотивационное письмо - ОБНОВЛЕНО
            [
                'category_id' => $catEdu->id,
                'slug' => 'pl-university-motivation-letter-2025-updated',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"applicant_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko aplikanta","en":"Applicant\'s Full Name","uk":"Повне ім\'я заявника","de":"Vollständiger Name des Bewerbers"}},
                    {"name":"applicant_address","type":"textarea","required":true,"labels":{"pl":"Adres aplikanta","en":"Applicant\'s Address","uk":"Адреса заявника","de":"Adresse des Bewerbers"}},
                    {"name":"applicant_email","type":"email","required":true,"labels":{"pl":"Email aplikanta","en":"Applicant\'s Email","uk":"Email заявника","de":"E-Mail des Bewerbers"}},
                    {"name":"applicant_phone","type":"text","required":true,"labels":{"pl":"Numer telefonu","en":"Phone Number","uk":"Номер телефону","de":"Telefonnummer"}},
                    {"name":"letter_date_place","type":"text","required":true,"labels":{"pl":"Miejscowość i data","en":"Place and Date","uk":"Місцевість та дата","de":"Ort und Datum"}},
                    {"name":"university_department","type":"text","required":true,"labels":{"pl":"Adresat (np. Szanowna Komisja Rekrutacyjna Wydziału...)","en":"Recipient (e.g., Dear Admissions Committee of the Faculty of...)","uk":"Адресат (напр., Шановна Приймальна Комісія Факультету...)","de":"Empfänger (z.B. Sehr geehrte Zulassungskommission der Fakultät...)"}},
                    {"name":"chosen_major","type":"text","required":true,"labels":{"pl":"Wybrany kierunek studiów","en":"Chosen Field of Study","uk":"Обраний напрям навчання","de":"Gewählte Studienrichtung"}},
                    {"name":"study_level","type":"select","options":{"licencjat":"Licencjat","inzynier":"Inżynier","magister":"Magister","doktorat":"Doktorat"},"required":true,"labels":{"pl":"Poziom studiów","en":"Study Level","uk":"Рівень навчання","de":"Studienebene"}},
                    {"name":"introduction","type":"textarea","required":true,"labels":{"pl":"Wstęp (kim jesteś i na jaki kierunek aplikujesz)","en":"Introduction (who you are and what you are applying for)","uk":"Вступ (хто ви і на який напрям подаєте документи)","de":"Einleitung (wer Sie sind und wofür Sie sich bewerben)"}},
                    {"name":"academic_background","type":"textarea","required":true,"labels":{"pl":"Twoje wykształcenie i osiągnięcia akademickie","en":"Your education and academic achievements","uk":"Ваша освіта та академічні досягнення","de":"Ihre Ausbildung und akademischen Leistungen"}},
                    {"name":"motivation_body","type":"textarea","required":true,"labels":{"pl":"Rozwinięcie (dlaczego ten kierunek i ta uczelnia, Twoje zainteresowania, doświadczenie)","en":"Main Body (why this major and university, your interests, experience)","uk":"Основна частина (чому цей напрям та університет, ваші інтереси, досвід)","de":"Hauptteil (warum dieser Studiengang und diese Universität, Ihre Interessen, Erfahrungen)"}},
                    {"name":"relevant_experience","type":"textarea","required":false,"labels":{"pl":"Odpowiednie doświadczenie zawodowe/praktyki","en":"Relevant work experience/internships","uk":"Відповідний професійний досвід/практика","de":"Relevante Berufserfahrung/Praktika"}},
                    {"name":"future_goals","type":"textarea","required":true,"labels":{"pl":"Zakończenie (Twoje cele zawodowe i jak studia pomogą je osiągnąć)","en":"Conclusion (your career goals and how the studies will help you achieve them)","uk":"Висновок (ваші кар\'єрні цілі та як навчання допоможе їх досягти)","de":"Fazit (Ihre Karriereziele und wie das Studium Ihnen helfen wird, sie zu erreichen)"}},
                    {"name":"additional_info","type":"textarea","required":false,"labels":{"pl":"Dodatkowe informacje (języki, umiejętności, hobby)","en":"Additional information (languages, skills, hobbies)","uk":"Додаткова інформація (мови, навички, хобі)","de":"Zusätzliche Informationen (Sprachen, Fähigkeiten, Hobbys)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'List motywacyjny na studia',
                        'description' => 'Profesjonalny szablon listu motywacyjnego, kluczowego dokumentu w procesie rekrutacji na polskie uczelnie.',
                        'header_html' => '<div style="font-size: 12px; line-height: 1.5;"><div style="text-align: right; margin-bottom: 20px;">[[letter_date_place]]</div><div style="margin-bottom: 30px;"><strong>[[applicant_name]]</strong><br>[[applicant_address]]<br>Tel.: [[applicant_phone]]<br>Email: [[applicant_email]]</div><div style="margin-bottom: 30px;">[[university_department]]</div></div>',
                        'body_html' => '<h2 style="text-align: center; font-size: 16px; margin: 30px 0 25px; text-decoration: underline;">LIST MOTYWACYJNY</h2>
                        <div style="font-size: 12px; line-height: 1.7; text-align: justify;">
                        <p><strong>Dotyczy:</strong> Aplikacja na studia [[study_level]] na kierunek: <strong>[[chosen_major]]</strong></p>

                        <p style="margin-top: 20px;">Szanowni Państwo,</p>

                        <p>[[introduction]]</p>

                        <p><strong>Wykształcenie i osiągnięcia akademickie:</strong><br>
                        [[academic_background]]</p>

                        <p><strong>Motywacja i zainteresowania:</strong><br>
                        [[motivation_body]]</p>

                        <p><strong>Doświadczenie zawodowe:</strong><br>
                        [[relevant_experience]]</p>

                        <p><strong>Plany na przyszłość:</strong><br>
                        [[future_goals]]</p>

                        <p><strong>Informacje dodatkowe:</strong><br>
                        [[additional_info]]</p>

                        <p style="margin-top: 25px;">Mam nadzieję, że moja kandydatura spotka się z Państwa zainteresowaniem. Z przyjemnością wezmę udział w dalszych etapach rekrutacji i odpowiem na wszelkie pytania.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 50px; text-align: right; font-size: 12px;"><p>Z poważaniem,</p><p style="margin-top: 60px;"><em>........................................</em><br>([[applicant_name]])</p></div>'
                    ],
                    'en' => [
                        'title' => 'University Motivation Letter ',
                        'description' => 'Professional motivation letter template, a key document in the admission process to Polish universities.',
                        'header_html' => '<div style="font-size: 12px; line-height: 1.5;"><div style="text-align: right; margin-bottom: 20px;">[[letter_date_place]]</div><div style="margin-bottom: 30px;"><strong>[[applicant_name]]</strong><br>[[applicant_address]]<br>Tel.: [[applicant_phone]]<br>Email: [[applicant_email]]</div><div style="margin-bottom: 30px;">[[university_department]]</div></div>',
                        'body_html' => '<h2 style="text-align: center; font-size: 16px; margin: 30px 0 25px; text-decoration: underline;">LIST MOTYWACYJNY</h2>
                        <div style="font-size: 12px; line-height: 1.7; text-align: justify;">
                        <p><strong>Dotyczy:</strong> Aplikacja na studia [[study_level]] na kierunek: <strong>[[chosen_major]]</strong></p>

                        <p style="margin-top: 20px;">Szanowni Państwo,</p>

                        <p>[[introduction]]</p>

                        <p><strong>Wykształcenie i osiągnięcia akademickie:</strong><br>
                        [[academic_background]]</p>

                        <p><strong>Motywacja i zainteresowania:</strong><br>
                        [[motivation_body]]</p>

                        <p><strong>Doświadczenie zawodowe:</strong><br>
                        [[relevant_experience]]</p>

                        <p><strong>Plany na przyszłość:</strong><br>
                        [[future_goals]]</p>

                        <p><strong>Informacje dodatkowe:</strong><br>
                        [[additional_info]]</p>

                        <p style="margin-top: 25px;">Mam nadzieję, że moja kandydatura spotka się z Państwa zainteresowaniem. Z przyjemnością wezmę udział w dalszych etapach rekrutacji i odpowiem na wszelkie pytania.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 50px; text-align: right; font-size: 12px;"><p>Z poważaniem,</p><p style="margin-top: 60px;"><em>........................................</em><br>([[applicant_name]])</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Мотиваційний лист до університету ',
                        'description' => 'Професійний шаблон мотиваційного листа, ключовий документ у процесі вступу до польських університетів.',
                        'header_html' => '<div style="font-size: 12px; line-height: 1.5;"><div style="text-align: right; margin-bottom: 20px;">[[letter_date_place]]</div><div style="margin-bottom: 30px;"><strong>[[applicant_name]]</strong><br>[[applicant_address]]<br>Tel.: [[applicant_phone]]<br>Email: [[applicant_email]]</div><div style="margin-bottom: 30px;">[[university_department]]</div></div>',
                        'body_html' => '<h2 style="text-align: center; font-size: 16px; margin: 30px 0 25px; text-decoration: underline;">LIST MOTYWACYJNY</h2>
                        <div style="font-size: 12px; line-height: 1.7; text-align: justify;">
                        <p><strong>Dotyczy:</strong> Aplikacja na studia [[study_level]] na kierunek: <strong>[[chosen_major]]</strong></p>

                        <p style="margin-top: 20px;">Szanowni Państwo,</p>

                        <p>[[introduction]]</p>

                        <p><strong>Wykształcenie i osiągnięcia akademickie:</strong><br>
                        [[academic_background]]</p>

                        <p><strong>Motywacja i zainteresowania:</strong><br>
                        [[motivation_body]]</p>

                        <p><strong>Doświadczenie zawodowe:</strong><br>
                        [[relevant_experience]]</p>

                        <p><strong>Plany na przyszłość:</strong><br>
                        [[future_goals]]</p>

                        <p><strong>Informacje dodatkowe:</strong><br>
                        [[additional_info]]</p>

                        <p style="margin-top: 25px;">Mam nadzieję, że moja kandydatura spotka się z Państwa zainteresowaniem. Z przyjemnością wezmę udział w dalszych etapach rekrutacji i odpowiem na wszelkie pytania.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 50px; text-align: right; font-size: 12px;"><p>Z poważaniem,</p><p style="margin-top: 60px;"><em>........................................</em><br>([[applicant_name]])</p></div>'
                    ],
                    'de' => [
                        'title' => 'Universitäts-Motivationsschreiben ',
                        'description' => 'Professionelle Vorlage für ein Motivationsschreiben, ein Schlüsseldokument im Zulassungsverfahren an polnischen Universitäten.',
                        'header_html' => '<div style="font-size: 12px; line-height: 1.5;"><div style="text-align: right; margin-bottom: 20px;">[[letter_date_place]]</div><div style="margin-bottom: 30px;"><strong>[[applicant_name]]</strong><br>[[applicant_address]]<br>Tel.: [[applicant_phone]]<br>Email: [[applicant_email]]</div><div style="margin-bottom: 30px;">[[university_department]]</div></div>',
                        'body_html' => '<h2 style="text-align: center; font-size: 16px; margin: 30px 0 25px; text-decoration: underline;">LIST MOTYWACYJNY</h2>
                        <div style="font-size: 12px; line-height: 1.7; text-align: justify;">
                        <p><strong>Dotyczy:</strong> Aplikacja na studia [[study_level]] na kierunek: <strong>[[chosen_major]]</strong></p>

                        <p style="margin-top: 20px;">Szanowni Państwo,</p>

                        <p>[[introduction]]</p>

                        <p><strong>Wykształcenie i osiągnięcia akademickie:</strong><br>
                        [[academic_background]]</p>

                        <p><strong>Motywacja i zainteresowania:</strong><br>
                        [[motivation_body]]</p>

                        <p><strong>Doświadczenie zawodowe:</strong><br>
                        [[relevant_experience]]</p>

                        <p><strong>Plany na przyszłość:</strong><br>
                        [[future_goals]]</p>

                        <p><strong>Informacje dodatkowe:</strong><br>
                        [[additional_info]]</p>

                        <p style="margin-top: 25px;">Mam nadzieję, że moja kandydatura spotka się z Państwa zainteresowaniem. Z przyjemnością wezmę udział w dalszych etapach rekrutacji i odpowiem na wszelkie pytania.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 50px; text-align: right; font-size: 12px;"><p>Z poważaniem,</p><p style="margin-top: 60px;"><em>........................................</em><br>([[applicant_name]])</p></div>'
                    ],
                ]
            ],

            // 3. Декларация о наличии средств на проживание - ОБНОВЛЕНО
            [
                'category_id' => $catEdu->id,
                'slug' => 'pl-declaration-of-funds-student-2025-updated',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"student_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko studenta","en":"Student\'s Full Name","uk":"Повне ім\'я студента","de":"Vollständiger Name des Studenten"}},
                    {"name":"student_passport","type":"text","required":true,"labels":{"pl":"Seria i numer paszportu","en":"Passport series and number","uk":"Серія та номер паспорта","de":"Passnummer und -serie"}},
                    {"name":"student_address","type":"textarea","required":true,"labels":{"pl":"Adres zamieszkania studenta","en":"Student\'s address of residence","uk":"Адреса проживання студента","de":"Wohnadresse des Studenten"}},
                    {"name":"student_pesel","type":"text","required":false,"labels":{"pl":"Numer PESEL (jeśli posiada)","en":"PESEL number (if applicable)","uk":"Номер PESEL (якщо є)","de":"PESEL-Nummer (falls vorhanden)"}},
                    {"name":"declaration_place_date","type":"text","required":true,"labels":{"pl":"Miejscowość i data","en":"Place and Date","uk":"Місцевість та дата","de":"Ort und Datum"}},
                    {"name":"study_period","type":"text","required":true,"labels":{"pl":"Okres studiów (np. 3 lata, 10 miesięcy)","en":"Study period (e.g., 3 years, 10 months)","uk":"Період навчання (напр., 3 роки, 10 місяців)","de":"Studiendauer (z.B. 3 Jahre, 10 Monate)"}},
                    {"name":"monthly_funds_amount","type":"number","required":true,"labels":{"pl":"Miesięczna kwota środków (min. 701 PLN)","en":"Monthly amount of funds (min. 701 PLN)","uk":"Щомісячна сума коштів (мін. 701 PLN)","de":"Monatlicher Betrag der Mittel (min. 701 PLN)"}},
                    {"name":"total_funds_amount","type":"number","required":true,"labels":{"pl":"Łączna kwota środków na cały okres","en":"Total amount of funds for entire period","uk":"Загальна сума коштів на весь період","de":"Gesamtbetrag der Mittel für den gesamten Zeitraum"}},
                    {"name":"funds_currency","type":"select","options":{"PLN":"PLN","EUR":"EUR","USD":"USD"},"required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"funds_source","type":"select","options":{"personal_savings":"Oszczędności własne","family_support":"Wsparcie rodziny","scholarship":"Stypendium","work_income":"Dochody z pracy","loan":"Kredyt/pożyczka","other":"Inne"},"required":true,"labels":{"pl":"Źródło pochodzenia środków","en":"Source of funds","uk":"Джерело походження коштів","de":"Quelle der Mittel"}},
                    {"name":"funds_source_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły źródła środków","en":"Details of funding source","uk":"Деталі джерела фінансування","de":"Details der Finanzierungsquelle"}},
                    {"name":"bank_account_info","type":"text","required":false,"labels":{"pl":"Informacje o rachunku bankowym","en":"Bank account information","uk":"Інформація про банківський рахунок","de":"Informationen zum Bankkonto"}},
                    {"name":"guarantor_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko poręczyciela (jeśli dotyczy)","en":"Guarantor\'s name (if applicable)","uk":"Ім\'я та прізвище поручителя (якщо застосовується)","de":"Name des Bürgen (falls zutreffend)"}},
                    {"name":"guarantor_relation","type":"text","required":false,"labels":{"pl":"Stopień pokrewieństwa z poręczycielem","en":"Relationship with guarantor","uk":"Ступінь спорідненості з поручителем","de":"Verwandtschaftsgrad zum Bürgen"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Oświadczenie o posiadaniu środków na utrzymanie ',
                        'description' => 'Aktualne oświadczenie wymagane od studentów zagranicznych, potwierdzające posiadanie wystarczających środków finansowych (min. 701 PLN miesięcznie).',
                        'header_html' => '<div style="text-align: right; font-size: 12px; margin-bottom: 10px;">[[declaration_place_date]]</div><div style="text-align:center; margin-top: 30px; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">OŚWIADCZENIE O POSIADANIU ŚRODKÓW FINANSOWYCH</h1><p style="font-size: 12px; margin-top: 10px;">(zgodnie z wymogami na rok 2025)</p></div>',
                        'body_html' => '<div style="font-size: 12px; line-height: 1.8; text-align: justify;">
                        <p>Ja, niżej podpisany/a <strong>[[student_name]]</strong>, legitymujący/a się paszportem o numerze <strong>[[student_passport]]</strong>[[student_pesel ? ", numer PESEL: " + student_pesel : ""]], zamieszkały/a pod adresem:</p>
                        <div style="margin: 15px 0; padding: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">[[student_address]]</div>

                        <p><strong>OŚWIADCZAM, ŻE:</strong></p>
                        <ol style="margin-left: 20px; line-height: 2;">
                            <li>Posiadam wystarczające środki finansowe na pokrycie kosztów mojego utrzymania oraz czesnego w okresie studiów w Rzeczypospolitej Polskiej.</li>
                            <li>Okres planowanych studiów wynosi: <strong>[[study_period]]</strong></li>
                            <li>Deklaruję posiadanie środków w wysokości:
                                <ul style="margin-top: 10px;">
                                    <li>Miesięcznie: <strong>[[monthly_funds_amount]] [[funds_currency]]</strong> (nie mniej niż wymagane minimum 701 PLN)</li>
                                    <li>Łącznie na cały okres: <strong>[[total_funds_amount]] [[funds_currency]]</strong></li>
                                </ul>
                            </li>
                            <li>Źródłem pochodzenia ww. środków jest: <strong>[[funds_source]]</strong></li>
                            <li>Szczegółowe informacje o źródle finansowania:<br>
                                <div style="margin: 10px 0; padding: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">[[funds_source_details]]</div>
                            </li>
                        </ol>

                        <div style="margin-top: 20px; padding: 15px; border: 2px solid #333; background-color: #f0f0f0;">
                            <p style="margin: 0;"><strong>DODATKOWE INFORMACJE:</strong></p>
                            <table style="width: 100%; margin-top: 10px; border-collapse: collapse;">
                                <tr><td style="padding: 5px; width: 40%;">Informacje o rachunku bankowym:</td><td style="padding: 5px; border-bottom: 1px dotted #666;">[[bank_account_info]]</td></tr>
                                <tr><td style="padding: 5px;">Poręczyciel (jeśli dotyczy):</td><td style="padding: 5px; border-bottom: 1px dotted #666;">[[guarantor_name]]</td></tr>
                                <tr><td style="padding: 5px;">Stopień pokrewieństwa:</td><td style="padding: 5px; border-bottom: 1px dotted #666;">[[guarantor_relation]]</td></tr>
                            </table>
                        </div>

                        <div style="margin-top: 25px; padding: 10px; background-color: #fff3cd; border: 1px solid #ffc107;">
                            <p style="margin: 0; font-weight: bold;">UWAGA PRAWNA:</p>
                            <p style="margin: 5px 0 0 0;">Oświadczam, że jestem świadomy/a odpowiedzialności karnej za złożenie fałszywego oświadczenia, wynikającej z art. 233 § 1 Kodeksu Karnego Rzeczypospolitej Polskiej.</p>
                        </div>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; display: flex; justify-content: space-between; font-size: 12px;"><div style="width: 45%;"><p>Data:<br><br>..............................</p></div><div style="width: 45%; text-align: right;"><p>Podpis studenta:<br><br>..............................</p></div></div>'
                    ],
                    'en' => [
                        'title' => 'Declaration of Financial Resources ',
                        'description' => 'Current declaration required from foreign students confirming sufficient financial resources (min. 701 PLN monthly).',
                        'header_html' => '<div style="text-align: right; font-size: 12px; margin-bottom: 10px;">[[declaration_place_date]]</div><div style="text-align:center; margin-top: 30px; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">OŚWIADCZENIE O POSIADANIU ŚRODKÓW FINANSOWYCH</h1><p style="font-size: 12px; margin-top: 10px;">(zgodnie z wymogami na rok 2025)</p></div>',
                        'body_html' => '<div style="font-size: 12px; line-height: 1.8; text-align: justify;">
                        <p>Ja, niżej podpisany/a <strong>[[student_name]]</strong>, legitymujący/a się paszportem o numerze <strong>[[student_passport]]</strong>[[student_pesel ? ", numer PESEL: " + student_pesel : ""]], zamieszkały/a pod adresem:</p>
                        <div style="margin: 15px 0; padding: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">[[student_address]]</div>

                        <p><strong>OŚWIADCZAM, ŻE:</strong></p>
                        <ol style="margin-left: 20px; line-height: 2;">
                            <li>Posiadam wystarczające środki finansowe na pokrycie kosztów mojego utrzymania oraz czesnego w okresie studiów w Rzeczypospolitej Polskiej.</li>
                            <li>Okres planowanych studiów wynosi: <strong>[[study_period]]</strong></li>
                            <li>Deklaruję posiadanie środków w wysokości:
                                <ul style="margin-top: 10px;">
                                    <li>Miesięcznie: <strong>[[monthly_funds_amount]] [[funds_currency]]</strong> (nie mniej niż wymagane minimum 701 PLN)</li>
                                    <li>Łącznie na cały okres: <strong>[[total_funds_amount]] [[funds_currency]]</strong></li>
                                </ul>
                            </li>
                            <li>Źródłem pochodzenia ww. środków jest: <strong>[[funds_source]]</strong></li>
                            <li>Szczegółowe informacje o źródle finansowania:<br>
                                <div style="margin: 10px 0; padding: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">[[funds_source_details]]</div>
                            </li>
                        </ol>

                        <div style="margin-top: 20px; padding: 15px; border: 2px solid #333; background-color: #f0f0f0;">
                            <p style="margin: 0;"><strong>DODATKOWE INFORMACJE:</strong></p>
                            <table style="width: 100%; margin-top: 10px; border-collapse: collapse;">
                                <tr><td style="padding: 5px; width: 40%;">Informacje o rachunku bankowym:</td><td style="padding: 5px; border-bottom: 1px dotted #666;">[[bank_account_info]]</td></tr>
                                <tr><td style="padding: 5px;">Poręczyciel (jeśli dotyczy):</td><td style="padding: 5px; border-bottom: 1px dotted #666;">[[guarantor_name]]</td></tr>
                                <tr><td style="padding: 5px;">Stopień pokrewieństwa:</td><td style="padding: 5px; border-bottom: 1px dotted #666;">[[guarantor_relation]]</td></tr>
                            </table>
                        </div>

                        <div style="margin-top: 25px; padding: 10px; background-color: #fff3cd; border: 1px solid #ffc107;">
                            <p style="margin: 0; font-weight: bold;">UWAGA PRAWNA:</p>
                            <p style="margin: 5px 0 0 0;">Oświadczam, że jestem świadomy/a odpowiedzialności karnej za złożenie fałszywego oświadczenia, wynikającej z art. 233 § 1 Kodeksu Karnego Rzeczypospolitej Polskiej.</p>
                        </div>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; display: flex; justify-content: space-between; font-size: 12px;"><div style="width: 45%;"><p>Data:<br><br>..............................</p></div><div style="width: 45%; text-align: right;"><p>Podpis studenta:<br><br>..............................</p></div></div>'
                    ],
                    'uk' => [
                        'title' => 'Декларація про наявність фінансових коштів',
                        'description' => 'Актуальна декларація, необхідна для іноземних студентів, що підтверджує наявність достатніх фінансових коштів (мін. 701 PLN щомісячно).',
                        'header_html' => '<div style="text-align: right; font-size: 12px; margin-bottom: 10px;">[[declaration_place_date]]</div><div style="text-align:center; margin-top: 30px; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">OŚWIADCZENIE O POSIADANIU ŚRODKÓW FINANSOWYCH</h1><p style="font-size: 12px; margin-top: 10px;">(zgodnie z wymogami na rok 2025)</p></div>',
                        'body_html' => '<div style="font-size: 12px; line-height: 1.8; text-align: justify;">
                        <p>Ja, niżej podpisany/a <strong>[[student_name]]</strong>, legitymujący/a się paszportem o numerze <strong>[[student_passport]]</strong>[[student_pesel ? ", numer PESEL: " + student_pesel : ""]], zamieszkały/a pod adresem:</p>
                        <div style="margin: 15px 0; padding: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">[[student_address]]</div>

                        <p><strong>OŚWIADCZAM, ŻE:</strong></p>
                        <ol style="margin-left: 20px; line-height: 2;">
                            <li>Posiadam wystarczające środki finansowe na pokrycie kosztów mojego utrzymania oraz czesnego w okresie studiów w Rzeczypospolitej Polskiej.</li>
                            <li>Okres planowanych studiów wynosi: <strong>[[study_period]]</strong></li>
                            <li>Deklaruję posiadanie środków w wysokości:
                                <ul style="margin-top: 10px;">
                                    <li>Miesięcznie: <strong>[[monthly_funds_amount]] [[funds_currency]]</strong> (nie mniej niż wymagane minimum 701 PLN)</li>
                                    <li>Łącznie na cały okres: <strong>[[total_funds_amount]] [[funds_currency]]</strong></li>
                                </ul>
                            </li>
                            <li>Źródłem pochodzenia ww. środków jest: <strong>[[funds_source]]</strong></li>
                            <li>Szczegółowe informacje o źródle finansowania:<br>
                                <div style="margin: 10px 0; padding: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">[[funds_source_details]]</div>
                            </li>
                        </ol>

                        <div style="margin-top: 20px; padding: 15px; border: 2px solid #333; background-color: #f0f0f0;">
                            <p style="margin: 0;"><strong>DODATKOWE INFORMACJE:</strong></p>
                            <table style="width: 100%; margin-top: 10px; border-collapse: collapse;">
                                <tr><td style="padding: 5px; width: 40%;">Informacje o rachunku bankowym:</td><td style="padding: 5px; border-bottom: 1px dotted #666;">[[bank_account_info]]</td></tr>
                                <tr><td style="padding: 5px;">Poręczyciel (jeśli dotyczy):</td><td style="padding: 5px; border-bottom: 1px dotted #666;">[[guarantor_name]]</td></tr>
                                <tr><td style="padding: 5px;">Stopień pokrewieństwa:</td><td style="padding: 5px; border-bottom: 1px dotted #666;">[[guarantor_relation]]</td></tr>
                            </table>
                        </div>

                        <div style="margin-top: 25px; padding: 10px; background-color: #fff3cd; border: 1px solid #ffc107;">
                            <p style="margin: 0; font-weight: bold;">UWAGA PRAWNA:</p>
                            <p style="margin: 5px 0 0 0;">Oświadczam, że jestem świadomy/a odpowiedzialności karnej za złożenie fałszywego oświadczenia, wynikającej z art. 233 § 1 Kodeksu Karnego Rzeczypospolitej Polskiej.</p>
                        </div>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; display: flex; justify-content: space-between; font-size: 12px;"><div style="width: 45%;"><p>Data:<br><br>..............................</p></div><div style="width: 45%; text-align: right;"><p>Podpis studenta:<br><br>..............................</p></div></div>'
                    ],
                    'de' => [
                        'title' => 'Erklärung über finanzielle Mittel ',
                        'description' => 'Aktuelle Erklärung für ausländische Studenten zur Bestätigung ausreichender finanzieller Mittel (min. 701 PLN monatlich).',
                        'header_html' => '<div style="text-align: right; font-size: 12px; margin-bottom: 10px;">[[declaration_place_date]]</div><div style="text-align:center; margin-top: 30px; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">OŚWIADCZENIE O POSIADANIU ŚRODKÓW FINANSOWYCH</h1><p style="font-size: 12px; margin-top: 10px;">(zgodnie z wymogami na rok 2025)</p></div>',
                        'body_html' => '<div style="font-size: 12px; line-height: 1.8; text-align: justify;">
                        <p>Ja, niżej podpisany/a <strong>[[student_name]]</strong>, legitymujący/a się paszportem o numerze <strong>[[student_passport]]</strong>[[student_pesel ? ", numer PESEL: " + student_pesel : ""]], zamieszkały/a pod adresem:</p>
                        <div style="margin: 15px 0; padding: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">[[student_address]]</div>

                        <p><strong>OŚWIADCZAM, ŻE:</strong></p>
                        <ol style="margin-left: 20px; line-height: 2;">
                            <li>Posiadam wystarczające środki finansowe na pokrycie kosztów mojego utrzymania oraz czesnego w okresie studiów w Rzeczypospolitej Polskiej.</li>
                            <li>Okres planowanych studiów wynosi: <strong>[[study_period]]</strong></li>
                            <li>Deklaruję posiadanie środków w wysokości:
                                <ul style="margin-top: 10px;">
                                    <li>Miesięcznie: <strong>[[monthly_funds_amount]] [[funds_currency]]</strong> (nie mniej niż wymagane minimum 701 PLN)</li>
                                    <li>Łącznie na cały okres: <strong>[[total_funds_amount]] [[funds_currency]]</strong></li>
                                </ul>
                            </li>
                            <li>Źródłem pochodzenia ww. środków jest: <strong>[[funds_source]]</strong></li>
                            <li>Szczegółowe informacje o źródle finansowania:<br>
                                <div style="margin: 10px 0; padding: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">[[funds_source_details]]</div>
                            </li>
                        </ol>

                        <div style="margin-top: 20px; padding: 15px; border: 2px solid #333; background-color: #f0f0f0;">
                            <p style="margin: 0;"><strong>DODATKOWE INFORMACJE:</strong></p>
                            <table style="width: 100%; margin-top: 10px; border-collapse: collapse;">
                                <tr><td style="padding: 5px; width: 40%;">Informacje o rachunku bankowym:</td><td style="padding: 5px; border-bottom: 1px dotted #666;">[[bank_account_info]]</td></tr>
                                <tr><td style="padding: 5px;">Poręczyciel (jeśli dotyczy):</td><td style="padding: 5px; border-bottom: 1px dotted #666;">[[guarantor_name]]</td></tr>
                                <tr><td style="padding: 5px;">Stopień pokrewieństwa:</td><td style="padding: 5px; border-bottom: 1px dotted #666;">[[guarantor_relation]]</td></tr>
                            </table>
                        </div>

                        <div style="margin-top: 25px; padding: 10px; background-color: #fff3cd; border: 1px solid #ffc107;">
                            <p style="margin: 0; font-weight: bold;">UWAGA PRAWNA:</p>
                            <p style="margin: 5px 0 0 0;">Oświadczam, że jestem świadomy/a odpowiedzialności karnej za złożenie fałszywego oświadczenia, wynikającej z art. 233 § 1 Kodeksu Karnego Rzeczypospolitej Polskiej.</p>
                        </div>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; display: flex; justify-content: space-between; font-size: 12px;"><div style="width: 45%;"><p>Data:<br><br>..............................</p></div><div style="width: 45%; text-align: right;"><p>Podpis studenta:<br><br>..............................</p></div></div>'
                    ],
                ]
            ],

            // 4. Договор аренды комнаты - ОБНОВЛЕНО
            [
                'category_id' => $catFamily->id,
                'slug' => 'pl-student-room-lease-agreement-2025-updated',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"agreement_date_place","type":"text","required":true,"labels":{"pl":"Zawarta w (miejscowość), dnia (data)","en":"Concluded in (city), on (date)","uk":"Укладена в (місто), дня (дата)","de":"Abgeschlossen in (Stadt), am (Datum)"}},
                    {"name":"landlord_details","type":"textarea","required":true,"labels":{"pl":"Dane Wynajmującego (imię, nazwisko, adres, PESEL/paszport)","en":"Landlord\'s Details (name, address, PESEL/passport)","uk":"Дані Орендодавця (ім\'я, прізвище, адреса, PESEL/паспорт)","de":"Angaben des Vermieters (Name, Adresse, PESEL/Reisepass)"}},
                    {"name":"landlord_id_document","type":"text","required":true,"labels":{"pl":"Dokument tożsamości wynajmującego","en":"Landlord\'s ID document","uk":"Документ, що посвідчує особу орендодавця","de":"Ausweisdokument des Vermieters"}},
                    {"name":"tenant_details","type":"textarea","required":true,"labels":{"pl":"Dane Najemcy (imię, nazwisko, adres, PESEL/paszport)","en":"Tenant\'s Details (name, address, PESEL/passport)","uk":"Дані Орендаря (ім\'я, прізвище, адреса, PESEL/паспорт)","de":"Angaben des Mieters (Name, Adresse, PESEL/Reisepass)"}},
                    {"name":"tenant_id_document","type":"text","required":true,"labels":{"pl":"Dokument tożsamości najemcy","en":"Tenant\'s ID document","uk":"Документ, що посвідчує особу орендаря","de":"Ausweisdokument des Mieters"}},
                    {"name":"tenant_status","type":"select","options":{"student":"Student","working":"Pracujący","other":"Inne"},"required":true,"labels":{"pl":"Status najemcy","en":"Tenant\'s status","uk":"Статус орендаря","de":"Status des Mieters"}},
                    {"name":"property_ownership_title","type":"text","required":true,"labels":{"pl":"Tytuł prawny do lokalu (własność, współwłasność, etc.)","en":"Legal title to the property","uk":"Правовий титул до приміщення","de":"Eigentumsnachweis der Immobilie"}},

                    {"name":"room_address","type":"text","required":true,"labels":{"pl":"Adres mieszkania i numer pokoju","en":"Address of the flat and room number","uk":"Адреса квартири та номер кімнати","de":"Adresse der Wohnung und Zimmernummer"}},
                    {"name":"room_area","type":"number","required":true,"labels":{"pl":"Powierzchnia pokoju (w m²)","en":"Room area (in m²)","uk":"Площа кімнати (в м²)","de":"Zimmerfläche (in m²)"}},
                    {"name":"room_floor","type":"text","required":true,"labels":{"pl":"Piętro","en":"Floor","uk":"Поверх","de":"Etage"}},
                    {"name":"room_description","type":"textarea","required":true,"labels":{"pl":"Opis pokoju i wyposażenia","en":"Room and equipment description","uk":"Опис кімнати та обладнання","de":"Beschreibung des Zimmers und der Ausstattung"}},
                    {"name":"common_areas","type":"text","required":true,"labels":{"pl":"Dostęp do części wspólnych (np. kuchnia, łazienka)","en":"Access to common areas (e.g., kitchen, bathroom)","uk":"Доступ до спільних приміщень (напр., кухня, ванна)","de":"Zugang zu Gemeinschaftsräumen (z.B. Küche, Bad)"}},
                    {"name":"parking_space","type":"select","options":{"yes":"Tak","no":"Nie","paid_extra":"Płatne dodatkowo"},"required":false,"labels":{"pl":"Miejsce parkingowe","en":"Parking space","uk":"Паркувальне місце","de":"Parkplatz"}},

                    {"name":"lease_start","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Lease start date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"lease_end","type":"date","required":true,"labels":{"pl":"Data zakończenia najmu","en":"Lease end date","uk":"Дата закінчення оренди","de":"Mietende"}},
                    {"name":"lease_type","type":"select","options":{"fixed_term":"Na czas określony","indefinite":"Na czas nieokreślony"},"required":true,"labels":{"pl":"Typ umowy","en":"Contract type","uk":"Тип договору","de":"Vertragsart"}},

                    {"name":"rent_amount","type":"number","required":true,"labels":{"pl":"Miesięczny czynsz (PLN)","en":"Monthly rent (PLN)","uk":"Щомісячна орендна плата (PLN)","de":"Monatliche Miete (PLN)"}},
                    {"name":"utilities_fee","type":"number","required":true,"labels":{"pl":"Zaliczka na media (PLN)","en":"Advance payment for utilities (PLN)","uk":"Аванс за комунальні послуги (PLN)","de":"Vorauszahlung für Nebenkosten (PLN)"}},
                    {"name":"utilities_included","type":"text","required":true,"labels":{"pl":"Media wliczone w czynsz","en":"Utilities included in rent","uk":"Комунальні послуги, включені в орендну плату","de":"In der Miete enthaltene Nebenkosten"}},
                    {"name":"internet_included","type":"select","options":{"yes":"Tak","no":"Nie","paid_extra":"Płatne dodatkowo"},"required":true,"labels":{"pl":"Internet wliczony","en":"Internet included","uk":"Інтернет включено","de":"Internet inklusive"}},
                    {"name":"payment_day","type":"number","required":true,"labels":{"pl":"Termin płatności (do ... dnia miesiąca)","en":"Payment due (by the ... day of the month)","uk":"Термін сплати (до ... дня місяця)","de":"Zahlungstermin (bis zum ... Tag des Monats)"}},
                    {"name":"payment_method","type":"select","options":{"bank_transfer":"Przelew bankowy","cash":"Gotówka","online":"Płatność online"},"required":true,"labels":{"pl":"Sposób płatności","en":"Payment method","uk":"Спосіб оплати","de":"Zahlungsweise"}},

                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Kaucja (PLN)","en":"Deposit (PLN)","uk":"Застава (PLN)","de":"Kaution (PLN)"}},
                    {"name":"deposit_return_conditions","type":"textarea","required":true,"labels":{"pl":"Warunki zwrotu kaucji","en":"Deposit return conditions","uk":"Умови повернення застави","de":"Bedingungen für die Rückgabe der Kaution"}},

                    {"name":"notice_period","type":"text","required":true,"labels":{"pl":"Okres wypowiedzenia","en":"Notice period","uk":"Період розірвання договору","de":"Kündigungsfrist"}},
                    {"name":"house_rules","type":"textarea","required":true,"labels":{"pl":"Regulamin domu/mieszkania","en":"House/apartment rules","uk":"Правила будинку/квартири","de":"Haus-/Wohnungsordnung"}},
                    {"name":"pets_allowed","type":"select","options":{"yes":"Tak","no":"Nie","with_agreement":"Za zgodą"},"required":true,"labels":{"pl":"Zwierzęta dozwolone","en":"Pets allowed","uk":"Дозволено тварин","de":"Haustiere erlaubt"}},
                    {"name":"smoking_allowed","type":"select","options":{"yes":"Tak","no":"Nie","balcony_only":"Tylko na balkonie"},"required":true,"labels":{"pl":"Palenie dozwolone","en":"Smoking allowed","uk":"Дозволено паління","de":"Rauchen erlaubt"}},
                    {"name":"guests_policy","type":"text","required":true,"labels":{"pl":"Zasady dotyczące gości","en":"Guest policy","uk":"Правила щодо гостей","de":"Gästerichtlinien"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa najmu pokoju dla studenta',
                        'description' => 'Kompleksowa umowa najmu pokoju, dostosowana do potrzeb studentów, zabezpieczająca interesy obu stron.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 18px; font-weight: bold;">UMOWA NAJMU POKOJU</h1><p style="font-size: 12px; margin-top: 5px; color: #666;">dla studentów - wersja 2025</p></div><p style="font-size: 12px; text-align: right; margin-bottom: 20px;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <p><strong>Umowa najmu lokalu mieszkalnego zawarta pomiędzy:</strong></p>

                            <div style="margin: 15px 0; padding: 10px; border: 1px solid #333;">
                                <p><strong>WYNAJMUJĄCYM:</strong><br>
                                [[landlord_details]]<br>
                                Dokument tożsamości: [[landlord_id_document]]<br>
                                Tytuł prawny do lokalu: [[property_ownership_title]]</p>
                            </div>

                            <p style="text-align: center; margin: 15px 0;"><strong>a</strong></p>

                            <div style="margin: 15px 0; padding: 10px; border: 1px solid #333;">
                                <p><strong>NAJEMCĄ:</strong><br>
                                [[tenant_details]]<br>
                                Dokument tożsamości: [[tenant_id_document]]<br>
                                Status: [[tenant_status]]</p>
                            </div>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 1. PRZEDMIOT UMOWY</h3>
                            <ol style="margin-left: 20px;">
                                <li>Wynajmujący oświadcza, że jest uprawniony do wynajmowania pokoju znajdującego się w mieszkaniu pod adresem: <strong>[[room_address]]</strong>.</li>
                                <li>Przedmiotem najmu jest pokój o powierzchni <strong>[[room_area]] m²</strong>, położony na [[room_floor]] piętrze.</li>
                                <li>Opis pokoju i wyposażenia:<br>
                                    <div style="margin: 10px 0; padding: 8px; background-color: #f9f9f9; border-left: 3px solid #333;">[[room_description]]</div>
                                </li>
                                <li>Najemca ma prawo do korzystania z części wspólnych: [[common_areas]].</li>
                                <li>Miejsce parkingowe: [[parking_space]].</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 2. OKRES NAJMU</h3>
                            <ol style="margin-left: 20px;">
                                <li>Umowa zostaje zawarta [[lease_type]].</li>
                                <li>Okres najmu: od <strong>[[lease_start]]</strong> do <strong>[[lease_end]]</strong>.</li>
                                <li>Okres wypowiedzenia umowy wynosi: <strong>[[notice_period]]</strong>.</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 3. CZYNSZ I OPŁATY</h3>
                            <ol style="margin-left: 20px;">
                                <li>Najemca zobowiązuje się płacić miesięczny czynsz w wysokości <strong>[[rent_amount]] PLN</strong>.</li>
                                <li>Zaliczka na opłaty eksploatacyjne (media): <strong>[[utilities_fee]] PLN</strong>.</li>
                                <li>W czynsz wliczone są następujące media: [[utilities_included]].</li>
                                <li>Internet: [[internet_included]].</li>
                                <li>Łączna kwota płatna jest z góry do <strong>[[payment_day]]</strong> dnia każdego miesiąca.</li>
                                <li>Sposób płatności: [[payment_method]].</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 4. KAUCJA</h3>
                            <ol style="margin-left: 20px;">
                                <li>Najemca wpłacił Wynajmującemu kaucję w wysokości <strong>[[deposit_amount]] PLN</strong>.</li>
                                <li>Warunki zwrotu kaucji:<br>
                                    <div style="margin: 10px 0; padding: 8px; background-color: #f9f9f9; border-left: 3px solid #333;">[[deposit_return_conditions]]</div>
                                </li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 5. REGULAMIN I ZASADY</h3>
                            <ol style="margin-left: 20px;">
                                <li>Regulamin domu/mieszkania:<br>
                                    <div style="margin: 10px 0; padding: 8px; background-color: #f9f9f9; border-left: 3px solid #333;">[[house_rules]]</div>
                                </li>
                                <li>Zwierzęta domowe: [[pets_allowed]].</li>
                                <li>Palenie tytoniu: [[smoking_allowed]].</li>
                                <li>Zasady dotyczące gości: [[guests_policy]].</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 6. POSTANOWIENIA KOŃCOWE</h3>
                            <ol style="margin-left: 20px;">
                                <li>W sprawach nieuregulowanych niniejszą umową stosuje się przepisy Kodeksu Cywilnego.</li>
                                <li>Wszelkie zmiany umowy wymagają formy pisemnej pod rygorem nieważności.</li>
                                <li>Spory wynikające z niniejszej umowy rozstrzygać będzie sąd właściwy dla miejsca położenia przedmiotu najmu.</li>
                                <li>Umowę sporządzono w dwóch jednobrzmiących egzemplarzach, po jednym dla każdej ze stron.</li>
                            </ol>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <td style="width: 50%; text-align: center; vertical-align: bottom; padding: 20px;">
                                        <div style="border-bottom: 2px solid #333; width: 200px; margin: 0 auto 5px;"></div>
                                        <strong>(Wynajmujący)</strong>
                                    </td>
                                    <td style="width: 50%; text-align: center; vertical-align: bottom; padding: 20px;">
                                        <div style="border-bottom: 2px solid #333; width: 200px; margin: 0 auto 5px;"></div>
                                        <strong>(Najemca)</strong>
                                    </td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'en' => [
                        'title' => 'Student Room Lease Agreement ',
                        'description' => 'Comprehensive room lease agreement tailored for students, protecting the interests of both parties.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 18px; font-weight: bold;">UMOWA NAJMU POKOJU</h1><p style="font-size: 12px; margin-top: 5px; color: #666;">dla studentów - wersja 2025</p></div><p style="font-size: 12px; text-align: right; margin-bottom: 20px;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <p><strong>Umowa najmu lokalu mieszkalnego zawarta pomiędzy:</strong></p>

                            <div style="margin: 15px 0; padding: 10px; border: 1px solid #333;">
                                <p><strong>WYNAJMUJĄCYM:</strong><br>
                                [[landlord_details]]<br>
                                Dokument tożsamości: [[landlord_id_document]]<br>
                                Tytuł prawny do lokalu: [[property_ownership_title]]</p>
                            </div>

                            <p style="text-align: center; margin: 15px 0;"><strong>a</strong></p>

                            <div style="margin: 15px 0; padding: 10px; border: 1px solid #333;">
                                <p><strong>NAJEMCĄ:</strong><br>
                                [[tenant_details]]<br>
                                Dokument tożsamości: [[tenant_id_document]]<br>
                                Status: [[tenant_status]]</p>
                            </div>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 1. PRZEDMIOT UMOWY</h3>
                            <ol style="margin-left: 20px;">
                                <li>Wynajmujący oświadcza, że jest uprawniony do wynajmowania pokoju znajdującego się w mieszkaniu pod adresem: <strong>[[room_address]]</strong>.</li>
                                <li>Przedmiotem najmu jest pokój o powierzchni <strong>[[room_area]] m²</strong>, położony na [[room_floor]] piętrze.</li>
                                <li>Opis pokoju i wyposażenia:<br>
                                    <div style="margin: 10px 0; padding: 8px; background-color: #f9f9f9; border-left: 3px solid #333;">[[room_description]]</div>
                                </li>
                                <li>Najemca ma prawo do korzystania z części wspólnych: [[common_areas]].</li>
                                <li>Miejsce parkingowe: [[parking_space]].</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 2. OKRES NAJMU</h3>
                            <ol style="margin-left: 20px;">
                                <li>Umowa zostaje zawarta [[lease_type]].</li>
                                <li>Okres najmu: od <strong>[[lease_start]]</strong> do <strong>[[lease_end]]</strong>.</li>
                                <li>Okres wypowiedzenia umowy wynosi: <strong>[[notice_period]]</strong>.</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 3. CZYNSZ I OPŁATY</h3>
                            <ol style="margin-left: 20px;">
                                <li>Najemca zobowiązuje się płacić miesięczny czynsz w wysokości <strong>[[rent_amount]] PLN</strong>.</li>
                                <li>Zaliczka na opłaty eksploatacyjne (media): <strong>[[utilities_fee]] PLN</strong>.</li>
                                <li>W czynsz wliczone są następujące media: [[utilities_included]].</li>
                                <li>Internet: [[internet_included]].</li>
                                <li>Łączna kwota płatna jest z góry do <strong>[[payment_day]]</strong> dnia każdego miesiąca.</li>
                                <li>Sposób płatności: [[payment_method]].</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 4. KAUCJA</h3>
                            <ol style="margin-left: 20px;">
                                <li>Najemca wpłacił Wynajmującemu kaucję w wysokości <strong>[[deposit_amount]] PLN</strong>.</li>
                                <li>Warunki zwrotu kaucji:<br>
                                    <div style="margin: 10px 0; padding: 8px; background-color: #f9f9f9; border-left: 3px solid #333;">[[deposit_return_conditions]]</div>
                                </li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 5. REGULAMIN I ZASADY</h3>
                            <ol style="margin-left: 20px;">
                                <li>Regulamin domu/mieszkania:<br>
                                    <div style="margin: 10px 0; padding: 8px; background-color: #f9f9f9; border-left: 3px solid #333;">[[house_rules]]</div>
                                </li>
                                <li>Zwierzęta domowe: [[pets_allowed]].</li>
                                <li>Palenie tytoniu: [[smoking_allowed]].</li>
                                <li>Zasady dotyczące gości: [[guests_policy]].</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 6. POSTANOWIENIA KOŃCOWE</h3>
                            <ol style="margin-left: 20px;">
                                <li>W sprawach nieuregulowanych niniejszą umową stosuje się przepisy Kodeksu Cywilnego.</li>
                                <li>Wszelkie zmiany umowy wymagają formy pisemnej pod rygorem nieważności.</li>
                                <li>Spory wynikające z niniejszej umowy rozstrzygać będzie sąd właściwy dla miejsca położenia przedmiotu najmu.</li>
                                <li>Umowę sporządzono w dwóch jednobrzmiących egzemplarzach, po jednym dla każdej ze stron.</li>
                            </ol>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <td style="width: 50%; text-align: center; vertical-align: bottom; padding: 20px;">
                                        <div style="border-bottom: 2px solid #333; width: 200px; margin: 0 auto 5px;"></div>
                                        <strong>(Wynajmujący)</strong>
                                    </td>
                                    <td style="width: 50%; text-align: center; vertical-align: bottom; padding: 20px;">
                                        <div style="border-bottom: 2px solid #333; width: 200px; margin: 0 auto 5px;"></div>
                                        <strong>(Najemca)</strong>
                                    </td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди кімнати для студента ',
                        'description' => 'Комплексний договір оренди кімнати, адаптований для студентів, що захищає інтереси обох сторін.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 18px; font-weight: bold;">UMOWA NAJMU POKOJU</h1><p style="font-size: 12px; margin-top: 5px; color: #666;">dla studentów - wersja 2025</p></div><p style="font-size: 12px; text-align: right; margin-bottom: 20px;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <p><strong>Umowa najmu lokalu mieszkalnego zawarta pomiędzy:</strong></p>

                            <div style="margin: 15px 0; padding: 10px; border: 1px solid #333;">
                                <p><strong>WYNAJMUJĄCYM:</strong><br>
                                [[landlord_details]]<br>
                                Dokument tożsamości: [[landlord_id_document]]<br>
                                Tytuł prawny do lokalu: [[property_ownership_title]]</p>
                            </div>

                            <p style="text-align: center; margin: 15px 0;"><strong>a</strong></p>

                            <div style="margin: 15px 0; padding: 10px; border: 1px solid #333;">
                                <p><strong>NAJEMCĄ:</strong><br>
                                [[tenant_details]]<br>
                                Dokument tożsamości: [[tenant_id_document]]<br>
                                Status: [[tenant_status]]</p>
                            </div>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 1. PRZEDMIOT UMOWY</h3>
                            <ol style="margin-left: 20px;">
                                <li>Wynajmujący oświadcza, że jest uprawniony do wynajmowania pokoju znajdującego się w mieszkaniu pod adresem: <strong>[[room_address]]</strong>.</li>
                                <li>Przedmiotem najmu jest pokój o powierzchni <strong>[[room_area]] m²</strong>, położony na [[room_floor]] piętrze.</li>
                                <li>Opis pokoju i wyposażenia:<br>
                                    <div style="margin: 10px 0; padding: 8px; background-color: #f9f9f9; border-left: 3px solid #333;">[[room_description]]</div>
                                </li>
                                <li>Najemca ma prawo do korzystania z części wspólnych: [[common_areas]].</li>
                                <li>Miejsce parkingowe: [[parking_space]].</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 2. OKRES NAJMU</h3>
                            <ol style="margin-left: 20px;">
                                <li>Umowa zostaje zawarta [[lease_type]].</li>
                                <li>Okres najmu: od <strong>[[lease_start]]</strong> do <strong>[[lease_end]]</strong>.</li>
                                <li>Okres wypowiedzenia umowy wynosi: <strong>[[notice_period]]</strong>.</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 3. CZYNSZ I OPŁATY</h3>
                            <ol style="margin-left: 20px;">
                                <li>Najemca zobowiązuje się płacić miesięczny czynsz w wysokości <strong>[[rent_amount]] PLN</strong>.</li>
                                <li>Zaliczka na opłaty eksploatacyjne (media): <strong>[[utilities_fee]] PLN</strong>.</li>
                                <li>W czynsz wliczone są następujące media: [[utilities_included]].</li>
                                <li>Internet: [[internet_included]].</li>
                                <li>Łączna kwota płatna jest z góry do <strong>[[payment_day]]</strong> dnia każdego miesiąca.</li>
                                <li>Sposób płatności: [[payment_method]].</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 4. KAUCJA</h3>
                            <ol style="margin-left: 20px;">
                                <li>Najemca wpłacił Wynajmującemu kaucję w wysokości <strong>[[deposit_amount]] PLN</strong>.</li>
                                <li>Warunki zwrotu kaucji:<br>
                                    <div style="margin: 10px 0; padding: 8px; background-color: #f9f9f9; border-left: 3px solid #333;">[[deposit_return_conditions]]</div>
                                </li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 5. REGULAMIN I ZASADY</h3>
                            <ol style="margin-left: 20px;">
                                <li>Regulamin domu/mieszkania:<br>
                                    <div style="margin: 10px 0; padding: 8px; background-color: #f9f9f9; border-left: 3px solid #333;">[[house_rules]]</div>
                                </li>
                                <li>Zwierzęta domowe: [[pets_allowed]].</li>
                                <li>Palenie tytoniu: [[smoking_allowed]].</li>
                                <li>Zasady dotyczące gości: [[guests_policy]].</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 6. POSTANOWIENIA KOŃCOWE</h3>
                            <ol style="margin-left: 20px;">
                                <li>W sprawach nieuregulowanych niniejszą umową stosuje się przepisy Kodeksu Cywilnego.</li>
                                <li>Wszelkie zmiany umowy wymagają formy pisemnej pod rygorem nieważności.</li>
                                <li>Spory wynikające z niniejszej umowy rozstrzygać będzie sąd właściwy dla miejsca położenia przedmiotu najmu.</li>
                                <li>Umowę sporządzono w dwóch jednobrzmiących egzemplarzach, po jednym dla każdej ze stron.</li>
                            </ol>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <td style="width: 50%; text-align: center; vertical-align: bottom; padding: 20px;">
                                        <div style="border-bottom: 2px solid #333; width: 200px; margin: 0 auto 5px;"></div>
                                        <strong>(Wynajmujący)</strong>
                                    </td>
                                    <td style="width: 50%; text-align: center; vertical-align: bottom; padding: 20px;">
                                        <div style="border-bottom: 2px solid #333; width: 200px; margin: 0 auto 5px;"></div>
                                        <strong>(Najemca)</strong>
                                    </td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'de' => [
                        'title' => 'Studentenzimmer-Mietvertrag ',
                        'description' => 'Umfassender Zimmermietvertrag für Studenten, der die Interessen beider Parteien schützt.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 18px; font-weight: bold;">UMOWA NAJMU POKOJU</h1><p style="font-size: 12px; margin-top: 5px; color: #666;">dla studentów - wersja 2025</p></div><p style="font-size: 12px; text-align: right; margin-bottom: 20px;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <p><strong>Umowa najmu lokalu mieszkalnego zawarta pomiędzy:</strong></p>

                            <div style="margin: 15px 0; padding: 10px; border: 1px solid #333;">
                                <p><strong>WYNAJMUJĄCYM:</strong><br>
                                [[landlord_details]]<br>
                                Dokument tożsamości: [[landlord_id_document]]<br>
                                Tytuł prawny do lokalu: [[property_ownership_title]]</p>
                            </div>

                            <p style="text-align: center; margin: 15px 0;"><strong>a</strong></p>

                            <div style="margin: 15px 0; padding: 10px; border: 1px solid #333;">
                                <p><strong>NAJEMCĄ:</strong><br>
                                [[tenant_details]]<br>
                                Dokument tożsamości: [[tenant_id_document]]<br>
                                Status: [[tenant_status]]</p>
                            </div>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 1. PRZEDMIOT UMOWY</h3>
                            <ol style="margin-left: 20px;">
                                <li>Wynajmujący oświadcza, że jest uprawniony do wynajmowania pokoju znajdującego się w mieszkaniu pod adresem: <strong>[[room_address]]</strong>.</li>
                                <li>Przedmiotem najmu jest pokój o powierzchni <strong>[[room_area]] m²</strong>, położony na [[room_floor]] piętrze.</li>
                                <li>Opis pokoju i wyposażenia:<br>
                                    <div style="margin: 10px 0; padding: 8px; background-color: #f9f9f9; border-left: 3px solid #333;">[[room_description]]</div>
                                </li>
                                <li>Najemca ma prawo do korzystania z części wspólnych: [[common_areas]].</li>
                                <li>Miejsce parkingowe: [[parking_space]].</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 2. OKRES NAJMU</h3>
                            <ol style="margin-left: 20px;">
                                <li>Umowa zostaje zawarta [[lease_type]].</li>
                                <li>Okres najmu: od <strong>[[lease_start]]</strong> do <strong>[[lease_end]]</strong>.</li>
                                <li>Okres wypowiedzenia umowy wynosi: <strong>[[notice_period]]</strong>.</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 3. CZYNSZ I OPŁATY</h3>
                            <ol style="margin-left: 20px;">
                                <li>Najemca zobowiązuje się płacić miesięczny czynsz w wysokości <strong>[[rent_amount]] PLN</strong>.</li>
                                <li>Zaliczka na opłaty eksploatacyjne (media): <strong>[[utilities_fee]] PLN</strong>.</li>
                                <li>W czynsz wliczone są następujące media: [[utilities_included]].</li>
                                <li>Internet: [[internet_included]].</li>
                                <li>Łączna kwota płatna jest z góry do <strong>[[payment_day]]</strong> dnia każdego miesiąca.</li>
                                <li>Sposób płatności: [[payment_method]].</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 4. KAUCJA</h3>
                            <ol style="margin-left: 20px;">
                                <li>Najemca wpłacił Wynajmującemu kaucję w wysokości <strong>[[deposit_amount]] PLN</strong>.</li>
                                <li>Warunki zwrotu kaucji:<br>
                                    <div style="margin: 10px 0; padding: 8px; background-color: #f9f9f9; border-left: 3px solid #333;">[[deposit_return_conditions]]</div>
                                </li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 5. REGULAMIN I ZASADY</h3>
                            <ol style="margin-left: 20px;">
                                <li>Regulamin domu/mieszkania:<br>
                                    <div style="margin: 10px 0; padding: 8px; background-color: #f9f9f9; border-left: 3px solid #333;">[[house_rules]]</div>
                                </li>
                                <li>Zwierzęta domowe: [[pets_allowed]].</li>
                                <li>Palenie tytoniu: [[smoking_allowed]].</li>
                                <li>Zasady dotyczące gości: [[guests_policy]].</li>
                            </ol>

                            <h3 style="text-align: center; font-size: 14px; margin: 25px 0 15px; background-color: #f0f0f0; padding: 10px;">§ 6. POSTANOWIENIA KOŃCOWE</h3>
                            <ol style="margin-left: 20px;">
                                <li>W sprawach nieuregulowanych niniejszą umową stosuje się przepisy Kodeksu Cywilnego.</li>
                                <li>Wszelkie zmiany umowy wymagają formy pisemnej pod rygorem nieważności.</li>
                                <li>Spory wynikające z niniejszej umowy rozstrzygać będzie sąd właściwy dla miejsca położenia przedmiotu najmu.</li>
                                <li>Umowę sporządzono w dwóch jednobrzmiących egzemplarzach, po jednym dla każdej ze stron.</li>
                            </ol>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <td style="width: 50%; text-align: center; vertical-align: bottom; padding: 20px;">
                                        <div style="border-bottom: 2px solid #333; width: 200px; margin: 0 auto 5px;"></div>
                                        <strong>(Wynajmujący)</strong>
                                    </td>
                                    <td style="width: 50%; text-align: center; vertical-align: bottom; padding: 20px;">
                                        <div style="border-bottom: 2px solid #333; width: 200px; margin: 0 auto 5px;"></div>
                                        <strong>(Najemca)</strong>
                                    </td>
                                </tr>
                            </table>
                        </div>'
                    ],
                ]
            ],

            // 5. НОВЫЙ ДОКУМЕНТ - Заявление на студенческую визу
            [
                'category_id' => $catEdu->id,
                'slug' => 'pl-student-visa-application-form-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"applicant_surname","type":"text","required":true,"labels":{"pl":"Nazwisko wnioskodawcy","en":"Applicant\'s Surname","uk":"Прізвище заявника","de":"Nachname des Antragstellers"}},
                    {"name":"applicant_first_name","type":"text","required":true,"labels":{"pl":"Imię wnioskodawcy","en":"Applicant\'s First Name","uk":"Ім\'я заявника","de":"Vorname des Antragstellers"}},
                    {"name":"applicant_birth_date","type":"date","required":true,"labels":{"pl":"Data urodzenia","en":"Date of Birth","uk":"Дата народження","de":"Geburtsdatum"}},
                    {"name":"applicant_birth_place","type":"text","required":true,"labels":{"pl":"Miejsce urodzenia","en":"Place of Birth","uk":"Місце народження","de":"Geburtsort"}},
                    {"name":"applicant_citizenship","type":"text","required":true,"labels":{"pl":"Obywatelstwo","en":"Citizenship","uk":"Громадянство","de":"Staatsangehörigkeit"}},
                    {"name":"passport_number","type":"text","required":true,"labels":{"pl":"Numer paszportu","en":"Passport Number","uk":"Номер паспорта","de":"Reisepassnummer"}},
                    {"name":"passport_validity","type":"date","required":true,"labels":{"pl":"Ważność paszportu do","en":"Passport valid until","uk":"Дійсність паспорта до","de":"Reisepass gültig bis"}},
                    {"name":"current_address","type":"textarea","required":true,"labels":{"pl":"Obecny adres zamieszkania","en":"Current address of residence","uk":"Поточна адреса проживання","de":"Aktuelle Wohnadresse"}},
                    {"name":"phone_number","type":"text","required":true,"labels":{"pl":"Numer telefonu","en":"Phone Number","uk":"Номер телефону","de":"Telefonnummer"}},
                    {"name":"email_address","type":"email","required":true,"labels":{"pl":"Adres e-mail","en":"E-mail Address","uk":"Електронна пошта","de":"E-Mail-Adresse"}},
                    {"name":"marital_status","type":"select","options":{"single":"Wolny/a","married":"Żonaty/Zamężna","divorced":"Rozwiedziony/a","widowed":"Wdowiec/Wdowa"},"required":true,"labels":{"pl":"Stan cywilny","en":"Marital Status","uk":"Сімейний стан","de":"Familienstand"}},
                    {"name":"university_name","type":"text","required":true,"labels":{"pl":"Nazwa uczelni w Polsce","en":"University name in Poland","uk":"Назва університету в Польщі","de":"Name der Universität in Polen"}},
                    {"name":"field_of_study","type":"text","required":true,"labels":{"pl":"Kierunek studiów","en":"Field of Study","uk":"Напрям навчання","de":"Studienrichtung"}},
                    {"name":"study_duration","type":"text","required":true,"labels":{"pl":"Czas trwania studiów","en":"Duration of studies","uk":"Тривалість навчання","de":"Studiendauer"}},
                    {"name":"acceptance_letter_date","type":"date","required":true,"labels":{"pl":"Data przyjęcia na studia","en":"Acceptance letter date","uk":"Дата зарахування на навчання","de":"Datum des Zulassungsbescheids"}},
                    {"name":"visa_purpose","type":"textarea","required":true,"labels":{"pl":"Cel pobytu w Polsce","en":"Purpose of stay in Poland","uk":"Мета перебування в Польщі","de":"Zweck des Aufenthalts in Polen"}},
                    {"name":"intended_arrival_date","type":"date","required":true,"labels":{"pl":"Planowana data przyjazdu","en":"Intended arrival date","uk":"Планована дата прибуття","de":"Geplantes Ankunftsdatum"}},
                    {"name":"accommodation_address","type":"textarea","required":true,"labels":{"pl":"Adres zakwaterowania w Polsce","en":"Accommodation address in Poland","uk":"Адреса проживання в Польщі","de":"Unterkunftsadresse in Polen"}},
                    {"name":"financial_support_amount","type":"number","required":true,"labels":{"pl":"Kwota środków finansowych (PLN)","en":"Amount of financial resources (PLN)","uk":"Сума фінансових ресурсів (PLN)","de":"Höhe der finanziellen Mittel (PLN)"}},
                    {"name":"financial_support_source","type":"text","required":true,"labels":{"pl":"Źródło finansowania","en":"Source of financing","uk":"Джерело фінансування","de":"Finanzierungsquelle"}},
                    {"name":"health_insurance","type":"select","options":{"yes":"Tak","no":"Nie","applying":"Składam wniosek"},"required":true,"labels":{"pl":"Ubezpieczenie zdrowotne","en":"Health Insurance","uk":"Медичне страхування","de":"Krankenversicherung"}},
                    {"name":"previous_visa_applications","type":"select","options":{"yes":"Tak","no":"Nie"},"required":true,"labels":{"pl":"Czy wcześniej składałeś wnioski wizowe?","en":"Have you previously applied for visas?","uk":"Чи подавали ви раніше заяви на візу?","de":"Haben Sie früher Visa-Anträge gestellt?"}},
                    {"name":"criminal_record","type":"select","options":{"yes":"Tak","no":"Nie"},"required":true,"labels":{"pl":"Czy posiadasz karalność?","en":"Do you have a criminal record?","uk":"Чи маєте ви судимості?","de":"Haben Sie Vorstrafen?"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o wydanie wizy studenckiej D',
                        'description' => 'Oficjalny formularz wniosku o wydanie polskiej wizy studenckiej (typ D) dla kandydatów na studia.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 25px;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O WYDANIE WIZY KRAJOWEJ</h1><p style="font-size: 14px; margin-top: 8px;">TYP D - WIZA STUDENCKA</p><p style="font-size: 12px; color: #666; margin-top: 5px;">Rzeczpospolita Polska - 2025</p></div>',
                        'body_html' => '<div style="font-size: 12px; line-height: 1.6;">
                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">I. DANE OSOBOWE WNIOSKODAWCY</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Nazwisko:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_surname]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Imię:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_first_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data urodzenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_birth_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Miejsce urodzenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_birth_place]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Obywatelstwo:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_citizenship]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Stan cywilny:</td><td style="padding: 8px; border: 1px solid #ccc;">[[marital_status]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">II. DOKUMENT PODRÓŻY</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Numer paszportu:</td><td style="padding: 8px; border: 1px solid #ccc;">[[passport_number]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Ważność paszportu do:</td><td style="padding: 8px; border: 1px solid #ccc;">[[passport_validity]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">III. DANE KONTAKTOWE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Adres zamieszkania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[current_address]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Telefon:</td><td style="padding: 8px; border: 1px solid #ccc;">[[phone_number]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">E-mail:</td><td style="padding: 8px; border: 1px solid #ccc;">[[email_address]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">IV. CEL POBYTU - STUDIA</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Uczelnia:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[university_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Kierunek studiów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[field_of_study]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Czas trwania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_duration]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data przyjęcia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[acceptance_letter_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Planowany przyjazd:</td><td style="padding: 8px; border: 1px solid #ccc;">[[intended_arrival_date]]</td></tr>
                        </table>

                        <div style="margin: 15px 0; padding: 10px; background-color: #f8f9fa; border-left: 4px solid #007bff;">
                            <p style="margin: 0; font-weight: bold;">Szczegółowy cel pobytu:</p>
                            <p style="margin: 8px 0 0 0;">[[visa_purpose]]</p>
                        </div>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">V. ZAKWATEROWANIE I FINANSOWANIE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Adres w Polsce:</td><td style="padding: 8px; border: 1px solid #ccc;">[[accommodation_address]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Kwota środków (PLN):</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[financial_support_amount]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Źródło finansowania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[financial_support_source]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Ubezpieczenie zdrowotne:</td><td style="padding: 8px; border: 1px solid #ccc;">[[health_insurance]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">VI. DODATKOWE INFORMACJE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 50%; background-color: #f8f9fa;">Wcześniejsze wnioski wizowe:</td><td style="padding: 8px; border: 1px solid #ccc;">[[previous_visa_applications]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Karalność:</td><td style="padding: 8px; border: 1px solid #ccc;">[[criminal_record]]</td></tr>
                        </table>

                        <div style="margin-top: 30px; padding: 15px; border: 2px solid #dc3545; background-color: #f8d7da;">
                            <h4 style="margin: 0 0 10px 0; color: #721c24;">OŚWIADCZENIE WNIOSKODAWCY</h4>
                            <p style="margin: 0; font-size: 11px; line-height: 1.5;">Oświadczam, że wszystkie podane przeze mnie informacje są prawdziwe i kompletne. Jestem świadomy/a, że podanie nieprawdziwych informacji może skutkować odmową wydania wizy oraz zakazem wjazdu do Rzeczypospolitej Polskiej. Zobowiązuję się do przestrzegania przepisów prawa polskiego podczas pobytu.</p>
                        </div>
                        </div>',
                        'footer_html' => '<div style="margin-top: 50px; font-size: 12px;"><table style="width: 100%; border-collapse: collapse;"><tr><td style="width: 30%;">Data:<br><br>.............................</td><td style="width: 40%; text-align: center;">Miejsce:<br><br>.............................</td><td style="width: 30%; text-align: right;">Podpis wnioskodawcy:<br><br>.............................</td></tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Student Visa Application Form D',
                        'description' => 'Official application form for Polish student visa (type D) for study applicants.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 25px;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O WYDANIE WIZY KRAJOWEJ</h1><p style="font-size: 14px; margin-top: 8px;">TYP D - WIZA STUDENCKA</p><p style="font-size: 12px; color: #666; margin-top: 5px;">Rzeczpospolita Polska - 2025</p></div>',
                        'body_html' => '<div style="font-size: 12px; line-height: 1.6;">
                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">I. DANE OSOBOWE WNIOSKODAWCY</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Nazwisko:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_surname]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Imię:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_first_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data urodzenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_birth_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Miejsce urodzenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_birth_place]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Obywatelstwo:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_citizenship]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Stan cywilny:</td><td style="padding: 8px; border: 1px solid #ccc;">[[marital_status]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">II. DOKUMENT PODRÓŻY</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Numer paszportu:</td><td style="padding: 8px; border: 1px solid #ccc;">[[passport_number]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Ważność paszportu do:</td><td style="padding: 8px; border: 1px solid #ccc;">[[passport_validity]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">III. DANE KONTAKTOWE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Adres zamieszkania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[current_address]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Telefon:</td><td style="padding: 8px; border: 1px solid #ccc;">[[phone_number]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">E-mail:</td><td style="padding: 8px; border: 1px solid #ccc;">[[email_address]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">IV. CEL POBYTU - STUDIA</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Uczelnia:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[university_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Kierunek studiów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[field_of_study]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Czas trwania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_duration]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data przyjęcia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[acceptance_letter_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Planowany przyjazd:</td><td style="padding: 8px; border: 1px solid #ccc;">[[intended_arrival_date]]</td></tr>
                        </table>

                        <div style="margin: 15px 0; padding: 10px; background-color: #f8f9fa; border-left: 4px solid #007bff;">
                            <p style="margin: 0; font-weight: bold;">Szczegółowy cel pobytu:</p>
                            <p style="margin: 8px 0 0 0;">[[visa_purpose]]</p>
                        </div>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">V. ZAKWATEROWANIE I FINANSOWANIE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Adres w Polsce:</td><td style="padding: 8px; border: 1px solid #ccc;">[[accommodation_address]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Kwota środków (PLN):</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[financial_support_amount]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Źródło finansowania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[financial_support_source]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Ubezpieczenie zdrowotne:</td><td style="padding: 8px; border: 1px solid #ccc;">[[health_insurance]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">VI. DODATKOWE INFORMACJE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 50%; background-color: #f8f9fa;">Wcześniejsze wnioski wizowe:</td><td style="padding: 8px; border: 1px solid #ccc;">[[previous_visa_applications]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Karalność:</td><td style="padding: 8px; border: 1px solid #ccc;">[[criminal_record]]</td></tr>
                        </table>

                        <div style="margin-top: 30px; padding: 15px; border: 2px solid #dc3545; background-color: #f8d7da;">
                            <h4 style="margin: 0 0 10px 0; color: #721c24;">OŚWIADCZENIE WNIOSKODAWCY</h4>
                            <p style="margin: 0; font-size: 11px; line-height: 1.5;">Oświadczam, że wszystkie podane przeze mnie informacje są prawdziwe i kompletne. Jestem świadomy/a, że podanie nieprawdziwych informacji może skutkować odmową wydania wizy oraz zakazem wjazdu do Rzeczypospolitej Polskiej. Zobowiązuję się do przestrzegania przepisów prawa polskiego podczas pobytu.</p>
                        </div>
                        </div>',
                        'footer_html' => '<div style="margin-top: 50px; font-size: 12px;"><table style="width: 100%; border-collapse: collapse;"><tr><td style="width: 30%;">Data:<br><br>.............................</td><td style="width: 40%; text-align: center;">Miejsce:<br><br>.............................</td><td style="width: 30%; text-align: right;">Podpis wnioskodawcy:<br><br>.............................</td></tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на студентську візу D',
                        'description' => 'Офіційна форма заяви на польську студентську візу (тип D) для кандидатів на навчання.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 25px;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O WYDANIE WIZY KRAJOWEJ</h1><p style="font-size: 14px; margin-top: 8px;">TYP D - WIZA STUDENCKA</p><p style="font-size: 12px; color: #666; margin-top: 5px;">Rzeczpospolita Polska - 2025</p></div>',
                        'body_html' => '<div style="font-size: 12px; line-height: 1.6;">
                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">I. DANE OSOBOWE WNIOSKODAWCY</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Nazwisko:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_surname]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Imię:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_first_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data urodzenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_birth_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Miejsce urodzenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_birth_place]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Obywatelstwo:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_citizenship]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Stan cywilny:</td><td style="padding: 8px; border: 1px solid #ccc;">[[marital_status]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">II. DOKUMENT PODRÓŻY</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Numer paszportu:</td><td style="padding: 8px; border: 1px solid #ccc;">[[passport_number]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Ważność paszportu do:</td><td style="padding: 8px; border: 1px solid #ccc;">[[passport_validity]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">III. DANE KONTAKTOWE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Adres zamieszkania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[current_address]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Telefon:</td><td style="padding: 8px; border: 1px solid #ccc;">[[phone_number]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">E-mail:</td><td style="padding: 8px; border: 1px solid #ccc;">[[email_address]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">IV. CEL POBYTU - STUDIA</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Uczelnia:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[university_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Kierunek studiów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[field_of_study]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Czas trwania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_duration]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data przyjęcia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[acceptance_letter_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Planowany przyjazd:</td><td style="padding: 8px; border: 1px solid #ccc;">[[intended_arrival_date]]</td></tr>
                        </table>

                        <div style="margin: 15px 0; padding: 10px; background-color: #f8f9fa; border-left: 4px solid #007bff;">
                            <p style="margin: 0; font-weight: bold;">Szczegółowy cel pobytu:</p>
                            <p style="margin: 8px 0 0 0;">[[visa_purpose]]</p>
                        </div>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">V. ZAKWATEROWANIE I FINANSOWANIE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Adres w Polsce:</td><td style="padding: 8px; border: 1px solid #ccc;">[[accommodation_address]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Kwota środków (PLN):</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[financial_support_amount]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Źródło finansowania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[financial_support_source]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Ubezpieczenie zdrowotne:</td><td style="padding: 8px; border: 1px solid #ccc;">[[health_insurance]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">VI. DODATKOWE INFORMACJE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 50%; background-color: #f8f9fa;">Wcześniejsze wnioski wizowe:</td><td style="padding: 8px; border: 1px solid #ccc;">[[previous_visa_applications]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Karalność:</td><td style="padding: 8px; border: 1px solid #ccc;">[[criminal_record]]</td></tr>
                        </table>

                        <div style="margin-top: 30px; padding: 15px; border: 2px solid #dc3545; background-color: #f8d7da;">
                            <h4 style="margin: 0 0 10px 0; color: #721c24;">OŚWIADCZENIE WNIOSKODAWCY</h4>
                            <p style="margin: 0; font-size: 11px; line-height: 1.5;">Oświadczam, że wszystkie podane przeze mnie informacje są prawdziwe i kompletne. Jestem świadomy/a, że podanie nieprawdziwych informacji może skutkować odmową wydania wizy oraz zakazem wjazdu do Rzeczypospolitej Polskiej. Zobowiązuję się do przestrzegania przepisów prawa polskiego podczas pobytu.</p>
                        </div>
                        </div>',
                        'footer_html' => '<div style="margin-top: 50px; font-size: 12px;"><table style="width: 100%; border-collapse: collapse;"><tr><td style="width: 30%;">Data:<br><br>.............................</td><td style="width: 40%; text-align: center;">Miejsce:<br><br>.............................</td><td style="width: 30%; text-align: right;">Podpis wnioskodawcy:<br><br>.............................</td></tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Studentenvisum-Antrag D',
                        'description' => 'Offizieller Antrag für polnisches Studentenvisum (Typ D) für Studienbewerber.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 25px;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O WYDANIE WIZY KRAJOWEJ</h1><p style="font-size: 14px; margin-top: 8px;">TYP D - WIZA STUDENCKA</p><p style="font-size: 12px; color: #666; margin-top: 5px;">Rzeczpospolita Polska - 2025</p></div>',
                        'body_html' => '<div style="font-size: 12px; line-height: 1.6;">
                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">I. DANE OSOBOWE WNIOSKODAWCY</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Nazwisko:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_surname]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Imię:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_first_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data urodzenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_birth_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Miejsce urodzenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_birth_place]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Obywatelstwo:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_citizenship]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Stan cywilny:</td><td style="padding: 8px; border: 1px solid #ccc;">[[marital_status]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">II. DOKUMENT PODRÓŻY</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Numer paszportu:</td><td style="padding: 8px; border: 1px solid #ccc;">[[passport_number]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Ważność paszportu do:</td><td style="padding: 8px; border: 1px solid #ccc;">[[passport_validity]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">III. DANE KONTAKTOWE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Adres zamieszkania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[current_address]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Telefon:</td><td style="padding: 8px; border: 1px solid #ccc;">[[phone_number]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">E-mail:</td><td style="padding: 8px; border: 1px solid #ccc;">[[email_address]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">IV. CEL POBYTU - STUDIA</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Uczelnia:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[university_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Kierunek studiów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[field_of_study]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Czas trwania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_duration]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data przyjęcia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[acceptance_letter_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Planowany przyjazd:</td><td style="padding: 8px; border: 1px solid #ccc;">[[intended_arrival_date]]</td></tr>
                        </table>

                        <div style="margin: 15px 0; padding: 10px; background-color: #f8f9fa; border-left: 4px solid #007bff;">
                            <p style="margin: 0; font-weight: bold;">Szczegółowy cel pobytu:</p>
                            <p style="margin: 8px 0 0 0;">[[visa_purpose]]</p>
                        </div>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">V. ZAKWATEROWANIE I FINANSOWANIE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Adres w Polsce:</td><td style="padding: 8px; border: 1px solid #ccc;">[[accommodation_address]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Kwota środków (PLN):</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[financial_support_amount]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Źródło finansowania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[financial_support_source]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Ubezpieczenie zdrowotne:</td><td style="padding: 8px; border: 1px solid #ccc;">[[health_insurance]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">VI. DODATKOWE INFORMACJE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 50%; background-color: #f8f9fa;">Wcześniejsze wnioski wizowe:</td><td style="padding: 8px; border: 1px solid #ccc;">[[previous_visa_applications]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Karalność:</td><td style="padding: 8px; border: 1px solid #ccc;">[[criminal_record]]</td></tr>
                        </table>

                        <div style="margin-top: 30px; padding: 15px; border: 2px solid #dc3545; background-color: #f8d7da;">
                            <h4 style="margin: 0 0 10px 0; color: #721c24;">OŚWIADCZENIE WNIOSKODAWCY</h4>
                            <p style="margin: 0; font-size: 11px; line-height: 1.5;">Oświadczam, że wszystkie podane przeze mnie informacje są prawdziwe i kompletne. Jestem świadomy/a, że podanie nieprawdziwych informacji może skutkować odmową wydania wizy oraz zakazem wjazdu do Rzeczypospolitej Polskiej. Zobowiązuję się do przestrzegania przepisów prawa polskiego podczas pobytu.</p>
                        </div>
                        </div>',
                        'footer_html' => '<div style="margin-top: 50px; font-size: 12px;"><table style="width: 100%; border-collapse: collapse;"><tr><td style="width: 30%;">Data:<br><br>.............................</td><td style="width: 40%; text-align: center;">Miejsce:<br><br>.............................</td><td style="width: 30%; text-align: right;">Podpis wnioskodawcy:<br><br>.............................</td></tr></table></div>'
                    ]
                ]
            ],

            // 6. НОВЫЙ ДОКУМЕНТ - Заявление на временное проживание для студентов
            [
                'category_id' => $catEdu->id,
                'slug' => 'pl-student-temporary-residence-permit-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"applicant_surname","type":"text","required":true,"labels":{"pl":"Nazwisko wnioskodawcy","en":"Applicant\'s Surname","uk":"Прізвище заявника","de":"Nachname des Antragstellers"}},
                    {"name":"applicant_first_name","type":"text","required":true,"labels":{"pl":"Imię wnioskodawcy","en":"Applicant\'s First Name","uk":"Ім\'я заявника","de":"Vorname des Antragstellers"}},
                    {"name":"applicant_birth_date","type":"date","required":true,"labels":{"pl":"Data urodzenia","en":"Date of Birth","uk":"Дата народження","de":"Geburtsdatum"}},
                    {"name":"applicant_citizenship","type":"text","required":true,"labels":{"pl":"Obywatelstwo","en":"Citizenship","uk":"Громадянство","de":"Staatsangehörigkeit"}},
                    {"name":"passport_number","type":"text","required":true,"labels":{"pl":"Numer paszportu","en":"Passport Number","uk":"Номер паспорта","de":"Reisepassnummer"}},
                    {"name":"current_address_poland","type":"textarea","required":true,"labels":{"pl":"Obecny adres zamieszkania w Polsce","en":"Current address in Poland","uk":"Поточна адреса проживання в Польщі","de":"Aktuelle Adresse in Polen"}},
                    {"name":"phone_number","type":"text","required":true,"labels":{"pl":"Numer telefonu","en":"Phone Number","uk":"Номер телефону","de":"Telefonnummer"}},
                    {"name":"email_address","type":"email","required":true,"labels":{"pl":"Adres e-mail","en":"E-mail Address","uk":"Електронна пошта","de":"E-Mail-Adresse"}},
                    {"name":"entry_date_poland","type":"date","required":true,"labels":{"pl":"Data wjazdu do Polski","en":"Date of entry to Poland","uk":"Дата в\'їзду до Польщі","de":"Datum der Einreise nach Polen"}},
                    {"name":"current_visa_type","type":"text","required":true,"labels":{"pl":"Rodzaj posiadanej wizy","en":"Type of current visa","uk":"Тип наявної візи","de":"Art des aktuellen Visums"}},
                    {"name":"university_name","type":"text","required":true,"labels":{"pl":"Nazwa uczelni","en":"University name","uk":"Назва університету","de":"Name der Universität"}},
                    {"name":"university_address","type":"textarea","required":true,"labels":{"pl":"Adres uczelni","en":"University address","uk":"Адреса університету","de":"Adresse der Universität"}},
                    {"name":"field_of_study","type":"text","required":true,"labels":{"pl":"Kierunek studiów","en":"Field of Study","uk":"Напрям навчання","de":"Studienrichtung"}},
                    {"name":"study_level","type":"select","options":{"licencjat":"Licencjat","inzynier":"Inżynier","magister":"Magister","doktorat":"Doktorat"},"required":true,"labels":{"pl":"Poziom studiów","en":"Study Level","uk":"Рівень навчання","de":"Studienebene"}},
                    {"name":"study_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia studiów","en":"Study start date","uk":"Дата початку навчання","de":"Studienbeginn"}},
                    {"name":"study_end_date","type":"date","required":true,"labels":{"pl":"Planowana data zakończenia studiów","en":"Planned study completion date","uk":"Планована дата закінчення навчання","de":"Geplantes Studienende"}},
                    {"name":"permit_period_requested","type":"text","required":true,"labels":{"pl":"Wnioskowany okres zezwolenia","en":"Requested permit period","uk":"Запитуваний період дозволу","de":"Beantragte Genehmigungsdauer"}},
                    {"name":"accommodation_type","type":"select","options":{"dormitory":"Akademik","private_room":"Pokój prywatny","apartment":"Mieszkanie","family":"U rodziny"},"required":true,"labels":{"pl":"Rodzaj zakwaterowania","en":"Type of accommodation","uk":"Тип проживання","de":"Art der Unterkunft"}},
                    {"name":"accommodation_address","type":"textarea","required":true,"labels":{"pl":"Adres zakwaterowania","en":"Accommodation address","uk":"Адреса проживання","de":"Unterkunftsadresse"}},
                    {"name":"monthly_income_amount","type":"number","required":true,"labels":{"pl":"Wysokość miesięcznych dochodów (PLN)","en":"Monthly income amount (PLN)","uk":"Сума щомісячного доходу (PLN)","de":"Höhe des monatlichen Einkommens (PLN)"}},
                    {"name":"income_source","type":"select","options":{"family_support":"Wsparcie rodziny","scholarship":"Stypendium","work":"Praca","savings":"Oszczędności","other":"Inne"},"required":true,"labels":{"pl":"Źródło dochodów","en":"Source of income","uk":"Джерело доходів","de":"Einkommensquelle"}},
                    {"name":"health_insurance_valid","type":"select","options":{"yes":"Tak","no":"Nie"},"required":true,"labels":{"pl":"Czy posiadasz ważne ubezpieczenie zdrowotne?","en":"Do you have valid health insurance?","uk":"Чи маєте дійсне медичне страхування?","de":"Haben Sie eine gültige Krankenversicherung?"}},
                    {"name":"criminal_record_certificate","type":"select","options":{"attached":"Załączam","will_provide":"Dostarczę","not_required":"Nie wymagane"},"required":true,"labels":{"pl":"Zaświadczenie o niekaralności","en":"Criminal record certificate","uk":"Довідка про несудимість","de":"Führungszeugnis"}},
                    {"name":"previous_residence_permits","type":"select","options":{"yes":"Tak","no":"Nie"},"required":true,"labels":{"pl":"Czy wcześniej posiadałeś zezwolenia na pobyt?","en":"Have you previously held residence permits?","uk":"Чи мали ви раніше дозволи на проживання?","de":"Hatten Sie zuvor Aufenthaltserlaubnisse?"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o zezwolenie na pobyt czasowy dla studenta',
                        'description' => 'Oficjalny wniosek o wydanie zezwolenia na pobyt czasowy w Polsce w celu kontynuowania nauki.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 25px;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O WYDANIE ZEZWOLENIA NA POBYT CZASOWY</h1><p style="font-size: 14px; margin-top: 8px; font-weight: bold;">W CELU KONTYNUOWANIA NAUKI</p><p style="font-size: 12px; color: #666; margin-top: 5px;">Urząd Wojewódzki - 2025</p></div>',
                        'body_html' => '<div style="font-size: 12px; line-height: 1.6;">


                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">I. DANE OSOBOWE WNIOSKODAWCY</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Nazwisko:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_surname]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Imię:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_first_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data urodzenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_birth_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Obywatelstwo:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_citizenship]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Numer paszportu:</td><td style="padding: 8px; border: 1px solid #ccc;">[[passport_number]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">II. POBYT W POLSCE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Data wjazdu do Polski:</td><td style="padding: 8px; border: 1px solid #ccc;">[[entry_date_poland]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Rodzaj posiadanej wizy:</td><td style="padding: 8px; border: 1px solid #ccc;">[[current_visa_type]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Obecny adres w Polsce:</td><td style="padding: 8px; border: 1px solid #ccc;">[[current_address_poland]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Telefon:</td><td style="padding: 8px; border: 1px solid #ccc;">[[phone_number]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">E-mail:</td><td style="padding: 8px; border: 1px solid #ccc;">[[email_address]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">III. INFORMACJE O STUDIACH</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Nazwa uczelni:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[university_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Adres uczelni:</td><td style="padding: 8px; border: 1px solid #ccc;">[[university_address]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Kierunek studiów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[field_of_study]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Poziom studiów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_level]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data rozpoczęcia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_start_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Planowane zakończenie:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_end_date]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">IV. WNIOSKOWANY OKRES ZEZWOLENIA</h3>
                        <div style="padding: 10px; border: 1px solid #007bff; background-color: #e7f3ff; margin-bottom: 20px;">
                            <p style="margin: 0; font-weight: bold;">Wnioskuję o wydanie zezwolenia na pobyt czasowy na okres:</p>
                            <p style="margin: 8px 0 0 0; font-size: 14px;"><strong>[[permit_period_requested]]</strong></p>
                        </div>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">V. ZAKWATEROWANIE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Rodzaj zakwaterowania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[accommodation_type]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Adres:</td><td style="padding: 8px; border: 1px solid #ccc;">[[accommodation_address]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">VI. SYTUACJA FINANSOWA</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Miesięczne dochody (PLN):</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[monthly_income_amount]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Źródło dochodów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[income_source]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">VII. DODATKOWE INFORMACJE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 50%; background-color: #f8f9fa;">Ubezpieczenie zdrowotne:</td><td style="padding: 8px; border: 1px solid #ccc;">[[health_insurance_valid]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Zaświadczenie o niekaralności:</td><td style="padding: 8px; border: 1px solid #ccc;">[[criminal_record_certificate]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Poprzednie zezwolenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[previous_residence_permits]]</td></tr>
                        </table>

                        <div style="margin-top: 30px; padding: 10px; border: 2px solid #dc3545; background-color: #f8d7da;">
                            <h4 style="margin: 0 0 10px 0; color: #721c24;">OŚWIADCZENIE</h4>
                            <p style="margin: 0; font-size: 11px; line-height: 1.2;">Oświadczam, że wszystkie podane przeze mnie informacje i dane są prawdziwe. Jestem świadomy/a odpowiedzialności karnej za składanie fałszywych oświadczeń. Zobowiązuję się do niezwłocznego powiadomienia organu o każdej zmianie okoliczności mających wpływ na pobyt.</p>
                        </div>
                        </div>',
                        'footer_html' => '<div style="margin-top: 15px; font-size: 12px;"><table style="width: 100%; border-collapse: collapse;"><tr><td style="width: 30%;">Data złożenia wniosku:<br><br>.............................</td><td style="width: 40%; text-align: center;">Miejsce:<br><br>.............................</td><td style="width: 30%; text-align: right;">Podpis wnioskodawcy:<br><br>.............................</td></tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Student Temporary Residence Permit Application',
                        'description' => 'Official application for temporary residence permit in Poland for the purpose of continuing studies.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 25px;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O WYDANIE ZEZWOLENIA NA POBYT CZASOWY</h1><p style="font-size: 14px; margin-top: 8px; font-weight: bold;">W CELU KONTYNUOWANIA NAUKI</p><p style="font-size: 12px; color: #666; margin-top: 5px;">Urząd Wojewódzki - 2025</p></div>',
                        'body_html' => '<div style="font-size: 12px; line-height: 1.6;">


                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">I. DANE OSOBOWE WNIOSKODAWCY</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Nazwisko:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_surname]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Imię:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_first_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data urodzenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_birth_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Obywatelstwo:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_citizenship]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Numer paszportu:</td><td style="padding: 8px; border: 1px solid #ccc;">[[passport_number]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">II. POBYT W POLSCE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Data wjazdu do Polski:</td><td style="padding: 8px; border: 1px solid #ccc;">[[entry_date_poland]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Rodzaj posiadanej wizy:</td><td style="padding: 8px; border: 1px solid #ccc;">[[current_visa_type]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Obecny adres w Polsce:</td><td style="padding: 8px; border: 1px solid #ccc;">[[current_address_poland]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Telefon:</td><td style="padding: 8px; border: 1px solid #ccc;">[[phone_number]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">E-mail:</td><td style="padding: 8px; border: 1px solid #ccc;">[[email_address]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">III. INFORMACJE O STUDIACH</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Nazwa uczelni:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[university_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Adres uczelni:</td><td style="padding: 8px; border: 1px solid #ccc;">[[university_address]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Kierunek studiów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[field_of_study]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Poziom studiów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_level]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data rozpoczęcia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_start_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Planowane zakończenie:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_end_date]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">IV. WNIOSKOWANY OKRES ZEZWOLENIA</h3>
                        <div style="padding: 10px; border: 1px solid #007bff; background-color: #e7f3ff; margin-bottom: 20px;">
                            <p style="margin: 0; font-weight: bold;">Wnioskuję o wydanie zezwolenia na pobyt czasowy na okres:</p>
                            <p style="margin: 8px 0 0 0; font-size: 14px;"><strong>[[permit_period_requested]]</strong></p>
                        </div>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">V. ZAKWATEROWANIE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Rodzaj zakwaterowania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[accommodation_type]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Adres:</td><td style="padding: 8px; border: 1px solid #ccc;">[[accommodation_address]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">VI. SYTUACJA FINANSOWA</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Miesięczne dochody (PLN):</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[monthly_income_amount]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Źródło dochodów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[income_source]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">VII. DODATKOWE INFORMACJE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 50%; background-color: #f8f9fa;">Ubezpieczenie zdrowotne:</td><td style="padding: 8px; border: 1px solid #ccc;">[[health_insurance_valid]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Zaświadczenie o niekaralności:</td><td style="padding: 8px; border: 1px solid #ccc;">[[criminal_record_certificate]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Poprzednie zezwolenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[previous_residence_permits]]</td></tr>
                        </table>

                        <div style="margin-top: 30px; padding: 10px; border: 2px solid #dc3545; background-color: #f8d7da;">
                            <h4 style="margin: 0 0 10px 0; color: #721c24;">OŚWIADCZENIE</h4>
                            <p style="margin: 0; font-size: 11px; line-height: 1.2;">Oświadczam, że wszystkie podane przeze mnie informacje i dane są prawdziwe. Jestem świadomy/a odpowiedzialności karnej za składanie fałszywych oświadczeń. Zobowiązuję się do niezwłocznego powiadomienia organu o każdej zmianie okoliczności mających wpływ na pobyt.</p>
                        </div>
                        </div>',
                        'footer_html' => '<div style="margin-top: 15px; font-size: 12px;"><table style="width: 100%; border-collapse: collapse;"><tr><td style="width: 30%;">Data złożenia wniosku:<br><br>.............................</td><td style="width: 40%; text-align: center;">Miejsce:<br><br>.............................</td><td style="width: 30%; text-align: right;">Podpis wnioskodawcy:<br><br>.............................</td></tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на тимчасовий дозвіл на проживання для студента ',
                        'description' => 'Офіційна заява на видачу тимчасового дозволу на проживання в Польщі з метою продовження навчання.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 25px;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O WYDANIE ZEZWOLENIA NA POBYT CZASOWY</h1><p style="font-size: 14px; margin-top: 8px; font-weight: bold;">W CELU KONTYNUOWANIA NAUKI</p><p style="font-size: 12px; color: #666; margin-top: 5px;">Urząd Wojewódzki - 2025</p></div>',
                        'body_html' => '<div style="font-size: 12px; line-height: 1.6;">


                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">I. DANE OSOBOWE WNIOSKODAWCY</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Nazwisko:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_surname]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Imię:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_first_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data urodzenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_birth_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Obywatelstwo:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_citizenship]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Numer paszportu:</td><td style="padding: 8px; border: 1px solid #ccc;">[[passport_number]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">II. POBYT W POLSCE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Data wjazdu do Polski:</td><td style="padding: 8px; border: 1px solid #ccc;">[[entry_date_poland]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Rodzaj posiadanej wizy:</td><td style="padding: 8px; border: 1px solid #ccc;">[[current_visa_type]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Obecny adres w Polsce:</td><td style="padding: 8px; border: 1px solid #ccc;">[[current_address_poland]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Telefon:</td><td style="padding: 8px; border: 1px solid #ccc;">[[phone_number]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">E-mail:</td><td style="padding: 8px; border: 1px solid #ccc;">[[email_address]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">III. INFORMACJE O STUDIACH</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Nazwa uczelni:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[university_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Adres uczelni:</td><td style="padding: 8px; border: 1px solid #ccc;">[[university_address]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Kierunek studiów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[field_of_study]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Poziom studiów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_level]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data rozpoczęcia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_start_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Planowane zakończenie:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_end_date]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">IV. WNIOSKOWANY OKRES ZEZWOLENIA</h3>
                        <div style="padding: 10px; border: 1px solid #007bff; background-color: #e7f3ff; margin-bottom: 20px;">
                            <p style="margin: 0; font-weight: bold;">Wnioskuję o wydanie zezwolenia na pobyt czasowy na okres:</p>
                            <p style="margin: 8px 0 0 0; font-size: 14px;"><strong>[[permit_period_requested]]</strong></p>
                        </div>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">V. ZAKWATEROWANIE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Rodzaj zakwaterowania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[accommodation_type]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Adres:</td><td style="padding: 8px; border: 1px solid #ccc;">[[accommodation_address]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">VI. SYTUACJA FINANSOWA</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Miesięczne dochody (PLN):</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[monthly_income_amount]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Źródło dochodów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[income_source]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">VII. DODATKOWE INFORMACJE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 50%; background-color: #f8f9fa;">Ubezpieczenie zdrowotne:</td><td style="padding: 8px; border: 1px solid #ccc;">[[health_insurance_valid]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Zaświadczenie o niekaralności:</td><td style="padding: 8px; border: 1px solid #ccc;">[[criminal_record_certificate]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Poprzednie zezwolenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[previous_residence_permits]]</td></tr>
                        </table>

                        <div style="margin-top: 30px; padding: 10px; border: 2px solid #dc3545; background-color: #f8d7da;">
                            <h4 style="margin: 0 0 10px 0; color: #721c24;">OŚWIADCZENIE</h4>
                            <p style="margin: 0; font-size: 11px; line-height: 1.2;">Oświadczam, że wszystkie podane przeze mnie informacje i dane są prawdziwe. Jestem świadomy/a odpowiedzialności karnej za składanie fałszywych oświadczeń. Zobowiązuję się do niezwłocznego powiadomienia organu o każdej zmianie okoliczności mających wpływ na pobyt.</p>
                        </div>
                        </div>',
                        'footer_html' => '<div style="margin-top: 15px; font-size: 12px;"><table style="width: 100%; border-collapse: collapse;"><tr><td style="width: 30%;">Data złożenia wniosku:<br><br>.............................</td><td style="width: 40%; text-align: center;">Miejsce:<br><br>.............................</td><td style="width: 30%; text-align: right;">Podpis wnioskodawcy:<br><br>.............................</td></tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf befristete Aufenthaltserlaubnis für Studenten',
                        'description' => 'Offizieller Antrag auf Erteilung einer befristeten Aufenthaltserlaubnis in Polen zum Zweck der Fortsetzung des Studiums.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 25px;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O WYDANIE ZEZWOLENIA NA POBYT CZASOWY</h1><p style="font-size: 14px; margin-top: 8px; font-weight: bold;">W CELU KONTYNUOWANIA NAUKI</p><p style="font-size: 12px; color: #666; margin-top: 5px;">Urząd Wojewódzki - 2025</p></div>',
                        'body_html' => '<div style="font-size: 12px; line-height: 1.6;">


                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">I. DANE OSOBOWE WNIOSKODAWCY</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Nazwisko:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_surname]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Imię:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[applicant_first_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data urodzenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_birth_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Obywatelstwo:</td><td style="padding: 8px; border: 1px solid #ccc;">[[applicant_citizenship]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Numer paszportu:</td><td style="padding: 8px; border: 1px solid #ccc;">[[passport_number]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">II. POBYT W POLSCE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Data wjazdu do Polski:</td><td style="padding: 8px; border: 1px solid #ccc;">[[entry_date_poland]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Rodzaj posiadanej wizy:</td><td style="padding: 8px; border: 1px solid #ccc;">[[current_visa_type]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Obecny adres w Polsce:</td><td style="padding: 8px; border: 1px solid #ccc;">[[current_address_poland]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Telefon:</td><td style="padding: 8px; border: 1px solid #ccc;">[[phone_number]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">E-mail:</td><td style="padding: 8px; border: 1px solid #ccc;">[[email_address]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">III. INFORMACJE O STUDIACH</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Nazwa uczelni:</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[university_name]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Adres uczelni:</td><td style="padding: 8px; border: 1px solid #ccc;">[[university_address]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Kierunek studiów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[field_of_study]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Poziom studiów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_level]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Data rozpoczęcia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_start_date]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Planowane zakończenie:</td><td style="padding: 8px; border: 1px solid #ccc;">[[study_end_date]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">IV. WNIOSKOWANY OKRES ZEZWOLENIA</h3>
                        <div style="padding: 10px; border: 1px solid #007bff; background-color: #e7f3ff; margin-bottom: 20px;">
                            <p style="margin: 0; font-weight: bold;">Wnioskuję o wydanie zezwolenia na pobyt czasowy na okres:</p>
                            <p style="margin: 8px 0 0 0; font-size: 14px;"><strong>[[permit_period_requested]]</strong></p>
                        </div>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">V. ZAKWATEROWANIE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Rodzaj zakwaterowania:</td><td style="padding: 8px; border: 1px solid #ccc;">[[accommodation_type]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Adres:</td><td style="padding: 8px; border: 1px solid #ccc;">[[accommodation_address]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">VI. SYTUACJA FINANSOWA</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 35%; background-color: #f8f9fa;">Miesięczne dochody (PLN):</td><td style="padding: 8px; border: 1px solid #ccc;"><strong>[[monthly_income_amount]]</strong></td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Źródło dochodów:</td><td style="padding: 8px; border: 1px solid #ccc;">[[income_source]]</td></tr>
                        </table>

                        <h3 style="background-color: #e9ecef; padding: 10px; font-size: 14px; margin: 20px 0 15px;">VII. DODATKOWE INFORMACJE</h3>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px;">
                            <tr><td style="padding: 8px; border: 1px solid #ccc; width: 50%; background-color: #f8f9fa;">Ubezpieczenie zdrowotne:</td><td style="padding: 8px; border: 1px solid #ccc;">[[health_insurance_valid]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Zaświadczenie o niekaralności:</td><td style="padding: 8px; border: 1px solid #ccc;">[[criminal_record_certificate]]</td></tr>
                            <tr><td style="padding: 8px; border: 1px solid #ccc; background-color: #f8f9fa;">Poprzednie zezwolenia:</td><td style="padding: 8px; border: 1px solid #ccc;">[[previous_residence_permits]]</td></tr>
                        </table>

                        <div style="margin-top: 30px; padding: 10px; border: 2px solid #dc3545; background-color: #f8d7da;">
                            <h4 style="margin: 0 0 10px 0; color: #721c24;">OŚWIADCZENIE</h4>
                            <p style="margin: 0; font-size: 11px; line-height: 1.2;">Oświadczam, że wszystkie podane przeze mnie informacje i dane są prawdziwe. Jestem świadomy/a odpowiedzialności karnej za składanie fałszywych oświadczeń. Zobowiązuję się do niezwłocznego powiadomienia organu o każdej zmianie okoliczności mających wpływ na pobyt.</p>
                        </div>
                        </div>',
                        'footer_html' => '<div style="margin-top: 15px; font-size: 12px;"><table style="width: 100%; border-collapse: collapse;"><tr><td style="width: 30%;">Data złożenia wniosku:<br><br>.............................</td><td style="width: 40%; text-align: center;">Miejsce:<br><br>.............................</td><td style="width: 30%; text-align: right;">Podpis wnioskodawcy:<br><br>.............................</td></tr></table></div>'
                    ],
                ]
            ]
        ];

        foreach ($templatesData as $templateData) {
            $this->createTemplate($templateData['category_id'], $templateData);
        }
    }

    private function createTemplate(int $categoryId, array $data): void
    {
        $template = Template::updateOrCreate(
            ['slug' => $data['slug']],
            [
                'category_id' => $categoryId,
                'is_active' => $data['is_active'] ?? true,
                'access_level' => $data['access_level'] ?? 'free',
                'country_code' => 'PL',
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
