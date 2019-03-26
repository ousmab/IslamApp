@extends('layouts.admin')
@section('content')
<h1>AJOUT DE THEME</h1>
<hr>
    @if(session('response'))
      <div class="alert alert-success" id="message">
      <button id="fermer" type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('response') }}
         </div>
         @endif
<form class="form-horizontal  mycontent" enctype="multipart/form-data" method="POST" action="{{ url('picture_theme') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('theme_logo') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Image du themee</label>

                            <div class="col-md-6">
                                <input id="theme_logo" type="file" class="form-control" name="theme_logo" value="{{ old('theme_logo') }}" required autofocus>

                                @if ($errors->has('theme_logo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('theme_logo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                       
                        <div class="form-group{{ $errors->has('theme_option') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">TITRE THEME</label>

                            <div class="col-md-6">
                            <select class="form-control" id="sel1" name="theme_option">
                             @if($themes)
                                 @foreach($themes as $key => $value)
                                      <option value="{{$value->id}}">{{$value->titre}} </option>
                                @endforeach
                                 @else
                                 <option>pas de theme en BD </option>
                            @endif
                                        </select>
                    
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    SAUVEGARDER
                                </button>
                            </div>
                        </div>
                    </form>

                       
                        
@endsection
@section('monjs')
 <script>
     $('#ulmenu').show();
     $('#fermer').click(function(){
           $('#message').hide();  
     });
 </script>
@endsection