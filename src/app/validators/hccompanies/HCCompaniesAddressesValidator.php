<?php namespace interactivesolutions\honeycombcompanies\app\validators\hccompanies;

use interactivesolutions\honeycombcore\http\controllers\HCCoreFormValidator;

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