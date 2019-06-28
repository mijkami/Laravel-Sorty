@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">


<h1>Sorties prochaines & Participants</h1><br>
{{-- Créer un lien de nouvelle participation pour l'utilisateur identifié --}}
<a>
{{-- Créer un lien de nouvelle participation pour tout utilisateur (vue différente) --}}
<a>
<?php
//affichage des sorties
$sorFutur = $sors->Where('dat', '>=', today());

foreach ($sorFutur as $sor) {

    echo $sor->dat;
    echo $sor->typ;
    echo "<br>";
    echo $sor->comment_sor;
    $participSor = $particips->Where('sor_id','=', $sor->id);

    foreach ($participSor as $particip) {
        echo $particip->User->name.'<br>';
        // ajouter liens de suppression et de modification
        echo "<a href>"
    }
    echo "<br>________<br><br>";




}





?>
@stop

