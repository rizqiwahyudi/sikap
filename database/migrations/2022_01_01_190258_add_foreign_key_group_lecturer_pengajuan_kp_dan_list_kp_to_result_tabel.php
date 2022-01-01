<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyGroupLecturerPengajuanKpDanListKpToResultTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('results_kp', function (Blueprint $table) {
           $table->foreignId('group_id')->nullable()->constrained(); 
        });

        Schema::table('results_kp', function (Blueprint $table) {
            $table->unsignedBigInteger('pengajuan_kp_id')->nullable();
            $table->foreign('pengajuan_kp_id')->references('id')->on('pengajuan_kp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('results_kp', function (Blueprint $table) {
            //
        });
    }
}
