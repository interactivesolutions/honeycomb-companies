<?php

namespace InteractiveSolutions\HoneycombCompanies\Providers;

use Illuminate\Routing\Router;
use InteractiveSolutions\HoneycombCompanies\Repositories\HCCompanyAddressRepository;
use InteractiveSolutions\HoneycombCompanies\Repositories\HCCompanyAddressTypeRepository;
use InteractiveSolutions\HoneycombCompanies\Repositories\HCCompanyEmployeeRepository;
use InteractiveSolutions\HoneycombCompanies\Repositories\HCCompanyRepository;
use InteractiveSolutions\HoneycombCore\Providers\HCBaseServiceProvider;

class HCCompaniesServiceProvider extends HCBaseServiceProvider
{
    /*
     *
     */
    protected $homeDirectory = __DIR__;

    /**
     * @var array
     */
    protected $commands = [];

    /**
     * @var string
     */
    protected $namespace = 'InteractiveSolutions\HoneycombCompanies\Http\Controllers';

    /**
     * @var string
     */
    protected $serviceProviderNameSpace = 'HCCompanies';

    /**
     *
     */
    public function register()
    {
        parent::register();

        $this->registerRepositories();
    }

    /**
     * @param Router $router
     */
    protected function registerRoutes(Router $router): void
    {
        $routes = [
            $this->modulePath('Routes/Admin/02_routes.hc.companies.types.php'),
            $this->modulePath('Routes/Admin/03_routes.hc.companies.positions.php'),
            $this->modulePath('Routes/Admin/04_routes.hc.companies.employees.php'),
            $this->modulePath('Routes/Admin/05_routes.hc.companies.addresses.types.php'),
            $this->modulePath('Routes/Admin/06_routes.hc.companies.addresses.php'),
            $this->modulePath('Routes/Admin/99_routes.hc.companies.php'),

            $this->modulePath('Routes/Api/02_routes.hc.companies.types.php'),
            $this->modulePath('Routes/Api/03_routes.hc.companies.positions.php'),
            $this->modulePath('Routes/Api/04_routes.hc.companies.employees.php'),
            $this->modulePath('Routes/Api/05_routes.hc.companies.addresses.types.php'),
            $this->modulePath('Routes/Api/06_routes.hc.companies.addresses.php'),
            $this->modulePath('Routes/Api/99_routes.hc.companies.php'),
        ];

        foreach ($routes as $route) {
            $router->group(['namespace' => $this->namespace], function ($router) use ($route) {
                require $route;
            });
        }
    }

    /**
     *
     */
    protected function loadViews(): void
    {
        $this->loadViewsFrom($this->homeDirectory . '/../resources/views', $this->serviceProviderNameSpace);
    }

    /**
     *
     */
    protected function loadMigrations(): void
    {
        $this->loadMigrationsFrom($this->homeDirectory . '/../database/migrations');
    }

    /**
     *
     */
    protected function loadTranslations(): void
    {
        $this->loadTranslationsFrom($this->homeDirectory . '/../resources/lang', $this->serviceProviderNameSpace);
    }


    /**
     * @param string $path
     * @return string
     */
    private function modulePath(string $path): string
    {
        return __DIR__ . '/../' . $path;
    }

    /**
     *
     */
    private function registerRepositories()
    {
        $this->app->singleton(HCCompanyAddressRepository::class);
        $this->app->singleton(HCCompanyAddressTypeRepository::class);
        $this->app->singleton(HCCompanyEmployeeRepository::class);
        $this->app->singleton(HCCompanyRepository::class);
    }
}





