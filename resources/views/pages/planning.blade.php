@extends('layouts.app')
@section('content')
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
        // echo "<a href>";
    }
    echo "<br>________<br><br>";




}


?>
@stop

