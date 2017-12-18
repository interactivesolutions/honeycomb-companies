<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Repositories;

use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesEmployees;
use InteractiveSolutions\HoneycombCore\Repositories\Repository;

/**
 * Class HCCompanyEmployeeRepository
 * @package InteractiveSolutions\HoneycombCompanies\Repositories
 */
class HCCompanyEmployeeRepository extends Repository
{

    /**
     * @return string
     */
    public function model(): string
    {
        return HCCompaniesEmployees::class;
    }
}
