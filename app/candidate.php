<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class candidate extends Model
{
    protected $table = 'candidates';
    public $timestamps = false;

    public function jobs_table()
    {
        return $this->hasMany(jobs_table::class);
    }
}
