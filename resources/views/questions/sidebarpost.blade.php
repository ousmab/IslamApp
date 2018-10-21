
            <div class="card mb-4 wow fadeIn">

<div class="card-header">Article archiver</div>

<!--Card content-->
<div class="card-body">
    <ul class="list-unstyled">  
    @if($themearchive)
            @foreach($themearchive as $archive)
        <li class="media my-4">
            <div class="media-body">
                <a href='{{url("/question/vue_question/{$archive->id}")}}'>
                    <h5 class="mt-0 mb-1 font-weight-bold">{{$archive->titre}}</h5>
                </a>
                {{$archive->resume}} (...)
            </div>
        </li>
        @endforeach
    @else
        IL YA PAS DE THEME ARCHIVER
    @endif
    </ul>

</div>

</div>
            <!--Card : Dynamic content wrapper-->
            <div class="card mb-4 text-center wow fadeIn">

                <div class="card-header">Etre informer des nouveaus theme publier (BIENTOT)</div>

                <!--Card content-->
                <div class="card-body">

                    <!-- Default form login -->
                    <form>

                        <!-- Default input email -->
                        <label for="defaultFormEmailEx" class="grey-text">Votre email</label>
                        <input type="email" id="defaultFormLoginEmailEx" class="form-control">

                        <br>

                        <!-- Default input password -->
                        <label for="defaultFormNameEx" class="grey-text">Votre nom</label>
                        <input type="text" id="defaultFormNameEx" class="form-control">

                        <div class="text-center mt-4">
                            <button class="btn btn-info btn-md" type="submit">Enregistrer</button>
                        </div>
                    </form>
                    <!-- Default form login -->

                </div>

            </div>