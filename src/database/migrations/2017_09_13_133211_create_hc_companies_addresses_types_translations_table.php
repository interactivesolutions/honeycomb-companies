<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcCompaniesAddressesTypesTranslationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_companies_addresses_types_translations', function(Blueprint $table) {
            $table->integer('count', true);
            $table->string('id', 36)->unique('id_UNIQUE');
            $table->timestamps();
            $table->softDeletes();
            $table->string('record_id', 36)->index('fk_hc_companies_addresses_types_translations_hc_companies_a_idx');
            $table->string('language_code',
                36)->index('fk_hc_companies_addresses_types_translations_hc_languages1_idx');
            $table->string('title', 45);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hc_companies_addresses_types_translations');
    }

}
