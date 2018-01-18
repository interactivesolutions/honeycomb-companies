<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Validators\HCCompanies;

use InteractiveSolutions\HoneycombCore\Http\Controllers\HCCoreFormValidator;

/**
 * Class HCCompaniesTypesTranslationsValidator
 * @package InteractiveSolutions\HoneycombCompanies\Validators\HCCompanies
 */
class HCCompaniesTypesTranslationsValidator extends HCCoreFormValidator
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'translations.*.name' => 'required',
        ];
    }
}
