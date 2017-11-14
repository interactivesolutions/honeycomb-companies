<?php

Route::group(['prefix' => 'api', 'middleware' => ['auth-apps']], function() {
    Route::group(['prefix' => 'v1/hc-companies/addresses-types'], function() {
        Route::get('/', [
            'as' => 'api.v1.routes.hc.companies.addresses.types',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_list'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_create'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_delete'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiDestroy',
        ]);

        Route::group(['prefix' => 'list'], function() {
            Route::get('/', [
                'as' => 'api.v1.routes.hc.companies.addresses.types.list',
                'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_list'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiList',
            ]);
            Route::get('{timestamp}', [
                'as' => 'api.v1.routes.hc.companies.addresses.types.list.update',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_list'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiIndexSync',
            ]);
        });

        Route::post('restore', [
            'as' => 'api.v1.routes.hc.companies.addresses.types.restore',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_update'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.routes.hc.companies.addresses.types.merge',
            'middleware' => [
                'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_create',
                'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_delete',
            ],
            'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'api.v1.routes.hc.companies.addresses.types.force',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_force_delete'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'api.v1.routes.hc.companies.addresses.types.single',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_list'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_update'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_delete'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'api.v1.routes.hc.companies.addresses.types.update.strict',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_update'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'api.v1.routes.hc.companies.addresses.types.duplicate.single',
                'middleware' => [
                    'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_list',
                    'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_create',
                ],
                'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'api.v1.routes.hc.companies.addresses.types.force.single',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_force_delete'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiForceDelete',
            ]);
        });
    });
});