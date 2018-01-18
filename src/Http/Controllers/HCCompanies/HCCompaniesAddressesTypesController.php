<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Http\Controllers\HCCompanies;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesAddressesTypes;
use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesAddressesTypesTranslations;
use InteractiveSolutions\HoneycombCompanies\Validators\HCCompanies\HCCompaniesAddressesTypesTranslationsValidator;
use InteractiveSolutions\HoneycombCompanies\Validators\HCCompanies\HCCompaniesAddressesTypesValidator;
use InteractiveSolutions\HoneycombCore\Http\Controllers\HCBaseController;

/**
 * Class HCCompaniesAddressesTypesController
 * @package InteractiveSolutions\HoneycombCompanies\Http\Controllers\HCCompanies
 */
class HCCompaniesAddressesTypesController extends HCBaseController
{
    //TODO recordsPerPage setting
    /**
     * Returning configured admin view
     *
     * @return View
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function adminIndex(): View
    {
        $config = [
            'title' => trans('HCCompanies::hc_companies_addresses_types.page_title'),
            'listURL' => route('admin.api.routes.hc.companies.addresses.types'),
            'newFormUrl' => route('admin.api.form-manager', ['hc-companies-addresses-types-new']),
            'editFormUrl' => route('admin.api.form-manager', ['hc-companies-addresses-types-edit']),
            'imagesUrl' => route('resource.get', ['/']),
            'headers' => $this->getAdminListHeader(),
        ];

        if (auth()->user()->can(
            'interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_create'
        )) {
            $config['actions'][] = 'new';
        }

        if (auth()->user()->can(
            'interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_update'
        )) {
            $config['actions'][] = 'update';
            $config['actions'][] = 'restore';
        }

        if (auth()->user()->can(
            'interactivesolutions_honeycomb_companies_routes_hc_companies_addresses_types_delete'
        )) {
            $config['actions'][] = 'delete';
        }

        $config['actions'][] = 'search';
        $config['filters'] = $this->getFilters();

        return hcview('HCCoreUI::admin.content.list', ['config' => $config]);
    }

    /**
     * Creating Admin List Header based on Main Table
     *
     * @return array
     */
    private function getAdminListHeader(): array
    {
        return [
            'translations.{lang}.title' => [
                'type' => 'text',
                'label' => trans('HCCompanies::hc_companies_addresses_types.title'),
            ],

        ];
    }

    /**
     * Generating filters required for admin view
     *
     * @return array
     */
    public function getFilters(): array
    {
        $filters = [];

        return $filters;
    }

    /**
     * Create item
     *
     * @return mixed
     * @throws \Exception
     */
    protected function __apiStore()
    {
        $data = $this->getInputData();

        $record = HCCompaniesAddressesTypes::create(array_get($data, 'record', []));
        $record->updateTranslations(array_get($data, 'translations', []));

        return $this->apiShow($record->id);
    }

    /**
     * Getting user data on POST call
     *
     * @return mixed
     * @throws \Exception
     */
    protected function getInputData()
    {
        (new HCCompaniesAddressesTypesValidator())->validateForm();
        (new HCCompaniesAddressesTypesTranslationsValidator())->validateForm();

        $_data = request()->all();

        if (array_has($_data, 'id')) {
            array_set($data, 'record.id', array_get($_data, 'id'));
        }

        $translations = array_get($_data, 'translations');

        /*foreach ($translations as &$value)
            if (!isset($value['slug']) || $value['slug'] == "")
                $value['slug'] = generateHCSlug("hc-companies/addresses-types", $value['label']);*/

        array_set($data, 'translations', $translations);

        return makeEmptyNullable($data);
    }

    /**
     * Getting single record
     *
     * @param $id
     * @return mixed
     */
    public function apiShow(string $id)
    {
        $with = ['translations'];

        $select = HCCompaniesAddressesTypes::getFillableFields(true);

        $record = HCCompaniesAddressesTypes::with($with)
            ->select($select)
            ->where('id', $id)
            ->firstOrFail();

        return $record;
    }

    /**
     * Updates existing item based on ID
     *
     * @param string $id
     * @return mixed
     * @throws \Exception
     */
    protected function __apiUpdate(string $id)
    {
        $record = HCCompaniesAddressesTypes::findOrFail($id);

        $data = $this->getInputData();

        $record->update(array_get($data, 'record', []));
        $record->updateTranslations(array_get($data, 'translations', []));

        return $this->apiShow($record->id);
    }

    /**
     * Updates existing specific items based on ID
     *
     * @param string $id
     * @return mixed
     */
    protected function __apiUpdateStrict(string $id)
    {
        HCCompaniesAddressesTypes::where('id', $id)->update(request()->all());

        return $this->apiShow($id);
    }

    /**
     * Delete records table
     *
     * @param $list
     * @return mixed
     */
    protected function __apiDestroy(array $list)
    {
        HCCompaniesAddressesTypesTranslations::destroy(
            HCCompaniesAddressesTypesTranslations::whereIn('record_id', $list)
                ->pluck('id')
                ->toArray()
        );
        HCCompaniesAddressesTypes::destroy($list);

        return hcSuccess();
    }

    /**
     * Delete records table
     *
     * @param $list
     * @return mixed
     */
    protected function __apiForceDelete(array $list)
    {
        HCCompaniesAddressesTypesTranslations::onlyTrashed()->whereIn('record_id', $list)->forceDelete();
        HCCompaniesAddressesTypes::onlyTrashed()->whereIn('id', $list)->forceDelete();

        return hcSuccess();
    }

    /**
     * Restore multiple records
     *
     * @param $list
     * @return mixed
     */
    protected function __apiRestore(array $list)
    {
        HCCompaniesAddressesTypesTranslations::onlyTrashed()->whereIn('record_id', $list)->restore();
        HCCompaniesAddressesTypes::onlyTrashed()->whereIn('id', $list)->restore();

        return hcSuccess();
    }

    /**
     * Creating data query
     *
     * @param array $select
     * @return mixed
     */
    protected function createQuery(array $select = null)
    {
        $with = ['translations'];

        if ($select == null) {
            $select = HCCompaniesAddressesTypes::getFillableFields();
        }

        $list = HCCompaniesAddressesTypes::with($with)
            ->select($select)
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
    protected function searchQuery(Builder $query, string $phrase): Builder
    {
        $r = HCCompaniesAddressesTypes::getTableName();
        $t = HCCompaniesAddressesTypesTranslations::getTableName();

        $query->where(function (Builder $query) use ($phrase) {
            $query;
        });

        return $query->join($t, "$r.id", "=", "$t.record_id")
            ->where('title', 'LIKE', '%' . $phrase . '%');
    }
}
