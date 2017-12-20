<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddForeignKeysToHcCompaniesTypesTable
 */
class AddForeignKeysToHcCompaniesTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('hc_companies_types', function (Blueprint $table) {
            $table->foreign('country_id', 'fk_hc_companies_types_hc_regions_countries1')
                ->references('id')
                ->on('hc_regions_countries')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('hc_companies_types', function (Blueprint $table) {
            $table->dropForeign('fk_hc_companies_types_hc_regions_countries1');
        });
    }
}
