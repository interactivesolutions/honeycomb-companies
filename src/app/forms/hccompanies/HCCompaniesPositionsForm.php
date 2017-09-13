<?php

namespace interactivesolutions\honeycombcompanies\app\forms\hccompanies;

class HCCompaniesPositionsForm
{
    // name of the form
    protected $formID = 'hc-companies-positions';

    // is form multi language
    protected $multiLanguage = 1;

    /**
     * Creating form
     *
     * @param bool $edit
     * @return array
     */
    public function createForm (bool $edit = false)
    {
        $form = [
            'storageURL' => route('admin.api.routes.hc.companies.positions'),
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
                    "fieldID"         => "translations.title",
                    "label"           => trans("HCCompanies::hc_companies_positions.title"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                    "tabID"           => trans('HCTranslations::core.translations'),
                    "multiLanguage"   => 1,
                ], [
                    "type"          => "textArea",
                    "fieldID"       => "translations.description",
                    "label"         => trans("HCCompanies::hc_companies_positions.description"),
                    "tabID"         => trans('HCTranslations::core.translations'),
                    "multiLanguage" => 1,
                    "rows"          => 5,
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