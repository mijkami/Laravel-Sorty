@extends('layouts.app')
@section('content')

<h1>Nouvelle participation (mode membre)</h1><br>
{{-- ajouter "Nouvelle participation (mode admin)" --}}
<a href="/particips">Retour arrière</a><br>
{{session('name')." ".session('firstname')}}<br>
{{-- 3 champs
    - Un champ caché dont la value est  l'id du user connecte : voir session(id)
    - Un champ idsor : un select dont les valeurs sont les id des sorties dont la date est à venir
Definir un objet $sors du genre $sors=Sor::where(...,...,...)->orderBy.....
Afficher les resultats dans le select a l'aide d'une boucle

    comment_particip
    sor_id
    user_id --}}
<?php

    $sorFutur = $sors->Where('dat', '>=', today());

?>



<form class="form-horizontal" method="POST" action="{{ route("particips.store") }}">
     @csrf
    <input type="hidden" name="user_id" value={{session('id')}}>

    <select name="sor_id" size=5>
        <?Php
            foreach ($sorFutur as $sor){
                // possibilité de changer Auth::user()->id par      session('id')
                // ou une requête sql type DB:query pour remplacer le tout
                if ($particips->where('sor_id',$sor->id)->where('user_id',Auth::user()->id)->count()==0){
                    echo '<option value="'.$sor->id.'">'.Date::parse($sor->dat)->format('l j F').", ".$sor->typ.'</option>';
                }
            }
        ?>
    </select><br>
    <textarea rows="4" cols="50" name="comment_particip"> Commentaire...</textarea><br>

    <button type="submit">Enregistrer</button>
</form>




@stop
