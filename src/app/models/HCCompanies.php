<?php

namespace interactivesolutions\honeycombcompanies\app\models;

use interactivesolutions\honeycombcore\models\HCUuidModel;

class HCCompanies extends HCUuidModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'vat', 'country_id', 'city_id', 'type_id', 'logo_id', 'website'];
}