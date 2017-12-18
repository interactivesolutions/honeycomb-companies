<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;

/**
 * InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesTypesTranslations
 *
 * @property int $count
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string $record_id
 * @property string $language_code
 * @property string $name
 * @property string|null $description
 * @method static Builder|HCCompaniesTypesTranslations whereCount($value)
 * @method static Builder|HCCompaniesTypesTranslations whereCreatedAt($value)
 * @method static Builder|HCCompaniesTypesTranslations whereDeletedAt($value)
 * @method static Builder|HCCompaniesTypesTranslations whereDescription($value)
 * @method static Builder|HCCompaniesTypesTranslations whereId($value)
 * @method static Builder|HCCompaniesTypesTranslations whereLanguageCode($value)
 * @method static Builder|HCCompaniesTypesTranslations whereName($value)
 * @method static Builder|HCCompaniesTypesTranslations whereRecordId($value)
 * @method static Builder|HCCompaniesTypesTranslations whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HCCompaniesTypesTranslations extends HCUuidModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_companies_types_translations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'record_id',
        'language_code',
        'name',
        'description',
    ];
}