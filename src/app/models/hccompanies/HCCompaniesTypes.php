<?php

namespace interactivesolutions\honeycombcompanies\app\models\hccompanies;

use interactivesolutions\honeycombcore\models\HCMultiLanguageModel;

class HCCompaniesTypes extends HCMultiLanguageModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_companies_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'country_id', 'short_name'];

}
