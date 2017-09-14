<?php

namespace interactivesolutions\honeycombcompanies\app\forms\hccompanies;

use interactivesolutions\honeycombcompanies\app\models\HCCompanies;
use interactivesolutions\honeycombcompanies\app\models\hccompanies\HCCompaniesAddressesTypes;
use interactivesolutions\honeycombcompanies\app\models\hccompanies\HCCompaniesEmployees;
use interactivesolutions\honeycombregions\app\models\regions\HCCountries;

class HCCompaniesAddressesForm
{
    // name of the form
    protected $formID = 'hc-companies-addresses';

    // is form multi language
    protected $multiLanguage = 0;

    /**
     * Creating form
     *
     * @param bool $edit
     * @return array
     */
    public function createForm (bool $edit = false)
    {
        $form = [
            'storageURL' => route('admin.api.routes.hc.companies.addresses'),
            'buttons'    => [
                [
                    "class" => "col-centered",
                    "label" => trans('HCTranslations::core.buttons.submit'),
                    "type"  => "submit",
                ],
            ],
            'structure'  => [
                [
                    "type"            => "dropDownList",
                    "fieldID"         => "company_id",
                    "label"           => trans("HCCompanies::hc_companies_addresses.company_id"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                    "options"         => HCCompanies::get(),
                    "search"          => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes" => ['name']
                    ],
                ], [
                    "type"            => "dropDownList",
                    "fieldID"         => "type_id",
                    "label"           => trans("HCCompanies::hc_companies_addresses.type_id"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                    "options"         => HCCompaniesAddressesTypes::with('translations')->get(),
                    "search"          => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes" => ['translations.{lang}.title']
                    ],
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "title",
                    "label"           => trans("HCCompanies::hc_companies_addresses.title"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                ], [
                    "type"            => "dropDownList",
                    "fieldID"         => "employee_id",
                    "label"           => trans("HCCompanies::hc_companies_addresses.employee_id"),
                    "search"          => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes" => ['name', 'surname']
                    ],
                    "dependencies" => [
                        [
                            "field_id"    => "company_id",
                            "options_url" => route('admin.api.routes.hc.companies.employees.list'),
                        ],
                    ],
                ], [
                    "type"            => "dropDownList",
                    "fieldID"         => "country_id",
                    "label"           => trans("HCTranslations::core.country"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                    "options"         => HCCountries::select('id', 'translation_key')->get(),
                    "search"          => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes"              => ["translation"],
                    ],
                ], [
                    "type"         => "dropDownList",
                    "fieldID"      => "municipality_id",
                    "label"        => trans("HCTranslations::core.municipality"),
                    "search"       => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes"              => ["translation"],
                    ],
                    "dependencies" => [
                        [
                            "field_id"    => "country_id",
                            "options_url" => route('admin.api.regions.municipalities.list'),
                        ],
                    ],
                ], [
                    "type"         => "dropDownList",
                    "fieldID"      => "city_id",
                    "label"        => trans("HCTranslations::core.city"),
                    "search"       => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes"              => ["name"],
                    ],
                    "dependencies" => [
                        [
                            "field_id"    => "municipality_id",
                            "options_url" => route('admin.api.regions.cities.list'),
                        ],
                    ],
                    "new"          => [
                        "url"     => route('admin.api.form-manager', 'regions-cities-new'),
                        "require" => ['municipality_id'],
                    ],
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "street",
                    "label"           => trans("HCCompanies::hc_companies_addresses.street"),
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "zip",
                    "label"           => trans("HCCompanies::hc_companies_addresses.zip"),
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "phone",
                    "label"           => trans("HCTranslations::core.phone"),
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "fax",
                    "label"           => trans("HCTranslations::core.fax"),
                ],
            ],
        ];

        if ($this->multiLanguage)
            $form['availableLanguages'] = getHCContentLanguages();

        if (!$edit)
            return $form;

        //Make changes to edit form if needed
        // $form['structure'][] = [];

        return $form;
    }
}