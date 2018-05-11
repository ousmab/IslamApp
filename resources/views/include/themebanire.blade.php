
                                   <center> <h4>
                                   @if($theme)
                                   {{ $theme->titre}}
                                   @else
                                     PAS DE THEME PUBLIER
                                     @endif
                                   <a class="btn btn-primary" href='{{url("/question/poser_question/{$theme->id}")}}' style="color: white;">Poser une question</a></h4> </center>
                                  