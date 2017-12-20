<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class AddRemoteLocationToHcCompaniesAddressesTable
 */
class AddRemoteLocationToHcCompaniesAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('hc_companies_addresses', function (Blueprint $table) {
            $table->enum('remote_location', ['0', '1'])->default(0);
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
            $table->dropColumn('remote_location');
        });
    }
}
