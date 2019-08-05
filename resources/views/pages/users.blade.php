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
        <h5 class="font-weight-bold p-2 mb-3">Info sur la dernière mise à jour : <span class="text-success">Fiche mise à jour</span>, <span class="text-primary">Fiche nouvelle</span>, <span class="text-danger">Fiche orpheline</span>.</h5>
    </div>

    @foreach ($users as $user)
        @if($user['statut'] == 1)
            @include('includes.showUser')
        @endif
    @endforeach

    @foreach ($users as $user)
        @if($user['statut'] == 2)
            @if($countUpdate++ == 0)
                <div class="p-1 mt-4">
                    <h4 class="font-weight-bold text-success"><i class="fas fa-arrow-down"></i> Mise à jour <i class="fas fa-arrow-down"></i></h4>
                </div>
            @endif
            @include('includes.showUser')
        @endif
    @endforeach

    @foreach ($users as $user)
        @if($user['statut'] == 3)
            @if($countNew++ == 0)
                <div class="text-success p-1 mt-4">
                    <h4 class="font-weight-bold text-primary"><i class="fas fa-arrow-down"></i> Nouvelle fiche <i class="fas fa-arrow-down"></i></h4>
                </div>
            @endif
            @include('includes.showUser')
        @endif
    @endforeach

    @foreach ($users as $user)
        @if($user['statut'] == 4)
            @if($countDeleted++ == 0)
                <div class="text-success p-1 mt-4">
                    <h4 class="font-weight-bold text-danger"><i class="fas fa-arrow-down"></i> FICHE(S) A SUPPRIMER ? <i class="fas fa-arrow-down"></i></h4>
                </div>
            @endif
            @include('includes.showUser')
        @endif
    @endforeach

@endif
@endsection
