<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable = [
        'plate_no', 'serviceType', 'datetime', 'remarks',
    ];

    protected $table ='appointments';

    protected $primaryKey = 'apt_id';
}
