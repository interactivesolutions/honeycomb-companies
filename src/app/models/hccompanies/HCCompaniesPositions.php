<?php

namespace interactivesolutions\honeycombcompanies\app\models\hccompanies;

use interactivesolutions\honeycombcore\models\HCMultiLanguageModel;

class HCCompaniesPositions extends HCMultiLanguageModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_companies_positions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];

}
