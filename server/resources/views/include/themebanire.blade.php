
                                   <center> <h4>
                                   @if(is_array($theme))
                                      PAS DE THEME
                                   @else
                                      @if($theme)
                                      {{ $theme->titre}}
                                          @else
                                            PAS  DE THEME EN LIGNE
                                            @endif
                                     @endif
                                   <a class="btn btn-primary" href='@if(! is_array($theme)){{url("/question/poser_question/{$theme->id}")}} @else # @endif' style="color: white;">Poser une question</a></h4> </center>
                                  