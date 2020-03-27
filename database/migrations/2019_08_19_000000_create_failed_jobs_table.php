<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_jobs', function (Blueprint $table) {
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->bigIncrements('job_id');
            $table->string('job_title');
            $table->string('company_name');
            $table->date('start');
            $table->date('end');
        });
    }

// Job ID
// Candidate ID
// job title
// company name 
// start date
// end date


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
}
