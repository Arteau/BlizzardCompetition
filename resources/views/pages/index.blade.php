@extends('layouts.app')

@section('content')

<video autoplay muted loop class="bgVideo">
    <source src="/vid/bgVideo.mp4" type"video/mp4">
</video>
<div class="frontPageWrapper">

        <div class="frontPageGrid">
                <div class="winnerBox">
                    <h2 class="winnerBoxTitle">Yesterday's winner:</h2>
                    <hr>
                    <h3 class="winnerName">Arteau De Meester</h3>
                </div>
                <div class="centerBox">
                    <h2 class="centerBoxTitle">Get the card right and win!</h2>
                    {{-- <hr> --}}
                    <p class="centerBoxInfo">Enter the correct name, pick the right artwork, and win 100 Boomsday Project card packs!</p>
                    <div class="exampleImgGrid">
                            <img class="playExample_incomplete" src="/img/cards/incomplete/incomplete_GoblinBomb.png"></img>
                            <img class="playExample_arrow" src="/img/ui/arrowRight.png" alt="arrowRight"></img>
                            <img class="playExample_complete" src="/img/cards/complete/card_GoblinBomb.png"></img>
                    </div>
                    <div class="hsButton">@include("inc.hsbutton")</div>


                    
            
                </div>
            </div>
</div>


<div class="pageDivider"></div>
<div class="parchment">
</div>
@endsection