<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PictureModel extends Model
{
    protected $fillable=['type_model','chemin_model'];
    public $timestamps = false;
}
