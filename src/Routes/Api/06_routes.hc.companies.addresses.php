<?php

Route::group(['prefix' => 'api', 'middleware' => ['auth-apps']], function() {
    Route::group(['prefix' => 'v1/hc-companies/addresses'], function() {
        Route::get('/', [
            'as' => 'api.v1.routes.hc.companies.addresses',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_list'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_create'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_delete'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiDestroy',
        ]);

        Route::group(['prefix' => 'list'], function() {
            Route::get('/', [
                'as' => 'api.v1.routes.hc.companies.addresses.list',
                'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_list'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiList',
            ]);
            Route::get('{timestamp}', [
                'as' => 'api.v1.routes.hc.companies.addresses.list.update',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_list'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiIndexSync',
            ]);
        });

        Route::post('restore', [
            'as' => 'api.v1.routes.hc.companies.addresses.restore',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_update'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.routes.hc.companies.addresses.merge',
            'middleware' => [
                'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_create',
                'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_delete',
            ],
            'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'api.v1.routes.hc.companies.addresses.force',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_force_delete'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'api.v1.routes.hc.companies.addresses.single',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_list'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_update'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_delete'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'api.v1.routes.hc.companies.addresses.update.strict',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_update'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'api.v1.routes.hc.companies.addresses.duplicate.single',
                'middleware' => [
                    'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_list',
                    'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_create',
                ],
                'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'api.v1.routes.hc.companies.addresses.force.single',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_force_delete'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiForceDelete',
            ]);
        });
    });
});