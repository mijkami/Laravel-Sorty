@extends('layouts.app')
@section('content')
<h1>Sorties prochaines & Participants</h1><br>
<h4><a href="/particips/create">Création de participation</a></h4>
<h4><a href="/particips/create2">Création de participation (mode administrateur)</a></h4>

{{-- Créer un lien de nouvelle participation pour l'utilisateur identifié --}}
{{-- Créer un lien de nouvelle participation pour tout utilisateur (vue différente) --}}

<?php
//affichage des sorties
$sorFutur = $sors->Where('dat', '>=', today());

foreach ($sorFutur as $sor) {

    echo $sor->dat;
    echo $sor->typ;
    echo "<br>";
    echo $sor->comment_sor."<br>";
    $participSor = $particips->Where('sor_id','=', $sor->id);

    foreach ($participSor as $particip) {
        // ajouter IF pour afficher différemment selon admin ou autre utilisateur,
        // tester si le $particip->user_id correspond à la session de id
        if ($particip->user_id == session('id')){

            echo '<a href="/particips/'.$particip->id.'/edit">éditer</a>'.' <a href="/particips/'.$particip->id.'/destroy">détruire</a><br>';

        }
        echo $particip->User->name.'<br>';
        // ajouter liens de suppression et de modification;
        // echo "<a href>";
    }
    echo "<br>________<br><br>";
}

?>
@stop

