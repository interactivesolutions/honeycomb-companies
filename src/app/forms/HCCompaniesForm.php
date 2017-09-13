<?php

namespace interactivesolutions\honeycombcompanies\app\forms;

use interactivesolutions\honeycombcompanies\app\models\hccompanies\HCCompaniesTypes;
use interactivesolutions\honeycombregions\app\models\regions\HCCountries;

class HCCompaniesForm
{
    // name of the form
    protected $formID = 'hc-companies';

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
            'storageURL' => route('admin.api.routes.hc.companies'),
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
                    "fieldID"         => "country_id",
                    "label"           => trans("HCTranslations::core.country"),
                    "tabID"           => trans("HCTranslations::core.general"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                    "options"         => HCCountries::select('id', 'translation_key')->get(),
                    "search"          => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes"              => ["translation"],
                    ],
                ], [
                    "type"            => "dropDownList",
                    "fieldID"         => "type_id",
                    "label"           => trans("HCCompanies::hc_companies.type_id"),
                    "tabID"           => trans("HCTranslations::core.general"),
                    "search"          => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes"              => ["short_name"],
                    ],
                    "dependencies"    => [
                        [
                            'field_id'    => 'country_id',
                            "options_url" => route('admin.api.routes.hc.companies.types.list'),
                        ],
                    ],
                ], [
                    "type"            => "dropDownList",
                    "fieldID"         => "municipality_id",
                    "label"           => trans("HCTranslations::core.municipality"),
                    "tabID"           => trans("HCTranslations::core.general"),
                    "search"          => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes"              => ["translation"],
                    ],
                    "dependencies"    => [
                        [
                            "field_id"    => "country_id",
                            "options_url" => route('admin.api.regions.municipalities.list'),
                        ],
                    ],
                ], [
                    "type"            => "dropDownList",
                    "fieldID"         => "city_id",
                    "label"           => trans("HCTranslations::core.city"),
                    "tabID"           => trans("HCTranslations::core.general"),
                    "search"          => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes"              => ["name"],
                    ],
                    "dependencies"    => [
                        [
                            "field_id"    => "municipality_id",
                            "options_url" => route('admin.api.regions.cities.list'),
                        ],
                    ],
                    "new"             => [
                        "url"     => route('admin.api.form-manager', 'regions-cities-new'),
                        "require" => ['municipality_id'],
                    ],
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "name",
                    "label"           => trans("HCCompanies::hc_companies.name"),
                    "tabID"           => trans("HCTranslations::core.general"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                    "dependencies"    => [
                        [
                            "field_id" => "country_id",
                        ],
                    ],
                ], [
                    "type"         => "singleLine",
                    "fieldID"      => "id",
                    "label"        => trans("HCCompanies::hc_companies.code"),
                    "tabID"           => trans("HCTranslations::core.general"),
                    "dependencies" => [
                        [
                            "field_id" => "country_id",
                        ],
                    ],
                ], [
                    "type"         => "singleLine",
                    "fieldID"      => "vat",
                    "label"        => trans("HCCompanies::hc_companies.vat"),
                    "tabID"           => trans("HCTranslations::core.general"),
                    "dependencies" => [
                        [
                            "field_id" => "country_id",
                        ],
                    ],
                ], [
                    "type"            => "resource",
                    "fieldID"         => "logo_id",
                    "label"           => trans("HCCompanies::hc_companies.logo_id"),
                    "tabID"           => trans("HCTranslations::core.general"),
                    "uploadURL"       => route("admin.api.resources"),
                    "viewURL"         => route("resource.get", ['/']),
                    "fileCount"       => 1,
                    "uploadDataTypes" => ["image/jpg", "image/jpeg", "image/png", "image/svg+xml"],
                    "dependencies"    => [
                        [
                            "field_id" => "country_id",
                        ],
                    ],
                ], [
                    "type"         => "singleLine",
                    "fieldID"      => "website",
                    "label"        => trans("HCCompanies::hc_companies.website"),
                    "tabID"           => trans("HCTranslations::core.general"),
                    "dependencies" => [
                        [
                            "field_id" => "country_id",
                        ],
                    ],
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