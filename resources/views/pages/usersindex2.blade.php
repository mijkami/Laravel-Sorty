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
            <?php    $color = array('', '', 'text-success', 'text-primary', 'text-danger');
                $x = 0;
                $x1 = 0;
                $x2 = 0;
                $x3 = 0;
                $x4 = 0;
            ?>
            @foreach ($users as $user)
                {{-- <div class="col-5 col-md-1">{{$x++}}</div> --}}
                {{-- @if($x<10)
                    {{ $x="0".$x }}
                @endif --}}
                @if ($user->statut==2)

                    @if($x2==1)
                    <div class="{{$color[$user->statut]}}">
                        <h4 class="font-weight-bold {{$color[$user->statut]}} p-1 mt-3">Mise à jour</h4>
                    </div>
                    @endif
                    <?php $x2++ ?>
                @endif
                @if ($user->statut==3)

                    @if($x3==1)
                    <div class="{{$color[$user->statut]}}">
                        <h4 class="font-weight-bold {{$color[$user->statut]}} p-1 mt-3">Nouvelle fiche</h4>
                    </div>
                    @endif
                    <?php $x3++ ?>
                @endif
                @if ($user->statut==4)

                    @if($x4==1)
                    <div class="{{$color[$user->statut]}} p-1 mt-3">
                        <h4 class="font-weight-bold">FICHES A SUPPRIMER ?</h4>
                    </div>
                    @endif
                    <?php $x4++ ?>
                @endif
                <div class="row justify-content-start no-gutters mt-4 mt-md-0">
                    <div class="col-2 col-md-1">
                            <a href="/users/{{ $user['id'] }}/edit"><i class="fas fa-user-edit"></i></a> / <a href="/users/{{ $user['id'] }}/destroy"><i class="fas fa-user-times"></i>
                            </a>
                    </div>
                    <div class="col-5 col-md-2">{{ $user['name'] }}</div>
                    <div class="col-4 col-md-2">{{ $user['firstname'] }}</div>
                    <div class="col-4 col-md-3 ">{{ $user['tel'] }}</div>
                    <div class="col-5 col-md-3">{{ $user['email'] }}</div>
                </div>
            @endforeach
    @endif
@endsection
