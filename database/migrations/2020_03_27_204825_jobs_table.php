<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_table', function (Blueprint $table) {
            $table->unsignedBigInteger('candidate_id');
            $table->bigIncrements('job_id');
            $table->string('job_title');
            $table->string('company_name');
            $table->date('start');
            $table->date('end');

            $table->foreign('candidate_id')->references('id')->on('candidates');
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_table');
    }
}
