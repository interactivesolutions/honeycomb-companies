<?php namespace interactivesolutions\honeycombcompanies\app\validators;

use interactivesolutions\honeycombcore\http\controllers\HCCoreFormValidator;

class HCCompaniesValidator extends HCCoreFormValidator
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules ()
    {
        return [
            'name'       => 'required',
            'country_id' => 'required',

        ];
    }
}