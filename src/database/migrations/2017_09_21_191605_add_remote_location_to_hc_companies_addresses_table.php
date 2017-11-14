<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRemoteLocationToHcCompaniesAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hc_companies_addresses', function(Blueprint $table) {
            $table->enum('remote_location', ['0', '1'])->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hc_companies_addresses', function(Blueprint $table) {
            $table->dropColumn('remote_location');
        });
    }
}
