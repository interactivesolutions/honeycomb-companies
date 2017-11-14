<?php

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