<?php

namespace InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;
use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;
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
    protected $fillable = [
        'id',
        'company_id',
        'type_id',
        'title',
        'employee_id',
        'country_id',
        'municipality_id',
        'city_id',
        'street',
        'zip',
        'phone',
        'fax',
        'remote_location',
    ];

    /**
     * Company data
     *
     * @return HasOne
     */
    public function company(): HasOne
    {
        return $this->hasOne(HCCompanies::class, 'id', 'company_id');
    }

    /**
     * Type data
     *
     * @return HasOne
     */
    public function type(): HasOne
    {
        return $this->hasOne(HCCompaniesAddressesTypes::class, 'id', 'type_id')->with('translation');
    }

    /**
     * Employee data
     *
     * @return HasOne
     */
    public function employee(): HasOne
    {
        return $this->hasOne(HCCompaniesEmployees::class, 'id', 'employee_id');
    }

    /**
     * Country data
     *
     * @return HasOne
     */
    public function country(): HasOne
    {
        return $this->hasOne(HCCountries::class, 'id', 'country_id');
    }

    /**
     * CIty data
     *
     * @return HasOne
     */
    public function city(): HasOne
    {
        return $this->hasOne(HCCities::class, 'id', 'city_id');
    }

    /**
     * Employee data
     *
     * @return BelongsToMany
     */
    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(HCCompaniesEmployees::class, 'hc_companies_employee_addresses', 'address_id',
            'employee_id')->withPivot('count')->orderBy("hc_companies_employee_addresses.count");
    }
}