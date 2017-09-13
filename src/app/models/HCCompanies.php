<?php

namespace interactivesolutions\honeycombcompanies\app\models;

use interactivesolutions\honeycombcore\models\HCUuidModel;
use interactivesolutions\honeycombregions\app\models\regions\HCCities;
use interactivesolutions\honeycombregions\app\models\regions\HCCountries;
use interactivesolutions\honeycombregions\app\models\regions\HCMunicipalities;

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
    protected $fillable = ['id', 'name', 'vat', 'country_id', 'municipality_id', 'city_id', 'type_id', 'logo_id', 'website'];

    protected $with = ['country', 'city', 'municipality'];

    public function country ()
    {
        return $this->hasOne (HCCountries::class, 'id', 'country_id');
    }

    public function city ()
    {
        return $this->hasOne (HCCities::class, 'id', 'city_id');
    }

    public function municipality ()
    {
        return $this->hasOne (HCMunicipalities::class, 'id', 'municipality_id');
    }
}