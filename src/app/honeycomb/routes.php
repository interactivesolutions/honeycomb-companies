<?php

//src/app/routes//admin/02_routes.hc.companies.types.php


Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function ()
{
    Route::get('hc-companies/types', ['as' => 'admin.routes.hc.companies.types.index', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'], 'uses' => 'hccompanies\\HCCompaniesTypesController@adminIndex']);

    Route::group(['prefix' => 'api/hc-companies/types'], function ()
    {
        Route::get('/', ['as' => 'admin.api.routes.hc.companies.types', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_create'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiStore']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_delete'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiDestroy']);

        Route::get('list', ['as' => 'admin.api.routes.hc.companies.types.list', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiIndex']);
        Route::post('restore', ['as' => 'admin.api.routes.hc.companies.types.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_update'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiRestore']);
        Route::post('merge', ['as' => 'api.v1.routes.hc.companies.types.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_create', 'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_delete'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiMerge']);
        Route::delete('force', ['as' => 'admin.api.routes.hc.companies.types.force', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_force_delete'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'admin.api.routes.hc.companies.types.single', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiShow']);
            Route::put('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_update'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_delete'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiDestroy']);

            Route::put('strict', ['as' => 'admin.api.routes.hc.companies.types.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_update'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'admin.api.routes.hc.companies.types.duplicate.single', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list', 'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_create'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiDuplicate']);
            Route::delete('force', ['as' => 'admin.api.routes.hc.companies.types.force.single', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_force_delete'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiForceDelete']);
        });
    });
});


//src/app/routes//admin/03_routes.hc.companies.positions.php


Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function ()
{
    Route::get('hc-companies/positions', ['as' => 'admin.routes.hc.companies.positions.index', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@adminIndex']);

    Route::group(['prefix' => 'api/hc-companies/positions'], function ()
    {
        Route::get('/', ['as' => 'admin.api.routes.hc.companies.positions', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_create'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiStore']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_delete'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiDestroy']);

        Route::get('list', ['as' => 'admin.api.routes.hc.companies.positions.list', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiIndex']);
        Route::post('restore', ['as' => 'admin.api.routes.hc.companies.positions.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_update'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiRestore']);
        Route::post('merge', ['as' => 'api.v1.routes.hc.companies.positions.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_create', 'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_delete'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiMerge']);
        Route::delete('force', ['as' => 'admin.api.routes.hc.companies.positions.force', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_force_delete'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'admin.api.routes.hc.companies.positions.single', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiShow']);
            Route::put('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_update'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_delete'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiDestroy']);

            Route::put('strict', ['as' => 'admin.api.routes.hc.companies.positions.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_update'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'admin.api.routes.hc.companies.positions.duplicate.single', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list', 'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_create'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiDuplicate']);
            Route::delete('force', ['as' => 'admin.api.routes.hc.companies.positions.force.single', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_force_delete'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiForceDelete']);
        });
    });
});


//src/app/routes//admin/04_routes.hc.companies.employees.php


Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function ()
{
    Route::get('hc-companies/employees', ['as' => 'admin.routes.hc.companies.employees.index', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@adminIndex']);

    Route::group(['prefix' => 'api/hc-companies/employees'], function ()
    {
        Route::get('/', ['as' => 'admin.api.routes.hc.companies.employees', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_create'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiStore']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_delete'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiDestroy']);

        Route::get('list', ['as' => 'admin.api.routes.hc.companies.employees.list', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiIndex']);
        Route::post('restore', ['as' => 'admin.api.routes.hc.companies.employees.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_update'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiRestore']);
        Route::post('merge', ['as' => 'api.v1.routes.hc.companies.employees.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_create', 'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_delete'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiMerge']);
        Route::delete('force', ['as' => 'admin.api.routes.hc.companies.employees.force', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_force_delete'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'admin.api.routes.hc.companies.employees.single', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiShow']);
            Route::put('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_update'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_delete'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiDestroy']);

            Route::put('strict', ['as' => 'admin.api.routes.hc.companies.employees.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_update'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'admin.api.routes.hc.companies.employees.duplicate.single', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list', 'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_create'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiDuplicate']);
            Route::delete('force', ['as' => 'admin.api.routes.hc.companies.employees.force.single', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_force_delete'], 'uses' => 'hccompanies\\HCCompaniesEmployeesController@apiForceDelete']);
        });
    });
});


//src/app/routes//admin/99_routes.hc.companies.php


Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function ()
{
    Route::get('hc-companies', ['as' => 'admin.routes.hc.companies.index', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_list'], 'uses' => 'HCCompaniesController@adminIndex']);

    Route::group(['prefix' => 'api/hc-companies'], function ()
    {
        Route::get('/', ['as' => 'admin.api.routes.hc.companies', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_list'], 'uses' => 'HCCompaniesController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_create'], 'uses' => 'HCCompaniesController@apiStore']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_delete'], 'uses' => 'HCCompaniesController@apiDestroy']);

        Route::get('list', ['as' => 'admin.api.routes.hc.companies.list', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_list'], 'uses' => 'HCCompaniesController@apiIndex']);
        Route::post('restore', ['as' => 'admin.api.routes.hc.companies.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_update'], 'uses' => 'HCCompaniesController@apiRestore']);
        Route::post('merge', ['as' => 'api.v1.routes.hc.companies.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_create', 'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_delete'], 'uses' => 'HCCompaniesController@apiMerge']);
        Route::delete('force', ['as' => 'admin.api.routes.hc.companies.force', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_force_delete'], 'uses' => 'HCCompaniesController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'admin.api.routes.hc.companies.single', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_list'], 'uses' => 'HCCompaniesController@apiShow']);
            Route::put('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_update'], 'uses' => 'HCCompaniesController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_delete'], 'uses' => 'HCCompaniesController@apiDestroy']);

            Route::put('strict', ['as' => 'admin.api.routes.hc.companies.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_update'], 'uses' => 'HCCompaniesController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'admin.api.routes.hc.companies.duplicate.single', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_list', 'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_create'], 'uses' => 'HCCompaniesController@apiDuplicate']);
            Route::delete('force', ['as' => 'admin.api.routes.hc.companies.force.single', 'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_force_delete'], 'uses' => 'HCCompaniesController@apiForceDelete']);
        });
    });
});


//src/app/routes//api/02_routes.hc.companies.types.php


Route::group(['prefix' => 'api', 'middleware' => ['auth-apps']], function ()
{
    Route::group(['prefix' => 'v1/hc-companies/types'], function ()
    {
        Route::get('/', ['as' => 'api.v1.routes.hc.companies.types', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_create'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiStore']);
        Route::delete('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_delete'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiDestroy']);

        Route::group(['prefix' => 'list'], function ()
        {
            Route::get('/', ['as' => 'api.v1.routes.hc.companies.types.list', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiList']);
            Route::get('{timestamp}', ['as' => 'api.v1.routes.hc.companies.types.list.update', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiIndexSync']);
        });

        Route::post('restore', ['as' => 'api.v1.routes.hc.companies.types.restore', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_update'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiRestore']);
        Route::post('merge', ['as' => 'api.v1.routes.hc.companies.types.merge', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_create', 'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_delete'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiMerge']);
        Route::delete('force', ['as' => 'api.v1.routes.hc.companies.types.force', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_force_delete'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'api.v1.routes.hc.companies.types.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiShow']);
            Route::put('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_update'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_delete'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiDestroy']);

            Route::put('strict', ['as' => 'api.v1.routes.hc.companies.types.update.strict', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_update'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'api.v1.routes.hc.companies.types.duplicate.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list', 'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_create'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiDuplicate']);
            Route::delete('force', ['as' => 'api.v1.routes.hc.companies.types.force.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_force_delete'], 'uses' => 'hccompanies\\HCCompaniesTypesController@apiForceDelete']);
        });
    });
});

//src/app/routes//api/03_routes.hc.companies.positions.php


Route::group(['prefix' => 'api', 'middleware' => ['auth-apps']], function ()
{
    Route::group(['prefix' => 'v1/hc-companies/positions'], function ()
    {
        Route::get('/', ['as' => 'api.v1.routes.hc.companies.positions', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_create'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiStore']);
        Route::delete('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_delete'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiDestroy']);

        Route::group(['prefix' => 'list'], function ()
        {
            Route::get('/', ['as' => 'api.v1.routes.hc.companies.positions.list', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiList']);
            Route::get('{timestamp}', ['as' => 'api.v1.routes.hc.companies.positions.list.update', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiIndexSync']);
        });

        Route::post('restore', ['as' => 'api.v1.routes.hc.companies.positions.restore', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_update'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiRestore']);
        Route::post('merge', ['as' => 'api.v1.routes.hc.companies.positions.merge', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_create', 'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_delete'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiMerge']);
        Route::delete('force', ['as' => 'api.v1.routes.hc.companies.positions.force', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_force_delete'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'api.v1.routes.hc.companies.positions.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiShow']);
            Route::put('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_update'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_delete'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiDestroy']);

            Route::put('strict', ['as' => 'api.v1.routes.hc.companies.positions.update.strict', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_update'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'api.v1.routes.hc.companies.positions.duplicate.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list', 'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_create'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiDuplicate']);
            Route::delete('force', ['as' => 'api.v1.routes.hc.companies.positions.force.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_force_delete'], 'uses' => 'hccompanies\\HCCompaniesPositionsController@apiForceDelete']);
        });
    });
});

//src/app/routes//api/04_routes.hc.companies.employees.php


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

//src/app/routes//api/99_routes.hc.companies.php


Route::group(['prefix' => 'api', 'middleware' => ['auth-apps']], function ()
{
    Route::group(['prefix' => 'v1/hc-companies'], function ()
    {
        Route::get('/', ['as' => 'api.v1.routes.hc.companies', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_list'], 'uses' => 'HCCompaniesController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_create'], 'uses' => 'HCCompaniesController@apiStore']);
        Route::delete('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_delete'], 'uses' => 'HCCompaniesController@apiDestroy']);

        Route::group(['prefix' => 'list'], function ()
        {
            Route::get('/', ['as' => 'api.v1.routes.hc.companies.list', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_companies_routes_hc_companies_list'], 'uses' => 'HCCompaniesController@apiList']);
            Route::get('{timestamp}', ['as' => 'api.v1.routes.hc.companies.list.update', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_list'], 'uses' => 'HCCompaniesController@apiIndexSync']);
        });

        Route::post('restore', ['as' => 'api.v1.routes.hc.companies.restore', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_update'], 'uses' => 'HCCompaniesController@apiRestore']);
        Route::post('merge', ['as' => 'api.v1.routes.hc.companies.merge', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_create', 'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_delete'], 'uses' => 'HCCompaniesController@apiMerge']);
        Route::delete('force', ['as' => 'api.v1.routes.hc.companies.force', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_force_delete'], 'uses' => 'HCCompaniesController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'api.v1.routes.hc.companies.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_list'], 'uses' => 'HCCompaniesController@apiShow']);
            Route::put('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_update'], 'uses' => 'HCCompaniesController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_delete'], 'uses' => 'HCCompaniesController@apiDestroy']);

            Route::put('strict', ['as' => 'api.v1.routes.hc.companies.update.strict', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_update'], 'uses' => 'HCCompaniesController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'api.v1.routes.hc.companies.duplicate.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_list', 'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_create'], 'uses' => 'HCCompaniesController@apiDuplicate']);
            Route::delete('force', ['as' => 'api.v1.routes.hc.companies.force.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_force_delete'], 'uses' => 'HCCompaniesController@apiForceDelete']);
        });
    });
});
