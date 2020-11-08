<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cropfarm extends Model
{
    protected $fillable=['farmID','crop_id','season_id','status'];
}
