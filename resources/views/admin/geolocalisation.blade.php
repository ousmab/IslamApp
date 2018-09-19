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
         <a href="#" class="create-modal btn btn-success btn-sm">
          <i class="glyphicon glyphicon-plus"></i>
         </a>
    </tr>
    </thead>
    <tbody>
      {{csrf_field()}}
      <?php $n=1; ?>
     <tr class=" ">
         <th> {{$n}}
         </th>
         <th> 
         MOSQUEE AL-HIQMA
         </th>
         <th>
          MOSQUEE
         </th>
         <th>
          DOUALA
         </th>
         <th>
          13.344555555 , 9.23344555
         </th>
         <th>
          <a href="#" class="show-modal btn btn-info btn-sm" data-id="" data-titre="" data-resume="" data-date="">
          <i class='fa fa-eye'></i>
          </a>
          <a href="#" class="edit-modal btn btn-warning btn-sms" data-id="" data-titre="" data-resume="" data-date="" >
            <i class="glyphicon glyphicon-pencil"></i>
          </a>
          <a href="#" class="delete-modal btn btn-danger btn-sms" data-id="" data-titre="" >
            <i class="glyphicon glyphicon-trash"></i>
          </a>
         </th>
            </tr>
            
    </tbody>
</table>


                        
@endsection
