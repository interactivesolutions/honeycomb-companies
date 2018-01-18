<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Validators\HCCompanies;

use InteractiveSolutions\HoneycombCore\Http\Controllers\HCCoreFormValidator;

/**
 * Class HCCompaniesPositionsTranslationsValidator
 * @package InteractiveSolutions\HoneycombCompanies\Validators\HCCompanies
 */
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
