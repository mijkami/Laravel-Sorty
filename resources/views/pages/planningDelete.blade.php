@extends('layouts.app')
@section('content')
{{-- #TODO option envoyer un message au moment d'une suppression de participation (entre 1 et 8)
    au 9e sur la liste qui de ce fait intègre la liste des partants,
    pour le prévenir de son intégration dans la sortie --}}
@if (session('role')=='admin' or session('role')=='superadmin' or (session('role')=='membre' and session('id')==$particip->user_id))
    <h3>Suppression de la participation à la sortie.</h3>
    <a href="{{ URL::previous() }}"><p><i class="fas fa-arrow-left"> Annuler / page précédente</i></p></a><br>
    <form  method="POST" action="{{ route('particips.destroy', $particip->id) }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="ml-4 p-2 btn btn-danger" type="submit">Supprimer</button>
        {{-- tODO possibilité d'ajouter une confirmation supplémentaire cf JS/CSS, etc --}}
    </form>
@endif
@stop
