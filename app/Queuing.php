<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queuing extends Model
{
    protected $fillable = [
        'plate_no','queue_id','cust_name','date','reg_address',
        'time_in','engine_no','contact_no','km_reading',
        'model','transmission','color','svc_request','ds_full',
        'ds_int','ds_ext','ds_eng','ds_rust', 'full_remarks',
        'int_remarks','ext_remarks','engine_remarks',
        'rustproof_remarks','guard_name',
    ];

    protected $table ='queuing';

}
