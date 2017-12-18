<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Repositories;

use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesTypes;
use InteractiveSolutions\HoneycombCore\Repositories\Repository;

/**
 * Class HCCompanyTypeRepository
 * @package InteractiveSolutions\HoneycombCompanies\Repositories
 */
class HCCompanyTypeRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return HCCompaniesTypes::class;
    }
}
