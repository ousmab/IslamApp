<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable=['id_user','titre','resume','is_brouillon','is_archive'];
    public $rules =
        [
              'theme_titre' => 'required|min:3',
              'date_publication'=>'required|unique:themes',
               'resume' => 'required|min:5',
               'theme_logo'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2080'
        ]
        ;
      protected $dates = ['date_publication'];
      public function getFirstNameAttribute($value)
      {
          return ucfirst($value);
      }

}
