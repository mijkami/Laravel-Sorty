@extends('layouts.app')
@section('content')
@if (session('role')=='admin' OR session('role')=='superadmin')
    <h3>Suppression de la sortie {{ $sor->typ . ' du ' . Date::parse($sor->dat)->format('l j F')}}</h3>
    <a href="{{ URL::previous() }}"><p><i class="fas fa-arrow-left"> Annuler / page précédente</i></p></a>
    <form  method="POST" action="{{ route('sors.destroy', $sor->id) }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="m-4 p-2 btn btn-danger" type="submit">Supprimer</button>
        {{-- TODO possibilité d'ajouter une confirmation supplémentaire cf JS/CSS, etc --}}
    </form>
@endif
@stop
