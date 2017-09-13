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
                    "type"            => "singleLine",
                    "fieldID"         => "name",
                    "label"           => trans("HCCompanies::hc_companies.name"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "vat",
                    "label"           => trans("HCCompanies::hc_companies.vat"),
                    "required"        => 0,
                    "requiredVisible" => 0,
                ], [
                    "type"            => "dropDownList",
                    "fieldID"         => "country_id",
                    "label"           => trans ("HCECommerceGoods::e_commerce_taxes.country_id"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                    "options"         => HCCountries::select ('id', 'translation_key')->get (),
                    "search"          => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes"              => ["translation"],
                    ],
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "city_id",
                    "label"           => trans("HCCompanies::hc_companies.city_id"),
                    "required"        => 0,
                    "requiredVisible" => 0,
                ], [
                    "type"            => "dropDownList",
                    "fieldID"         => "type_id",
                    "label"           => trans("HCCompanies::hc_companies.type_id"),
                    "required"        => 0,
                    "requiredVisible" => 0,
                    "search"          => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes"              => ["translation"],
                    ],
                    "dependencies"    => [
                        [
                            'field_id'    => 'country_id',
                            "options_url" => route ('admin.api.routes.hc.companies.types.list'),
                        ],
                    ]
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "logo_id",
                    "label"           => trans("HCCompanies::hc_companies.logo_id"),
                    "required"        => 0,
                    "requiredVisible" => 0,
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "website",
                    "label"           => trans("HCCompanies::hc_companies.website"),
                    "required"        => 0,
                    "requiredVisible" => 0,
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