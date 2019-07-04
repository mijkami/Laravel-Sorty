@extends('layouts.app')
@section('content')

<h1>Sorties prochaines & Participants</h1><br>
<?php
    session(['page' => "/particips"]);
    if (session('role')=='admin' or session('role')=='superadmin'){
        echo '<h4><a href="/particips/create2">Création de participation (mode administrateur)</a></h4>';
    } elseif (session('role')=='membre'){
        echo '<h4><a href="/particips/create">Création de participation</a></h4>';
    }


    //affichage des sorties
    $sorFutur = $sors->Where('dat', '>=', today());
    foreach ($sorFutur as $sor) {
        echo Date::parse($sor->dat)->format('l j F')." , ".$sor->typ."<br>";
        echo $sor->comment_sor."<br>";
        $participSor = $particips->Where('sor_id','=', $sor->id);
        $participNum=0;
        foreach ($participSor as $particip) {
            // ajouter IF pour afficher différemment selon admin ou autre utilisateur,
            // tester si le $particip->user_id correspond à la session de id
            if (session('role')=='admin' or session('role')=='superadmin' or (session('role')=='membre' and session('id')==$particip->user_id)){
                // liens de suppression et de modification;
                echo '<a href="/particips/'.$particip->id.'/destroy"><i class="fas fa-user-times"></i></a> '.'<a href="/particips/'.$particip->id.'/edit"><i class="fas fa-user-edit"></i></a> ';
            }
            echo ++$participNum.". ".$particip->User->name.'<br>';
        }
        echo "<br>________<br><br>";
    }


?>
@stop

