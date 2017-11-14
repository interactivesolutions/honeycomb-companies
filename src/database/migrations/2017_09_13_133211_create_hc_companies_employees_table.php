<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcCompaniesEmployeesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_companies_employees', function(Blueprint $table) {
            $table->integer('count', true);
            $table->string('id', 36)->unique('id_UNIQUE');
            $table->timestamps();
            $table->softDeletes();
            $table->string('company_id', 36)->index('fk_hc_companies_employees_hc_companies1_idx');
            $table->string('user_id', 36)->index('fk_hc_companies_employees_hc_users1_idx');
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('position_id', 36)->index('fk_hc_companies_employees_hc_companies_positions1_idx');
            $table->string('country_id', 36)->nullable()->index('fk_hc_companies_employees_hc_regions_countries1_idx');
            $table->string('municipality_id',
                36)->nullable()->index('fk_hc_companies_employees_hc_regions_municipalities1_idx');
            $table->string('city_id', 36)->nullable()->index('fk_hc_companies_employees_hc_regions_cities1_idx');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hc_companies_employees');
    }

}
