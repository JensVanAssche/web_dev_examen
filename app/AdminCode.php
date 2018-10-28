<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminCode extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'period', 'code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'admincodes';
}
