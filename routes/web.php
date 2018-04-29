<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('archive', function () {
    return view('admin/archive');
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
Route::get('/question','QuestionController@home')->name('question');
Route::get('/question/poser_question','QuestionController@askQuestion')->name('poserQuestion');