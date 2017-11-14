<?php

Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function() {
    Route::get('hc-companies/addresses', [
        'as' => 'admin.routes.hc.companies.addresses.index',
        'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_list'],
        'uses' => 'HCCompanies\\HCCompaniesAddressesController@adminIndex',
    ]);

    Route::group(['prefix' => 'api/hc-companies/addresses'], function() {
        Route::get('/', [
            'as' => 'admin.api.routes.hc.companies.addresses',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_list'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_create'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_delete'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiDestroy',
        ]);

        Route::get('list', [
            'as' => 'admin.api.routes.hc.companies.addresses.list',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_list'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiIndex',
        ]);
        Route::post('restore', [
            'as' => 'admin.api.routes.hc.companies.addresses.restore',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_update'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.routes.hc.companies.addresses.merge',
            'middleware' => [
                'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_create',
                'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_delete',
            ],
            'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'admin.api.routes.hc.companies.addresses.force',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_force_delete'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'admin.api.routes.hc.companies.addresses.single',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_list'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_update'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_delete'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'admin.api.routes.hc.companies.addresses.update.strict',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_update'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'admin.api.routes.hc.companies.addresses.duplicate.single',
                'middleware' => [
                    'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_list',
                    'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_create',
                ],
                'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'admin.api.routes.hc.companies.addresses.force.single',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_force_delete'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesController@apiForceDelete',
            ]);
        });
    });
});
