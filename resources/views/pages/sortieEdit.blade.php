@extends('layouts.app')
@section('content')
@if (session('role')=='admin' OR session('role')=='superadmin')
    <h2>Edition de sortie</h2>
    <a href="{{ URL::previous() }}"><p><i class="fas fa-arrow-left"> Annuler / page précédente</i></p></a>
    <form class="form-horizontal" method="POST" action="{{ route("sors.update", $sor->id) }}">
        {{ csrf_field() }}
        {{ method_field('PuT') }}
        <div>
            <h5 class="col-3 font-weight-bold">Date</h5>
            <input class="mb-4" type="date" name="dat" value="{{ $sor->dat }}">
        </div>
        <h5 class="col-3 font-weight-bold">Sorties</h5>
        <div class="btn-group btn-group-toggle flex-wrap mb-4" data-toggle="buttons">
            <label class="btn btn-primary <?php if ($sor->typ=="sortie normale"){echo 'active';} ?>">
                <input type="radio" name="typ" id="option" autocomplete="off" value="sortie normale" <?php if ($sor->typ=="sortie normale"){echo 'checked';} ?>> Sortie normale
            </label>
            <label class="btn btn-primary <?php if ($sor->typ=="montagne"){echo 'active';} ?>">
                <input type="radio" name="typ" id="option2" autocomplete="off" value="montagne" <?php if ($sor->typ=="montagne"){echo 'checked';} ?>> Montagne
            </label>
            <label class="btn btn-primary <?php if ($sor->typ=="encadrée"){echo 'active';} ?>">
                <input type="radio" name="typ" id="option3" autocomplete="off" value="encadrée" <?php if ($sor->typ=="encadrée"){echo 'checked';} ?>> Encadrée
            </label>
            <label class="btn btn-primary <?php if ($sor->typ=="1500"){echo 'active';} ?>">
                <input type="radio" name="typ" id="option4" autocomplete="off" value="1500" <?php if ($sor->typ=="1500"){echo 'checked';} ?>> 1500
            </label>
            <label class="btn btn-primary <?php if ($sor->typ=="accompagnée"){echo 'active';} ?>">
                <input type="radio" name="typ" id="option5" autocomplete="off" value="accompagnée" <?php if ($sor->typ=="accompagnée"){echo 'checked';} ?>> Accompagnée
            </label>
            <label class="btn btn-primary <?php if ($sor->typ=="sunset"){echo 'active';} ?>">
                <input type="radio" name="typ" id="option6" autocomplete="off" value="sunset" <?php if ($sor->typ=="sunset"){echo 'checked';} ?>> Sunset
            </label>
        </div>
            <h5 class="col-3 font-weight-bold">Commentaire</h5>
            <textarea rows="4" cols="50" name="comment_sor" value="{{ $sor->comment_sor }}" class="editme" placeholder="Emplacement pour commentaire.">{{ $sor->comment_sor }}</textarea>
            {{-- #TODO : ajouter un recap des informations rentrées précédemment avant le bouton enregistrer --}}
            <button class="m-4 p-3 btn btn-success" type="submit">Enregistrer</button>
    </form>


@endif
@stop
