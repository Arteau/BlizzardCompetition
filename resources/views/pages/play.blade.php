@extends('layouts.app')

@section('content')

{!! Form::open(['url' =>route('answer'),'files'=>false, 'method' => 'post']) !!}
{!! Form::token() !!}
<div class="playPageWrapper">
        <div class="playPageGrid">
            <div class="cardNameBox">
                <h2 class="cardNameBoxTitle">Enter the correct card name.</h2>
                <hr>
                <p class="cardNameBoxP">Case- and punctuation sensitive.</p>
                <input class="boxTextInput" type="text" name="cardName" placeholder="Card name"></input>
            </div>
        <img class="hsCard" src="{{asset('storage/images/emptyCard/'.$data['emptyCard'])}}"></img>
        
        
            <div class ="contestantInfoBox">
                    <h2 class="cardNameBoxTitle">Tell us about yourself.</h2>
                    <hr>
                    <div class="inputGrid">
                            <div>
                                    <p class="cardNameBoxP">First name.</p>
                                    <input class="boxTextInput" type="text" name="contestantName" placeholder="First name."></input>    
                                </div>
                                <div>
                                    <p class="cardNameBoxP">Last name.</p>
                                    <input class="boxTextInput" type="text" name="contestantLastName" placeholder="Last name."></input>   
                                </div>
                                <div>
                                    <p class="cardNameBoxP">Address.</p>
                                    <input class="boxTextInput" type="text" name="contestantAddress" placeholder="Address."></input>        
                                </div>
                                <div>
                                    <p class="cardNameBoxP">City.</p>
                                    <input class="boxTextInput" type="text" name="contestantCity" placeholder="City."></input>    
                                </div>
                                <div>
                                    <p class="cardNameBoxP">Email.</p>
                                    <input class="boxTextInput" type="text" name="contestantEmail" placeholder="Email."></input>    
                                </div>
                    </div>       
            </div>
            <div class="cardArtBox">                
                <h2 class="cardArtBoxTitle">Select the correct artwork.</h2>
                <hr>
                <div class="artworkGrid">

                    <div><img src="{{asset('storage/images/fullArt/'.$data['artworks'][0]->artworkImg)}}" alt="artwork1"></img></div>
                    <div><img src="{{asset('storage/images/fullArt/'.$data['artworks'][1]->artworkImg)}}"></img></div>
                    <div><img src="{{asset('storage/images/fullArt/'.$data['artworks'][2]->artworkImg)}}" alt="artwork3"></img></div>

                    {{-- below: name is artworkImg id --}}
                    <input class="artRadio" type="checkbox" name="cardArt1"></input> 
                    <input class="artRadio" type="checkbox" name="cardArt2"></input>
                    <input class="artRadio" type="checkbox" name="cardArt3"></input>
                </div>
                
            </div>

            <div class="submitButton">@include("inc.hsbutton", ['textVar' => "submit!", 'href' => route('thanks')])</div>
        </div>
</div>


    {{-- @if(count($cardArtOptions) > 0)
    <ul>
        @foreach($cardArtOptions as $option)
            <li class="list-group-item">{{$option}}</li>
        @endforeach 
    </ul>
    @endif --}}

{{-- @include('inc.footer') --}}
<div class="bgImageOverlay"></div>
<img src="{{asset('img\bgImage_VideoReplacer.jpg')}}" class="bgImage"></img>
{!! Form::close() !!}
@endsection

