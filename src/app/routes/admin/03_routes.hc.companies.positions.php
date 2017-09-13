<?php

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
