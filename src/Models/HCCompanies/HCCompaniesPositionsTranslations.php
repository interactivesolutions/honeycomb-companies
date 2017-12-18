<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;

/**
 * InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesPositionsTranslations
 *
 * @property int $count
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string $record_id
 * @property string $language_code
 * @property string $title
 * @property string|null $description
 * @method static Builder|HCCompaniesPositionsTranslations whereCount($value)
 * @method static Builder|HCCompaniesPositionsTranslations whereCreatedAt($value)
 * @method static Builder|HCCompaniesPositionsTranslations whereDeletedAt($value)
 * @method static Builder|HCCompaniesPositionsTranslations whereDescription($value)
 * @method static Builder|HCCompaniesPositionsTranslations whereId($value)
 * @method static Builder|HCCompaniesPositionsTranslations whereLanguageCode($value)
 * @method static Builder|HCCompaniesPositionsTranslations whereRecordId($value)
 * @method static Builder|HCCompaniesPositionsTranslations whereTitle($value)
 * @method static Builder|HCCompaniesPositionsTranslations whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HCCompaniesPositionsTranslations extends HCUuidModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_companies_positions_translations';

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
        'description',
    ];
}