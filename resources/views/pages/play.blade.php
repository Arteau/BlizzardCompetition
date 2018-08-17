@extends('layouts.app')

@section('content')
    <h1>What card is this?</h1>
    <p>Get the name and card art right, and you win!</p>

    @if(count($cardArtOptions) > 0)
    <ul>
        @foreach($cardArtOptions as $option)
            <li class="list-group-item">{{$option}}</li>
        @endforeach 
    </ul>
    @endif

@endsection

