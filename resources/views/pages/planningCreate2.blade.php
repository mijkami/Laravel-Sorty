@extends('layouts.app')
@section('content')

<h1>Nouvelle participation (mode admin)</h1><br>
{{-- ajouter "Nouvelle participation (mode admin)" --}}
<a href="/particips">Retour arrière</a><br>

{{-- TODO : ajouter champ select avec la liste de tous les utilisateurs par ordre alphabétique --}}

<select name="sor_id" size=10>
        <?Php
            foreach ($users as $user){
                    echo '<option value="'.$user->id.'"';
                    if ($user->id==session('id')){
                        echo 'selected="selected"';
                    }
                    echo '>'.$user->name." ".$user->firstname.'</option>';


            }
        ?>
</select><br>



<form class="form-horizontal" method="POST" action="{{ route("particips.store") }}">
     @csrf
    <input type="hidden" name="user_id" value={{session('id')}}>

    <select name="sor_id" size=5>
        <?Php
            foreach ($sorFutur as $sor){
                    echo '<option value="'.$sor->id.'">'.Date::parse($sor->dat)->format('l j F').", ".$sor->typ.'</option>';
            }
        ?>
    </select><br>
    <textarea rows="4" cols="50" name="comment_particip"> Commentaire...</textarea><br>

    <button type="submit">Enregistrer</button>
</form>




@stop
