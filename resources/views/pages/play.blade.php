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
                {!! Form::text('cardName', '', ['class' => 'boxTextInput', 'placeholder' => 'Card name.']) !!}
            </div>
        <img class="hsCard" src="{{asset('storage/images/emptyCard/'.$data['emptyCard'])}}"></img>
        
        
            <div class ="contestantInfoBox">
                    <h2 class="cardNameBoxTitle">Tell us about yourself.</h2>
                    <hr>
                    <div class="inputGrid">
                                <div>
                                    {!! Form::label('name', 'First name', '', ['class'=>'cardNameBoxP']) !!}
                                    {!! Form::text('name', '', ['class'=>'boxTextInput', 'placeholder' => 'First name.']) !!}
                                </div>
                                <div>
                                    {!! Form::label('lastName', 'Last name', '', ['class' => 'cardNameBoxP']) !!}
                                    {!! Form::text('lastName', '', ['class'=>'boxTextInput', 'placeholder'=>'Last name.']) !!}
                                </div>
                                <div>
                                    {!! Form::label('address', 'Address', '', ['class'=>'cardNameBoxP']) !!}
                                    {!! Form::text('address', '', ['class'=>'boxTextInput', 'placeholder' => 'Address.']) !!}
                                </div>
                                <div>
                                    {!! Form::label('city', 'City', '', ['class'=>'cardNameBoxP']) !!}
                                    {!! Form::text('city', '', ['class'=>'boxTextInput', 'placeholder' => 'City']) !!}
                                </div>
                                <div>
                                    {!! Form::label('email', 'Email', '', ['class'=>'cardNameBoxP']) !!}
                                    {!! Form::text('email', '', ['class'=>'boxTextInput', 'placeholder' => 'Email.']) !!}   
                                </div>
                    </div>       
            </div>
            <div class="cardArtBox">                
                <h2 class="cardArtBoxTitle">Select the correct artwork.</h2>
                <hr>
                <div class="artworkGrid">

                    <div><img src="{{asset('storage/images/fullArt/'.$data['artworks'][0]->artworkImg)}}" alt="artwork1"></img></div>
                    <div><img src="{{asset('storage/images/fullArt/'.$data['artworks'][1]->artworkImg)}}" alt="artwork2"></img></div>
                    <div><img src="{{asset('storage/images/fullArt/'.$data['artworks'][2]->artworkImg)}}" alt="artwork3"></img></div>

                    {{-- below: name is artworkImg id --}}
                @foreach($data['artworks'] as $artwork)
                {!! Form::checkBox('cardArtNr', $artwork->id, '', ['class'=>'artRadio']) !!}
                @endforeach
 
                </div>
                
            </div>

            {{-- <div class="submitButton">@include("inc.hsbutton", ['textVar' => "submit!", 'href' => route('answer')])</div> --}}
            {{-- <div class="submitButton">{!! Form::submit("Submit!") !!}</div> --}}
            <div class="submitButton">
            <button type="submit" class="hs-wrapper classic">
            <div class="hs-button classic">
                    <span class="hs-border classic">
                    <span class="hs-text classic">
                    Submit!
                    </span>
                    </span>
                </div>
            </button>
            </div>
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

