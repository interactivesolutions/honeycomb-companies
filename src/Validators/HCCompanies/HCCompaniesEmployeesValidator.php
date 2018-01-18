<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Validators\HCCompanies;

use InteractiveSolutions\HoneycombCore\Http\Controllers\HCCoreFormValidator;

/**
 * Class HCCompaniesEmployeesValidator
 * @package InteractiveSolutions\HoneycombCompanies\Validators\HCCompanies
 */
class HCCompaniesEmployeesValidator extends HCCoreFormValidator
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
            'email' => 'required|email',
            'name' => 'required',
            'position_id' => 'required',
        ];
    }
}
