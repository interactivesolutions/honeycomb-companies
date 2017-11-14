<?php

namespace InteractiveSolutions\HoneycombCompanies\Validators\HCCompanies;

use InteractiveSolutions\HoneycombCore\Http\Controllers\HCCoreFormValidator;

class HCCompaniesAddressesValidator extends HCCoreFormValidator
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'company_id' => 'required',
            'type_id' => 'required',
            'title' => 'required',
            'country_id' => 'required',

        ];
    }
}