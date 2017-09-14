<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcCompaniesPositionsTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_companies_positions_translations', function(Blueprint $table)
		{
			$table->foreign('record_id', 'fk_hc_companies_positions_translations_hc_companies_positions1')->references('id')->on('hc_companies_positions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('language_code', 'fk_hc_companies_positions_translations_hc_languages1')->references('iso_639_1')->on('hc_languages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_companies_positions_translations', function(Blueprint $table)
		{
			$table->dropForeign('fk_hc_companies_positions_translations_hc_companies_positions1');
			$table->dropForeign('fk_hc_companies_positions_translations_hc_languages1');
		});
	}

}
