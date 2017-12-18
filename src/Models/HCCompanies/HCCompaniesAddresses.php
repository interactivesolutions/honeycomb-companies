<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;
use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;
use interactivesolutions\honeycombregions\app\models\regions\HCCities;
use interactivesolutions\honeycombregions\app\models\regions\HCCountries;

/**
 * InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesAddresses
 *
 * @property int $count
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string $company_id
 * @property string $type_id
 * @property string $title
 * @property string|null $employee_id
 * @property string $country_id
 * @property string|null $municipality_id
 * @property string|null $city_id
 * @property string $street
 * @property string|null $zip
 * @property string|null $phone
 * @property string|null $fax
 * @property string $remote_location
 * @property-read HCCities $city
 * @property-read HCCompanies $company
 * @property-read HCCountries $country
 * @property-read HCCompaniesEmployees $employee
 * @property-read Collection|HCCompaniesEmployees[] $employees
 * @property-read HCCompaniesAddressesTypes $type
 * @method static Builder|HCCompaniesAddresses whereCityId($value)
 * @method static Builder|HCCompaniesAddresses whereCompanyId($value)
 * @method static Builder|HCCompaniesAddresses whereCount($value)
 * @method static Builder|HCCompaniesAddresses whereCountryId($value)
 * @method static Builder|HCCompaniesAddresses whereCreatedAt($value)
 * @method static Builder|HCCompaniesAddresses whereDeletedAt($value)
 * @method static Builder|HCCompaniesAddresses whereEmployeeId($value)
 * @method static Builder|HCCompaniesAddresses whereFax($value)
 * @method static Builder|HCCompaniesAddresses whereId($value)
 * @method static Builder|HCCompaniesAddresses whereMunicipalityId($value)
 * @method static Builder|HCCompaniesAddresses wherePhone($value)
 * @method static Builder|HCCompaniesAddresses whereRemoteLocation($value)
 * @method static Builder|HCCompaniesAddresses whereStreet($value)
 * @method static Builder|HCCompaniesAddresses whereTitle($value)
 * @method static Builder|HCCompaniesAddresses whereTypeId($value)
 * @method static Builder|HCCompaniesAddresses whereUpdatedAt($value)
 * @method static Builder|HCCompaniesAddresses whereZip($value)
 * @mixin \Eloquent
 */
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
        return $this->belongsToMany(
            HCCompaniesEmployees::class,
            'hc_companies_employee_addresses',
            'address_id',
            'employee_id'
        )->withPivot('count')
            ->orderBy('hc_companies_employee_addresses.count');
    }
}