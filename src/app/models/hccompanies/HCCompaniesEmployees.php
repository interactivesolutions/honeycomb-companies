<?php

namespace interactivesolutions\honeycombcompanies\app\models\hccompanies;

use interactivesolutions\honeycombacl\app\models\HCUsers;
use interactivesolutions\honeycombcompanies\app\models\HCCompanies;
use interactivesolutions\honeycombcore\models\HCUuidModel;
use interactivesolutions\honeycombregions\app\models\regions\HCCountries;

class HCCompaniesEmployees extends HCUuidModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_companies_employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'company_id', 'user_id', 'name', 'surname', 'position_id', 'country_id', 'municipality_id', 'city_id', 'phone', 'fax', 'birthday'];

    protected $appends = ['email'];

    /**
     * User data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user ()
    {
        return $this->hasOne(HCUsers::class, 'id', 'user_id');
    }

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
     * Position data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function position ()
    {
        return $this->hasOne(HCCompaniesPositions::class, 'id', 'position_id')->with('translation');
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
     * Returning user email
     *
     * @return mixed
     */
    public function getEmailAttribute ()
    {
        return $this->user->email;
    }

    public function addresses ()
    {
        return $this->belongsToMany(HCCompaniesAddresses::class, 'hc_companies_employee_addresses', 'employee_id', 'address_id')->withPivot('count')->orderBy("hc_companies_employee_addresses.count");
    }
}