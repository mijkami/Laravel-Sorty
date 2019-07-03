@extends('layouts.app')
@section('content')

<h1>Modifier une participation</h1><br>
<a href="/particips">Retour arrière</a><br>
{{-- store => update --}}


    Participant : {{$particip->User->name.' '.$particip->User->firstname}}<br>
Date de la sortie : {{ Date::parse($particip->Sor->dat)->format('l j F') }}<br>




<form class="form-horizontal" method="POST" action="{{ route("particips.update", $particip->id) }}">
    {{ csrf_field() }}
    {{ method_field('PuT') }}

    @if (session('role')=='admin' OR session('role')=='super-admin')

        Une nouvelle date d'inscription implique un nouvel ordre de priorité dépendant de cette date à utiliser pour changer l'ordre des priorités,
        par exemple : encadrants, débutants dans une sortie encadrée, ...<br>


            <h4>Changer la date d'inscription</h4>
            <input type="date" name="inscription"  value="{{ Date::parse($particip->inscription)->format('Y-m-d')}}"> {{ Date::parse($particip->inscription)->format('l j F') }}<br>

    @endif
    <h4>Modifier le commentaire du participant</h4>



        <textarea rows="4" cols="50" name="comment_particip" value="{{ $particip->comment_particip }}"> {{ $particip->comment_particip }}</textarea><br>
        <button type="submit">Enregistrer</button>
</form>

@stop

