<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcCompaniesEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_companies_employees', function(Blueprint $table)
		{
			$table->foreign('company_id', 'fk_hc_companies_employees_hc_companies1')->references('id')->on('hc_companies')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('position_id', 'fk_hc_companies_employees_hc_companies_positions1')->references('id')->on('hc_companies_positions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('city_id', 'fk_hc_companies_employees_hc_regions_cities1')->references('id')->on('hc_regions_cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('country_id', 'fk_hc_companies_employees_hc_regions_countries1')->references('id')->on('hc_regions_countries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_hc_companies_employees_hc_users1')->references('id')->on('hc_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_companies_employees', function(Blueprint $table)
		{
			$table->dropForeign('fk_hc_companies_employees_hc_companies1');
			$table->dropForeign('fk_hc_companies_employees_hc_companies_positions1');
			$table->dropForeign('fk_hc_companies_employees_hc_regions_cities1');
			$table->dropForeign('fk_hc_companies_employees_hc_regions_countries1');
			$table->dropForeign('fk_hc_companies_employees_hc_users1');
		});
	}

}
