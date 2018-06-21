<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $fillable = ['id_user','contenue','is_final_reponse','id_question'];
    protected $dates=['date_creation'];
    public $rules = [
        'reponse' => 'required|string|min:5'
        
    ];
     public $timestamps = false;
}
