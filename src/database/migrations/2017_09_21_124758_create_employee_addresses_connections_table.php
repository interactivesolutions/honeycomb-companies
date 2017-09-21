<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeAddressesConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
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
    public function down()
    {
        Schema::drop('hc_companies_employee_addresses');
    }
}
