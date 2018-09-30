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
         <th> {{$n++}}
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
         <a href="#" class="edit-modal btn btn-warning btn-sms" data-id="{{$value->id}}" data-name="{{$value->nom_map}}" data-type="{{$value->type_map}}" data-ville="{{$value->ville_map}}" data-long="{{$value->longitude}}" data-lat="{{$value->latitude}}" >
            <i class="glyphicon glyphicon-pencil"></i>
          </a>
          <a href="#" class="delete-modal btn btn-danger btn-sms" data-id="{{$value->id}}" >
            <i class="glyphicon glyphicon-trash"></i>
          </a>
         </th>
            </tr>
            @endforeach
    </tbody>
</table>
   <!--  Div pour la creation de donnee de geolocalisation  -->
   @include('include/modal_map')
 <!-- Div pour l'edition et la supression donne de geolocalisation -->
 
{{$mymaps->links()}}

                        
@endsection
@section('script.reponse')
 <script src="{{ asset('js/mapstore.js') }}"></script>
 @endsection