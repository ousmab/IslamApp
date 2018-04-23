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
<form class="form-horizontal  mycontent" method="POST" action="{{ url('addTheme') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('theme_titre') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Titre theme</label>

                            <div class="col-md-6">
                                <input id="theme_titre" type="text" class="form-control" name="theme_titre" value="{{ old('theme_titre') }}" required autofocus>

                                @if ($errors->has('theme_titre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('theme_titre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('theme_date') ? ' has-error' : '' }}">
                            <label for="theme_titre" class="col-md-4 control-label">Date de publication</label>

                            <div class="col-md-6">
                               <!-- <input id="theme_date" type="date" class="form-control" name="theme_date" value="{{ old('theme_date') }}" required> -->
                               <input id="datepicker" type="text" class="form-control" name="theme_date" value="{{ old('theme_date') }}" required>

                                @if ($errors->has('theme_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('theme_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('theme_option') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">OPTION</label>

                            <div class="col-md-6">
                            <select class="form-control" id="sel1" name="theme_option">
                             <option>Publier</option>
                                    <option>Enregistrer</option>
                                        </select>
                    
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Resume du theme</label>

                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" id="comment" name="resume"></textarea>
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