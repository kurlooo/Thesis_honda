<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = [
        'plate_no','cust_name','engine_no','model','color',
        'job_care','battery','gas','mileage','fleft_tr',
        'fleft_con','fright_tr','fright_con','rleft_tr',
        'rleft_con','rright_tr','rright_con','clister_com',
        'workbay_1','workbay_2',
    ];

    protected $table ='checklisting';

}
