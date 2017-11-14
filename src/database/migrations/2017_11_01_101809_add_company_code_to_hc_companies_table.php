<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use InteractiveSolutions\HoneycombCompanies\Models\HCCompanies;

class AddCompanyCodeToHcCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     * @throws Exception
     */
    public function up()
    {
        if (HCCompanies::withTrashed()->count() > 0) {
            throw new Exception('hc_companies needs to be empty!');
        }

        Schema::table('hc_companies', function(Blueprint $table) {
            $table->string('company_code', 36)->index()->nullable();

            $table->unique(['company_code', 'country_id'], 'unique_company_in_country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hc_companies', function(Blueprint $table) {

            $table->dropUnique('unique_company_in_country');

            $table->dropColumn('company_code');
        });
    }
}
