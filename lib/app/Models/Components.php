<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Components extends Model
{
    //
    protected $table = 'vp_components';
    protected $primaryKey = 'comp_id';
    protected $guarded = [];
}
