<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use InteractiveSolutions\HoneycombAcl\Models\HCUsers;
use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;
use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;
use interactivesolutions\honeycombregions\app\models\regions\HCCountries;

/**
 * InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesEmployees
 *
 * @property int $count
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string $company_id
 * @property string $user_id
 * @property string $name
 * @property string|null $surname
 * @property string $position_id
 * @property string|null $country_id
 * @property string|null $municipality_id
 * @property string|null $city_id
 * @property string|null $phone
 * @property string|null $fax
 * @property string|null $birthday
 * @property-read Collection|HCCompaniesAddresses[] $addresses
 * @property-read HCCompanies $company
 * @property-read HCCountries $country
 * @property-read mixed $email
 * @property-read HCCompaniesPositions $position
 * @property-read HCUsers $user
 * @method static Builder|HCCompaniesEmployees whereBirthday($value)
 * @method static Builder|HCCompaniesEmployees whereCityId($value)
 * @method static Builder|HCCompaniesEmployees whereCompanyId($value)
 * @method static Builder|HCCompaniesEmployees whereCount($value)
 * @method static Builder|HCCompaniesEmployees whereCountryId($value)
 * @method static Builder|HCCompaniesEmployees whereCreatedAt($value)
 * @method static Builder|HCCompaniesEmployees whereDeletedAt($value)
 * @method static Builder|HCCompaniesEmployees whereFax($value)
 * @method static Builder|HCCompaniesEmployees whereId($value)
 * @method static Builder|HCCompaniesEmployees whereMunicipalityId($value)
 * @method static Builder|HCCompaniesEmployees whereName($value)
 * @method static Builder|HCCompaniesEmployees wherePhone($value)
 * @method static Builder|HCCompaniesEmployees wherePositionId($value)
 * @method static Builder|HCCompaniesEmployees whereSurname($value)
 * @method static Builder|HCCompaniesEmployees whereUpdatedAt($value)
 * @method static Builder|HCCompaniesEmployees whereUserId($value)
 * @mixin \Eloquent
 */
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
        return $this->belongsToMany(
            HCCompaniesAddresses::class,
            'hc_companies_employee_addresses',
            'employee_id',
            'address_id'
        )->withPivot('count')
            ->orderBy("hc_companies_employee_addresses.count");
    }
}