<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneAndFaxFieldsToHcCompaniesEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hc_companies_employees', function(Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hc_companies_employees', function(Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('fax');
        });
    }
}
