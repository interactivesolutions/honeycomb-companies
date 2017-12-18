<?php

declare(strict_types = 1);

namespace Tests\Unit\Repositories;

use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesTypes;
use InteractiveSolutions\HoneycombCompanies\Repositories\HCCompanyTypeRepository;
use Tests\TestCase;

/**
 * Class HCCompanyTypeRepositoryTest
 * @package Tests\Unit\Repositories
 */
class HCCompanyTypeRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_singletone_instance(): void
    {
        $this->assertInstanceOf(HCCompanyTypeRepository::class, $this->getRepositoryInstance());
        $this->assertSame($this->getRepositoryInstance(), $this->getRepositoryInstance());
    }

    /**
     * @test
     */
    public function it_has_model(): void
    {
        $this->assertEquals(HCCompaniesTypes::class, $this->getRepositoryInstance()->model());
    }

    /**
     * @return HCCompanyTypeRepository
     */
    private function getRepositoryInstance(): HCCompanyTypeRepository
    {
        return $this->app->make(HCCompanyTypeRepository::class);
    }
}
