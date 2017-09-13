<?php

Route::group(['prefix' => 'api', 'middleware' => ['auth-apps']], function ()
{
    Route::group(['prefix' => 'v1/hc-companies/employees'], function ()
    {
        Route::get('/', ['as' => 'api.v1.routes.hc.companies.employees', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_create'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiStore']);
        Route::delete('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_delete'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiDestroy']);

        Route::group(['prefix' => 'list'], function ()
        {
            Route::get('/', ['as' => 'api.v1.routes.hc.companies.employees.list', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiList']);
            Route::get('{timestamp}', ['as' => 'api.v1.routes.hc.companies.employees.list.update', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiIndexSync']);
        });

        Route::post('restore', ['as' => 'api.v1.routes.hc.companies.employees.restore', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_update'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiRestore']);
        Route::post('merge', ['as' => 'api.v1.routes.hc.companies.employees.merge', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_create', 'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_delete'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiMerge']);
        Route::delete('force', ['as' => 'api.v1.routes.hc.companies.employees.force', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_force_delete'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'api.v1.routes.hc.companies.employees.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiShow']);
            Route::put('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_update'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_delete'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiDestroy']);

            Route::put('strict', ['as' => 'api.v1.routes.hc.companies.employees.update.strict', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_update'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'api.v1.routes.hc.companies.employees.duplicate.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list', 'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_create'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiDuplicate']);
            Route::delete('force', ['as' => 'api.v1.routes.hc.companies.employees.force.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_force_delete'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiForceDelete']);
        });
    });
});