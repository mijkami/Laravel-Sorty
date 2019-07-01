@extends('layouts.app')
@section('content')
<h1>Sorties</h1><br>
<h4><a href="/sors/create">Créer une sortie</a></h4>
{{-- Créer un lien de nouvelle participation pour l'utilisateur identifié --}}
<a>
{{-- Créer un lien de nouvelle participation pour tout utilisateur (vue différente) --}}
<a>
<?php
//affichage des sorties
$sorFutur = $sors->Where('dat', '>=', today());

foreach ($sorFutur as $sor) {

    echo $sor->dat.", ".$sor->typ.' <a href="/sors/'.$sor->id.'/edit">éditer</a>'.' <a href="/sors/'.$sor->id.'/destroy">détruire</a>';
    echo "<br>";
    echo $sor->comment_sor;

    echo "<br>________<br><br>";




}





?>
@stop
