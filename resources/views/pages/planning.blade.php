@extends('layouts.app')
@section('content')
<h2>Sorties prochaines & Participants</h2>
<?php
    session(['page' => "/particips"]);
    if (session('role')=='admin' or session('role')=='superadmin'){
        echo '<a href="/sors/create"><p><i class="fas fa-shuttle-van"> Créer une sortie</i></p></a>';
        echo '<a href="/particips/create2"><p><i class="fa fa-plus"></i> Création de participation (mode administrateur)</p></a>';
    }
    elseif (session('role')=='membre'){
        echo '<a href="/particips/create"><p><i class="fas fa-plus"> Création de participation</i></p></a>';
    }


    //affichage des sorties
    // #TODO option creer un role biplaceur qui pourrait
    // s'inscrire  2 fois, sans autre prérogative (membre + cette possibilité)


    foreach ($sorFutur as $sor) {
        echo "<section class='mt-4'><p class='font-weight-bold mb-0'>".Date::parse($sor->dat)->format('l j F')." , ".$sor->typ;
        if (session('role')=='admin' or session('role')=='superadmin'){
            echo ' | <a href="formemail/'.$sor->id.'"><i class="far fa-envelope"> Envoi mail</i></a> / <a href="/sors/'.$sor->id.'/edit"><i class="far fa-edit"> Éditer</i></a> / <a href="/sors/'.$sor->id.'/destroy"><i class="far fa-times"> Effacer</i></a>';
        }
        echo "</p>";
        echo "<p class='col col-lg-7 p-0 mb-2'>".$sor->comment_sor."</p>";
        $participSor = $particips->Where('sor_id','=', $sor->id);
        $participNum=0;

        foreach ($participSor as $particip) {
            // ajouter IF pour afficher différemment selon admin ou autre utilisateur,
            // tester si le $particip->user_id correspond à la session de id
            if ($participNum==8){
                echo "<font color='#00008B'><span class='row ml-5'>Liste d'attente :</span>";
            }
            echo '<div class="row justify-content-end no-gutters ml-2">';
            if (session('role')=='admin' or session('role')=='superadmin' or (session('role')=='membre' and session('id')==$particip->user_id)){
                echo '<div class="col-2 col-sm-2 col-md-1"><a href="/particips/'.$particip->id.'/destroy"><i class="fas fa-user-times"></i></a> / <a href="/particips/'.$particip->id.'/edit"><i class="fas fa-user-edit"></i></a></div> ';
            }
            //
            echo '<div class="col-10 col-sm-4 col-md-3 col-lg-2">'.++$participNum.'. '.$particip->User->firstname.' '.$particip->User->name.'</div>';
            echo '<div class="col-6 col-sm-4 col-md-3 col-lg-2">';
            if (session('role')=='admin' or session('role')=='superadmin' or (session('role')=='membre')){
                echo $particip->User->tel;
           }
            echo '</div><div class="col-4 col-sm-2 col-md-1">';
            if (session('role')=='admin' or session('role')=='superadmin'){
                echo Date::parse($particip->inscription)->format('j F');
            }
            echo '</div><div class="col-10 col-sm-10 col-md-3 col-lg-6">';
            if (session('role')=='admin' or session('role')=='superadmin' or (session('role')=='membre')){
                echo $particip->comment_particip;
            }
            echo '</div></div>';

        }
        echo "</section>";
    }


?>
@stop

