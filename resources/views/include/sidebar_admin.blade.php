<div class="container-fluid" id="moncontenue">
           <div class="row">
              <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-menu">
                <li ><a id="menunavs" class="mymenu" href="/home"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp;ADMIN</a></li>
                  <li ><a id="navcach" class="mymenu" href="#"><i class="fa fa-book fa-fw" aria-hidden="true"></i>&nbsp;THEME &nbsp;&nbsp;&nbsp; <span class="fa fa-chevron-down"></a>
                  
                    <ul class="nav child_menu menujs" id="ulmenu">
                      <li><a href="{{url('themes/create')}}" class="menunavs"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Nouveau theme </a></li>
                      <li><a href="{{url('themes')}}" class="menunavs"><i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp; Tous les themes</a></li>
                      <li><a href="{{url('brouillon')}}" class="menunavs"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Brouillon</a></li>
                      <li><a href="{{url('archive')}}" class="menunavs"><i class="fa fa-archive" aria-hidden="true"></i>&nbsp;Theme archivés</a></li>
                    </ul>
                  </li>
                  <li><a id="navquestion" class="mymenu mtheme menujs" href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp; QUESTION-REPONSE <span class="fa fa-chevron-down"></a>
                  <ul class="nav child_menu" id="ulmenu2">
                      <li><a href="{{url('vue_question')}}" class="menunavs"><i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;Valider une question </a></li>
                      <li><a href="{{url('vue_reponse_question')}}" class="menunavs"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp; Repondre aux question</a></li>
                      <li><a href="{{url('vue_conclure')}}" class="menunavs"><i class="fa fa-hourglass-end" aria-hidden="true"></i>&nbsp;Conclure un theme</a></li>
                    </ul>
                  
                  </li>
                  
                </ul>
              </div>