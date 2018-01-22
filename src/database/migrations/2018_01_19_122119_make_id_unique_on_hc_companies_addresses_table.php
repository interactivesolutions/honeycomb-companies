<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class MakeIdUniqueOnHcCompaniesAddressesTable
 */
class MakeIdUniqueOnHcCompaniesAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('hc_companies_addresses', function (Blueprint $table) {
            $table->unique('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('hc_companies_addresses', function (Blueprint $table) {
            $table->dropUnique('hc_companies_addresses_id_unique');
        });
    }
}
