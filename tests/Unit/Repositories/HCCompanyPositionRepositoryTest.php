<?php

declare(strict_types = 1);

namespace Tests\Unit\Repositories;

use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesPositions;
use InteractiveSolutions\HoneycombCompanies\Repositories\HCCompanyPositionRepository;
use Tests\TestCase;

/**
 * Class HCCompanyPositionRepositoryTest
 * @package Tests\Unit\Repositories
 */
class HCCompanyPositionRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_singletone_instance(): void
    {
        $this->assertInstanceOf(HCCompanyPositionRepository::class, $this->getRepositoryInstance());
        $this->assertSame($this->getRepositoryInstance(), $this->getRepositoryInstance());
    }

    /**
     * @test
     */
    public function it_has_model(): void
    {
        $this->assertEquals(HCCompaniesPositions::class, $this->getRepositoryInstance()->model());
    }

    /**
     * @return HCCompanyPositionRepository
     */
    private function getRepositoryInstance(): HCCompanyPositionRepository
    {
        return $this->app->make(HCCompanyPositionRepository::class);
    }
}
