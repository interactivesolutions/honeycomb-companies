<?php

namespace InteractiveSolutions\HoneycombCompanies\Forms\HCCompanies;

class HCCompaniesTypesForm
{
    // name of the form
    protected $formID = 'hc-companies-types';

    // is form multi language
    protected $multiLanguage = 1;

    /**
     * Creating form
     *
     * @param bool $edit
     * @return array
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function createForm(bool $edit = false)
    {
        $form = [
            'storageURL' => route('admin.api.routes.hc.companies.types'),
            'buttons' => [
                [
                    "class" => "col-centered",
                    "label" => trans('HCTranslations::core.buttons.submit'),
                    "type" => "submit",
                ],
            ],
            'structure' => [
                [
                    "type" => "singleLine",
                    "fieldID" => "country_id",
                    "label" => trans("HCCompanies::hc_companies_types.country_id"),
                    "required" => 1,
                    "requiredVisible" => 1,
                ],
                [
                    "type" => "singleLine",
                    "fieldID" => "translations.name",
                    "label" => trans("HCCompanies::hc_companies_types.name"),
                    "required" => 1,
                    "requiredVisible" => 1,
                    "tabID" => trans('HCTranslations::core.translations'),
                    "multiLanguage" => 1,
                ],
                [
                    "type" => "singleLine",
                    "fieldID" => "translations.description",
                    "label" => trans("HCCompanies::hc_companies_types.description"),
                    "required" => 0,
                    "requiredVisible" => 0,
                    "tabID" => trans('HCTranslations::core.translations'),
                    "multiLanguage" => 1,
                ],
            ],
        ];

        if ($this->multiLanguage) {
            $form['availableLanguages'] = getHCContentLanguages();
        }

        if (!$edit) {
            return $form;
        }

        //Make changes to edit form if needed
        // $form['structure'][] = [];

        return $form;
    }
}