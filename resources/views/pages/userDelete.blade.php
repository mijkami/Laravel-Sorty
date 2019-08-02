@extends('layouts.app')
@section('content')
@if (session('role')=='superadmin')
    <h3>{{ $user->name }} {{ $user->firstname }} : <span class="h2 font-weight-bold">suppression</span> de la fiche personelle</h3>
    <a href="{{ URL::previous() }}"><h3><i class=" fas fa-arrow-left"> Annuler / page précédente</i></h3></a>
    <form  method="POST" action="{{ route('users.destroy', $user->id) }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <h2 class="font-weight-bold text-danger mt-5">Attention ! Tout donnée supprimée est irrécupérable.</h2>
        <button class="m-4 p-2 btn btn-danger" type="submit">Supprimer</button>
    </form>
@endif

@stop
