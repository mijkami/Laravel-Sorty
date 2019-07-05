@extends('layouts.app')
@section('content')
<h3>Archives des sorties passées</h3><br>
<?php
    session(['page' => "/archives"]);
    //affichage des sorties
    $sorPasse = $sors->Where('dat', '<', today());

    foreach ($sorPasse as $sor) {
        echo "<div class='mt-4'><p class='font-weight-bold mb-0'>".Date::parse($sor->dat)->format('l j F')." , ".$sor->typ."</p>";
        echo "<p class='col col-lg-7 p-0 mb-2'>".$sor->comment_sor."</p>";
        $archivesPlanning = $archives->Where('sor_id','=', $sor->id);
        $participNum=0;
        foreach ($archivesPlanning as $archives) {
            echo '<div class="row no-gutters ml-2">';

            if (session('role')=='admin' OR session('role')=='superadmin'){
                echo '<div class="col-2 col-md-1"><a href="/particips/'.$archives->id.'/destroy"><i class="fas fa-user-times"></i></a></div>';
            }
            echo '<div class="col-5 col-sm-4 col-md-2">'.++$participNum.". ".$archives->User->firstname." ".$archives->User->name."</div><div class='col-5 col-sm-4 col-md-5 '></div></div>";

        }
        echo "</div>";
    }
?>
@stop
