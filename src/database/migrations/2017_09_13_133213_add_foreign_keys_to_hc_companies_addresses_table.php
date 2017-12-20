<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddForeignKeysToHcCompaniesAddressesTable
 */
class AddForeignKeysToHcCompaniesAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('hc_companies_addresses', function (Blueprint $table) {
            $table->foreign('company_id', 'fk_hc_companies_addresses_hc_companies1')
                ->references('id')
                ->on('hc_companies')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('type_id', 'fk_hc_companies_addresses_hc_companies_addresses_types1')
                ->references('id')
                ->on('hc_companies_addresses_types')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('employee_id', 'fk_hc_companies_addresses_hc_companies_employees1')
                ->references('id')
                ->on('hc_companies_employees')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('city_id', 'fk_hc_companies_addresses_hc_regions_cities1')
                ->references('id')
                ->on('hc_regions_cities')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('municipality_id', 'fk_hc_companies_addresses_hc_regions_municipalities1')
                ->references('id')
                ->on('hc_regions_municipalities')
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
        Schema::table('hc_companies_addresses', function (Blueprint $table) {
            $table->dropForeign('fk_hc_companies_addresses_hc_companies1');
            $table->dropForeign('fk_hc_companies_addresses_hc_companies_addresses_types1');
            $table->dropForeign('fk_hc_companies_addresses_hc_companies_employees1');
            $table->dropForeign('fk_hc_companies_addresses_hc_regions_cities1');
            $table->dropForeign('fk_hc_companies_addresses_hc_regions_municipalities1');
        });
    }

}
