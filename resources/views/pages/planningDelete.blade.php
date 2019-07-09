@extends('layouts.app')
@section('content')
@if (session('role')=='admin' or session('role')=='superadmin' or (session('role')=='membre' and session('id')==$particip->user_id))
    <h3>Suppression de la participation à la sortie.</h3>
    <a href="{{ URL::previous() }}"><p><i class="fas fa-arrow-left"> Annuler / page précédente</i></p></a><br>
    <form  method="POST" action="{{ route('particips.destroy', $particip->id) }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="ml-4 p-2" type="submit">Supprimer</button>
        {{-- tODO possibilité d'ajouter une confirmation supplémentaire cf JS/CSS, etc --}}
    </form>
@endif
@stop
