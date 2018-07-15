<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['id_theme','contenue','email','emeteur','is_public','is_repondue'];
    protected $dates=['date_creation'];
    public $rules = [
        'email' => 'required|email|string|min:5',
        'nom' => 'required|string|min:4',
        'question' => 'required|string|min:6'
    ];

    protected $table = 'questions';

    public $timestamps = false;

}
