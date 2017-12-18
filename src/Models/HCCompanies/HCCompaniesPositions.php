<?php

declare(strict_types = 1);

namespace InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use InteractiveSolutions\HoneycombCore\Models\HCMultiLanguageModel;

/**
 * InteractiveSolutions\HoneycombCompanies\Models\HCCompanies\HCCompaniesPositions
 *
 * @property int $count
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read HCCompaniesPositionsTranslations $translation
 * @property-read Collection|HCCompaniesPositionsTranslations[] $translations
 * @method static Builder|HCCompaniesPositions whereCount($value)
 * @method static Builder|HCCompaniesPositions whereCreatedAt($value)
 * @method static Builder|HCCompaniesPositions whereDeletedAt($value)
 * @method static Builder|HCCompaniesPositions whereId($value)
 * @method static Builder|HCCompaniesPositions whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HCCompaniesPositions extends HCMultiLanguageModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_companies_positions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];
}
