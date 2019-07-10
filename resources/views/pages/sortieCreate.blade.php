@extends('layouts.app')
@section('content')
@if (session('role')=='admin' OR session('role')=='superadmin')
<h2>Création de sorties</h2>
<a href="{{ URL::previous() }}"><p><i class="fas fa-arrow-left"> Annuler / page précédente</i></p></a>


    <form class="form-horizontal" method="POST" action="{{ route("sors.store") }}">
        @csrf
        <div>
            <h5 class="col-3 font-weight-bold">Date</h5>
            <input class="mb-4" type="date" name="dat">
        </div>
        <h5 class="col-3 font-weight-bold">Sorties</h5>
        <div class="btn-group btn-group-toggle mb-4" data-toggle="buttons">
            <label class="btn btn-primary active">
                <input type="radio" name="typ" id="option" autocomplete="off" value="sortie normale" checked>Sortie normale
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="typ" id="option2" autocomplete="off" value="montagne">Montagne
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="typ" id="option3" autocomplete="off" value="encadrée">Encadrée
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="typ" id="option4" autocomplete="off" value="1500">1500
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="typ" id="option5" autocomplete="off" value="accompagnée">Accompagnée
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="typ" id="option6" autocomplete="off" value="sunset">Sunset
            </label>
        </div>
            <h5 class="col-3 font-weight-bold">Commentaire</h5>
            <textarea rows="4" cols="50" name="comment_sor" class="editme" placeholder="Emplacement pour commentaire."></textarea>
            {{-- #TODO : ajouter un recap des informations rentrées précédemment avant le bouton enregistrer --}}
            <button class="m-4 p-3 btn btn-success" type="submit">Enregistrer</button>
    </form>


@endif
@stop
