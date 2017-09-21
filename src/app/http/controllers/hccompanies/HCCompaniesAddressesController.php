<?php

namespace interactivesolutions\honeycombcompanies\app\http\controllers\hccompanies;

use Illuminate\Database\Eloquent\Builder;
use interactivesolutions\honeycombcore\http\controllers\HCBaseController;
use interactivesolutions\honeycombcompanies\app\models\hccompanies\HCCompaniesAddresses;
use interactivesolutions\honeycombcompanies\app\validators\hccompanies\HCCompaniesAddressesValidator;

class HCCompaniesAddressesController extends HCBaseController
{

    //TODO recordsPerPage setting

    /**
     * Returning configured admin view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminIndex ()
    {
        $config = [
            'title'       => trans('HCCompanies::hc_companies_addresses.page_title'),
            'listURL'     => route('admin.api.routes.hc.companies.addresses'),
            'newFormUrl'  => route('admin.api.form-manager', ['hc-companies-addresses-new']),
            'editFormUrl' => route('admin.api.form-manager', ['hc-companies-addresses-edit']),
            'imagesUrl'   => route('resource.get', ['/']),
            'headers'     => $this->getAdminListHeader(),
        ];

        if (auth()->user()->can('interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_create'))
            $config['actions'][] = 'new';

        if (auth()->user()->can('interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_update')) {
            $config['actions'][] = 'update';
            $config['actions'][] = 'restore';
        }

        if (auth()->user()->can('interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_delete'))
            $config['actions'][] = 'delete';

        $config['actions'][] = 'search';
        $config['filters'] = $this->getFilters();
        $config['popUpLabel'] = 'street';

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
            'company.name'  => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_addresses.company_id'),
            ],
            'type.translation.title'     => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_addresses.type_id'),
            ],
            'title'       => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_addresses.title'),
            ],
            'employee.email' => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_addresses.employee_id'),
            ],
            'country.translation'  => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_addresses.country_id'),
            ],
            'city.name'     => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_addresses.city_id'),
            ],
            'street'      => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_addresses.street'),
            ],
            'zip'         => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_addresses.zip'),
            ],

        ];
    }

    /**
     * Create item
     *
     * @return mixed
     */
    protected function __apiStore ()
    {
        $data = $this->getInputData();

        $record = HCCompaniesAddresses::create(array_get($data, 'record'));

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
        $record = HCCompaniesAddresses::findOrFail($id);

        $data = $this->getInputData();

        $record->update(array_get($data, 'record', []));

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
        HCCompaniesAddresses::where('id', $id)->update(request()->all());

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
        HCCompaniesAddresses::destroy($list);

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
        HCCompaniesAddresses::onlyTrashed()->whereIn('id', $list)->forceDelete();

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
        HCCompaniesAddresses::whereIn('id', $list)->restore();

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
        $with = [];

        if ($select == null)
            $select = HCCompaniesAddresses::getFillableFields();

        $list = HCCompaniesAddresses::with($with)->select($select)
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
                ->orWhere('type_id', 'LIKE', '%' . $phrase . '%')
                ->orWhere('title', 'LIKE', '%' . $phrase . '%')
                ->orWhere('employee_id', 'LIKE', '%' . $phrase . '%')
                ->orWhere('country_id', 'LIKE', '%' . $phrase . '%')
                ->orWhere('city_id', 'LIKE', '%' . $phrase . '%')
                ->orWhere('street', 'LIKE', '%' . $phrase . '%')
                ->orWhere('zip', 'LIKE', '%' . $phrase . '%');
        });
    }

    /**
     * Getting user data on POST call
     *
     * @return mixed
     */
    protected function getInputData ()
    {
        (new HCCompaniesAddressesValidator())->validateForm();

        $_data = request()->all();

        if (array_has($_data, 'id'))
            array_set($data, 'record.id', array_get($_data, 'id'));

        array_set($data, 'record.company_id', array_get($_data, 'company_id'));
        array_set($data, 'record.type_id', array_get($_data, 'type_id'));
        array_set($data, 'record.title', array_get($_data, 'title'));
        array_set($data, 'record.employee_id', array_get($_data, 'employee_id'));
        array_set($data, 'record.country_id', array_get($_data, 'country_id'));
        array_set($data, 'record.municipality_id', array_get($_data, 'municipality_id'));
        array_set($data, 'record.city_id', array_get($_data, 'city_id'));
        array_set($data, 'record.street', array_get($_data, 'street'));
        array_set($data, 'record.zip', array_get($_data, 'zip'));
        array_set($data, 'record.phone', array_get($_data, 'phone'));
        array_set($data, 'record.fax', array_get($_data, 'fax'));

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
        $with = [];

        $select = HCCompaniesAddresses::getFillableFields();

        $record = HCCompaniesAddresses::with($with)
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

        return $filters;
    }
}
