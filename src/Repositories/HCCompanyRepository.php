<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Repositories;

use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;
use InteractiveSolutions\HoneycombCore\Repositories\Repository;

/**
 * Class HCCompanyRepository
 * @package InteractiveSolutions\HoneycombCompanies\Repositories
 */
class HCCompanyRepository extends Repository
{

    /**
     * @return string
     */
    public function model(): string
    {
        return HCCompanies::class;
    }
}