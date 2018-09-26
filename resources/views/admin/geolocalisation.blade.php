@extends('layouts.admin')

@section('content')
<h1 class="page-header">SYSTEM DE GEOLOCALISATION</h1>
<table class="table">
    <thead class="thead-inverse">
    <tr>
    <th>NUM</th>
       <th>NOM DU LIEU</th>
       <th>TYPE LIEU </th>
       <th>VILLE </th>
       <th>LONG-LATITUDE</th>
       <th class="text-center" width="300px">
         <a href="#" class="create-modal btn btn-success btn-sm" id="add_map">
          <i class="glyphicon glyphicon-plus"></i>
         </a>
    </tr>
    </thead>
    <tbody>
      {{csrf_field()}}
      <?php $n=1; ?>
      @foreach($mymaps as $key => $value)
     <tr class=" ">
         <th> {{$n}}
         </th>
         <th> 
        {{$value->nom_map}}
         </th>
         <th>
        {{ $value->type_map }}
         </th>
         <th>
         {{ $value->ville_map }}
         </th>
         <th>
         {{ $value->longitude }} ,  {{ $value->latitude }}
         </th>
         <th>
          <a href="#" class="edit-modal btn btn-warning btn-sms" data-id="" data-titre="" data-resume="" data-date="" >
            <i class="glyphicon glyphicon-pencil"></i>
          </a>
          <a href="#" class="delete-modal btn btn-danger btn-sms" data-id="" data-titre="" >
            <i class="glyphicon glyphicon-trash"></i>
          </a>
         </th>
            </tr>
            @endforeach
    </tbody>
</table>
<div id="modal_map" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="loader hidden">
    </div>
        <div class="modal-content">
            <div class="modal-header">
            
                <button type="button" class="close" id="closebutton" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            
            <form class="form-horizontal" enctype="multipart/form-data" method="POST" role="form" >
                        {{ csrf_field() }}

                        <div class="form-group" id="map_name-div">
                            <label for="name" class="control-label col-sm-2">Nom du local</label>

                            <div class="col-sm-10">
                                <input id="map_name" type="text" class="form-control" name="map_name" value="{{ old('map_name') }}" required autofocus>
                <p class=" text-center alert alert-danger hidden" id="map_name-error"></p>                               
                            </div>
                        </div>
                      

                        <div class="form-group">
                            <label for="map_ville"class="control-label col-sm-2">Ville map</label>

                            <div class="col-sm-10">
                                <select class="form-control"  required name="map_ville" id="map_ville">
                                <option>Douala</option>
                                <option>Yaounde</option>
                                <option>Garoua</option>
                                <option>Ngaoundere</option>
                                </select>
                                                           </div>
                        </div>
                        <div class="form-group" >
                            <label for="map_type"class="control-label col-sm-2">Type map</label>

                            <div class="col-sm-10">
                                <select class="form-control" name="map_type" id="map_type"  required>
                                <option>Mosquée</option>
                                <option>Restaurant</option>
                                <option>Ecole islamique</option>
                                </select>
                                                           </div>
                        </div>
                        <div class="form-group" id="map_long-div">
                            <label for="map_long" class="control-label col-sm-2">Longitude</label>

                            <div class="col-sm-10">
                                <input id="map_long" type="number" class="form-control" name="map_long" value="{{ old('map_long') }}" required autofocus>
                <p class=" text-center alert alert-danger hidden" id="map_long-error"></p>                               
                            </div>
                        </div>
                        <div class="form-group" id="map_lat-div">
                            <label for="name" class="control-label col-sm-2">Latitude</label>

                            <div class="col-sm-10">
                                <input id="theme_titre" type="number" class="form-control" name="map_lat" value="{{ old('map_lat') }}" required autofocus>
                <p class=" text-center alert alert-danger hidden" id="map_lat-error"></p>                               
                            </div>
                        </div>
                    </form>
            </div>
            <div class="modal-footer">
          
                            <button  class="btn btn-success" id="save_map" data-dismiss="modal">
                                ENREGISTRER
                            </button>
                            <button type="button"   class="btn btn-warning"  data-dismiss="modal" >
                                RETOUR
                            </button>
                </div>
                </div>
    </div>
</div>
{{$mymaps->links()}}

                        
@endsection
@section('script.reponse')
 <script src="{{ asset('js/mapstore.js') }}"></script>
 @endsection