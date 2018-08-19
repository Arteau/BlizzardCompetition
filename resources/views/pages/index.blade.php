@extends('layouts.app')

@section('content')



<div class="frontPageWrapper">

        <div class="frontPageGrid">

                <div class="winnerBox">
                    <h2 class="winnerBoxTitle boxTitle">YESTERDAY'S WINNER</h2>
                    <hr>
                    <h3 class="winnerName">Arteau De Meester</h3>
                </div>
                <div class="centerBox">
                        <a href="/"><img class="boomsdayLogo" src="/img/boomsdayLogo.png"></a>

                    <h2 class="centerBoxTitle">Get the card right and win!</h2>
                    {{-- <hr> --}}
                    <p class="centerBoxInfo">How well do you know the Boomsday Project cards?</p>
                    <div class="exampleImgGrid">
                            <img class="playExample_incomplete hsCard" src="{{asset('img/frontpage/empty_GoblinBomb.png')}}"></img>
                            <img class="playExample_arrow" src="{{asset('img/frontpage/arrowRight.png')}}" alt="arrowRight"></img>
                            <img class="playExample_complete hsCard" src="{{asset('img/frontpage/card_GoblinBomb.png')}}"></img>
                            
                    </div>
                    <div class="hsButton">@include("inc.hsbutton", ['textVar' => "Play Now!", 'href' => '/play/'.$game[0]->id])</div>
            
                </div>
        </div>

</div>
@include('inc.footer')
<video autoplay muted loop class="bgVideo">
        <source src="{{asset('vid/bgVideo.mp4')}}" type"video/mp4">
</video>
{{-- 
<div class="pageDivider"></div>
<div class="parchment">
</div> --}}
@endsection