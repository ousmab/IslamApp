<?php

namespace App\Http\Controllers;
use App\Reponse;
use Illuminate\Support\Facades\Mail;
use App\Question;
use App\Mail\MailReponseQuestion;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\Theme;
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
     $questions = Question::where([['is_approuve','=',true],['is_repondue','=',false]])->paginate(5);
    // $questions = \DB::table('questions')->join('reponses','questions.id','<>','reponses.id_question')->select('questions.*','reponses.*')->where(['reponses.id_question'=>null])->paginate(5);
        return view('admin.question_reponse',compact('questions'));
    }
        //methode pour afficher la vue pour la conclusion de theme
            public function vueConclureTheme()
               {
                
                $theme=Theme::where('is_brouillon',false)->where('is_archive',false)->first();
                if(empty($theme))
                 {
                $theme=['titre'=>'PAS DE THEME EN LIGNE'];
                 }
                 $reponse = Reponse::where('is_brouillon_reponse',true)->where('is_final_reponse',true)->first();
                 if(empty($reponse))
                    {
                        $reponse=['reponse'=>'pas de reponse en brouillon'];
                    }
                return view('admin.conclure_theme',compact('theme','reponse'));
               }
               //methode pour conclure le theme en ligme
               public function saveConclureTheme(Request $request)
                  {
                        
                        $validator = Validator::make($request->all(),[
                            'editordata'=>'required|min:20'
                           ]);
                           if($validator->fails())
                           {
                               return response()->json(array('errors'=>$validator->getMessageBag()->toarray()));
                           }
                           
                           else{
                            //$theme = Theme::find($request->codetheme);
                            $reponses =Reponse::find($request->idreponse);
                            $reponses->reponse_contenue = $request->editordata;
                            
                            $carbon = Carbon::today();
                            $reponses->date_creation = $carbon;
                            $reponses->is_final_reponse = true;
                            $reponses->id_user =  Auth::user()->id;
                            $reponses->id_question=$request->codetheme;
                               if($request->is_brouillon)
                                    {
                                    $reponses->is_brouillon_reponse=true;
                                    $reponses->save();
                                   return response()->json($reponses);
                                    }
                                    else{

                                    }
                        
                           }  
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
        $validator = Validator::make($request->all(),$reponses->rules);
            if($validator->fails())
            {
                return response()->json(array('errors'=>$validator->getMessageBag()->toarray()));
            }
            else{
                $reponses->reponse_contenue = $request->reponse;
                $reponses->date_creation = $carbon;
                $reponses->is_final_reponse = false;
                $reponses->id_question = $request->id;
                $reponses->id_user = $id_user;
                
                if($questions->is_private)
                {
                    $myemail = new MailReponseQuestion($questions->emeteur,$request->reponse);
                    Mail::to($questions->email)->send($myemail);
                }
                      $questions->is_repondue = true;
                      $questions->save();
                      $reponses->save();
                      return response()->json(array('response'=>['id'=>$questions->id]));
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
       public function showQuestionsReponses()
           {
         $myreponses = \DB::table('questions')->join('reponses','questions.id','=','reponses.id_question')->select('questions.*','reponses.*')->where(['questions.is_private'=>false])->paginate(5);
            dd($myreponses);
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
