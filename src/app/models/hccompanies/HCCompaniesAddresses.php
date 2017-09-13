<?php

namespace interactivesolutions\honeycombcompanies\app\models\hccompanies;

use interactivesolutions\honeycombcompanies\app\models\HCCompanies;
use interactivesolutions\honeycombcore\models\HCUuidModel;
use interactivesolutions\honeycombregions\app\models\regions\HCCities;
use interactivesolutions\honeycombregions\app\models\regions\HCCountries;

class HCCompaniesAddresses extends HCUuidModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_companies_addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'company_id', 'type_id', 'title', 'employee_id', 'country_id', 'municipality_id', 'city_id', 'street', 'zip'];

    protected $with = ['city', 'company', 'type', 'employee', 'country'];

    /**
     * Company data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company ()
    {
        return $this->hasOne(HCCompanies::class, 'id', 'company_id');
    }

    /**
     * Type data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type ()
    {
        return $this->hasOne(HCCompaniesAddressesTypes::class, 'id', 'type_id')->with('translation');
    }

    /**
     * Employee data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee ()
    {
        return $this->hasOne(HCCompaniesEmployees::class, 'id', 'employee_id');
    }

    /**
     * Country data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country ()
    {
        return $this->hasOne(HCCountries::class, 'id', 'country_id');
    }

    /**
     * CIty data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function city ()
    {
        return $this->hasOne(HCCities::class, 'id', 'city_id');
    }
}