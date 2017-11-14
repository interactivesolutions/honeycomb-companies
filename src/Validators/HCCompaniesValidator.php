<?php

namespace InteractiveSolutions\HoneycombCompanies\Validators;

use InteractiveSolutions\HoneycombCore\Http\Controllers\HCCoreFormValidator;

class HCCompaniesValidator extends HCCoreFormValidator
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'name' => 'required',
            'country_id' => 'required',
            'company_code' => 'required',

        ];
    }
}