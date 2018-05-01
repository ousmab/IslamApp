@extends('layouts.admin')
@section('content')
<h1>THEME ARCHIVER</h1>
<hr>
<table class="table">
    <thead class="thead-inverse">
    <tr>
    <th>Nombre</th>
       <th>Titre du theme</th>
    <th>OPtion</th>
    </tr>
    </thead>
    <tbody>
    <?php $n=1; ?>
    @foreach($themes as $key => $value)
     <tr class=" theme{{$value->id}}">
         <th> {{$n++}}
         </th>
         <th> 
         {{$value->titre}}
         </th>
         <th>
          <a href="#" class="show-modal btn btn-warning btn-sm" data-id="{{$value->id}}" data-titre="{{$value->titre}}" data-resume="{{$value->resume}}" data-date="{{$value->date_publication}}">
          DESARCHIVER
          </a>
         
         </th>
            </tr>
            @endforeach
       </tbody>
</table>
      {{csrf_field()}}
@endsection
@section('monjs')
 <script>
     $('#ulmenu').show();
     $('#fermer').click(function(){
           $('#message').hide();  
     });
 </script>
@endsection