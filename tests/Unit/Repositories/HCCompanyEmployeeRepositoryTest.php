<?php

declare(strict_types = 1);

namespace Tests\Unit\Repositories;

use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesEmployees;
use InteractiveSolutions\HoneycombCompanies\Repositories\HCCompanyEmployeeRepository;
use Tests\TestCase;

/**
 * Class HCCompanyEmployeeRepositoryTest
 * @package Tests\Unit\Repositories
 */
class HCCompanyEmployeeRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_singletone_instance(): void
    {
        $this->assertInstanceOf(HCCompanyEmployeeRepository::class, $this->getRepositoryInstance());
        $this->assertSame($this->getRepositoryInstance(), $this->getRepositoryInstance());
    }

    /**
     * @test
     */
    public function it_has_model(): void
    {
        $this->assertEquals(HCCompaniesEmployees::class, $this->getRepositoryInstance()->model());
    }

    /**
     * @return HCCompanyEmployeeRepository
     */
    private function getRepositoryInstance(): HCCompanyEmployeeRepository
    {
        return $this->app->make(HCCompanyEmployeeRepository::class);
    }
}
