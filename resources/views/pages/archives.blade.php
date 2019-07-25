@extends('layouts.app')
@section('content')
<h2>Archives des sorties passées</h2><br>
{{-- #TODO ajout support google maps pour indiquer le lieu de la sortie effectuée (choisi le jour de la sortie) --}}
<?php
    session(['page' => "/archives"]);
    //affichage des sorties

    foreach ($sorPasse as $sor) {
        echo "<section class='mt-3'><p class='mb-0'><span class='font-weight-bold'>".Date::parse($sor->dat)->format('l j F')." , ".$sor->typ.'</span>';
            if (session('role')=='admin' or session('role')=='superadmin'){
            echo ' | <a href="/sors/'.$sor->id.'/edit"><i class="far fa-edit"> Éditer</i></a> '.'/ <a href="/sors/'.$sor->id.'/destroy"><i class="fa fa-times"></i> Effacer</a>';
        }
        echo "</p>";
        echo "<p class='col col-lg-7 p-0 mb-2'>".$sor->comment_sor."</p>";
        $archivesPlanning = $archives->Where('sor_id','=', $sor->id);
        $participNum=0;
        foreach ($archivesPlanning as $archives) {
            echo '<div class="row no-gutters ml-2">';

            if (session('role')=='admin' OR session('role')=='superadmin'){
                echo '<div class="col-2 col-md-1"><a href="/particips/'.$archives->id.'/destroy"><i class="fas fa-user-times"></i></a> / <a href="/particips/'.$archives->id.'/edit"><i class="fa fa-user-edit"></i></a></div>';
            }
            echo '<div class="col-5 col-sm-4 col-md-2">'.++$participNum.". ".$archives->User->firstname." ".$archives->User->name."</div><div class='col-5 col-sm-4 col-md-5 '></div></div>";

        }
        echo "</section>";
    }
?>
@stop
