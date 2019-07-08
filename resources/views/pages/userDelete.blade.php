@extends('layouts.app')
@section('content')
@if (session('role')=='superadmin')
    <h2>Suppression de {{ $user->name }}</h2>
    <a href="{{ URL::previous() }}"><p><i class="fas fa-arrow-left"> Annuler / page précédente</i></p></a>
    <form  method="POST" action="{{ route('users.destroy', $user->id) }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit">Supprimer</button>
    </form>
@endif

@stop
