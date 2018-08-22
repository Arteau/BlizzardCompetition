@extends('layouts.app')

@section('content')
<div class="thanksPageWrapper">

        <div class="thanksPageGrid">

                <div class="centerBox">
                        <a href="/"><img class="boomsdayLogo" src="/img/boomsdayLogo.png"></a>

                    <h1 class="centerBoxTitle">Thank you for playing!</h1>
                    <p class="centerBoxInfo">Come back and check the front page tomorrow to see if you won!</p>
                    <div class="hsButton">@include("inc.hsbutton", ['textVar' => "homepage!", 'href' => '/'])</div>
            
                </div>
        </div>

</div>
<div class="thanksBgImageOverlay"></div>
<img src="/img/thanksForPlayingBackground.jpg" alt="drBoomSaysThanks" class="thanksBgImage"></img>
@endsection