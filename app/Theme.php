<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable=['id_user','titre','resume','is_brouillon','is_archive'];
    public $rules =
        [
              'theme_titre' => 'required|min:3',
              'theme_date'=>'required',
               'resume' => 'required|min:5'
        ]
        ;
      protected $dates = ['date_publication'];
        

}
