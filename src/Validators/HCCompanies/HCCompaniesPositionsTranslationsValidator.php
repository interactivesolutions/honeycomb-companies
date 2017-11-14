<?php

namespace InteractiveSolutions\HoneycombCompanies\Validators\HCCompanies;

use InteractiveSolutions\HoneycombCore\Http\Controllers\HCCoreFormValidator;

class HCCompaniesPositionsTranslationsValidator extends HCCoreFormValidator
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'translations.*.title' => 'required',

        ];
    }
}