<?php

namespace InteractiveSolutions\HoneycombCompanies\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;
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
    protected $fillable = [
        'id',
        'name',
        'vat',
        'country_id',
        'municipality_id',
        'city_id',
        'type_id',
        'logo_id',
        'website',
        'company_code',
    ];

    /**
     * @var array
     */
    protected $with = ['country', 'city', 'municipality'];

    /**
     * @return HasOne
     */
    public function country(): HasOne
    {
        return $this->hasOne(HCCountries::class, 'id', 'country_id');
    }

    /**
     * @return HasOne
     */
    public function city(): HasOne
    {
        return $this->hasOne(HCCities::class, 'id', 'city_id');
    }

    /**
     * @return HasOne
     */
    public function municipality(): HasOne
    {
        return $this->hasOne(HCMunicipalities::class, 'id', 'municipality_id');
    }
}