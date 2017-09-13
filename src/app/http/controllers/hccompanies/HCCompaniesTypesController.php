<?php namespace interactivesolutions\honeycombcompanies\app\http\controllers\hccompanies;

use Illuminate\Database\Eloquent\Builder;
use interactivesolutions\honeycombcore\http\controllers\HCBaseController;
use interactivesolutions\honeycombcompanies\app\models\hccompanies\HCCompaniesTypes;
use interactivesolutions\honeycombcompanies\app\models\hccompanies\HCCompaniesTypesTranslations;
use interactivesolutions\honeycombcompanies\app\validators\hccompanies\HCCompaniesTypesValidator;
use interactivesolutions\honeycombcompanies\app\validators\hccompanies\HCCompaniesTypesTranslationsValidator;

class HCCompaniesTypesController extends HCBaseController
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
            'title'       => trans('HCCompanies::hc_companies_types.page_title'),
            'listURL'     => route('admin.api.routes.hc.companies.types'),
            'newFormUrl'  => route('admin.api.form-manager', ['hc-companies-types-new']),
            'editFormUrl' => route('admin.api.form-manager', ['hc-companies-types-edit']),
            'imagesUrl'   => route('resource.get', ['/']),
            'headers'     => $this->getAdminListHeader(),
        ];

        if (auth()->user()->can('interactivesolutions_honeycomb_companies_routes_hc_companies_types_create'))
            $config['actions'][] = 'new';

        if (auth()->user()->can('interactivesolutions_honeycomb_companies_routes_hc_companies_types_update')) {
            $config['actions'][] = 'update';
            $config['actions'][] = 'restore';
        }

        if (auth()->user()->can('interactivesolutions_honeycomb_companies_routes_hc_companies_types_delete'))
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
    private function getAdminListHeader ()
    {
        return [
            'country_id'                      => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_types.country_id'),
            ],
            'short_name'        => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_types.name'),
            ],
            'translations.{lang}.name'        => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_types.name'),
            ],
            'translations.{lang}.description' => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_types.description'),
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

        $record = HCCompaniesTypes::create(array_get($data, 'record', []));
        $record->updateTranslations(array_get($data, 'translations', []));

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
        $record = HCCompaniesTypes::findOrFail($id);

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
    protected function __apiUpdateStrict (string $id)
    {
        HCCompaniesTypes::where('id', $id)->update(request()->all());

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
        HCCompaniesTypesTranslations::destroy(HCCompaniesTypesTranslations::whereIn('record_id', $list)->pluck('id')->toArray());
        HCCompaniesTypes::destroy($list);

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
        HCCompaniesTypesTranslations::onlyTrashed()->whereIn('record_id', $list)->forceDelete();
        HCCompaniesTypes::onlyTrashed()->whereIn('id', $list)->forceDelete();

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
        HCCompaniesTypesTranslations::onlyTrashed()->whereIn('record_id', $list)->restore();
        HCCompaniesTypes::onlyTrashed()->whereIn('id', $list)->restore();

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
        $with = ['translations'];

        if ($select == null)
            $select = HCCompaniesTypes::getFillableFields();

        $list = HCCompaniesTypes::with($with)
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
    protected function searchQuery (Builder $query, string $phrase)
    {
        $r = HCCompaniesTypes::getTableName();
        $t = HCCompaniesTypesTranslations::getTableName();

        $query->where(function (Builder $query) use ($phrase) {
            $query->where('country_id', 'LIKE', '%' . $phrase . '%');
        });

        return $query->join($t, "$r.id", "=", "$t.record_id")
            ->where('name', 'LIKE', '%' . $phrase . '%')
            ->orWhere('description', 'LIKE', '%' . $phrase . '%');
    }

    /**
     * Getting user data on POST call
     *
     * @return mixed
     */
    protected function getInputData ()
    {
        (new HCCompaniesTypesValidator())->validateForm();
        (new HCCompaniesTypesTranslationsValidator())->validateForm();

        $_data = request()->all();

        if (array_has($_data, 'id'))
            array_set($data, 'record.id', array_get($_data, 'id'));

        array_set($data, 'record.country_id', array_get($_data, 'country_id'));
        array_set($data, 'record.short_name', array_get($_data, 'short_name'));

        $translations = array_get($_data, 'translations');

        foreach ($translations as &$value)
            if (!isset($value['slug']) || $value['slug'] == "")
                $value['slug'] = generateHCSlug("hc-companies/types", $value['label']);

        array_set($data, 'translations', $translations);

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
        $with = ['translations'];

        $select = HCCompaniesTypes::getFillableFields(true);

        $record = HCCompaniesTypes::with($with)
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
