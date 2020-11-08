<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasMediaTrait;
    protected $fillable=[
        'fname','lname','phone','identity','photo',
    ];
}
