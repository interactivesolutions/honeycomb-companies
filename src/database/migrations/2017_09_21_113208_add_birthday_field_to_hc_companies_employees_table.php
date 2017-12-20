<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class AddBirthdayFieldToHcCompaniesEmployeesTable
 */
class AddBirthdayFieldToHcCompaniesEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('hc_companies_employees', function (Blueprint $table) {
            $table->date('birthday')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('hc_companies_employees', function (Blueprint $table) {
            $table->dropColumn('birthday');
        });
    }
}
