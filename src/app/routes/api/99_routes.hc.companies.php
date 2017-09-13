<?php

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