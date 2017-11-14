<?php

namespace InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;

use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;

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
    protected $fillable = ['id', 'record_id', 'language_code', 'title'];
}