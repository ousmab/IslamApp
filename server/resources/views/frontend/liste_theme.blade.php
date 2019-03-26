@extends('layouts.mdbmaster')
@section('masection')

 <div class="container">

<!--Section: Post-->
<section class="mt-4">

    <!--Grid row-->
    <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">
        @if(session('response'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>  {{ session('response') }}</strong>
</div>
@endif
<div class="card mb-3 wow fadeIn">
                            <div class="card-header font-weight-bold">Posser votre question</div>
                            <div class="card-body">

                                <!-- Default form reply -->
                                <form method="POST" action="{{ url('/question/poser_question/addquestion') }}" >
                                {{ csrf_field() }}
                                    <!-- Comment -->
                                    <div class="form-group">
                                        <label for="replyFormComment">Votre question</label>
                                        <textarea class="form-control{{ $errors->has('question') ? ' is-invalid' : '' }}" id="replyFormComment" name='question' rows="5" value="{{ old('question') }}"></textarea>
                                        @if ($errors->has('question'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </div>
                                @endif
                                    </div>

                                    <!-- Name -->
                                    <label for="replyFormName">Votre nom</label>
                                    <input type="text" id="replyFormName" name="emeteur" class="form-control{{ $errors->has('emeteur') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('emeteur'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('emeteur') }}</strong>
                                    </div>
                                @endif

                                    <br>
                                      <input type="number" name="idtheme" class="form-control d-none" value="{{$theme->id}}">
                                    <!-- Email -->
                                    <label for="replyFormEmail">Votre Email</label>
                                    <input type="email" id="replyFormEmail" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                                       </br>
                                <div class="checkbox btn btn-outline-primary waves-effect">
        
            <label style="font-size: 1em">
                <input type="checkbox" name="question_status" class="form-check-input" id="chek" >
                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                Envoyer la reponse par email
            </label>
        </div>
                                    <div class="text-center mt-4">
                                        <button class="btn btn-info btn-md" type="submit">ENVOYER</button>
                                    </div>
                                </form>
                                <!-- Default form reply -->


                            </div>
                        </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <!--Colone de guauche avec les news letters,theme archiver-->
        <div class="col-md-4 mb-4">

            @include('questions.sidebarpost')
            <!--/.Card : Dynamic content wrapper-->

            <!--Card-->
            
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

</section>
<!--Section: Post-->

</div>

@endsection
