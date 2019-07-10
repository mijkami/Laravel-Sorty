@extends('layouts.app')
@section('content')
@if (session('role')=='admin' or session('role')=='superadmin' or (session('role')=='membre' and session('id')==$particip->user_id))
<h3>Modifier une participation</h3>
<a href="{{ URL::previous() }}"><p><i class="fas fa-arrow-left"> Annuler / page précédente</i></p></a>
<div class="row">
    <h5 class="col-5 col-md-2 font-weight-bold">Participant</h5> 
    <p class="col">{{$particip->User->name.' '.$particip->User->firstname}}</p>
</div>
<div class="row">
    <h5 class="col-6 col-md-2 font-weight-bold">Date de la sortie</h5>
    <p class="col">{{ Date::parse($particip->Sor->dat)->format('l j F') }}</p>
</div>



<form class="form-horizontal" method="POST" action="{{ route("particips.update", $particip->id) }}">
    {{ csrf_field() }}
    {{ method_field('PuT') }}

    @if (session('role')=='admin' OR session('role')=='superadmin')
        <h4 class="font-weight-bold text-danger">Modification date (admin) :</h4>
        <p>Une nouvelle date d'inscription implique un nouvel ordre de priorité dépendant de cette date à utiliser pour changer l'ordre des priorités.<br>
        Exemple : encadrants, débutants dans une sortie encadrée, ...</p>


        <h4 class="offset-1 text-danger">Changer la date d'inscription :</h4>
        <div class="row mb-4 ml-3">
            <input type="date" name="inscription" class="col-5 col-md-2  offset-1" value="{{ Date::parse($particip->inscription)->format('Y-m-d')}}"><p class="col mt-2">{{ Date::parse($particip->inscription)->format('l j F') }}</p>
        </div>
    @endif
    <h5 class="font-weight-bold">Modifier le commentaire</h5>
        <textarea rows="2" cols="37" maxlength="60" name="comment_particip" value="{{ $particip->comment_particip }}" class="mceNoEditor"> {{ $particip->comment_particip }}</textarea><br>
        <button class="m-4 p-3 btn btn-success" type="submit">Enregistrer</button>
</form>
@endif
@stop

