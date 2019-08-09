@extends('layouts.app')
@section('content')
<h3>Nouvelle participation (mode admin)</h3>

{{--      #TODO : vérifier statut et interdire si non à jour--}}
<a href="{{ URL::previous() }}"><p><i class="fas fa-arrow-left"> Annuler / page précédente</i></p></a>
<ol>
    <li>Pour inscrire un passager bi-place à une sortie, mettre 2x le nom du pilote bi-placeur.</li>
    <li>Pour inscrire un invité, choisir dans la liste des utilisateurs "Invité", celui-ci aura automatiquement une date d'inscription établie à J -4.<br>
        Par exemple, pour la sortie du 14 Juillet : une inscription "Invité" faite le 3 Juillet sera notée "10 Juillet" (14 - 4 = 10). <br>
        Tous les membres s'inscrivant avant J-4 seront prioritaires par rapport à l'invité.</li>

    <li>Possibilité en mode administrateur de modifier la date d'inscription d'un participant à une sortie, l'ordre de participation sera défini par cette date d'inscription.<br>
        Par exemple : pour faire passer des débutants prioritaires par rapport à d'autres participants.</li>
</ol>
<form class="form-horizontal" method="POST" action="{{ route("particips.store") }}">
     @csrf
    <div class="row">
        <h5 class="col-3 offset-md-1 font-weight-bold">Participants</h5>
        <h5 class="col-3 ml-5 font-weight-bold">Sorties</h5>
    </div>
    <div class="row mb-4">
        <select class="col-5 col-md-3 offset-md-1" name="user_id" size=8>
            <?Php
                foreach ($users as $user){
                        echo '<option value="'.$user->id.'"';
                        if ($user->id==session('id')){
                            echo 'selected="selected"';
                        }
                        echo '>'.$user->name." ".$user->firstname.'</option>';
                }
            ?>
        </select>
        <select class="col-7 col-md-3 ml-md-5" name="sor_id" size=8>
            <?Php
                foreach ($sorFutur as $sor){
                        echo '<option value="'.$sor->id.'">'.Date::parse($sor->dat)->format('l j F').", ".$sor->typ.'</option>';
                }
            ?>
        </select>
    </div>
    <h5 class="col-3 font-weight-bold">Commentaire</h5>
    <textarea class="col p-3" rows="2" cols="60" maxlength="60" name="comment_particip" class="mceNoEditor" placeholder="Emplacement pour commentaire."></textarea>
    <button class="m-4 p-3 btn btn-success" type="submit">Enregistrer</button>
</form>
@stop
