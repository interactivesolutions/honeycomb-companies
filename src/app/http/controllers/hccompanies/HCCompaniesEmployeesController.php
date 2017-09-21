<?php

namespace interactivesolutions\honeycombcompanies\app\http\controllers\hccompanies;

use Illuminate\Database\Eloquent\Builder;
use interactivesolutions\honeycombacl\app\models\HCUsers;
use interactivesolutions\honeycombcompanies\app\models\HCCompanies;
use interactivesolutions\honeycombcore\http\controllers\HCBaseController;
use interactivesolutions\honeycombcompanies\app\models\hccompanies\HCCompaniesEmployees;
use interactivesolutions\honeycombcompanies\app\validators\hccompanies\HCCompaniesEmployeesValidator;

class HCCompaniesEmployeesController extends HCBaseController
{
    /**
     * Returning configured admin view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminIndex ()
    {
        $config = [
            'title'       => trans('HCCompanies::hc_companies_employees.page_title'),
            'listURL'     => route('admin.api.routes.hc.companies.employees'),
            'newFormUrl'  => route('admin.api.form-manager', ['hc-companies-employees-new']),
            'editFormUrl' => route('admin.api.form-manager', ['hc-companies-employees-edit']),
            'imagesUrl'   => route('resource.get', ['/']),
            'headers'     => $this->getAdminListHeader(),
        ];

        if (auth()->user()->can('interactivesolutions_honeycomb_companies_routes_hc_companies_employees_create'))
            $config['actions'][] = 'new';

        if (auth()->user()->can('interactivesolutions_honeycomb_companies_routes_hc_companies_employees_update')) {
            $config['actions'][] = 'update';
            $config['actions'][] = 'restore';
        }

        if (auth()->user()->can('interactivesolutions_honeycomb_companies_routes_hc_companies_employees_delete'))
            $config['actions'][] = 'delete';

        $config['actions'][] = 'search';
        $config['filters'] = $this->getFilters();
        $config['popUpLabel'] = 'name';

        return hcview('HCCoreUI::admin.content.list', ['config' => $config]);
    }

    /**
     * Creating Admin List Header based on Main Table
     *
     * @return array
     */
    public function getAdminListHeader ()
    {
        return [
            'country.translation'        => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_employees.country_id'),
            ],
            'company.name'               => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_employees.company_id'),
            ],
            'email'                      => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_employees.email'),
            ],
            'name'                       => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_employees.name'),
            ],
            'surname'                    => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_employees.surname'),
            ],
            'position.translation.title' => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_employees.position_id'),
            ]/*,

            'municipality_id' => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_employees.municipality_id'),
            ],
            'city_id'         => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_employees.city_id'),
            ],*/

        ];
    }

    /**
     * Create item
     * @return mixed
     * @throws \Exception
     */
    protected function __apiStore ()
    {
        $data = $this->getInputData();
        $email = array_get($data, 'record.email');

        if (strpos($email, '@') !== false) {
            $user = HCUsers::where('email', $email)->first();

            // checking if hc user exists
            if (!$user)
                $user = createHCUser($email, [], true, null, [], false, false);

            array_set($data, 'record.user_id', $user->id);
        }

        $record = HCCompaniesEmployees::create(array_get($data, 'record'));
        $record->addresses()->sync(array_get($data, 'addresses'));

        return $this->apiShow($record->id);
    }

    /**
     * Updates existing item based on ID
     *
     * @param $id
     * @return mixed
     */
    protected function __apiUpdate (string $id)
    {
        $record = HCCompaniesEmployees::findOrFail($id);

        $data = $this->getInputData();

        $record->update(array_get($data, 'record', []));
        $record->addresses()->sync(array_get($data, 'addresses'));

        return $this->apiShow($record->id);
    }

    /**
     * Updates existing specific items based on ID
     *
     * @param string $id
     * @return mixed
     */
    protected function __apiUpdateStrict (string $id)
    {
        HCCompaniesEmployees::where('id', $id)->update(request()->all());

        return $this->apiShow($id);
    }

    /**
     * Delete records table
     *
     * @param $list
     * @return mixed
     */
    protected function __apiDestroy (array $list)
    {
        HCCompaniesEmployees::destroy($list);

        return hcSuccess();
    }

    /**
     * Delete records table
     *
     * @param $list
     * @return mixed
     */
    protected function __apiForceDelete (array $list)
    {
        HCCompaniesEmployees::onlyTrashed()->whereIn('id', $list)->forceDelete();

        return hcSuccess();
    }

    /**
     * Restore multiple records
     *
     * @param $list
     * @return mixed
     */
    protected function __apiRestore (array $list)
    {
        HCCompaniesEmployees::whereIn('id', $list)->restore();

        return hcSuccess();
    }

    /**
     * Creating data query
     *
     * @param array $select
     * @return mixed
     */
    protected function createQuery (array $select = null)
    {
        $with = ['addresses'];

        if ($select == null)
            $select = HCCompaniesEmployees::getFillableFields();

        $list = HCCompaniesEmployees::with($with)->select($select)
            // add filters
            ->where(function ($query) use ($select) {
                $query = $this->getRequestParameters($query, $select);
            });

        // enabling check for deleted
        $list = $this->checkForDeleted($list);

        // add search items
        $list = $this->search($list);

        // ordering data
        $list = $this->orderData($list, $select);

        return $list;
    }

    /**
     * List search elements
     * @param Builder $query
     * @param string $phrase
     * @return Builder
     */
    protected function searchQuery (Builder $query, string $phrase)
    {
        return $query->where(function (Builder $query) use ($phrase) {
            $query->where('company_id', 'LIKE', '%' . $phrase . '%')
                ->orWhere('user_id', 'LIKE', '%' . $phrase . '%')
                ->orWhere('name', 'LIKE', '%' . $phrase . '%')
                ->orWhere('surname', 'LIKE', '%' . $phrase . '%')
                ->orWhere('position_id', 'LIKE', '%' . $phrase . '%')
                ->orWhere('country_id', 'LIKE', '%' . $phrase . '%')
                ->orWhere('municipality_id', 'LIKE', '%' . $phrase . '%')
                ->orWhere('phone', 'LIKE', '%' . $phrase . '%')
                ->orWhere('fax', 'LIKE', '%' . $phrase . '%')
                ->orWhere('birthday', 'LIKE', '%' . $phrase . '%')
                ->orWhere('city_id', 'LIKE', '%' . $phrase . '%');
        });
    }

    /**
     * Getting user data on POST call
     *
     * @return mixed
     */
    protected function getInputData ()
    {
        (new HCCompaniesEmployeesValidator())->validateForm();

        $_data = request()->all();

        if (array_has($_data, 'id'))
            array_set($data, 'record.id', array_get($_data, 'id'));

        array_set($data, 'record.company_id', array_get($_data, 'company_id'));
        array_set($data, 'record.user_id', array_get($_data, 'user_id'));
        array_set($data, 'record.email', array_get($_data, 'email'));
        array_set($data, 'record.name', array_get($_data, 'name'));
        array_set($data, 'record.surname', array_get($_data, 'surname'));
        array_set($data, 'record.position_id', array_get($_data, 'position_id'));
        array_set($data, 'record.country_id', array_get($_data, 'country_id'));
        array_set($data, 'record.municipality_id', array_get($_data, 'municipality_id'));
        array_set($data, 'record.city_id', array_get($_data, 'city_id'));
        array_set($data, 'record.phone', array_get($_data, 'phone'));
        array_set($data, 'record.fax', array_get($_data, 'fax'));
        array_set($data, 'record.birthday', array_get($_data, 'birthday'));

        array_set($data, 'addresses', array_get($_data, 'addresses'));

        if (!$data['addresses'])
            $data['addresses'] = [];

        return makeEmptyNullable($data);
    }

    /**
     * Getting single record
     *
     * @param $id
     * @return mixed
     */
    public function apiShow (string $id)
    {
        $with = ['addresses'];

        $select = HCCompaniesEmployees::getFillableFields();

        $record = HCCompaniesEmployees::with($with)
            ->select($select)
            ->where('id', $id)
            ->firstOrFail();

        return $record;
    }

    /**
     * Generating filters required for admin view
     *
     * @return array
     */
    public function getFilters ()
    {
        $filters = [];

        $companies = [
            'fieldID'   => 'company_id',
            'type'      => 'dropDownList',
            "label"     => trans("HCCompanies::hc_companies_employees.company_id"),
            'options'   => HCCompanies::all()->toArray(),
            'showNodes' => ['name'],
        ];

        $filters[] = addAllOptionToDropDownList($companies);

        return $filters;
    }
}
