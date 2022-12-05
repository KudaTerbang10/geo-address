<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_kecamatan', function (Blueprint $table) {
            $table->uuid('id_kecamatan')->primary();
            $table->string('nama_kecamatan',length:100)->unique();
            $table->uuid('id_kabupaten')->references('id_kabupaten')->on('m_kabupaten');
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
        Schema::dropIfExists('kecamatans');
    }
};
