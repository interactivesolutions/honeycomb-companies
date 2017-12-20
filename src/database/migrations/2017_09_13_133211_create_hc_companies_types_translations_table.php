<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateHcCompaniesTypesTranslationsTable
 */
class CreateHcCompaniesTypesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('hc_companies_types_translations', function (Blueprint $table) {
            $table->integer('count', true);
            $table->string('id', 36)->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->string('record_id', 36)->index('fk_hc_companies_types_translations_hc_companies_types1_idx');
            $table->string('language_code', 36)->index('fk_hc_companies_types_translations_hc_languages1_idx');
            $table->string('name');
            $table->text('description', 65535)->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('hc_companies_types_translations');
    }

}
