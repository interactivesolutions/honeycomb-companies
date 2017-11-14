<?php

Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function() {
    Route::get('hc-companies/types', [
        'as' => 'admin.routes.hc.companies.types.index',
        'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'],
        'uses' => 'HCCompanies\\HCCompaniesTypesController@adminIndex',
    ]);

    Route::group(['prefix' => 'api/hc-companies/types'], function() {
        Route::get('/', [
            'as' => 'admin.api.routes.hc.companies.types',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'],
            'uses' => 'HCCompanies\\HCCompaniesTypesController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_create'],
            'uses' => 'HCCompanies\\HCCompaniesTypesController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_delete'],
            'uses' => 'HCCompanies\\HCCompaniesTypesController@apiDestroy',
        ]);

        Route::get('list', [
            'as' => 'admin.api.routes.hc.companies.types.list',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'],
            'uses' => 'HCCompanies\\HCCompaniesTypesController@apiIndex',
        ]);
        Route::post('restore', [
            'as' => 'admin.api.routes.hc.companies.types.restore',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_update'],
            'uses' => 'HCCompanies\\HCCompaniesTypesController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.routes.hc.companies.types.merge',
            'middleware' => [
                'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_create',
                'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_delete',
            ],
            'uses' => 'HCCompanies\\HCCompaniesTypesController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'admin.api.routes.hc.companies.types.force',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_force_delete'],
            'uses' => 'HCCompanies\\HCCompaniesTypesController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'admin.api.routes.hc.companies.types.single',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list'],
                'uses' => 'HCCompanies\\HCCompaniesTypesController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_update'],
                'uses' => 'HCCompanies\\HCCompaniesTypesController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_delete'],
                'uses' => 'HCCompanies\\HCCompaniesTypesController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'admin.api.routes.hc.companies.types.update.strict',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_update'],
                'uses' => 'HCCompanies\\HCCompaniesTypesController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'admin.api.routes.hc.companies.types.duplicate.single',
                'middleware' => [
                    'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_list',
                    'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_create',
                ],
                'uses' => 'HCCompanies\\HCCompaniesTypesController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'admin.api.routes.hc.companies.types.force.single',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_types_force_delete'],
                'uses' => 'HCCompanies\\HCCompaniesTypesController@apiForceDelete',
            ]);
        });
    });
});
