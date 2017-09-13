<?php

namespace interactivesolutions\honeycombcompanies\app\models\hccompanies;

use interactivesolutions\honeycombcore\models\HCUuidModel;

class HCCompaniesPositionsTranslations extends HCUuidModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_companies_positions_translations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'record_id', 'language_code', 'title', 'description'];
}