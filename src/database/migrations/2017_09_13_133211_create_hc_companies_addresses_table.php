<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateHcCompaniesAddressesTable
 */
class CreateHcCompaniesAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('hc_companies_addresses', function (Blueprint $table) {
            $table->integer('count', true);
            $table->string('id', 36);
            $table->timestamps();
            $table->softDeletes();
            $table->string('company_id', 36)
                ->index('fk_hc_companies_addresses_hc_companies1_idx');
            $table->string('type_id', 36)
                ->index('fk_hc_companies_addresses_hc_companies_addresses_types1_idx');
            $table->string('title');
            $table->string('employee_id', 36)->nullable()
                ->index('fk_hc_companies_addresses_hc_companies_employees1_idx');
            $table->string('country_id', 36);
            $table->string('municipality_id', 36)->nullable()
                ->index('fk_hc_companies_addresses_hc_regions_municipalities1_idx');
            $table->string('city_id', 36)->nullable()
                ->index('fk_hc_companies_addresses_hc_regions_cities1_idx');
            $table->string('street');
            $table->string('zip', 45)->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('hc_companies_addresses');
    }

}
