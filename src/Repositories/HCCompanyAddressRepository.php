<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Repositories;


use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesAddresses;
use InteractiveSolutions\HoneycombCore\Repositories\Repository;

/**
 * Class HCCompanyAddressRepository
 * @package InteractiveSolutions\HoneycombCompanies\Repositories
 */
class HCCompanyAddressRepository extends Repository
{

    /**
     * @return string
     */
    public function model(): string
    {
        return HCCompaniesAddresses::class;
    }
}