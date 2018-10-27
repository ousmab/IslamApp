<?php

namespace App\Http\Controllers;

use App\PictureModel;
use Illuminate\Http\Request;
use App\Theme;
//use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PictureModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $themes = Theme::where('is_archive',false)->get();
        return view('admin.theme_picture',compact('themes'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $this->validate($request,[
            'theme_logo'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2080'
           ]);
           $idpicture = PictureModel::where('id_model',$request->theme_option)->first();
           $images= $request->file('theme_logo');
           if($request->hasFile('theme_logo'))
                        {
                            $name_image= rand().'.'.$images->getClientOriginalExtension();
                            $images->move(public_path('images'),$name_image);
                        }
                        $picture = new PictureModel;
                        $picture->type_model='theme';
                        $picture->id_model = $request->theme_option;
                        $picture->chemin_model=$name_image;
                        $picture->save();
                        return redirect('themes/create')->with('response','Image selectionner avec success');
           /* 
        $validator = Validator::make($request->all(),
        [
       'theme_picture'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2080'
        ]);
        if($validator->fails())
        {
            return 'erreur';
        }  */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PictureModel  $pictureModel
     * @return \Illuminate\Http\Response
     */
    public function show(PictureModel $pictureModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PictureModel  $pictureModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PictureModel $pictureModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PictureModel  $pictureModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PictureModel $pictureModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PictureModel  $pictureModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PictureModel $pictureModel)
    {
        //
    }
}
