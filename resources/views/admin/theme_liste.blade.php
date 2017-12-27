@extends('layouts.admin')
@section('content')

<hr>
<p><form class="form-horizontal">
{{ csrf_field() }}
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-7">
      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
  </div>
</form></p></br>
<form  method="POST" action="{{ url('addTheme') }}" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="theme_titre" class="col-md-4 control-label">Titre theme</label>

                            <div class="col-md-6">
                                <input id="theme_titre" type="text" class="form-control" name="name" value="{{ old('theme_titre') }}" required autofocus>

                                @if ($errors->has('theme_titre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('theme_titre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('theme_date') ? ' has-error' : '' }}">
                            <label for="theme_date" class="col-md-4 control-label">Date publication</label>

                            <div class="col-md-6">
                            
        <input class="form-control"  name="date" placeholder="MM/DD/YYY" type="date"/>

                                @if ($errors->has('theme_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('theme_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <div class="form-group{{ $errors->has('theme_resume') ? 'has-error' : '' }}">
                          <label for="theme_resume" class="col-md-4 control-label">Date publication</label>

                            <div class="col-md-6">
                                <textarea class="form-control" row=7></textarea>
                                @if ($errors->has('theme_resume'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('theme_resume') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-block btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                        </form> 
@endsection