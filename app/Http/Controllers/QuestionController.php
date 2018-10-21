<?php

namespace App\Http\Controllers;
use  App\http\Requests;
use Illuminate\Http\Request;
use App\Theme;
use App\Question;
use App\PictureModel;
use App\Reponse;
use Validator;
use Response;
use Carbon\Carbon;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($theme_id)
    {
        $questions= Question::all()->where('id_theme',$theme_id)->where('questions.is_private',false)->sortByDesc('id');
        $reponses = \DB::table('reponses')->join('questions','questions.id','=','reponses.id_question')->select('questions.*','reponses.*')->where('questions.id_theme',25)->get();
        $theme = Theme::find($theme_id);
        $themearchive = \DB::table('themes')->where('is_archive',true)->select('themes.*')->latest('id')->limit(2)->get();
        $conclusion = Reponse::where('id_question',$theme_id)->where('is_final_reponse',true)->first();     
         $photo=PictureModel::where('id_model',$theme->id)->first();
        // $photoarchive = \DB::table('picture_models')->join('themes','themes.id','=','picture_models.id_model')->select('picture_models.*','themes.*')->where('themes.is_archive',true)->latest('themes.id')->limit(2)->get();
    	return view("questions.questionreponse",compact('theme','photo','reponses','questions','conclusion','themearchive','photoarchive'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function askQuestion($theme_id){
        $theme = Theme::find($theme_id);
      //  $photo=PictureModel::where('id_model',$theme->id)->first();
        
    	return view("questions.askQuestionForm",compact('theme'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'salu';
    }
    public function addQuestion(Request $request)
    {
        $question = new Question;
        $this->validate($request,[
            'question'=> 'required|min:10',
            'email'=> 'required|email',
            'emeteur'=>'required'
           ]);
        if($request->question_status=='on')
           {
            $request->question_status=true;
           }else
           $request->question_status=false;
        
            $carbon = Carbon::today();
              $question->contenue = $request->question;
              $question->emeteur = $request->nom;
              $question->id_theme = (int) $request->idtheme;
              $question->email = $request->email;
              $question->emeteur=$request->emeteur;
              $question->date_creation = $carbon;
              $question->is_private = $request->status === 'true' ? true:false;
              $question->save();
             return redirect("/question/poser_question/{$question->id_theme}")->with('response','Question envoyer avec success');
           
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
    public function destroy(Request $request)
    {
         
       $questions = Question::find($request->id);
       $questions->delete();
        return response()->json(array('response'=>['id'=>$questions->id]));
    }
    public function validerQuestion(Request $request)
       {
        $questions = Question::find($request->id);
         $questions->is_approuve=true;
         $questions->update();
         return response()->json(array('response'=>['id'=>$questions->id]));
       }
       public function Vuequestion()
          {
            $questions = Question::where('is_approuve',false)->paginate(5);
            return view('admin.question_valider',compact('questions'));
          }
}
