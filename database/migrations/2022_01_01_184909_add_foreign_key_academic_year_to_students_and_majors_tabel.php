<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyAcademicYearToStudentsAndMajorsTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
           $table->foreignId('academic_year_id')->constrained();
        });

        Schema::table('majors', function (Blueprint $table) {
            $table->foreignId('academic_year_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('academic_year_id');
        });

        Schema::table('majors', function (Blueprint $table) {
            $table->dropColumn('academic_year_id');
        });
    }
}
