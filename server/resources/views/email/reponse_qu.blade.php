@component('mail::message')
# Introduction

 Salu {{$emeteur}}.
  Par rapport a votre question voici une reponse:
    @component('mail::panel')
     {{$reponse}}
    @endcomponent
@component('mail::button', ['url' => '','color'=>'green'])
Retour au site IslamApp
@endcomponent

 Merci Qu'Allah vous recompense,<br>
{{ config('app.name') }}
@endcomponent
