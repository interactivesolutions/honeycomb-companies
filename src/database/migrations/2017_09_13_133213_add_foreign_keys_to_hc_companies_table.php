<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_companies', function(Blueprint $table)
		{
			$table->foreign('type_id', 'fk_hc_companies_hc_companies_types1')->references('id')->on('hc_companies_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('city_id', 'fk_hc_companies_hc_regions_cities1')->references('id')->on('hc_regions_cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('municipality_id', 'fk_hc_companies_hc_regions_municipalities1')->references('id')->on('hc_regions_municipalities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('country_id', 'fk_hc_companies_hc_regions_countries1')->references('id')->on('hc_regions_countries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('logo_id', 'fk_hc_companies_hc_resources1')->references('id')->on('hc_resources')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_companies', function(Blueprint $table)
		{
			$table->dropForeign('fk_hc_companies_hc_companies_types1');
			$table->dropForeign('fk_hc_companies_hc_regions_cities1');
			//$table->dropForeign('fk_hc_companies_hc_regions_municipalities1');
			$table->dropForeign('fk_hc_companies_hc_regions_countries1');
			$table->dropForeign('fk_hc_companies_hc_resources1');
		});
	}

}
