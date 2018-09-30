<?php

namespace App\Http\Controllers;

use App\MapLocalisation;
use Illuminate\Http\Request;
use Validator;
use Response;

class MapLocalisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mymaps= MapLocalisation::where('type_map','<>','')->paginate(6);
        return view('admin.geolocalisation',compact('mymaps'));
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
        $validator = Validator::make($request->all(),[
            'map_name' => 'required|min:3',
            'map_long'=>'required|numeric|max:500',
             'map_lat' => 'required|numeric|max:500'
        ]);
        if($validator->fails())
         {
        return response()->json(array('errors'=>$validator->getMessageBag()->toarray())); 
          }
           else{
        $maps= new MapLocalisation;
        $maps->nom_map = $request->map_name;
        $maps->type_map=$request->map_type;
        $maps->ville_map=$request->map_ville;
        $maps->longitude=$request->map_long;
        $maps->latitude=$request->map_lat;
        $maps->save();
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MapLocalisation  $mapLocalisation
     * @return \Illuminate\Http\Response
     */
    public function show(MapLocalisation $mapLocalisation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MapLocalisation  $mapLocalisation
     * @return \Illuminate\Http\Response
     */
    public function edit(MapLocalisation $mapLocalisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MapLocalisation  $mapLocalisation
     * @return \Illuminate\Http\Response
     */
   /* public function update(Request $request, MapLocalisation $mapLocalisation)
    {
        //
    }*/
    public function update2(Request $request)
      {
        $validator = Validator::make($request->all(),[
            'map_name' => 'required|min:3',
            'map_long'=>'required|numeric|max:500',
             'map_lat' => 'required|numeric|max:500'
        ]);
        if($validator->fails())
         {
        return response()->json(array('errors'=>$validator->getMessageBag()->toarray())); 
          }
           else{
        $maps=MapLocalisation::find($request->id);
        $maps->nom_map = $request->map_name;
        $maps->type_map=$request->map_type;
        $maps->ville_map=$request->map_ville;
        $maps->longitude=$request->map_long;
        $maps->latitude=$request->map_lat;
        $maps->save();
           }
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MapLocalisation  $mapLocalisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(MapLocalisation $mapLocalisation)
    {
        //
    }
    public function mydestroy(Reequest $request)
     {
        $maps=MapLocalisation::find($request->id);
     }
}
