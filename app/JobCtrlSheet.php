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


//    public static function boot()
//    {
//        parent::boot();
//
//        static::updating(function($model) {
//            $diff = $this->time_in1->diffForHumans($this->time_out2);
//            $this->total_time = $diff;
//        });
//    }

//    public $timestamps=[
//        'time_in1',
//        'time_out1',
//    ];
//
//    protected $appends = ['diffForHumans'];
//
//    public function getDiffInDaysAttribute()
//    {
//        if (!empty($this->time_in1) && !empty($this->time_out1)) {
//            return $this->time_out1->diffinSeconds($this->time_in1);
//        }
//    }



}
