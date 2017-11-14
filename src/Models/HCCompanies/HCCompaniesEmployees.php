<?php

namespace InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use InteractiveSolutions\HoneycombAcl\Models\HCUsers;
use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;
use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;
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
    protected $fillable = [
        'id',
        'company_id',
        'user_id',
        'name',
        'surname',
        'position_id',
        'country_id',
        'municipality_id',
        'city_id',
        'phone',
        'fax',
        'birthday',
    ];

    protected $appends = ['email'];

    /**
     * User data
     *
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(HCUsers::class, 'id', 'user_id');
    }

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
     * Position data
     *
     * @return HasOne
     */
    public function position(): HasOne
    {
        return $this->hasOne(HCCompaniesPositions::class, 'id', 'position_id')->with('translation');
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
     * Returning user email
     *
     * @return mixed
     */
    public function getEmailAttribute()
    {
        return $this->user->email;
    }

    /**
     * @return BelongsToMany
     */
    public function addresses(): BelongsToMany
    {
        return $this->belongsToMany(HCCompaniesAddresses::class, 'hc_companies_employee_addresses', 'employee_id',
            'address_id')->withPivot('count')->orderBy("hc_companies_employee_addresses.count");
    }
}