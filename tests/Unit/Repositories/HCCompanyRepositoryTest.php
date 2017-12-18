<?php

declare(strict_types = 1);

namespace Tests\Unit\Repositories;

use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;
use InteractiveSolutions\HoneycombCompanies\Repositories\HCCompanyRepository;
use Tests\TestCase;

/**
 * Class HCCompanyRepositoryTest
 * @package Tests\Unit\Repositories
 */
class HCCompanyRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_singletone_instance(): void
    {
        $this->assertInstanceOf(HCCompanyRepository::class, $this->getRepositoryInstance());
        $this->assertSame($this->getRepositoryInstance(), $this->getRepositoryInstance());
    }

    /**
     * @test
     */
    public function it_has_model(): void
    {
        $this->assertEquals(HCCompanies::class, $this->getRepositoryInstance()->model());
    }

    /**
     * @return HCCompanyRepository
     */
    private function getRepositoryInstance(): HCCompanyRepository
    {
        return $this->app->make(HCCompanyRepository::class);
    }
}