<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cropfarm extends Model
{
    protected $fillable=['farm_id','crop_id','season_id','status'];
}
