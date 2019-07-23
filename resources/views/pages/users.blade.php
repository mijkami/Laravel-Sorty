@extends('layouts.app')
@section('content')
    @if (session('role')=='admin')
        <h2>Liste d'utilisateurs</h2>
            <?php
                // #TODO étudier /discuter possibilité de pouvoir créer nouvel invité                foreach ($users as $user ) {
                    echo '<div class="row justify-content-start no-gutters mt-4 mt-md-0"><div class="col-5 col-md-2">'.$user->name.'</div><div class="col-4 col-md-2">'.$user->firstname.'</div><div class="col-4 col-md-3 ">'.$user->tel.'</div><div class="col-5 col-md-4">'.$user->email.'</div></div>';

                }
            ?>
    @endif
    @if (session('role')=='superadmin')
        <h2>Liste d'utilisateurs</h2>
        <h3 class="ml-4"><a href="/users/create">Créer un utilisateur</a></h3>
            <?php

                foreach ($users as $user ) {
                    echo '<div class="row justify-content-start no-gutters mt-4 mt-md-0"><div class="col-2 col-md-1"><a href="/users/'.$user->id.'/edit"><i class="fas fa-user-edit"></i></a> / <a href="/users/'.$user->id.'/destroy"><i class="fas fa-user-times"></i></a></div><div class="col-5 col-md-2">'.$user->name.'</div><div class="col-4 col-md-2">'.$user->firstname.'</div><div class="col-4 offset-2 col-md-3 offset-md-0">'.$user->tel.'</div><div class="col-5 col-md-4">'.$user->email.'</div></div>';
                }
            ?>
    @endif


@stop

