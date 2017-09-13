<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcCompaniesAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_companies_addresses', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('id', 36)->primary();
			$table->timestamps();
			$table->softDeletes();
			$table->string('company_id', 36)->index('fk_hc_companies_addresses_hc_companies1_idx');
			$table->string('type_id', 36)->index('fk_hc_companies_addresses_hc_companies_addresses_types1_idx');
			$table->string('title');
			$table->string('employee_id', 36)->nullable()->index('fk_hc_companies_addresses_hc_companies_employees1_idx');
			$table->string('country_id', 36);
			$table->string('city_id', 36)->nullable();
			$table->string('street')->nullable();
			$table->string('zip', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_companies_addresses');
	}

}
