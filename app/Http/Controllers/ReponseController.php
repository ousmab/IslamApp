<?php

namespace App\Http\Controllers;
use App\Reponse;
use App\Question;
use Illuminate\Http\Request;
use Validator;
use Response;
use Auth;
use carbon\Carbon;

class ReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::where('is_approuve',true)->paginate(5);
        return view('admin.question_reponse',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $questions = Question::find($request->id);
        $reponses= new Reponse;
        $id_user = Auth::user()->id;
        $carbon = Carbon::today();
          if($questions->is_private)
            {
                return 'private';
            }
            else{
                
                $validator = Validator::make($request->all(),$reponses->rules);
                if($validator->fails())
                   {
                       return response()->json(array('errors'=>$validator->getMessageBag()->toarray()));
                   }
                   else{
                      $reponses->contenue = $request->reponse;
                      $reponses->date_creation = $carbon;
                      $reponses->is_final_reponse = false;
                      $reponses->id_question = $request->id;
                      $reponses->id_user = $id_user;
                      $reponses->save();
                   }
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
