<?php

declare(strict_types = 1);

namespace Tests\Unit\Repositories;

use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesAddresses;
use InteractiveSolutions\HoneycombCompanies\Repositories\HCCompanyAddressRepository;
use Tests\TestCase;

/**
 * Class HCCompanyAddressRepositoryTest
 * @package Tests\Unit\Repositories
 */
class HCCompanyAddressRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_singletone_instance(): void
    {
        $this->assertInstanceOf(HCCompanyAddressRepository::class, $this->getRepositoryInstance());
        $this->assertSame($this->getRepositoryInstance(), $this->getRepositoryInstance());

    }

    /**
     * @test
     */
    public function it_has_model(): void
    {
        $this->assertEquals(HCCompaniesAddresses::class, $this->getRepositoryInstance()->model());
    }

    /**
     * @return HCCompanyAddressRepository
     */
    private function getRepositoryInstance(): HCCompanyAddressRepository
    {
        return $this->app->make(HCCompanyAddressRepository::class);
    }
}