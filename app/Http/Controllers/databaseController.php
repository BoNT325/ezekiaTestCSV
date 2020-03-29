<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\candidates;

class databaseController extends Controller
{
    private $candidatesParsed = FALSE;
    private $jobsParsed = FALSE;

    public function parseCandidates() {
    // if($candidatesParsed == false) {
        if(($handle=fopen(public_path().'/candidates.csv','r'))!==FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',')) !== FALSE) {
                $candidates = new candidates();
                $candidates->id = $data [0];
                $candidates->name = $data[1];
                $candidates->surname = $data[2];
                $candidates->email = $data[3];
                $candidates->save();
                }
                fclose ($handle);
            }
        $finaldata = $candidates::all ();
        $candidatesParsed = TRUE;
        return view('welcome')->withData ( $finaldata );
    // }
    // else {
    //     null;
    // }
    }

}
