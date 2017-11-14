<?php

//interactivesolutions/honeycomb-companies/src/Routes/Admin/02_routes.hc.companies.types.php


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



//interactivesolutions/honeycomb-companies/src/Routes/Admin/03_routes.hc.companies.positions.php


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



//interactivesolutions/honeycomb-companies/src/Routes/Admin/04_routes.hc.companies.employees.php


Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function() {
    Route::get('hc-companies/employees', [
        'as' => 'admin.routes.hc.companies.employees.index',
        'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'],
        'uses' => 'HCCompanies\\HCCompaniesEmployeesController@adminIndex',
    ]);

    Route::group(['prefix' => 'api/hc-companies/employees'], function() {
        Route::get('/', [
            'as' => 'admin.api.routes.hc.companies.employees',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'],
            'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_create'],
            'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_delete'],
            'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiDestroy',
        ]);

        Route::get('list', [
            'as' => 'admin.api.routes.hc.companies.employees.list',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'],
            'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiIndex',
        ]);
        Route::post('restore', [
            'as' => 'admin.api.routes.hc.companies.employees.restore',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_update'],
            'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.routes.hc.companies.employees.merge',
            'middleware' => [
                'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_create',
                'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_delete',
            ],
            'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'admin.api.routes.hc.companies.employees.force',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_force_delete'],
            'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'admin.api.routes.hc.companies.employees.single',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'],
                'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_update'],
                'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_delete'],
                'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'admin.api.routes.hc.companies.employees.update.strict',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_update'],
                'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'admin.api.routes.hc.companies.employees.duplicate.single',
                'middleware' => [
                    'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list',
                    'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_create',
                ],
                'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'admin.api.routes.hc.companies.employees.force.single',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_force_delete'],
                'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiForceDelete',
            ]);
        });
    });
});



//interactivesolutions/honeycomb-companies/src/Routes/Admin/05_routes.hc.companies.addresses.types.php


Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function() {
    Route::get('hc-companies/addresses-types', [
        'as' => 'admin.routes.hc.companies.addresses.types.index',
        'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_list'],
        'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@adminIndex',
    ]);

    Route::group(['prefix' => 'api/hc-companies/addresses-types'], function() {
        Route::get('/', [
            'as' => 'admin.api.routes.hc.companies.addresses.types',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_list'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_create'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_delete'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiDestroy',
        ]);

        Route::get('list', [
            'as' => 'admin.api.routes.hc.companies.addresses.types.list',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_list'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiIndex',
        ]);
        Route::post('restore', [
            'as' => 'admin.api.routes.hc.companies.addresses.types.restore',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_update'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.routes.hc.companies.addresses.types.merge',
            'middleware' => [
                'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_create',
                'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_delete',
            ],
            'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'admin.api.routes.hc.companies.addresses.types.force',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_force_delete'],
            'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'admin.api.routes.hc.companies.addresses.types.single',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_list'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_update'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_delete'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'admin.api.routes.hc.companies.addresses.types.update.strict',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_update'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'admin.api.routes.hc.companies.addresses.types.duplicate.single',
                'middleware' => [
                    'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_list',
                    'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_create',
                ],
                'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'admin.api.routes.hc.companies.addresses.types.force.single',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_force_delete'],
                'uses' => 'HCCompanies\\HCCompaniesAddressesTypesController@apiForceDelete',
            ]);
        });
    });
});



//interactivesolutions/honeycomb-companies/src/Routes/Admin/06_routes.hc.companies.addresses.php


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



//interactivesolutions/honeycomb-companies/src/Routes/Admin/99_routes.hc.companies.php


Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function() {
    Route::get('hc-companies', [
        'as' => 'admin.routes.hc.companies.index',
        'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_list'],
        'uses' => 'HCCompaniesController@adminIndex',
    ]);

    Route::group(['prefix' => 'api/hc-companies'], function() {
        Route::get('/', [
            'as' => 'admin.api.routes.hc.companies',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_list'],
            'uses' => 'HCCompaniesController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_create'],
            'uses' => 'HCCompaniesController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_delete'],
            'uses' => 'HCCompaniesController@apiDestroy',
        ]);

        Route::get('list', [
            'as' => 'admin.api.routes.hc.companies.list',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_list'],
            'uses' => 'HCCompaniesController@apiIndex',
        ]);
        Route::post('restore', [
            'as' => 'admin.api.routes.hc.companies.restore',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_update'],
            'uses' => 'HCCompaniesController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.routes.hc.companies.merge',
            'middleware' => [
                'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_create',
                'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_delete',
            ],
            'uses' => 'HCCompaniesController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'admin.api.routes.hc.companies.force',
            'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_force_delete'],
            'uses' => 'HCCompaniesController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'admin.api.routes.hc.companies.single',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_list'],
                'uses' => 'HCCompaniesController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_update'],
                'uses' => 'HCCompaniesController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_delete'],
                'uses' => 'HCCompaniesController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'admin.api.routes.hc.companies.update.strict',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_update'],
                'uses' => 'HCCompaniesController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'admin.api.routes.hc.companies.duplicate.single',
                'middleware' => [
                    'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_list',
                    'acl:interactivesolutions_honeycomb_companies_routes_hc_companies_create',
                ],
                'uses' => 'HCCompaniesController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'admin.api.routes.hc.companies.force.single',
                'middleware' => ['acl:interactivesolutions_honeycomb_companies_routes_hc_companies_force_delete'],
                'uses' => 'HCCompaniesController@apiForceDelete',
            ]);
        });
    });
});



