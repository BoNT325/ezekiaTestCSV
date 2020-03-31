<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\candidate;
use App\jobs_table;
use Carbon\Carbon;

class databaseController extends Controller
{

    public function parseCandidates() {
        if(($handle=fopen(public_path().'/candidates.csv','r'))!==FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',')) !== FALSE) {
                $candidates = new candidate();
                $candidates->id = $data [0];
                $candidates->name = $data[1];
                $candidates->surname = $data[2];
                $candidates->email = $data[3];
                $candidates->save();
                }
                fclose ($handle);
            }
        $finalCandidateData = $candidates::all ();
        //return view('welcome')->withData ( $finalCandidateData );
        databaseController::parseJobs();
    }
    public function parseJobs(){
        if(($handle=fopen(public_path().'/jobs.csv','r')) !==FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',')) !== FALSE) {
                $jobs_table = new jobs_table();
                $jobs_table->job_id = $data [0];
                $jobs_table->candidate_id = $data [1];
                $jobs_table->job_title = $data [2];
                $jobs_table->company_name = $data [3];
                //[[20].[5].[2016]] [10:31]
                $startArr = explode(" ", $data[4]);
                $startMdY = explode(".", $startArr[0]);

                $jobs_table->start = date($startMdY[2]."-". $startMdY[1]."-".$startMdY[0]." ".$startArr[1].":00");


                $endArr = explode(" ", $data[5]);
                $endMdY = explode(".", $endArr[0]);

                $jobs_table->end = date($endMdY[2]."-". $endMdY[1]."-".$endMdY[0]." ".$endArr[1].":00");


                $jobs_table->save();
            }
            fclose ($handle);
        }
        $finalJobsData = $jobs_table::all();
        return view('jobs')->withData ($finalJobsData);
    }

}
