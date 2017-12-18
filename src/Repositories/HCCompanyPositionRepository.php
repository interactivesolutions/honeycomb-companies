<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Repositories;

use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesPositions;
use InteractiveSolutions\HoneycombCore\Repositories\Repository;

/**
 * Class HCCompanyPositionRepository
 * @package InteractiveSolutions\HoneycombCompanies\Repositories
 */
class HCCompanyPositionRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return HCCompaniesPositions::class;
    }
}
