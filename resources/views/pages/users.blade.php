@extends('layouts.app')
@section('content')
    @if (session('role')=='admin')
        <h2>Liste d'utilisateurs</h2>

                 {{-- #TODO étudier /discuter possibilité de pouvoir créer nouvel invité --}}
                @foreach ($users as $user)
                    <div class="row justify-content-start no-gutters mt-4 mt-md-0">
                        <div class="col-5 col-md-2">{{ $user['name'] }}</div>
                        <div class="col-4 col-md-2">{{ $user['firstname'] }}</div>
                        <div class="col-4 col-md-3 ">{{ $user['tel'] }}</div>
                        <div class="col-5 col-md-4">{{ $user['email'] }}</div>
                    </div>
                @endforeach
    @endif
    @if (session('role')=='superadmin')
        <h2>Liste d'utilisateurs</h2>
        <div class="ml-4">
            <h3 ><a href="/users/create"><i class="fas fa-user-plus"> Créer un utilisateur</i></a></h3>
            <h5 class="font-weight-bold p-2">Info sur la dernière mise à jour : <span class="text-success">Fiche mise à jour</span>, <span class="text-primary">Fiche nouvelle</span>, <span class="text-danger">Fiche orpheline</span>.</h5>
        </div>
        @foreach ($users as $user )
            <div class="row justify-content-start no-gutters mt-4 mt-md-0">
                <div class="col-2 col-md-1">
                    <a href="/users/{{ $user['id'] }}/edit"><i class="fas fa-user-edit"></i></a> / <a href="/users/{{ $user['id'] }}/destroy"><i class="fas fa-user-times"></i>
                    </a>
                </div>
                <div class="col-5 col-md-2">{{ $user['name'] }}</div>
                <div class="col-4 col-md-2">{{ $user['firstname'] }}</div>
                <div class="col-4 offset-2 col-md-3 offset-md-0">{{ $user['tel'] }}</div>
                <div class="col-5 col-md-4">{{ $user['email'] }}</div>
            </div>
        @endforeach

    @endif


@stop

