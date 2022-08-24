<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    //
    protected $table = 'vp_accessory';
    protected $primaryKey = 'acc_id';
    protected $guarded = [];
}