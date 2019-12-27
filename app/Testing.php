<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testing extends Model
{
//    public $timestamps = false;

    protected $fillable = [
        'plate_no', 'time_in', 'time_out1', 'time_out2', 'workbay_id',
    ];

    protected $table ='tests';

}
