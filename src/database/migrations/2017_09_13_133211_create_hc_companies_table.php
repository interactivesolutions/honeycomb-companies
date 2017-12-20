<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateHcCompaniesTable
 */
class CreateHcCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('hc_companies', function (Blueprint $table) {
            $table->integer('count', true);
            $table->string('id', 36)->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');
            $table->string('vat')->nullable();
            $table->string('country_id', 36)->index('fk_hc_companies_hc_regions_countries1_idx');
            $table->string('city_id', 36)->nullable()
                ->index('fk_hc_companies_hc_regions_cities1_idx');
            $table->string('municipality_id', 36)->nullable()
                ->index('fk_hc_companies_hc_regions_municipalities1_idx');
            $table->string('type_id', 36)->nullable()
                ->index('fk_hc_companies_hc_companies_types1_idx');
            $table->string('logo_id', 36)->nullable()
                ->index('fk_hc_companies_hc_resources1_idx');
            $table->string('website')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('hc_companies');
    }

}
