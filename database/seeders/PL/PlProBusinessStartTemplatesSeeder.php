<?php

namespace Database\Seeders\PL;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class PlProBusinessStartTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds for Polish Business Start Package 2025-2026
     */
    public function run(): void
    {
        $catWork = Category::where('slug', 'work-pl')->firstOrFail();
        $catLegal = Category::where('slug', 'legal-claims-pl')->firstOrFail();

        $templatesData = [
            // === PAKIET "START BIZNESU: JDG" ===

            // 1. CEIDG-1 - Wniosek o wpis do CEIDG (2025)
            [
                'category_id' => $catWork->id,
                'slug' => 'pl-ceidg1-business-registration-2025',
                'access_level' => 'pro',
                'fields' => '[
                    {"name":"applicant_surname","type":"text","required":true,"labels":{"pl":"Nazwisko","en":"Surname"}},
                    {"name":"applicant_first_name","type":"text","required":true,"labels":{"pl":"Pierwsze imię","en":"First name"}},
                    {"name":"applicant_second_name","type":"text","required":false,"labels":{"pl":"Drugie imię (jeśli posiada)","en":"Second name (if any)"}},
                    {"name":"applicant_pesel","type":"text","required":true,"labels":{"pl":"Numer PESEL","en":"PESEL number"}},
                    {"name":"applicant_birth_date","type":"date","required":true,"labels":{"pl":"Data urodzenia","en":"Date of birth"}},
                    {"name":"applicant_birth_place","type":"text","required":true,"labels":{"pl":"Miejsce urodzenia (miejscowość, kraj)","en":"Place of birth (city, country)"}},
                    {"name":"applicant_father_name","type":"text","required":true,"labels":{"pl":"Imię ojca","en":"Father\'s name"}},
                    {"name":"applicant_mother_name","type":"text","required":true,"labels":{"pl":"Imię matki","en":"Mother\'s name"}},
                    {"name":"applicant_mother_surname","type":"text","required":true,"labels":{"pl":"Nazwisko rodowe matki","en":"Mother\'s maiden name"}},
                    {"name":"citizenship","type":"text","required":true,"labels":{"pl":"Obywatelstwo","en":"Citizenship"}},

                    {"name":"res_country","type":"text","required":true,"labels":{"pl":"Kraj zamieszkania","en":"Country of residence"}},
                    {"name":"res_voivodeship","type":"text","required":true,"labels":{"pl":"Województwo","en":"Voivodeship"}},
                    {"name":"res_county","type":"text","required":true,"labels":{"pl":"Powiat","en":"County"}},
                    {"name":"res_commune","type":"text","required":true,"labels":{"pl":"Gmina","en":"Commune"}},
                    {"name":"res_city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City"}},
                    {"name":"res_street","type":"text","required":true,"labels":{"pl":"Ulica","en":"Street"}},
                    {"name":"res_building_no","type":"text","required":true,"labels":{"pl":"Nr domu","en":"Building no."}},
                    {"name":"res_flat_no","type":"text","required":false,"labels":{"pl":"Nr lokalu","en":"Flat no."}},
                    {"name":"res_post_code","type":"text","required":true,"labels":{"pl":"Kod pocztowy","en":"Postal code"}},

                    {"name":"company_full_name","type":"text","required":true,"labels":{"pl":"Pełna nazwa firmy (musi zawierać imię i nazwisko)","en":"Full company name (must include first and last name)"}},
                    {"name":"company_short_name","type":"text","required":false,"labels":{"pl":"Nazwa skrócona (jeśli różni się)","en":"Short name (if different)"}},

                    {"name":"business_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia działalności","en":"Business start date"}},

                    {"name":"pkd_main_code","type":"text","required":true,"labels":{"pl":"Kod PKD działalności przeważającej (2025)","en":"Main PKD code (2025)"}},
                    {"name":"pkd_main_description","type":"text","required":true,"labels":{"pl":"Opis działalności przeważającej","en":"Main activity description"}},
                    {"name":"pkd_additional","type":"textarea","required":false,"labels":{"pl":"Dodatkowe kody PKD z opisem (jeśli prowadzona)","en":"Additional PKD codes with description (if applicable)"}},

                    {"name":"business_address_same_as_residence","type":"checkbox","required":false,"labels":{"pl":"Adres wykonywania działalności taki sam jak zamieszkania","en":"Business address same as residence"}},
                    {"name":"business_no_permanent_address","type":"checkbox","required":false,"labels":{"pl":"Brak stałego miejsca wykonywania działalności","en":"No permanent place of business"}},
                    {"name":"bus_country","type":"text","required":false,"labels":{"pl":"Kraj (adres działalności)","en":"Country (business address)"}},
                    {"name":"bus_voivodeship","type":"text","required":false,"labels":{"pl":"Województwo","en":"Voivodeship"}},
                    {"name":"bus_county","type":"text","required":false,"labels":{"pl":"Powiat","en":"County"}},
                    {"name":"bus_commune","type":"text","required":false,"labels":{"pl":"Gmina","en":"Commune"}},
                    {"name":"bus_city","type":"text","required":false,"labels":{"pl":"Miejscowość","en":"City"}},
                    {"name":"bus_street","type":"text","required":false,"labels":{"pl":"Ulica","en":"Street"}},
                    {"name":"bus_building_no","type":"text","required":false,"labels":{"pl":"Nr domu","en":"Building no."}},
                    {"name":"bus_flat_no","type":"text","required":false,"labels":{"pl":"Nr lokalu","en":"Flat no."}},
                    {"name":"bus_post_code","type":"text","required":false,"labels":{"pl":"Kod pocztowy","en":"Postal code"}},

                    {"name":"correspondence_address_different","type":"checkbox","required":false,"labels":{"pl":"Adres do korespondencji inny niż zamieszkania","en":"Correspondence address different from residence"}},
                    {"name":"corr_country","type":"text","required":false,"labels":{"pl":"Kraj (adres korespondencyjny)","en":"Country (correspondence address)"}},
                    {"name":"corr_voivodeship","type":"text","required":false,"labels":{"pl":"Województwo","en":"Voivodeship"}},
                    {"name":"corr_county","type":"text","required":false,"labels":{"pl":"Powiat","en":"County"}},
                    {"name":"corr_commune","type":"text","required":false,"labels":{"pl":"Gmina","en":"Commune"}},
                    {"name":"corr_city","type":"text","required":false,"labels":{"pl":"Miejscowość","en":"City"}},
                    {"name":"corr_street","type":"text","required":false,"labels":{"pl":"Ulica","en":"Street"}},
                    {"name":"corr_building_no","type":"text","required":false,"labels":{"pl":"Nr domu","en":"Building no."}},
                    {"name":"corr_flat_no","type":"text","required":false,"labels":{"pl":"Nr lokalu","en":"Flat no."}},
                    {"name":"corr_post_code","type":"text","required":false,"labels":{"pl":"Kod pocztowy","en":"Postal code"}},

                    {"name":"tax_office_name","type":"text","required":true,"labels":{"pl":"Naczelnik Urzędu Skarbowego","en":"Head of the Tax Office"}},
                    {"name":"tax_form","type":"select","options":{"zasady_ogolne":"Opodatkowanie na zasadach ogólnych (skala podatkowa 12% i 32%)","podatek_liniowy":"Podatek liniowy (19%)","ryczalt_ewidencjonowany":"Ryczałt od przychodów ewidencjonowanych"},"required":true,"labels":{"pl":"Forma opodatkowania","en":"Form of taxation"}},

                    {"name":"social_insurance_system","type":"select","options":{"zus":"Zakład Ubezpieczeń Społecznych (ZUS)","krus":"Kasa Rolniczego Ubezpieczenia Społecznego (KRUS)"},"required":true,"labels":{"pl":"System ubezpieczeń społecznych","en":"Social insurance system"}},
                    {"name":"zus_obligation_date","type":"date","required":true,"labels":{"pl":"Data powstania obowiązku opłacania składek ZUS","en":"Date of ZUS contribution obligation"}},

                    {"name":"e_doreczenia","type":"checkbox","required":false,"labels":{"pl":"Chcę otrzymywać e-Doręczenia (obowiązkowe od 2025)","en":"I want to receive e-Deliveries (mandatory from 2025)"}},
                    {"name":"e_doreczenia_address","type":"text","required":false,"labels":{"pl":"Adres e-Doręczeń","en":"e-Delivery address"}},

                    {"name":"additional_statements","type":"textarea","required":false,"labels":{"pl":"Dodatkowe oświadczenia lub informacje","en":"Additional statements or information"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'CEIDG-1 - Wniosek o wpis do Centralnej Ewidencji i Informacji o Działalności Gospodarczej (2025)',
                        'description' => 'Kompletny formularz CEIDG-1 z najnowszymi wymaganiami na 2025-2026 rok, uwzględniający e-Doręczenia i nowe kody PKD.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 14px; font-weight: bold; text-transform: uppercase;">WNIOSEK O WPIS DO CENTRALNEJ EWIDENCJI I INFORMACJI O DZIAŁALNOŚCI GOSPODARCZEJ</h1><p style="font-size: 12px; margin-top: 10px;">CEIDG-1 (wersja 2025)</p></div>',
                        'body_html' => '
                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 20px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">SEKCJA 03. DANE WNIOSKODAWCY</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 30%; vertical-align: top; padding: 2px;"><strong>Nazwisko:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[applicant_surname]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;"><strong>Pierwsze imię:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[applicant_first_name]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Drugie imię:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[applicant_second_name]]</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;"><strong>Numer PESEL:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[applicant_pesel]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Data urodzenia:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[applicant_birth_date]]</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Miejsce urodzenia:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[applicant_birth_place]]</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Imię ojca:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[applicant_father_name]]</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Imię matki:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[applicant_mother_name]]</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Nazwisko rodowe matki:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[applicant_mother_surname]]</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Obywatelstwo:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[citizenship]]</td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 20px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">SEKCJA 04. ADRES ZAMIESZKANIA</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 20%; padding: 2px;">Kraj:</td>
                                    <td style="width: 30%; border-bottom: 1px solid #000; padding: 2px;">[[res_country]]</td>
                                    <td style="width: 20%; padding: 2px;">Województwo:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[res_voivodeship]]</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px;">Powiat:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[res_county]]</td>
                                    <td style="padding: 2px;">Gmina:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[res_commune]]</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px;">Miejscowość:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[res_city]]</td>
                                    <td style="padding: 2px;">Kod pocztowy:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[res_post_code]]</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px;">Ulica:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[res_street]]</td>
                                    <td style="padding: 2px;">Nr domu:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[res_building_no]]</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px;">Nr lokalu:</td>
                                    <td colspan="3" style="border-bottom: 1px solid #000; padding: 2px;">[[res_flat_no]]</td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 20px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">SEKCJA 06-08. DANE FIRMY I DZIAŁALNOŚCI</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 30%; vertical-align: top; padding: 2px;"><strong>Pełna nazwa firmy:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[company_full_name]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Nazwa skrócona:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[company_short_name]]</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;"><strong>Data rozpoczęcia działalności:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[business_start_date]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;"><strong>Kod PKD działalności przeważającej (2025):</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[pkd_main_code]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Opis działalności przeważającej:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[pkd_main_description]]</td>
                                </tr>
                            </table>
                            <p style="font-size: 10px; margin-top: 10px;"><strong>Dodatkowe kody PKD:</strong><br>[[pkd_additional]]</p>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 20px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">SEKCJA 10. ADRESY ZWIĄZANE Z DZIAŁALNOŚCIĄ</h3>

                            <p style="font-size: 10px; margin-bottom: 10px;">
                                <input type="checkbox" style="margin-right: 5px;">[[business_address_same_as_residence]] Adres wykonywania działalności taki sam jak zamieszkania<br>
                                <input type="checkbox" style="margin-right: 5px;">[[business_no_permanent_address]] Brak stałego miejsca wykonywania działalności
                            </p>

                            <p style="font-size: 10px; font-weight: bold;">MIEJSCE WYKONYWANIA DZIAŁALNOŚCI (jeśli różni się od adresu zamieszkania):</p>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 20%; padding: 2px;">Kraj:</td>
                                    <td style="width: 30%; border-bottom: 1px solid #000; padding: 2px;">[[bus_country]]</td>
                                    <td style="width: 20%; padding: 2px;">Województwo:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[bus_voivodeship]]</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px;">Miejscowość:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[bus_city]]</td>
                                    <td style="padding: 2px;">Kod pocztowy:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[bus_post_code]]</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px;">Ulica:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[bus_street]]</td>
                                    <td style="padding: 2px;">Nr domu/lokalu:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[bus_building_no]]/[[bus_flat_no]]</td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 20px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">SEKCJA 12. UBEZPIECZENIA SPOŁECZNE</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 40%; vertical-align: top; padding: 2px;"><strong>System ubezpieczeń:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[social_insurance_system]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Data powstania obowiązku ZUS:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[zus_obligation_date]]</td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 20px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">SEKCJA 17-18. INFORMACJE PODATKOWE</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 40%; vertical-align: top; padding: 2px;"><strong>Naczelnik Urzędu Skarbowego:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[tax_office_name]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;"><strong>Forma opodatkowania:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[tax_form]]</strong></td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 20px; background: #fffacd;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px; color: #d2691e;">NOWOŚĆ 2025: E-DORĘCZENIA</h3>
                            <p style="font-size: 10px; margin-bottom: 10px;">
                                <input type="checkbox" style="margin-right: 5px;">[[e_doreczenia]]
                                <strong>Chcę otrzymywać e-Doręczenia (obowiązkowe dla większości przedsiębiorców od 1 stycznia 2025)</strong>
                            </p>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 30%; vertical-align: top; padding: 2px;">Adres e-Doręczeń:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[e_doreczenia_address]]</td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 20px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">DODATKOWE INFORMACJE</h3>
                            <p style="font-size: 10px;">[[additional_statements]]</p>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 40px;">
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 50%; text-align: left;">Miejsce: ________________</td>
                                    <td style="text-align: right;">Data: ________________</td>
                                </tr>
                            </table>
                            <p style="margin-top: 40px; text-align: right; font-size: 10px;">
                                _____________________________<br>
                                (Podpis wnioskodawcy)
                            </p>
                        </div>
                        <div style="margin-top: 30px; padding: 10px; border: 1px solid #000; background: #f9f9f9; font-size: 9px; text-align: center;">
                            <p><strong>WAŻNE INFORMACJE 2025:</strong></p>
                            <p>• Wniosek składa się bezpłatnie przez portal biznes.gov.pl lub w urzędzie gminy</p>
                            <p>• Od 2025 roku obowiązują nowe kody PKD oraz wymagania e-Doręczeń</p>
                            <p>• Po zarejestrowaniu działalności należy złożyć dodatkowo: ZUS ZUA/ZZA oraz ewentualnie VAT-R</p>
                            <p>• Termin złożenia: przed rozpoczęciem działalności gospodarczej</p>
                        </div>'
                    ],
                ]
            ],

            // 2. ZUS ZUA - Zgłoszenie do ubezpieczeń (2025)
            [
                'category_id' => $catWork->id,
                'slug' => 'pl-zus-zua-insurance-registration-2025',
                'access_level' => 'pro',
                'fields' => '[
                    {"name":"registration_type","type":"select","options":{"zua":"ZUS ZUA - Zgłoszenie do pełnych ubezpieczeń","zza":"ZUS ZZA - Zgłoszenie tylko do ubezpieczenia zdrowotnego"},"required":true,"labels":{"pl":"Rodzaj zgłoszenia","en":"Type of registration"}},

                    {"name":"payer_nip","type":"text","required":true,"labels":{"pl":"NIP płatnika składek (przedsiębiorcy)","en":"Payer\'s NIP (entrepreneur)"}},
                    {"name":"payer_regon","type":"text","required":true,"labels":{"pl":"REGON płatnika","en":"Payer\'s REGON"}},
                    {"name":"payer_name","type":"text","required":true,"labels":{"pl":"Nazwa skrócona płatnika (nazwa firmy)","en":"Payer\'s short name (company name)"}},

                    {"name":"insured_surname","type":"text","required":true,"labels":{"pl":"Nazwisko ubezpieczonego","en":"Insured person\'s surname"}},
                    {"name":"insured_first_name","type":"text","required":true,"labels":{"pl":"Pierwsze imię ubezpieczonego","en":"Insured person\'s first name"}},
                    {"name":"insured_pesel","type":"text","required":true,"labels":{"pl":"PESEL ubezpieczonego","en":"Insured person\'s PESEL"}},
                    {"name":"insured_birth_date","type":"date","required":true,"labels":{"pl":"Data urodzenia","en":"Date of birth"}},
                    {"name":"insured_citizenship","type":"text","required":true,"labels":{"pl":"Obywatelstwo","en":"Citizenship"}},

                    {"name":"insured_address_country","type":"text","required":true,"labels":{"pl":"Kraj zamieszkania","en":"Country of residence"}},
                    {"name":"insured_address_voivodeship","type":"text","required":true,"labels":{"pl":"Województwo","en":"Voivodeship"}},
                    {"name":"insured_address_city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City"}},
                    {"name":"insured_address_street","type":"text","required":true,"labels":{"pl":"Ulica","en":"Street"}},
                    {"name":"insured_address_building","type":"text","required":true,"labels":{"pl":"Nr domu","en":"Building number"}},
                    {"name":"insured_address_flat","type":"text","required":false,"labels":{"pl":"Nr lokalu","en":"Flat number"}},
                    {"name":"insured_address_postal_code","type":"text","required":true,"labels":{"pl":"Kod pocztowy","en":"Postal code"}},

                    {"name":"insurance_title_code","type":"text","required":true,"labels":{"pl":"Kod tytułu ubezpieczenia (np. 05 70 00 dla JDG)","en":"Insurance title code (e.g., 05 70 00 for sole proprietorship)"}},
                    {"name":"insurance_basis","type":"textarea","required":true,"labels":{"pl":"Podstawa prawna ubezpieczenia","en":"Legal basis for insurance"}},
                    {"name":"insurance_start_date","type":"date","required":true,"labels":{"pl":"Data powstania obowiązku ubezpieczenia","en":"Date of insurance obligation commencement"}},
                    {"name":"contribution_group","type":"text","required":true,"labels":{"pl":"Grupa składkowa","en":"Contribution group"}},
                    {"name":"health_insurance_nfz_branch","type":"text","required":true,"labels":{"pl":"Oddział NFZ właściwy dla ubezpieczenia zdrowotnego","en":"NFZ branch for health insurance"}},

                    {"name":"pension_insurance","type":"checkbox","required":false,"labels":{"pl":"Ubezpieczenie emerytalne","en":"Pension insurance"}},
                    {"name":"disability_insurance","type":"checkbox","required":false,"labels":{"pl":"Ubezpieczenie rentowe","en":"Disability insurance"}},
                    {"name":"sickness_insurance","type":"checkbox","required":false,"labels":{"pl":"Ubezpieczenie chorobowe","en":"Sickness insurance"}},
                    {"name":"accident_insurance","type":"checkbox","required":false,"labels":{"pl":"Ubezpieczenie wypadkowe","en":"Accident insurance"}},
                    {"name":"health_insurance","type":"checkbox","required":false,"labels":{"pl":"Ubezpieczenie zdrowotne","en":"Health insurance"}},
                    {"name":"labour_fund","type":"checkbox","required":false,"labels":{"pl":"Fundusz Pracy","en":"Labour Fund"}},

                    {"name":"special_conditions","type":"textarea","required":false,"labels":{"pl":"Szczególne warunki ubezpieczenia","en":"Special insurance conditions"}},
                    {"name":"additional_info","type":"textarea","required":false,"labels":{"pl":"Dodatkowe informacje","en":"Additional information"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'ZUS ZUA - Zgłoszenie do ubezpieczeń społecznych (2025)',
                        'description' => 'Formularz zgłoszenia osoby prowadzącej działalność gospodarczą do obowiązkowych ubezpieczeń społecznych w ZUS (wersja 2025).',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 14px; font-weight: bold; text-transform: uppercase;">ZGŁOSZENIE DO UBEZPIECZEŃ</h1><p style="font-size: 12px; margin-top: 5px;">[[registration_type]]</p><p style="font-size: 10px; margin-top: 5px;">Formularz ZUS (wersja 2025)</p></div>',
                        'body_html' => '
                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 15px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">I. DANE ORGANIZACYJNE</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 40%; vertical-align: top; padding: 2px;"><strong>Rodzaj zgłoszenia:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[registration_type]]</strong></td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 15px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">II. DANE IDENTYFIKACYJNE PŁATNIKA SKŁADEK</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 30%; vertical-align: top; padding: 2px;"><strong>NIP:</strong></td>
                                    <td style="width: 30%; border-bottom: 1px solid #000; padding: 2px;"><strong>[[payer_nip]]</strong></td>
                                    <td style="width: 20%; vertical-align: top; padding: 2px;"><strong>REGON:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[payer_regon]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px; padding-top: 10px;"><strong>Nazwa skrócona:</strong></td>
                                    <td colspan="3" style="border-bottom: 1px solid #000; padding: 2px; padding-top: 10px;"><strong>[[payer_name]]</strong></td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 15px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">III. DANE IDENTYFIKACYJNE OSOBY ZGŁASZANEJ DO UBEZPIECZEŃ</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 20%; vertical-align: top; padding: 2px;"><strong>Nazwisko:</strong></td>
                                    <td style="width: 30%; border-bottom: 1px solid #000; padding: 2px;"><strong>[[insured_surname]]</strong></td>
                                    <td style="width: 20%; vertical-align: top; padding: 2px;"><strong>Pierwsze imię:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[insured_first_name]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;"><strong>PESEL:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[insured_pesel]]</strong></td>
                                    <td style="vertical-align: top; padding: 2px;">Data urodzenia:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[insured_birth_date]]</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Obywatelstwo:</td>
                                    <td colspan="3" style="border-bottom: 1px solid #000; padding: 2px;">[[insured_citizenship]]</td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 15px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">IV. DANE EWIDENCYJNE OSOBY ZGŁASZANEJ</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 20%; padding: 2px;">Kraj:</td>
                                    <td style="width: 30%; border-bottom: 1px solid #000; padding: 2px;">[[insured_address_country]]</td>
                                    <td style="width: 20%; padding: 2px;">Województwo:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[insured_address_voivodeship]]</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px;">Miejscowość:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[insured_address_city]]</td>
                                    <td style="padding: 2px;">Kod pocztowy:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[insured_address_postal_code]]</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px;">Ulica:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[insured_address_street]]</td>
                                    <td style="padding: 2px;">Nr domu:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[insured_address_building]]</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px;">Nr lokalu:</td>
                                    <td colspan="3" style="border-bottom: 1px solid #000; padding: 2px;">[[insured_address_flat]]</td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 15px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">V. DANE O OBOWIĄZKOWYCH UBEZPIECZENIACH</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 30%; vertical-align: top; padding: 2px;"><strong>Kod tytułu ubezpieczenia:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[insurance_title_code]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Podstawa prawna:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[insurance_basis]]</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;"><strong>Data powstania obowiązku:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[insurance_start_date]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Grupa składkowa:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[contribution_group]]</td>
                                </tr>
                            </table>

                            <p style="font-size: 10px; font-weight: bold; margin-top: 15px;">RODZAJE UBEZPIECZEŃ:</p>
                            <table style="width: 100%; font-size: 9px;">
                                <tr>
                                    <td style="width: 25%;"><input type="checkbox"> [[pension_insurance]] Emerytalne</td>
                                    <td style="width: 25%;"><input type="checkbox"> [[disability_insurance]] Rentowe</td>
                                    <td style="width: 25%;"><input type="checkbox"> [[sickness_insurance]] Chorobowe</td>
                                    <td style="width: 25%;"><input type="checkbox"> [[accident_insurance]] Wypadkowe</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="checkbox"> [[health_insurance]] Zdrowotne</td>
                                    <td colspan="2"><input type="checkbox"> [[labour_fund]] Fundusz Pracy</td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 15px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">VI. UBEZPIECZENIE ZDROWOTNE</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 30%; vertical-align: top; padding: 2px;"><strong>Oddział NFZ:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[health_insurance_nfz_branch]]</strong></td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 15px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">VII. INFORMACJE DODATKOWE</h3>
                            <p style="font-size: 10px; margin-bottom: 10px;"><strong>Szczególne warunki ubezpieczenia:</strong><br>[[special_conditions]]</p>
                            <p style="font-size: 10px;"><strong>Dodatkowe informacje:</strong><br>[[additional_info]]</p>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 40px;">
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 50%; text-align: left;">Miejsce: ________________</td>
                                    <td style="text-align: right;">Data: ________________</td>
                                </tr>
                            </table>
                            <p style="margin-top: 40px; text-align: right; font-size: 10px;">
                                _____________________________<br>
                                (Podpis płatnika składek)
                            </p>
                        </div>
                        <div style="margin-top: 30px; padding: 10px; border: 1px solid #000; background: #f9f9f9; font-size: 9px; text-align: center;">
                            <p><strong>WAŻNE INFORMACJE:</strong></p>
                            <p>• Zgłoszenie należy złożyć w ZUS w terminie 7 dni od daty powstania obowiązku ubezpieczeń</p>
                            <p>• Dla JDG najczęściej używany kod tytułu: 05 70 00</p>
                            <p>• Formularz można złożyć elektronicznie przez PUE ZUS lub osobiście w oddziale ZUS</p>
                        </div>'
                    ],
                ]
            ],

            // 3. VAT-R - Zgłoszenie rejestracyjne VAT (2025)
            [
                'category_id' => $catWork->id,
                'slug' => 'pl-vat-r-registration-2025',
                'access_level' => 'pro',
                'fields' => '[
                    {"name":"submission_purpose","type":"select","options":{"rejestracja":"Zgłoszenie rejestracyjne","aktualizacja":"Zgłoszenie aktualizacyjne","wyrejestrowanie":"Zgłoszenie wyrejestrowania"},"required":true,"labels":{"pl":"Cel złożenia zgłoszenia","en":"Purpose of submission"}},
                    {"name":"tax_office_name","type":"text","required":true,"labels":{"pl":"Naczelnik Urzędu Skarbowego","en":"Head of the Tax Office"}},

                    {"name":"taxpayer_nip","type":"text","required":true,"labels":{"pl":"NIP podatnika","en":"Taxpayer\'s NIP"}},
                    {"name":"taxpayer_regon","type":"text","required":false,"labels":{"pl":"REGON podatnika","en":"Taxpayer\'s REGON"}},
                    {"name":"taxpayer_pesel","type":"text","required":false,"labels":{"pl":"PESEL podatnika (dla osób fizycznych)","en":"Taxpayer\'s PESEL (for individuals)"}},
                    {"name":"taxpayer_full_name","type":"text","required":true,"labels":{"pl":"Pełna nazwa podatnika","en":"Full name of taxpayer"}},
                    {"name":"taxpayer_short_name","type":"text","required":false,"labels":{"pl":"Nazwa skrócona","en":"Short name"}},

                    {"name":"taxpayer_address_country","type":"text","required":true,"labels":{"pl":"Kraj","en":"Country"}},
                    {"name":"taxpayer_address_voivodeship","type":"text","required":true,"labels":{"pl":"Województwo","en":"Voivodeship"}},
                    {"name":"taxpayer_address_county","type":"text","required":true,"labels":{"pl":"Powiat","en":"County"}},
                    {"name":"taxpayer_address_commune","type":"text","required":true,"labels":{"pl":"Gmina","en":"Commune"}},
                    {"name":"taxpayer_address_city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City"}},
                    {"name":"taxpayer_address_street","type":"text","required":true,"labels":{"pl":"Ulica","en":"Street"}},
                    {"name":"taxpayer_address_building","type":"text","required":true,"labels":{"pl":"Nr domu","en":"Building number"}},
                    {"name":"taxpayer_address_flat","type":"text","required":false,"labels":{"pl":"Nr lokalu","en":"Flat number"}},
                    {"name":"taxpayer_address_postal_code","type":"text","required":true,"labels":{"pl":"Kod pocztowy","en":"Postal code"}},

                    {"name":"vat_liability_date","type":"date","required":true,"labels":{"pl":"Data powstania obowiązku podatkowego VAT","en":"Date of VAT tax liability"}},
                    {"name":"vat_registration_reason","type":"select","options":{"przekroczenie_limitu":"Przekroczenie limitu zwolnienia","rezygnacja_ze_zwolnienia":"Dobrowolna rezygnacja ze zwolnienia","rozpoczecie_dzialalnosci":"Rozpoczęcie działalności podlegającej VAT","import_towarow":"Import towarów","nabycie_wewnatrzwspolnotowe":"Nabycie wewnątrzwspólnotowe"},"required":true,"labels":{"pl":"Powód rejestracji VAT","en":"Reason for VAT registration"}},

                    {"name":"vat_status","type":"select","options":{"czynny":"Podatnik VAT czynny","zwolniony":"Podatnik VAT zwolniony"},"required":true,"labels":{"pl":"Status podatnika VAT","en":"VAT taxpayer status"}},
                    {"name":"vat_exemption_basis","type":"text","required":false,"labels":{"pl":"Podstawa prawna zwolnienia (art. ustawy o VAT)","en":"Legal basis for exemption (VAT Act article)"}},

                    {"name":"settlement_period","type":"select","options":{"miesieczny":"Rozliczenia miesięczne","kwartalny":"Rozliczenia kwartalne"},"required":false,"labels":{"pl":"Okres rozliczeniowy (dla podatnika czynnego)","en":"Settlement period (for active taxpayer)"}},
                    {"name":"cash_method","type":"checkbox","required":false,"labels":{"pl":"Metoda kasowa","en":"Cash method"}},

                    {"name":"business_activity_pkd","type":"textarea","required":true,"labels":{"pl":"Rodzaj prowadzonej działalności gospodarczej (kody PKD 2025)","en":"Type of business activity (PKD codes 2025)"}},

                    {"name":"vat_ue_registration","type":"checkbox","required":false,"labels":{"pl":"Wnoszę o rejestrację jako podatnik VAT UE","en":"I apply for registration as VAT EU taxpayer"}},
                    {"name":"vat_ue_reason","type":"text","required":false,"labels":{"pl":"Podstawa rejestracji VAT UE","en":"Basis for VAT EU registration"}},

                    {"name":"sme_procedure","type":"checkbox","required":false,"labels":{"pl":"Chcę korzystać z procedury dla małych przedsiębiorstw (SME) - NOWOŚĆ 2025","en":"I want to use Small and Medium Enterprise (SME) procedure - NEW 2025"}},
                    {"name":"sme_turnover_estimate","type":"number","required":false,"labels":{"pl":"Szacunkowy obrót roczny (dla procedury SME)","en":"Estimated annual turnover (for SME procedure)"}},

                    {"name":"electronic_invoicing","type":"checkbox","required":false,"labels":{"pl":"Wyrażam zgodę na otrzymywanie faktur elektronicznych","en":"I consent to receiving electronic invoices"}},
                    {"name":"special_procedures","type":"textarea","required":false,"labels":{"pl":"Szczególne procedury VAT (marża, używane towary, etc.)","en":"Special VAT procedures (margin, second-hand goods, etc.)"}},

                    {"name":"additional_information","type":"textarea","required":false,"labels":{"pl":"Dodatkowe informacje","en":"Additional information"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'VAT-R - Zgłoszenie rejestracyjne w zakresie podatku VAT (2025)',
                        'description' => 'Formularz VAT-R służący do rejestracji jako podatnik VAT czynny lub zwolniony z uwzględnieniem nowych procedur SME obowiązujących od 2025 roku.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 14px; font-weight: bold; text-transform: uppercase;">ZGŁOSZENIE REJESTRACYJNE W ZAKRESIE PODATKU OD TOWARÓW I USŁUG</h1><p style="font-size: 12px; margin-top: 5px;">VAT-R (wersja 2025)</p></div>',
                        'body_html' => '
                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 15px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">CZĘŚĆ A. CEL I MIEJSCE SKŁADANIA ZGŁOSZENIA</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 40%; vertical-align: top; padding: 2px;"><strong>Cel złożenia zgłoszenia:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[submission_purpose]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px; padding-top: 10px;"><strong>Naczelnik Urzędu Skarbowego:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px; padding-top: 10px;"><strong>[[tax_office_name]]</strong></td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 15px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">CZĘŚĆ B. DANE IDENTYFIKACYJNE PODATNIKA</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 20%; vertical-align: top; padding: 2px;"><strong>NIP:</strong></td>
                                    <td style="width: 30%; border-bottom: 1px solid #000; padding: 2px;"><strong>[[taxpayer_nip]]</strong></td>
                                    <td style="width: 15%; vertical-align: top; padding: 2px;">REGON:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[taxpayer_regon]]</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">PESEL:</td>
                                    <td colspan="3" style="border-bottom: 1px solid #000; padding: 2px;">[[taxpayer_pesel]]</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px; padding-top: 10px;"><strong>Pełna nazwa:</strong></td>
                                    <td colspan="3" style="border-bottom: 1px solid #000; padding: 2px; padding-top: 10px;"><strong>[[taxpayer_full_name]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Nazwa skrócona:</td>
                                    <td colspan="3" style="border-bottom: 1px solid #000; padding: 2px;">[[taxpayer_short_name]]</td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 15px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">CZĘŚĆ C. ADRES PODATNIKA</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 20%; padding: 2px;">Kraj:</td>
                                    <td style="width: 30%; border-bottom: 1px solid #000; padding: 2px;">[[taxpayer_address_country]]</td>
                                    <td style="width: 20%; padding: 2px;">Województwo:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[taxpayer_address_voivodeship]]</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px;">Powiat:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[taxpayer_address_county]]</td>
                                    <td style="padding: 2px;">Gmina:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[taxpayer_address_commune]]</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px;">Miejscowość:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[taxpayer_address_city]]</td>
                                    <td style="padding: 2px;">Kod pocztowy:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[taxpayer_address_postal_code]]</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px;">Ulica:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[taxpayer_address_street]]</td>
                                    <td style="padding: 2px;">Nr domu:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[taxpayer_address_building]]</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px;">Nr lokalu:</td>
                                    <td colspan="3" style="border-bottom: 1px solid #000; padding: 2px;">[[taxpayer_address_flat]]</td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 15px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">CZĘŚĆ D. OBOWIĄZEK PODATKOWY VAT</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 40%; vertical-align: top; padding: 2px;"><strong>Data powstania obowiązku podatkowego:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;"><strong>[[vat_liability_date]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Powód rejestracji:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[vat_registration_reason]]</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px; padding-top: 10px;"><strong>Status podatnika VAT:</strong></td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px; padding-top: 10px;"><strong>[[vat_status]]</strong></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding: 2px;">Podstawa prawna zwolnienia:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[vat_exemption_basis]]</td>
                                </tr>
                            </table>
                        </div>

                        <div style="border: 1px solid #000; padding: 10px; margin-bottom: 15px;">
                            <h3 style="background: #f0f0f0; padding: 5px; margin: 0 0 10px 0; font-size: 12px;">CZĘŚĆ E. INFORMACJE DODATKOWE</h3>
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 40%; vertical-align: top; padding: 2px;">Okres rozliczeniowy:</td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px;">[[settlement_period]]</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 2px; padding-top: 10px;"><input type="checkbox"> [[cash_method]] Metoda kasowa</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 2px; padding-top: 10px;"><input type="checkbox"> [[vat_ue_registration]] Wnoszę o rejestrację jako podatnik VAT UE</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 2px; padding-top: 10px; background: #fffacd;"><input type="checkbox"> [[sme_procedure]] <strong>NOWOŚĆ 2025:</strong> Chcę korzystać z procedury dla małych przedsiębiorstw (SME)</td>
                                </tr>
                            </table>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 40px;">
                            <table style="width: 100%; font-size: 10px;">
                                <tr>
                                    <td style="width: 50%; text-align: left;">Miejsce: ________________</td>
                                    <td style="text-align: right;">Data: ________________</td>
                                </tr>
                            </table>
                            <p style="margin-top: 40px; text-align: right; font-size: 10px;">
                                _____________________________<br>
                                (Podpis podatnika)
                            </p>
                        </div>
                        <div style="margin-top: 30px; padding: 10px; border: 1px solid #000; background: #f9f9f9; font-size: 9px; text-align: center;">
                            <p><strong>WAŻNE INFORMACJE 2025:</strong></p>
                            <p>• Zgłoszenie należy złożyć przed dniem wykonania pierwszej czynności podlegającej opodatkowaniu VAT</p>
                            <p>• Nowa procedura SME (Small and Medium Enterprise) może oferować uproszczenia dla małych firm</p>
                            <p>• Formularz można złożyć elektronicznie przez e-Urząd Skarbowy lub osobiście</p>
                        </div>'
                    ],
                ]
            ],
            // 4. Faktura - Счет на оплату (Инвойс) (2025)
            [
                'category_id' => $catWork->id,
                'slug' => 'pl-standard-invoice-faktura-2025',
                'access_level' => 'pro',
                'fields' => '[
                    {"name":"invoice_number","type":"text","required":true,"labels":{"pl":"Numer faktury","en":"Invoice number"}},
                    {"name":"issue_place","type":"text","required":true,"labels":{"pl":"Miejsce wystawienia","en":"Place of issue"}},
                    {"name":"issue_date","type":"date","required":true,"labels":{"pl":"Data wystawienia","en":"Date of issue"}},
                    {"name":"sale_date","type":"date","required":true,"labels":{"pl":"Data sprzedaży (lub wykonania usługi)","en":"Date of sale (or service completion)"}},

                    {"name":"seller_name","type":"text","required":true,"labels":{"pl":"Nazwa sprzedawcy","en":"Seller\'s name"}},
                    {"name":"seller_address","type":"textarea","required":true,"labels":{"pl":"Adres sprzedawcy","en":"Seller\'s address"}},
                    {"name":"seller_nip","type":"text","required":true,"labels":{"pl":"NIP sprzedawcy","en":"Seller\'s NIP"}},

                    {"name":"buyer_name","type":"text","required":true,"labels":{"pl":"Nazwa nabywcy","en":"Buyer\'s name"}},
                    {"name":"buyer_address","type":"textarea","required":true,"labels":{"pl":"Adres nabywcy","en":"Buyer\'s address"}},
                    {"name":"buyer_nip","type":"text","required":true,"labels":{"pl":"NIP nabywcy","en":"Buyer\'s NIP"}},

                    {"name":"invoice_items","type":"textarea","required":true,"labels":{"pl":"Pozycje faktury (każda w nowej linii: Nazwa;Ilość;J.m.;Cena netto;Stawka VAT %;Wartość brutto)","en":"Invoice items (each in a new line: Name;Quantity;Unit;Net price;VAT rate %;Gross value)"}},

                    {"name":"total_net_value","type":"number","required":true,"labels":{"pl":"Łączna wartość netto","en":"Total net value"}},
                    {"name":"total_vat_value","type":"number","required":true,"labels":{"pl":"Łączna kwota VAT","en":"Total VAT value"}},
                    {"name":"total_gross_value","type":"number","required":true,"labels":{"pl":"Łączna wartość brutto (do zapłaty)","en":"Total gross value (to be paid)"}},
                    {"name":"total_in_words","type":"text","required":true,"labels":{"pl":"Słownie do zapłaty","en":"Amount in words"}},

                    {"name":"payment_method","type":"select","options":{"przelew":"Przelew","gotowka":"Gotówka"},"required":true,"labels":{"pl":"Forma płatności","en":"Payment method"}},
                    {"name":"payment_deadline","type":"date","required":true,"labels":{"pl":"Termin płatności","en":"Payment deadline"}},
                    {"name":"bank_account_number","type":"text","required":false,"labels":{"pl":"Numer konta bankowego","en":"Bank account number"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Faktura VAT (Standardowy wzór 2025)',
                        'description' => 'Uniwersalny szablon faktury VAT dla indywidualnych przedsiębiorców (JDG), zgodny z polskimi przepisami na rok 2025.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 24px; font-weight: bold;">FAKTURA</h1></div>
                        <table style="width: 100%; font-size: 12px;">
                            <tr>
                                <td style="width: 50%; text-align: left;"><strong>Numer:</strong> [[invoice_number]]</td>
                                <td style="width: 50%; text-align: right;"><strong>Miejsce wystawienia:</strong> [[issue_place]]</td>
                            </tr>
                            <tr>
                                <td style="text-align: left;"><strong>Data wystawienia:</strong> [[issue_date]]</td>
                                <td style="text-align: right;"><strong>Data sprzedaży:</strong> [[sale_date]]</td>
                            </tr>
                        </table>
                        <hr style="margin-top: 15px; margin-bottom: 15px;">',
                        'body_html' => '
                        <table style="width: 100%; font-size: 12px; margin-bottom: 30px;">
                            <tr>
                                <td style="width: 50%; vertical-align: top;">
                                    <h3 style="font-size: 14px; margin-bottom: 5px;">SPRZEDAWCA</h3>
                                    <p style="margin: 0;"><strong>[[seller_name]]</strong></p>
                                    <p style="margin: 0; white-space: pre-wrap;">[[seller_address]]</p>
                                    <p style="margin: 0;"><strong>NIP:</strong> [[seller_nip]]</p>
                                </td>
                                <td style="width: 50%; vertical-align: top;">
                                    <h3 style="font-size: 14px; margin-bottom: 5px;">NABYWCA</h3>
                                    <p style="margin: 0;"><strong>[[buyer_name]]</strong></p>
                                    <p style="margin: 0; white-space: pre-wrap;">[[buyer_address]]</p>
                                    <p style="margin: 0;"><strong>NIP:</strong> [[buyer_nip]]</p>
                                </td>
                            </tr>
                        </table>

                        <table style="width: 100%; border-collapse: collapse; font-size: 11px; margin-bottom: 30px;">
                            <thead>
                                <tr style="background-color: #f0f0f0;">
                                    <th style="border: 1px solid #ccc; padding: 8px; text-align: left;">Lp.</th>
                                    <th style="border: 1px solid #ccc; padding: 8px; text-align: left;">Nazwa towaru lub usługi</th>
                                    <th style="border: 1px solid #ccc; padding: 8px;">Ilość</th>
                                    <th style="border: 1px solid #ccc; padding: 8px;">J.m.</th>
                                    <th style="border: 1px solid #ccc; padding: 8px;">Cena netto</th>
                                    <th style="border: 1px solid #ccc; padding: 8px;">Wartość netto</th>
                                    <th style="border: 1px solid #ccc; padding: 8px;">VAT %</th>
                                    <th style="border: 1px solid #ccc; padding: 8px;">Kwota VAT</th>
                                    <th style="border: 1px solid #ccc; padding: 8px;">Wartość brutto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Tutaj dynamicznie wstawiane pozycje z pola [[invoice_items]] -->
                                <!-- Przykład jednej pozycji: -->
                                <tr>
                                    <td style="border: 1px solid #ccc; padding: 8px;">1.</td>
                                    <td style="border: 1px solid #ccc; padding: 8px;">Usługa programistyczna</td>
                                    <td style="border: 1px solid #ccc; padding: 8px; text-align: center;">1</td>
                                    <td style="border: 1px solid #ccc; padding: 8px; text-align: center;">szt.</td>
                                    <td style="border: 1px solid #ccc; padding: 8px; text-align: right;">1000,00</td>
                                    <td style="border: 1px solid #ccc; padding: 8px; text-align: right;">1000,00</td>
                                    <td style="border: 1px solid #ccc; padding: 8px; text-align: center;">23%</td>
                                    <td style="border: 1px solid #ccc; padding: 8px; text-align: right;">230,00</td>
                                    <td style="border: 1px solid #ccc; padding: 8px; text-align: right;">1230,00</td>
                                </tr>
                                 <tr>
                                    <td colspan="9" style="padding: 8px;"><em>Uwaga: Powyższa tabela jest przykładem. Rzeczywiste pozycje zostaną wygenerowane na podstawie danych z pola "Pozycje faktury".</em><br>[[invoice_items]]</td>
                                </tr>
                            </tbody>
                        </table>

                        <table style="width: 100%; font-size: 12px;">
                            <tr>
                                <td style="width: 60%; vertical-align: top;">
                                    <p><strong>Forma płatności:</strong> [[payment_method]]</p>
                                    <p><strong>Termin płatności:</strong> [[payment_deadline]]</p>
                                    <p><strong>Numer konta:</strong> [[bank_account_number]]</p>
                                </td>
                                <td style="width: 40%; vertical-align: top; background-color: #f0f0f0; padding: 10px;">
                                    <table style="width: 100%;">
                                        <tr>
                                            <td>Wartość netto:</td>
                                            <td style="text-align: right;">[[total_net_value]] PLN</td>
                                        </tr>
                                        <tr>
                                            <td>Kwota VAT:</td>
                                            <td style="text-align: right;">[[total_vat_value]] PLN</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Do zapłaty:</td>
                                            <td style="text-align: right; font-weight: bold;">[[total_gross_value]] PLN</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-top: 10px;">
                                    <strong>Słownie:</strong> [[total_in_words]]
                                </td>
                            </tr>
                        </table>',
                        'footer_html' => '
                        <div style="margin-top: 80px; font-size: 11px; display: flex; justify-content: space-between;">
                            <div style="width: 45%; text-align: center;">
                                <hr style="border-top: 1px solid #000;">
                                <p style="margin-top: 5px;">(Podpis osoby upoważnionej do wystawienia faktury)</p>
                            </div>
                            <div style="width: 45%; text-align: center;">
                                <hr style="border-top: 1px solid #000;">
                                <p style="margin-top: 5px;">(Podpis osoby upoważnionej do odbioru faktury)</p>
                            </div>
                        </div>'
                    ],
                ]
            ],

            // 5. Umowa Najmu Lokalu Użytkowego - Договор аренды коммерческого помещения (2025)
            [
                'category_id' => $catWork->id,
                'slug' => 'pl-commercial-office-lease-agreement-2025',
                'access_level' => 'pro',
                'fields' => '[
                    {"name":"agreement_place","type":"text","required":true,"labels":{"pl":"Miejsce zawarcia umowy","en":"Place of agreement"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Date of agreement"}},

                    {"name":"landlord_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko / Nazwa Wynajmującego","en":"Landlord\'s name / Company name"}},
                    {"name":"landlord_address","type":"textarea","required":true,"labels":{"pl":"Adres Wynajmującego","en":"Landlord\'s address"}},
                    {"name":"landlord_id","type":"text","required":true,"labels":{"pl":"PESEL / NIP Wynajmującego","en":"Landlord\'s PESEL / NIP"}},

                    {"name":"tenant_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko / Nazwa Najemcy","en":"Tenant\'s name / Company name"}},
                    {"name":"tenant_address","type":"textarea","required":true,"labels":{"pl":"Adres Najemcy","en":"Tenant\'s address"}},
                    {"name":"tenant_id","type":"text","required":true,"labels":{"pl":"PESEL / NIP Najemcy","en":"Tenant\'s PESEL / NIP"}},

                    {"name":"premises_address","type":"text","required":true,"labels":{"pl":"Adres lokalu","en":"Premises address"}},
                    {"name":"premises_area","type":"number","required":true,"labels":{"pl":"Powierzchnia lokalu (w m²)","en":"Area of premises (in m²)"}},
                    {"name":"premises_description","type":"textarea","required":true,"labels":{"pl":"Opis stanu technicznego lokalu","en":"Description of the premises\' technical condition"}},
                    {"name":"lease_purpose","type":"text","required":true,"labels":{"pl":"Cel najmu (np. prowadzenie działalności biurowej)","en":"Purpose of the lease (e.g., for office activities)"}},

                    {"name":"lease_term_type","type":"select","options":{"okreslony":"na czas określony","nieokreslony":"na czas nieokreślony"},"required":true,"labels":{"pl":"Rodzaj umowy","en":"Term of agreement"}},
                    {"name":"lease_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Lease start date"}},
                    {"name":"lease_end_date","type":"date","required":false,"labels":{"pl":"Data zakończenia najmu (dla umowy na czas określony)","en":"Lease end date (for a fixed-term agreement)"}},

                    {"name":"rent_amount_net","type":"number","required":true,"labels":{"pl":"Miesięczny czynsz najmu (netto w PLN)","en":"Monthly rent (net in PLN)"}},
                    {"name":"rent_payment_day","type":"number","required":true,"labels":{"pl":"Termin płatności czynszu (dzień miesiąca)","en":"Rent payment due day (day of the month)"}},
                    {"name":"rent_bank_account","type":"text","required":true,"labels":{"pl":"Numer rachunku bankowego Wynajmującego","en":"Landlord\'s bank account number"}},

                    {"name":"service_charges","type":"textarea","required":true,"labels":{"pl":"Opłaty eksploatacyjne (co obejmują i jak są rozliczane)","en":"Service charges (what they include and how they are settled)"}},

                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Kwota kaucji gwarancyjnej (w PLN)","en":"Security deposit amount (in PLN)"}},
                    {"name":"termination_notice_period","type":"text","required":true,"labels":{"pl":"Okres wypowiedzenia umowy","en":"Termination notice period"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa Najmu Lokalu Użytkowego (Biuro)',
                        'description' => 'Kompleksowy i zgodny z prawem szablon umowy najmu lokalu na cele biurowe lub inne cele komercyjne na rok 2025.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 18px; font-weight: bold;">UMOWA NAJMU LOKALU UŻYTKOWEGO</h1></div>
                        <p style="font-size: 12px;">Zawarta w dniu [[agreement_date]] w [[agreement_place]] pomiędzy:</p>',
                        'body_html' => '
                        <table style="width: 100%; font-size: 12px; margin-bottom: 20px;">
                            <tr>
                                <td style="width: 50%; vertical-align: top;">
                                    <h3 style="font-size: 13px; margin-bottom: 5px;">WYNAJMUJĄCYM:</h3>
                                    <p style="margin: 0;"><strong>[[landlord_name]]</strong></p>
                                    <p style="margin: 0; white-space: pre-wrap;">[[landlord_address]]</p>
                                    <p style="margin: 0;">PESEL/NIP: [[landlord_id]]</p>
                                </td>
                                <td style="width: 50%; vertical-align: top;">
                                    <h3 style="font-size: 13px; margin-bottom: 5px;">NAJEMCĄ:</h3>
                                    <p style="margin: 0;"><strong>[[tenant_name]]</strong></p>
                                    <p style="margin: 0; white-space: pre-wrap;">[[tenant_address]]</p>
                                    <p style="margin: 0;">PESEL/NIP: [[tenant_id]]</p>
                                </td>
                            </tr>
                        </table>

                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="text-align: center; font-size: 14px;">§ 1. Przedmiot umowy</h3>
                            <p>1. Wynajmujący oświadcza, że jest właścicielem lokalu użytkowego położonego pod adresem: <strong>[[premises_address]]</strong>, o łącznej powierzchni <strong>[[premises_area]] m²</strong> (dalej "Lokal").</p>
                            <p>2. Stan techniczny Lokalu opisany jest w protokole zdawczo-odbiorczym, stanowiącym załącznik do niniejszej umowy. Opis ogólny: [[premises_description]].</p>
                            <p>3. Wynajmujący oddaje Najemcy Lokal do używania w celu prowadzenia działalności gospodarczej: <strong>[[lease_purpose]]</strong>.</p>

                            <h3 style="text-align: center; font-size: 14px;">§ 2. Czas trwania umowy</h3>
                            <p>Umowa zostaje zawarta <strong>[[lease_term_type]]</strong>, na okres od dnia <strong>[[lease_start_date]]</strong> do dnia <strong>[[lease_end_date]]</strong>.</p>

                            <h3 style="text-align: center; font-size: 14px;">§ 3. Czynsz i opłaty</h3>
                            <p>1. Z tytułu najmu, Najemca zobowiązuje się płacić Wynajmującemu miesięczny czynsz w wysokości <strong>[[rent_amount_net]] PLN netto</strong> (słownie: ...), powiększony o należny podatek VAT.</p>
                            <p>2. Czynsz płatny jest z góry do <strong>[[rent_payment_day]]</strong> dnia każdego miesiąca na rachunek bankowy Wynajmującego o numerze: <strong>[[rent_bank_account]]</strong>.</p>
                            <p>3. Niezależnie od czynszu, Najemca ponosić będzie koszty opłat eksploatacyjnych, w tym: [[service_charges]].</p>

                            <h3 style="text-align: center; font-size: 14px;">§ 4. Kaucja gwarancyjna</h3>
                            <p>1. Tytułem zabezpieczenia roszczeń Wynajmującego, Najemca wpłaca kaucję gwarancyjną w wysokości <strong>[[deposit_amount]] PLN</strong>.</p>
                            <p>2. Kaucja podlega zwrotowi w terminie 14 dni od dnia opróżnienia lokalu po potrąceniu ewentualnych należności Wynajmującego.</p>

                            <h3 style="text-align: center; font-size: 14px;">§ 5. Prawa i obowiązki stron</h3>
                            <p>1. Najemca zobowiązuje się do używania Lokalu zgodnie z jego przeznaczeniem i do utrzymywania go w należytym stanie technicznym.</p>
                            <p>2. Wszelkie adaptacje i ulepszenia w Lokalu wymagają uprzedniej pisemnej zgody Wynajmującego.</p>

                            <h3 style="text-align: center; font-size: 14px;">§ 6. Rozwiązanie umowy</h3>
                            <p>1. Każda ze stron może wypowiedzieć niniejszą umowę z zachowaniem okresu wypowiedzenia wynoszącego <strong>[[termination_notice_period]]</strong>, ze skutkiem na koniec miesiąca kalendarzowego.</p>
                            <p>2. Wynajmujący może rozwiązać umowę bez zachowania okresu wypowiedzenia w przypadku, gdy Najemca zalega z zapłatą czynszu za co najmniej dwa pełne okresy płatności.</p>

                            <h3 style="text-align: center; font-size: 14px;">§ 7. Postanowienia końcowe</h3>
                            <p>1. Wszelkie zmiany niniejszej umowy wymagają formy pisemnej pod rygorem nieważności.</p>
                            <p>2. W sprawach nieuregulowanych niniejszą umową zastosowanie mają przepisy Kodeksu Cywilnego.</p>
                            <p>3. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach, po jednym dla każdej ze stron.</p>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 80px; font-size: 12px; display: flex; justify-content: space-between;">
                            <div style="width: 45%; text-align: center;">
                                <p style="margin-bottom: 60px;">....................................................</p>
                                <p style="margin-top: 5px;"><strong>WYNAJMUJĄCY</strong></p>
                            </div>
                            <div style="width: 45%; text-align: center;">
                                <p style="margin-bottom: 60px;">....................................................</p>
                                <p style="margin-top: 5px;"><strong>NAJEMCA</strong></p>
                            </div>
                        </div>'
                    ],
                ]
            ],

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
