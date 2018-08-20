@extends('layouts.app')

@section('content')

<a href="{{ url('/logout') }}" class="dropdown-item nav-link"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Uitloggen
</a>
<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
{{ csrf_field() }}
</form>

{{-- {!! Form::open(['url' => route('newCompetition')]) !!} --}}
<div class="newGameForm">
{!! Form::open(['url' =>route('newCompetition'),'files'=>true, 'method' => 'post']) !!}
{!! Form::token() !!}

{!! Form::label("correctCardName", "Name of card.") !!}
{!! Form::text("correctCardName") !!}

{!! Form::label("emptyCard", "Select the empty card art") !!}
{!! Form::file("emptyCard") !!}

{!! Form::label("startDate", "Start date of competition.") !!}
{!! Form::date('startDate', \Carbon\Carbon::now()) !!}
{!! Form::label("endDate", "End date of competition.") !!}
{!! Form::date('endDate', \Carbon\Carbon::now()) !!}

{!! Form::label("artworkImg", "Select the artwork") !!}
{!! Form::file("images[0][artworkImg]") !!}
{!! Form::checkBox("images[0][correctAnswer]") !!}

{!! Form::file("images[1][artworkImg]") !!}
{!! Form::checkBox("images[1][correctAnswer]") !!}

{!! Form::file("images[2][artworkImg]") !!}
{!! Form::checkBox("images[2][correctAnswer]") !!}

{!! Form::submit("Start") !!}

{!! Form::close() !!}

</div>
<br>
<hr>
<br>
<div class="contestantTable">
        <table>
@foreach($contestants as $contestant)
        <tr>
                <td>
                        {{$contestant->name}}  
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

@endsection

