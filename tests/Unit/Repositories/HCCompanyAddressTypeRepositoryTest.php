<?php

declare(strict_types = 1);

namespace Tests\Unit\Repositories;

use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesAddressesTypes;
use InteractiveSolutions\HoneycombCompanies\Repositories\HCCompanyAddressTypeRepository;
use Tests\TestCase;

/**
 * Class HCCompanyAddressTypeRepositoryTest
 * @package Tests\Unit\Repositories
 */
class HCCompanyAddressTypeRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_singletone_instance(): void
    {
        $this->assertInstanceOf(HCCompanyAddressTypeRepository::class, $this->getRepositoryInstance());
        $this->assertSame($this->getRepositoryInstance(), $this->getRepositoryInstance());
    }

    /**
     * @test
     */
    public function it_has_model(): void
    {
        $this->assertEquals(HCCompaniesAddressesTypes::class, $this->getRepositoryInstance()->model());
    }

    /**
     * @return HCCompanyAddressTypeRepository
     */
    private function getRepositoryInstance(): HCCompanyAddressTypeRepository
    {
        return $this->app->make(HCCompanyAddressTypeRepository::class);
    }
}