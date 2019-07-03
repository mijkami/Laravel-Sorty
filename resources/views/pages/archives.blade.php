@extends('layouts.app')
@section('content')
<h1>Archives des sorties passées</h1><br>
<?php
//affichage des sorties
$sorPasse = $sors->Where('dat', '<', today());

foreach ($sorPasse as $sor) {

    echo Date::parse($sor->dat)->format('l j F')." , ".$sor->typ."<br>";
    echo $sor->comment_sor."<br>";
    $archivesSor = $archives->Where('sor_id','=', $sor->id);

    foreach ($archivesSor as $archives) {
        echo $archives->User->name.'<br>';
    }
    echo "<br>________<br><br>";
}

?>
@stop
