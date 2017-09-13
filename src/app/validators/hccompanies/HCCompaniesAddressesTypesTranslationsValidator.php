<?php namespace interactivesolutions\honeycombcompanies\app\validators\hccompanies;

use interactivesolutions\honeycombcore\http\controllers\HCCoreFormValidator;

class HCCompaniesAddressesTypesTranslationsValidator extends HCCoreFormValidator
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