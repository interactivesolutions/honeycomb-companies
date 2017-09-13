<?php

namespace interactivesolutions\honeycombcompanies\app\forms\hccompanies;

use interactivesolutions\honeycombcompanies\app\models\HCCompanies;
use interactivesolutions\honeycombcompanies\app\models\hccompanies\HCCompaniesPositions;
use interactivesolutions\honeycombregions\app\models\regions\HCCountries;

class HCCompaniesEmployeesForm
{
    // name of the form
    protected $formID = 'hc-companies-employees';

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
            'storageURL' => route('admin.api.routes.hc.companies.employees'),
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
                    "label"           => trans("HCCompanies::hc_companies_employees.company_id"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                    "options"         => HCCompanies::get(),
                    "search"          => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes" => ['name']
                    ],
                ], [
                    "type"            => "email",
                    "fieldID"         => "email",
                    "label"           => trans("HCCompanies::hc_companies_employees.email"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "name",
                    "label"           => trans("HCCompanies::hc_companies_employees.name"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "surname",
                    "label"           => trans("HCCompanies::hc_companies_employees.surname"),
                ], [
                    "type"            => "dropDownList",
                    "fieldID"         => "position_id",
                    "label"           => trans("HCCompanies::hc_companies_employees.position_id"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                    "options"         => HCCompaniesPositions::with('translations')->get(),
                    "search"          => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes" => ['translations.{lang}.title']
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
                ]
            ],
        ];

        if ($this->multiLanguage)
            $form['availableLanguages'] = getHCContentLanguages();

        if (!$edit)
            return $form;

        //Make changes to edit form if needed
        $form['structure'][1]['readonly'] = 1;

        return $form;
    }
}