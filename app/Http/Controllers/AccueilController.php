<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Theme;
use App\PictureModel;

class AccueilController extends Controller
{
    public function index()
    {
        $theme = new Theme;
     $theme_en_ligne=Theme::where('is_brouillon',false)->where('is_archive',false)->first();
     $photo=PictureModel::where('id_model',$theme->id)->first();
     if(empty($theme_en_ligne))
        {
     $theme=['titre'=>'PAS DE THEME EN LIGNE'];
     $photo= ['id'=>1];
        }
     else
       {
        $theme =  $theme_en_ligne;
        if(empty($photo))
        {
            $photo = ['id'=> 1];
        }
       }
     $carbon = Carbon::today();
     $carbon->format('Y-d-m');
     $themecompare=Theme::where('date_publication',$carbon)->where('is_brouillon',true)->first();
        if($themecompare)
            {
                $theme->is_archive = true;
                $theme->save();
                $themecompare->is_brouillon= false;
                $themecompare->save();
                 $theme=$themecompare;
                 $photo=PictureModel::where('id_model',$themecompare->id)->first();
                  return view('welcome',compact('theme','photo'));
            }
     //dd( $themecompare);
       else{
       
       return view('welcome',compact('theme','photo'));
       //  return $theme;
       }
    }
    public function vue_application()
        {
            $theme = new Theme;
     $theme_en_ligne=Theme::where('is_brouillon',false)->where('is_archive',false)->first();
     if(empty($theme_en_ligne))
     $theme=['titre'=>'PAS DE THEME EN LIGNE'];
     else
     $theme =  $theme_en_ligne;
            return view('frontend.vue_application',compact('theme'));
        }
}
