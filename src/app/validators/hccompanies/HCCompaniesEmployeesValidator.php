<?php namespace interactivesolutions\honeycombcompanies\app\validators\hccompanies;

use interactivesolutions\honeycombcore\http\controllers\HCCoreFormValidator;

class HCCompaniesEmployeesValidator extends HCCoreFormValidator
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules ()
    {
        return [
            'company_id'  => 'required',
            'email'       => 'required|email',
            'name'        => 'required',
            'position_id' => 'required',

        ];
    }
}