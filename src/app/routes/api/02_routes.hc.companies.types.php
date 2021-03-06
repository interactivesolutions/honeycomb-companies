<?php

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