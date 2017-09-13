<?php

namespace interactivesolutions\honeycombcompanies\app\http\controllers;

use Illuminate\Database\Eloquent\Builder;
use interactivesolutions\honeycombcore\http\controllers\HCBaseController;
use interactivesolutions\honeycombcompanies\app\models\HCCompanies;
use interactivesolutions\honeycombcompanies\app\validators\HCCompaniesValidator;

class HCCompaniesController extends HCBaseController
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
            'title'       => trans('HCCompanies::hc_companies.page_title'),
            'listURL'     => route('admin.api.routes.hc.companies'),
            'newFormUrl'  => route('admin.api.form-manager', ['hc-companies-new']),
            'editFormUrl' => route('admin.api.form-manager', ['hc-companies-edit']),
            'imagesUrl'   => route('resource.get', ['/']),
            'headers'     => $this->getAdminListHeader(),
        ];

        if (auth()->user()->can('interactivesolutions_honeycomb_companies_routes_hc_companies_create'))
            $config['actions'][] = 'new';

        if (auth()->user()->can('interactivesolutions_honeycomb_companies_routes_hc_companies_update')) {
            $config['actions'][] = 'update';
            $config['actions'][] = 'restore';
        }

        if (auth()->user()->can('interactivesolutions_honeycomb_companies_routes_hc_companies_delete'))
            $config['actions'][] = 'delete';

        $config['actions'][] = 'search';
        $config['filters'] = $this->getFilters();

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
            'name'       => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies.name'),
            ],
            'vat'        => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies.vat'),
            ],
            'country_id' => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies.country_id'),
            ],
            'city_id'    => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies.city_id'),
            ],
            'type_id'    => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies.type_id'),
            ],
            'logo_id'    => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies.logo_id'),
            ],
            'website'    => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies.website'),
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

        $record = HCCompanies::create(array_get($data, 'record'));

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
        $record = HCCompanies::findOrFail($id);

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
        HCCompanies::where('id', $id)->update(request()->all());

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
        HCCompanies::destroy($list);

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
        HCCompanies::onlyTrashed()->whereIn('id', $list)->forceDelete();

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
        HCCompanies::whereIn('id', $list)->restore();

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
            $select = HCCompanies::getFillableFields();

        $list = HCCompanies::with($with)->select($select)
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
            $query->where('name', 'LIKE', '%' . $phrase . '%')
                ->orWhere('vat', 'LIKE', '%' . $phrase . '%')
                ->orWhere('country_id', 'LIKE', '%' . $phrase . '%')
                ->orWhere('city_id', 'LIKE', '%' . $phrase . '%')
                ->orWhere('type_id', 'LIKE', '%' . $phrase . '%')
                ->orWhere('logo_id', 'LIKE', '%' . $phrase . '%')
                ->orWhere('website', 'LIKE', '%' . $phrase . '%');
        });
    }

    /**
     * Getting user data on POST call
     *
     * @return mixed
     */
    protected function getInputData ()
    {
        (new HCCompaniesValidator())->validateForm();

        $_data = request()->all();

        if (array_has($_data, 'id'))
            array_set($data, 'record.id', array_get($_data, 'id'));

        array_set($data, 'record.name', array_get($_data, 'name'));
        array_set($data, 'record.vat', array_get($_data, 'vat'));
        array_set($data, 'record.country_id', array_get($_data, 'country_id'));
        array_set($data, 'record.city_id', array_get($_data, 'city_id'));
        array_set($data, 'record.type_id', array_get($_data, 'type_id'));
        array_set($data, 'record.logo_id', array_get($_data, 'logo_id'));
        array_set($data, 'record.website', array_get($_data, 'website'));

        return $data;
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

        $select = HCCompanies::getFillableFields();

        $record = HCCompanies::with($with)
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
