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
        $company = request('company_id');

        $form = [
            'storageURL' => route('admin.api.routes.hc.companies.addresses'),
            'buttons'    => [
                [
                    "class" => "col-centered",
                    "label" => trans('HCTranslations::core.buttons.submit'),
                    "tabID"           => trans('HCTranslations::core.general'),
                    "type"  => "submit",
                ],
            ],
            'structure'  => [
                [
                    "type"            => "dropDownList",
                    "fieldID"         => "company_id",
                    "label"           => trans("HCCompanies::hc_companies_addresses.company_id"),
                    "tabID"           => trans('HCTranslations::core.general'),
                    "required"        => 1,
                    "requiredVisible" => 1,
                    "options"         => HCCompanies::get(),
                    "search"          => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes" => ['name']
                    ],
                    "value"           => $company
                ], [
                    "type"            => "dropDownList",
                    "fieldID"         => "type_id",
                    "label"           => trans("HCCompanies::hc_companies_addresses.type_id"),
                    "tabID"           => trans('HCTranslations::core.general'),
                    "required"        => 1,
                    "requiredVisible" => 1,
                    "options"         => HCCompaniesAddressesTypes::with('translations')->get(),
                    "search"          => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes" => ['translations.{lang}.title']
                    ],
                    "new" => [
                        "url"     => route('admin.api.form-manager', 'hc-companies-addresses-types-new'),
                    ]
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "title",
                    "label"           => trans("HCCompanies::hc_companies_addresses.title"),
                    "tabID"           => trans('HCTranslations::core.general'),
                    "required"        => 1,
                    "requiredVisible" => 1,
                ], [
                    "type"            => "dropDownList",
                    "fieldID"         => "country_id",
                    "label"           => trans("HCTranslations::core.country"),
                    "tabID"           => trans('HCTranslations::core.general'),
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
                    "fieldID"      => "city_id",
                    "label"        => trans("HCTranslations::core.city"),
                    "tabID"           => trans('HCTranslations::core.general'),
                    "search"       => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes"              => ["name"],
                    ],
                    "dependencies" => [
                        [
                            "field_id"    => "country_id",
                            "options_url" => route('admin.api.regions.cities.list'),
                        ],
                    ],
                    "new"          => [
                        "url"     => route('admin.api.form-manager', 'regions-cities-new'),
                        "require" => ['country_id'],
                    ],
                ], [
                    "type"            => 'dropDownList',
                    "fieldID"         => 'remote_location',
                    "label"           => trans("HCCompanies::hc_companies_addresses.remote_location"),
                    "tabID"           => trans('HCTranslations::core.general'),
                    "options"         => [
                        ['id' => '1', 'label' => trans('HCTranslations::core.yes')],
                        ['id' => '0', 'label' => trans('HCTranslations::core.no')],
                    ],
                    "value"           => '0',
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "street",
                    "required"        => 1,
                    "requiredVisible" => 1,
                    "label"           => trans("HCCompanies::hc_companies_addresses.street"),
                    "tabID"           => trans('HCTranslations::core.general'),
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "zip",
                    "label"           => trans("HCCompanies::hc_companies_addresses.zip"),
                    "tabID"           => trans('HCTranslations::core.general'),
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "phone",
                    "label"           => trans("HCTranslations::core.phone"),
                    "tabID"           => trans('HCTranslations::core.general'),
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "fax",
                    "label"           => trans("HCTranslations::core.fax"),
                    "tabID"           => trans('HCTranslations::core.general'),
                ], [
                    "type"    => "dropDownList",
                    "fieldID" => "employees",
                    "label"   => trans("HCCompanies::hc_companies_employees.page_title"),
                    "tabID"   => trans('HCCompanies::hc_companies_employees.page_title'),
                    "search"  => [
                        "showNodes" => ["name", "email"],
                    ],
                    "dependencies" => [
                        [
                            "field_id"    => "company_id",
                            "options_url" => route('admin.api.routes.hc.companies.employees.list'),
                        ],
                    ],
                    "new"     => [
                        "url"     => route('admin.api.form-manager', 'hc-companies-employees-new'),
                        "require" => ['company_id'],
                    ],
                ]
            ],
        ];

        if ($this->multiLanguage)
            $form['availableLanguages'] = getHCContentLanguages();

        if (!$edit)
            return $form;

        //Make changes to edit form if needed
         $form['structure'][0]['readonly'] = 1;

        return $form;
    }
}