//interactivesolutions/honeycomb-companies/src/Routes/Api/02_routes.hc.companies.types.php


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


//interactivesolutions/honeycomb-companies/src/Routes/Api/03_routes.hc.companies.positions.php


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


//interactivesolutions/honeycomb-companies/src/Routes/Api/04_routes.hc.companies.employees.php


Route::group(['prefix' => 'api', 'middleware' => ['auth-apps']], function() {
    Route::group(['prefix' => 'v1/hc-companies/employees'], function() {
        Route::get('/', [
            'as' => 'api.v1.routes.hc.companies.employees',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'],
            'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_create'],
            'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_delete'],
            'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiDestroy',
        ]);

        Route::group(['prefix' => 'list'], function() {
            Route::get('/', [
                'as' => 'api.v1.routes.hc.companies.employees.list',
                'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'],
                'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiList',
            ]);
            Route::get('{timestamp}', [
                'as' => 'api.v1.routes.hc.companies.employees.list.update',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'],
                'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiIndexSync',
            ]);
        });

        Route::post('restore', [
            'as' => 'api.v1.routes.hc.companies.employees.restore',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_update'],
            'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.routes.hc.companies.employees.merge',
            'middleware' => [
                'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_create',
                'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_delete',
            ],
            'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'api.v1.routes.hc.companies.employees.force',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_force_delete'],
            'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'api.v1.routes.hc.companies.employees.single',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list'],
                'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_update'],
                'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_delete'],
                'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'api.v1.routes.hc.companies.employees.update.strict',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_update'],
                'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'api.v1.routes.hc.companies.employees.duplicate.single',
                'middleware' => [
                    'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_list',
                    'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_create',
                ],
                'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'api.v1.routes.hc.companies.employees.force.single',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_employees_force_delete'],
                'uses' => 'HCCompanies\\HCCompaniesEmployeesController@apiForceDelete',
            ]);
        });
    });
});


//interactivesolutions/honeycomb-companies/src/Routes/Api/05_routes.hc.companies.addresses.types.php


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


//interactivesolutions/honeycomb-companies/src/Routes/Api/06_routes.hc.companies.addresses.php


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


//interactivesolutions/honeycomb-companies/src/Routes/Api/99_routes.hc.companies.php


Route::group(['prefix' => 'api', 'middleware' => ['auth-apps']], function() {
    Route::group(['prefix' => 'v1/hc-companies'], function() {
        Route::get('/', [
            'as' => 'api.v1.routes.hc.companies',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_list'],
            'uses' => 'HCCompaniesController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_create'],
            'uses' => 'HCCompaniesController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_delete'],
            'uses' => 'HCCompaniesController@apiDestroy',
        ]);

        Route::group(['prefix' => 'list'], function() {
            Route::get('/', [
                'as' => 'api.v1.routes.hc.companies.list',
                'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_companies_routes_hc_companies_list'],
                'uses' => 'HCCompaniesController@apiList',
            ]);
            Route::get('{timestamp}', [
                'as' => 'api.v1.routes.hc.companies.list.update',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_list'],
                'uses' => 'HCCompaniesController@apiIndexSync',
            ]);
        });

        Route::post('restore', [
            'as' => 'api.v1.routes.hc.companies.restore',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_update'],
            'uses' => 'HCCompaniesController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.routes.hc.companies.merge',
            'middleware' => [
                'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_create',
                'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_delete',
            ],
            'uses' => 'HCCompaniesController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'api.v1.routes.hc.companies.force',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_force_delete'],
            'uses' => 'HCCompaniesController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'api.v1.routes.hc.companies.single',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_list'],
                'uses' => 'HCCompaniesController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_update'],
                'uses' => 'HCCompaniesController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_delete'],
                'uses' => 'HCCompaniesController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'api.v1.routes.hc.companies.update.strict',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_update'],
                'uses' => 'HCCompaniesController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'api.v1.routes.hc.companies.duplicate.single',
                'middleware' => [
                    'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_list',
                    'acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_create',
                ],
                'uses' => 'HCCompaniesController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'api.v1.routes.hc.companies.force.single',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_companies_routes_hc_companies_force_delete'],
                'uses' => 'HCCompaniesController@apiForceDelete',
            ]);
        });
    });
});

