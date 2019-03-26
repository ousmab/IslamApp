@extends('layouts.admin')
@section('content')
<h1>PARTIE BROUILLON</h1>
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