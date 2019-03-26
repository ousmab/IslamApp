<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapLocalisation extends Model
{
    public $rules =
    [
          'map_name' => 'required|min:3',
          'map_long'=>'required|numeric|min:5|max:50',
           'map_lat' => 'required|numeric|min:5|max:50'
    ];
}
