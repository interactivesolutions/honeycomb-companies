<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use InteractiveSolutions\HoneycombCore\Models\HCMultiLanguageModel;

/**
 * InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesTypes
 *
 * @property int $count
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string $country_id
 * @property string $short_name
 * @property-read HCCompaniesTypesTranslations $translation
 * @property-read Collection|HCCompaniesTypesTranslations[] $translations
 * @method static Builder|HCCompaniesTypes whereCount($value)
 * @method static Builder|HCCompaniesTypes whereCountryId($value)
 * @method static Builder|HCCompaniesTypes whereCreatedAt($value)
 * @method static Builder|HCCompaniesTypes whereDeletedAt($value)
 * @method static Builder|HCCompaniesTypes whereId($value)
 * @method static Builder|HCCompaniesTypes whereShortName($value)
 * @method static Builder|HCCompaniesTypes whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HCCompaniesTypes extends HCMultiLanguageModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_companies_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'country_id',
        'short_name',
    ];
}
