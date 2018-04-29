<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{

	/*--retourne la page d'accueil lorsqu'on clique sur question reponses
	---------------------------------------------------------------------------*/
    public function home(){

    	return view("questions.home");
    }

    public function askQuestion(){
    	return view("questions.askQuestionForm");
    }
}
