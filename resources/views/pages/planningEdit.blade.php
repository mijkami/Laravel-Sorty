@extends('layouts.app')
@section('content')
<h2>Modifier une participation</h2>
<a href="{{ URL::previous() }}"><p><i class="fas fa-arrow-left"> Annuler / page précédente</i></p></a>

<p>Participant : {{$particip->User->name.' '.$particip->User->firstname}}</p>
<p>Date de la sortie : {{ Date::parse($particip->Sor->dat)->format('l j F') }}</p>




<form class="form-horizontal" method="POST" action="{{ route("particips.update", $particip->id) }}">
    {{ csrf_field() }}
    {{ method_field('PuT') }}

    @if (session('role')=='admin' OR session('role')=='superadmin')

        Une nouvelle date d'inscription implique un nouvel ordre de priorité dépendant de cette date à utiliser pour changer l'ordre des priorités,
        par exemple : encadrants, débutants dans une sortie encadrée, ...<br>


            <h4>Changer la date d'inscription</h4>
            <input type="date" name="inscription"  value="{{ Date::parse($particip->inscription)->format('Y-m-d')}}"> {{ Date::parse($particip->inscription)->format('l j F') }}<br>

    @endif
    <h4>Modifier le commentaire du participant</h4>


        <textarea rows="1" cols="60" maxlength="60" name="comment_particip" value="{{ $particip->comment_particip }}" class="mceNoEditor"> {{ $particip->comment_particip }}</textarea><br>
        <button class="m-4 p-3 btn btn-success" type="submit">Enregistrer</button>
</form>

@stop

