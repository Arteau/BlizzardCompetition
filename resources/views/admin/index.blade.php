@extends('layouts.app')

@section('content')
<div class="adminWrapper">
<a href="{{ url('/logout') }}" class="logout btn btn-secondary"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Uitloggen
</a>
<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
{{ csrf_field() }}
</form>

{{-- {!! Form::open(['url' => route('newCompetition')]) !!} --}}
<div class="newGameForm">
{!! Form::open(['url' =>route('newCompetition'),'files'=>true, 'method' => 'post']) !!}
{!! Form::token() !!}

<div class="labelAndInput">
{!! Form::label("correctCardName", "Name of card.") !!}
{!! Form::text("correctCardName", "", ['class'=>'textInput']) !!}
</div>
<div class="labelAndInput">
{!! Form::label("emptyCard", "Select the empty card art") !!}
{!! Form::file("emptyCard", ['class' => 'imageInput']) !!}
</div>
<div class="labelAndInput">
{!! Form::label("startDate", "Start date of competition.") !!}
{!! Form::date('startDate', \Carbon\Carbon::now(), ['class' => 'dateInput']) !!}
</div>
<div class="labelAndInput">
{!! Form::label("endDate", "End date of competition.") !!}
{!! Form::date('endDate', \Carbon\Carbon::now(), ['class' => 'dateInput']) !!}
</div>
<div class="artworkSelect">
{!! Form::label("artworkImg", "Select the artwork (check box if the selected art is the correct answer)") !!}
<div class="artworkSelectGrid">
{!! Form::checkBox("images[0][correctAnswer]") !!}
{!! Form::file("images[0][artworkImg]", ['class' => 'imageInput']) !!}

{!! Form::checkBox("images[1][correctAnswer]") !!}
{!! Form::file("images[1][artworkImg]", ['class' => 'imageInput']) !!}

{!! Form::checkBox("images[2][correctAnswer]") !!}
{!! Form::file("images[2][artworkImg]", ['class' => 'imageInput']) !!}

</div>
</div>
{!! Form::submit("Start", ['class'=>'btn btn-primary']) !!}

{!! Form::close() !!}

</div>
<br>
<hr>
<br>
<div class="contestantTable">
        <table>
        <tr>
                <td>
                        Name.
                </td>
                <td>
                        Last Name.
                </td>
                <td>
                        Ip-Address.
                </td>
        </tr>
@foreach($contestants as $contestant)
        <tr>
                <td>
                        {{$contestant->name}}  
                </td>
                <td>
                        {{$contestant->lastName}}  
                </td>
                <td>
                        {{$contestant->ip}}
                </td>
                <td>
                                {!!Form::open([
                                        'method' => 'delete',
                                        'url'=> '/admin/contestant/'.$contestant->id,
                                    
                                    ])!!}
                                    
                                    
                                    {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                                    {!!Form::close()!!}
                        {{-- <a href="/admin/contestant/{{$contestant->id}}" class="btn btn-danger">delete contestant</a> --}}
                </td>
        </tr>
@endforeach
        </table>
</div>
</div>
@endsection

