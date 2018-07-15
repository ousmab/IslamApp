<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $fillable = ['id_user','reponse_contenue','is_final_reponse','id_question'];
    protected $dates=['date_creation'];
    public $rules = [
        'reponse' => 'required|string|min:5'
        
    ];
    public $rules2 = [
        'editordata'=>'required|min:20'
    ];
     public $timestamps = false;
}
