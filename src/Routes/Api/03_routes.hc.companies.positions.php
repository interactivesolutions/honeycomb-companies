<?php

Route::group(['prefix' => 'api', 'middleware' => ['auth-apps']], function() {
    Route::group(['prefix' => 'v1/hc-companies/positions'], function() {
        Route::get('/', [
            'as' => 'api.v1.routes.hc.companies.positions',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'],
            'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_create'],
            'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_delete'],
            'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiDestroy',
        ]);

        Route::group(['prefix' => 'list'], function() {
            Route::get('/', [
                'as' => 'api.v1.routes.hc.companies.positions.list',
                'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'],
                'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiList',
            ]);
            Route::get('{timestamp}', [
                'as' => 'api.v1.routes.hc.companies.positions.list.update',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'],
                'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiIndexSync',
            ]);
        });

        Route::post('restore', [
            'as' => 'api.v1.routes.hc.companies.positions.restore',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_update'],
            'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.routes.hc.companies.positions.merge',
            'middleware' => [
                'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_create',
                'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_delete',
            ],
            'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'api.v1.routes.hc.companies.positions.force',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_force_delete'],
            'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'api.v1.routes.hc.companies.positions.single',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'],
                'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_update'],
                'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_delete'],
                'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'api.v1.routes.hc.companies.positions.update.strict',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_update'],
                'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'api.v1.routes.hc.companies.positions.duplicate.single',
                'middleware' => [
                    'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list',
                    'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_create',
                ],
                'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'api.v1.routes.hc.companies.positions.force.single',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_force_delete'],
                'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiForceDelete',
            ]);
        });
    });
});