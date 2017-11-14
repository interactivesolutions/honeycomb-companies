<?php

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
