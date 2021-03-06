<?php namespace interactivesolutions\honeycombcompanies\app\http\controllers\hccompanies;

use Illuminate\Database\Eloquent\Builder;
use interactivesolutions\honeycombcore\http\controllers\HCBaseController;
use interactivesolutions\honeycombcompanies\app\models\hccompanies\HCCompaniesPositions;
use interactivesolutions\honeycombcompanies\app\models\hccompanies\HCCompaniesPositionsTranslations;
use interactivesolutions\honeycombcompanies\app\validators\hccompanies\HCCompaniesPositionsValidator;
use interactivesolutions\honeycombcompanies\app\validators\hccompanies\HCCompaniesPositionsTranslationsValidator;

class HCCompaniesPositionsController extends HCBaseController
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
            'title'       => trans('HCCompanies::hc_companies_positions.page_title'),
            'listURL'     => route('admin.api.routes.hc.companies.positions'),
            'newFormUrl'  => route('admin.api.form-manager', ['hc-companies-positions-new']),
            'editFormUrl' => route('admin.api.form-manager', ['hc-companies-positions-edit']),
            'imagesUrl'   => route('resource.get', ['/']),
            'headers'     => $this->getAdminListHeader(),
        ];

        if (auth()->user()->can('interactivesolutions_honeycomb_companies_routes_hc_companies_positions_create'))
            $config['actions'][] = 'new';

        if (auth()->user()->can('interactivesolutions_honeycomb_companies_routes_hc_companies_positions_update')) {
            $config['actions'][] = 'update';
            $config['actions'][] = 'restore';
        }

        if (auth()->user()->can('interactivesolutions_honeycomb_companies_routes_hc_companies_positions_delete'))
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
            'translations.{lang}.title'       => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_positions.title'),
            ],
            'translations.{lang}.description' => [
                "type"  => "text",
                "label" => trans('HCCompanies::hc_companies_positions.description'),
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

        $record = HCCompaniesPositions::create(array_get($data, 'record', []));
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
        $record = HCCompaniesPositions::findOrFail($id);

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
        HCCompaniesPositions::where('id', $id)->update(request()->all());

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
        HCCompaniesPositionsTranslations::destroy(HCCompaniesPositionsTranslations::whereIn('record_id', $list)->pluck('id')->toArray());
        HCCompaniesPositions::destroy($list);

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
        HCCompaniesPositionsTranslations::onlyTrashed()->whereIn('record_id', $list)->forceDelete();
        HCCompaniesPositions::onlyTrashed()->whereIn('id', $list)->forceDelete();

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
        HCCompaniesPositionsTranslations::onlyTrashed()->whereIn('record_id', $list)->restore();
        HCCompaniesPositions::onlyTrashed()->whereIn('id', $list)->restore();

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
            $select = HCCompaniesPositions::getFillableFields();

        $list = HCCompaniesPositions::with($with)
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
        $r = HCCompaniesPositions::getTableName();
        $t = HCCompaniesPositionsTranslations::getTableName();

        $query->where(function (Builder $query) use ($phrase) {
            $query;
        });

        return $query->join($t, "$r.id", "=", "$t.record_id")
            ->where('title', 'LIKE', '%' . $phrase . '%')
            ->orWhere('description', 'LIKE', '%' . $phrase . '%');
    }

    /**
     * Getting user data on POST call
     *
     * @return mixed
     */
    protected function getInputData ()
    {
        (new HCCompaniesPositionsValidator())->validateForm();
        (new HCCompaniesPositionsTranslationsValidator())->validateForm();

        $_data = request()->all();

        if (array_has($_data, 'id'))
            array_set($data, 'record.id', array_get($_data, 'id'));


        $translations = array_get($_data, 'translations');

        /*foreach ($translations as &$value)
            if (!isset($value['slug']) || $value['slug'] == "")
                $value['slug'] = generateHCSlug("hc-companies/positions", $value['label']);*/

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

        $select = HCCompaniesPositions::getFillableFields(true);

        $record = HCCompaniesPositions::with($with)
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
