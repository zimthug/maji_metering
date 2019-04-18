<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{

    protected $primaryKey = 'meter_id';

    protected $table = 'meters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'meter_no', 'meter_type'
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