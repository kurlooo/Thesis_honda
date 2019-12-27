<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCtrlSheet extends Model
{
    protected $fillable = [
        'RO_no', 'cust_name', 'plate_no', 'model', 'pro_time',
        'time_in', 'time_out1', 'time_out2', 'workbay_id', 'total_time',
        'frt', 'tech_name','qc','rlsd',
    ];

    protected $table = 'jobctrl';

}
