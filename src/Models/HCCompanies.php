<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;
use interactivesolutions\honeycombregions\app\models\regions\HCCities;
use interactivesolutions\honeycombregions\app\models\regions\HCCountries;
use interactivesolutions\honeycombregions\app\models\regions\HCMunicipalities;

/**
 * InteractiveSolutions\HoneycombCompanies\Models\HCCompanies
 *
 * @property int $count
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string $name
 * @property string|null $vat
 * @property string $country_id
 * @property string|null $city_id
 * @property string|null $municipality_id
 * @property string|null $type_id
 * @property string|null $logo_id
 * @property string|null $website
 * @property string|null $company_code
 * @property-read HCCities $city
 * @property-read HCCountries $country
 * @property-read HCMunicipalities $municipality
 * @method static Builder|HCCompanies whereCityId($value)
 * @method static Builder|HCCompanies whereCompanyCode($value)
 * @method static Builder|HCCompanies whereCount($value)
 * @method static Builder|HCCompanies whereCountryId($value)
 * @method static Builder|HCCompanies whereCreatedAt($value)
 * @method static Builder|HCCompanies whereDeletedAt($value)
 * @method static Builder|HCCompanies whereId($value)
 * @method static Builder|HCCompanies whereLogoId($value)
 * @method static Builder|HCCompanies whereMunicipalityId($value)
 * @method static Builder|HCCompanies whereName($value)
 * @method static Builder|HCCompanies whereTypeId($value)
 * @method static Builder|HCCompanies whereUpdatedAt($value)
 * @method static Builder|HCCompanies whereVat($value)
 * @method static Builder|HCCompanies whereWebsite($value)
 * @mixin \Eloquent
 */
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
    protected $with = [
        'country',
        'city',
        'municipality',
    ];

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
