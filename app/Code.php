<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{

    protected $primaryKey = 'code_id';

    protected $table = 'codes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mcode', 'code', 'code_desc', 'ind_in_use',
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