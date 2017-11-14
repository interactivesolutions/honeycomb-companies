<?php

Route::group(['prefix' => 'api', 'middleware' => ['auth-apps']], function() {
    Route::group(['prefix' => 'v1/hc-companies/types'], function() {
        Route::get('/', [
            'as' => 'api.v1.routes.hc.companies.types',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'],
            'uses' => 'HCCompanies\\HCCompaniesTypesController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_create'],
            'uses' => 'HCCompanies\\HCCompaniesTypesController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_delete'],
            'uses' => 'HCCompanies\\HCCompaniesTypesController@apiDestroy',
        ]);

        Route::group(['prefix' => 'list'], function() {
            Route::get('/', [
                'as' => 'api.v1.routes.hc.companies.types.list',
                'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'],
                'uses' => 'HCCompanies\\HCCompaniesTypesController@apiList',
            ]);
            Route::get('{timestamp}', [
                'as' => 'api.v1.routes.hc.companies.types.list.update',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'],
                'uses' => 'HCCompanies\\HCCompaniesTypesController@apiIndexSync',
            ]);
        });

        Route::post('restore', [
            'as' => 'api.v1.routes.hc.companies.types.restore',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_update'],
            'uses' => 'HCCompanies\\HCCompaniesTypesController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.routes.hc.companies.types.merge',
            'middleware' => [
                'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_create',
                'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_delete',
            ],
            'uses' => 'HCCompanies\\HCCompaniesTypesController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'api.v1.routes.hc.companies.types.force',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_force_delete'],
            'uses' => 'HCCompanies\\HCCompaniesTypesController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'api.v1.routes.hc.companies.types.single',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'],
                'uses' => 'HCCompanies\\HCCompaniesTypesController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_update'],
                'uses' => 'HCCompanies\\HCCompaniesTypesController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_delete'],
                'uses' => 'HCCompanies\\HCCompaniesTypesController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'api.v1.routes.hc.companies.types.update.strict',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_update'],
                'uses' => 'HCCompanies\\HCCompaniesTypesController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'api.v1.routes.hc.companies.types.duplicate.single',
                'middleware' => [
                    'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list',
                    'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_create',
                ],
                'uses' => 'HCCompanies\\HCCompaniesTypesController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'api.v1.routes.hc.companies.types.force.single',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_types_force_delete'],
                'uses' => 'HCCompanies\\HCCompaniesTypesController@apiForceDelete',
            ]);
        });
    });
});