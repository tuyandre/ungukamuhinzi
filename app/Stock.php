<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable=['season_id','crops_id','quantity','price','status'];
}
