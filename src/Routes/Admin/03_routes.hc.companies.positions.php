<?php

Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function() {
    Route::get('hc-companies/positions', [
        'as' => 'admin.routes.hc.companies.positions.index',
        'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'],
        'uses' => 'HCCompanies\\HCCompaniesPositionsController@adminIndex',
    ]);

    Route::group(['prefix' => 'api/hc-companies/positions'], function() {
        Route::get('/', [
            'as' => 'admin.api.routes.hc.companies.positions',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'],
            'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_create'],
            'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_delete'],
            'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiDestroy',
        ]);

        Route::get('list', [
            'as' => 'admin.api.routes.hc.companies.positions.list',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'],
            'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiIndex',
        ]);
        Route::post('restore', [
            'as' => 'admin.api.routes.hc.companies.positions.restore',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_update'],
            'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.routes.hc.companies.positions.merge',
            'middleware' => [
                'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_create',
                'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_delete',
            ],
            'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'admin.api.routes.hc.companies.positions.force',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_force_delete'],
            'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'admin.api.routes.hc.companies.positions.single',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list'],
                'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_update'],
                'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_delete'],
                'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'admin.api.routes.hc.companies.positions.update.strict',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_update'],
                'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'admin.api.routes.hc.companies.positions.duplicate.single',
                'middleware' => [
                    'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_list',
                    'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_create',
                ],
                'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'admin.api.routes.hc.companies.positions.force.single',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_positions_force_delete'],
                'uses' => 'HCCompanies\\HCCompaniesPositionsController@apiForceDelete',
            ]);
        });
    });
});
