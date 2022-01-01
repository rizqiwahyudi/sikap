<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsKpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results_kp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lecturer_id')->constrained()
                                          ->onUpdate('cascade');
            $table->foreignId('student_id')->constrained()
                                           ->onUpdate('cascade');
            $table->unsignedBigInteger('list_kp_id');
            $table->foreign('list_kp_id')->nullable()
                                         ->references('id')
                                         ->on('lists_kp')
                                         ->onUpdate('cascade');
            $table->string('periode', 10);
            $table->string('status', 10);
            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results_kp');
    }
}
