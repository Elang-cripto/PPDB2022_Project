<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appsettings', function (Blueprint $table) {
            $table->id();
            $table->string('app_nm_lembaga')->nullable();
            $table->string('app_almt_lembaga')->nullable();
            $table->string('app_telp_lembaga')->nullable();
            $table->string('app_nmks_lembaga')->nullable();
            $table->string('app_npsn_lembaga')->nullable();
            $table->string('app_tahun')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appsettings');
    }
}
