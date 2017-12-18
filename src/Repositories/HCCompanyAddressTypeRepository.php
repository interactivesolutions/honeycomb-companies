<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Repositories;

use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesAddressesTypes;
use InteractiveSolutions\HoneycombCore\Repositories\Repository;

/**
 * Class HCCompanyAddressTypeRepository
 * @package InteractiveSolutions\HoneycombCompanies\Repositories
 */
class HCCompanyAddressTypeRepository extends Repository
{

    /**
     * @return string
     */
    public function model(): string
    {
        return HCCompaniesAddressesTypes::class;
    }
}
