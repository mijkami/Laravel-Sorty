@extends('layouts.app')
@section('content')
<h2>Sorties prochaines & Participants</h2>
<?php
    session(['page' => "/particips"]);
    if (session('role')=='admin' or session('role')=='superadmin'){
        echo '<a href="/sors/create"><p>Créer une sortie</p></a>';
        echo '<a href="/particips/create2"><p>Création de participation (mode administrateur)</p></a>';
    } elseif (session('role')=='membre'){
        echo '<a href="/particips/create"><p>Création de participation</p></a>';
    }


    //affichage des sorties

    $sorFutur = $sors->Where('dat', '>=', today());
    foreach ($sorFutur as $sor) {
        echo "<div class='mt-4'><p class='font-weight-bold mb-0'>".Date::parse($sor->dat)->format('l j F')." , ".$sor->typ;
        if (session('role')=='admin' or session('role')=='superadmin'){
            echo ' | <a href="/sors/'.$sor->id.'/edit"><i class="far fa-edit"> Éditer</i></a> '.'/ <a href="/sors/'.$sor->id.'/destroy"><i class="far fa-times"> Effacer</i></a>';
        }
        echo "</p>";
        echo "<p class='col col-lg-7 p-0 mb-2'>".$sor->comment_sor."</p>";
        $participSor = $particips->Where('sor_id','=', $sor->id);
        $participNum=0;

        foreach ($participSor as $particip) {
            // ajouter IF pour afficher différemment selon admin ou autre utilisateur,
            // tester si le $particip->user_id correspond à la session de id
            echo '<div class="row justify-content-end no-gutters ml-2">';
            if (session('role')=='admin' or session('role')=='superadmin' or (session('role')=='membre' and session('id')==$particip->user_id)){
                // liens de suppression et de modification;
                echo '<div class="col-2 col-md-1"><a href="/particips/'.$particip->id.'/destroy"><i class="fas fa-user-times"></i></a> / <a href="/particips/'.$particip->id.'/edit"><i class="fas fa-user-edit"></i></a></div> ';
            }
            //
            echo '<div class="col-5 col-sm-4 col-md-2">'.++$participNum.". ".$particip->User->firstname." ".$particip->User->name."</div><div class='col-5 col-sm-4 col-md-5 '>".$particip->comment_particip.'</div><div class="col-4 col-md-4"></div></div>';
        }
        echo "</div>";
    }


?>
@stop

