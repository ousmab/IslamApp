<?php
use App\Theme;
use App\Mail\MailReponseQuestion;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AccueilController@index');
Route::get('archive', function () {
    $themes= Theme::all()->where('is_archive',true);
    return view('admin/archive',compact('themes'));
});
Route::get('brouillon', function () {
    return view('admin/brouillon');
});
Route::post('addTheme',function()
{
    return view('/home');
}
);

 Route::group(['middleware'=>'auth'],function(){
     Route::resource('themes','ThemesController');
     Route::POST('addTheme','ThemesController@addTheme');
     Route::POST('themeUpdate','ThemesController@update');
     Route::POST('deleteTheme','ThemesController@deleteTheme');
     Route::POST('archivertheme','ThemesController@archivageTheme');
     Route::get('vue_question','QuestionController@Vuequestion');
     Route::GET('valider_question','QuestionController@validerQuestion');
     Route::GET('delete_question','QuestionController@destroy');
     Route::GET('vue_reponse_question','ReponseController@index');
     Route::GET('vue_conclure','ReponseController@vueConclureTheme');
     Route::GET('/geolocalisation','MapLocalisationController@index');
     Route::POST('solutions','ReponseController@create');
     Route::POST('conclusion_theme','ReponseController@saveConclureTheme');
     Route::POST('picture_theme','PictureModelController@store');
     Route::POST('/save_map','MapLocalisationController@store');
     Route::POST('/update_map','MapLocalisationController@update2');
     Route::POST('/delete_map','MapLocalisationController@mydestroy');
   //  Route::GET('myreponse'.'ReponseController@showQuestionsReponses');
     
   /* Route::get('/admin.theme',function()
    {
     return view('admin.theme_liste');
    }
   );*/

 });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('accueil');


/*--GESTION DES QUESTIONS REPONSES------------------------
-------------------------------------------------------------------------------*/
Route::get('/question','QuestionController@index')->name('question');
Route::get('/question/poser_question/{id}','QuestionController@askQuestion');
Route::post('/question/poser_question/addquestion','QuestionController@addQuestion');
//--MODULE GEOLOCALISATION-----------
Route::get('/localisation',function()
   {
    $myreponses = \DB::table('questions')->join('reponses','questions.id','=','reponses.id_question')->select('questions.*','reponses.*')->where(['questions.is_private'=>false])->paginate(5);
    return $myreponses;
   });
   Route::get('/mymail',function(){
          return new MailReponseQuestion('saly','c est bien');
   });