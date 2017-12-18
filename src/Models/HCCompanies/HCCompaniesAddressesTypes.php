<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use InteractiveSolutions\HoneycombCore\Models\HCMultiLanguageModel;

/**
 * InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesAddressesTypes
 *
 * @property int $count
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read HCCompaniesAddressesTypesTranslations $translation
 * @property-read Collection|HCCompaniesAddressesTypesTranslations[] $translations
 * @method static Builder|HCCompaniesAddressesTypes whereCount($value)
 * @method static Builder|HCCompaniesAddressesTypes whereCreatedAt($value)
 * @method static Builder|HCCompaniesAddressesTypes whereDeletedAt($value)
 * @method static Builder|HCCompaniesAddressesTypes whereId($value)
 * @method static Builder|HCCompaniesAddressesTypes whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HCCompaniesAddressesTypes extends HCMultiLanguageModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_companies_addresses_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];

}
