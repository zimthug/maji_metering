<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerMeterSet extends Model
{

    protected $primaryKey = 'meter_set_id';

    protected $table = 'customer_meter_sets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'bulk_meter_id', 'dom_meter_id', 'date_installed', 'bulk_meter_status', 
        'dom_meter_status', 'date_removed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

}