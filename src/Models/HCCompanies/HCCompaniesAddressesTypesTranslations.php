<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;

/**
 * InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesAddressesTypesTranslations
 *
 * @property int $count
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string $record_id
 * @property string $language_code
 * @property string $title
 * @method static Builder|HCCompaniesAddressesTypesTranslations whereCount($value)
 * @method static Builder|HCCompaniesAddressesTypesTranslations whereCreatedAt($value)
 * @method static Builder|HCCompaniesAddressesTypesTranslations whereDeletedAt($value)
 * @method static Builder|HCCompaniesAddressesTypesTranslations whereId($value)
 * @method static Builder|HCCompaniesAddressesTypesTranslations whereLanguageCode($value)
 * @method static Builder|HCCompaniesAddressesTypesTranslations whereRecordId($value)
 * @method static Builder|HCCompaniesAddressesTypesTranslations whereTitle($value)
 * @method static Builder|HCCompaniesAddressesTypesTranslations whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HCCompaniesAddressesTypesTranslations extends HCUuidModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_companies_addresses_types_translations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'record_id',
        'language_code',
        'title',
    ];
}