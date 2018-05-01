<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Response;
use Illuminate\Support\Facades\input;
use  App\http\Requests;
use App\Http\Requests\ThemeRequest;
use App\Rules\ThemePublier;
use Carbon\Carbon;

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theme_en_ligne=Theme::where('is_brouillon',false)->where('is_archive',false)->first();
        $theme = Theme::all()->where('is_brouillon',true)->where('is_archive',false);
        return view('admin.theme_liste',compact('theme','theme_en_ligne'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theme_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(\Request::all());
        $titre = $request->input('theme_titre');
        $date = $request->input('theme_date');
        $option = $request->input('theme_option');
        $resume = $request->input('theme_resume');
        $id=Auth::user()->id;
        $theme= Theme::create(['titre'=>$titre,'id_user'=>$id,'resume'=>$resume,'date_publication'=>$date,'is_brouillon'=>true,'is_archive'=>false]);
          if($option=='Publier')
            {
                 
            }
            if($option=='Enregistrer')
              {

              }
              return redirect('themes/create')->with('response','Profil cree avec succes');
    }
       public function addTheme(Request $request)
          {
                    $theme = new Theme;
                    if($request->theme_publi==false)
                          {
                            $themes=Theme::where('is_brouillon',false)->where('is_archive',false)->get();
                               if(!($themes->isEmpty()))
                                  {
                                    return response()->json(array('errors'=>['theme_publi'=>'IL YA DEJA UN THEME EN LIGNE']));
                                  }
                                  else{
                            $validator = Validator::make($request->all(),[
                                'theme_titre' => 'required|min:3',
                                'resume' => 'required|min:5'
        
                            ]);
                                  }
                            if($validator->fails())
                            {
                            
                            return response()->json(array('errors'=>$validator->getMessageBag()->toarray()));
                              
                            }
                        
                             else{
                               $carbon = Carbon::today();
                                 $id=Auth::user()->id;
                                 $theme->titre=$request->theme_titre;
                                 $theme->resume= $request->input('resume');
                                 $theme->date_publication = $carbon;
                                 $theme->date_publication->format('Y-d-m'); 
                                 $theme->id_user=$id;
                                 $theme->is_brouillon= false;
                                 $theme->is_archive= false;
                                 $theme->save();
                                 return response()->json($theme); 
                             }
                          }
                          else{
                   $validator = Validator::make($request->all(),$theme->rules);
                     if($validator->fails())
                        {
                        
                            return response()->json(array('errors'=>$validator->getMessageBag()->toarray()));
                        }
                        else
                        { 
                            $id=Auth::user()->id;
                            $theme->titre=$request->theme_titre;
                            $theme->resume= $request->input('resume');
                           // date('Y/m/d',strtotime($request->theme_date));   
                           $theme->date_publication = $request->theme_date;
                          $theme->date_publication->format('Y-d-m'); 
                            $theme->id_user=$id;
                            $theme->is_brouillon= true;
                            $theme->is_archive= false;
                            $theme->save();
                            return response()->json($theme);
                       }
                    }
          }

    /**
     * Display the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        return 'salu';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $theme = Theme::find($request->id);
        $theme->titre=$request->titre;
        $theme->resume=$request->resume;
        $theme->date_publication=$request->date;
        $theme->save();
    return response()->json($theme);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        return 'delete';
    }
    public function deleteTheme(Request $request)
       {
           $theme = Theme::find($request->id)->delete();
           return response()->json();
       }
       public function archivageTheme(Request $request)
        {
            $theme = Theme::find($request->id);
            $theme->is_archive = true;
            $theme->save();
            return response()->json($theme);
        }
    
}
