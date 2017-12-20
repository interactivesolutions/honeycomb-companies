<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEmployeeAddressesConnectionsTable
 */
class CreateEmployeeAddressesConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('hc_companies_employee_addresses', function (Blueprint $table) {
            $table->integer('count', true);
            $table->string('employee_id', 36)->index('fk_hc_companies_employee_addresses_employees_idx');
            $table->string('address_id', 36)->index('fk_hc_companies_employee_addresses_addresses_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('hc_companies_employee_addresses');
    }
}
