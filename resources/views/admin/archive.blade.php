@extends('layouts.admin')
@section('content')
<h1>GESTION ARCHIVE</h1>
<hr>

@endsection
@section('monjs')
 <script>
     $('#ulmenu').show();
     $('#fermer').click(function(){
           $('#message').hide();  
     });
 </script>
@endsection