@extends('layouts.app')
@section('content')
@if (session('role')=='admin' OR session('role')=='superadmin')
    <h2>Edition de sortie</h2>
    <a href="{{ URL::previous() }}"><p><i class="fas fa-arrow-left"> Annuler / page précédente</i></p></a>
    {{-- store => update --}}

    <form class="form-horizontal" method="POST" action="{{ route("sors.update", $sor->id) }}">
        {{ csrf_field() }}
        {{ method_field('PuT') }}
            <input type="date" name="dat" value="{{ $sor->dat }}"> Date<br>
            <input type="radio" name="typ" value="sortie normale" <?php if ($sor->typ=="sortie normale"){echo 'checked';} ?>> Sortie normale<br>
            <input type="radio" name="typ" value="montagne" <?php if ($sor->typ=="montagne"){echo 'checked';} ?>> Montagne<br>
            <input type="radio" name="typ" value="encadrée" <?php if ($sor->typ=="encadrée"){echo 'checked';} ?>> Encadrée<br>
            <input type="radio" name="typ" value="1500" <?php if ($sor->typ=="1500"){echo 'checked';} ?>> 1500<br>
            <input type="radio" name="typ" value="accompagnée" <?php if ($sor->typ=="accompagnée"){echo 'checked';} ?>> Accompagnée<br>
            <input type="radio" name="typ" value="sunset" <?php if ($sor->typ=="sunset"){echo 'checked';} ?>> Sunset<br>
            <textarea rows="4" cols="50" name="comment_sor" value="{{ $sor->comment_sor }}" class="editme"> {{ $sor->comment_sor }}</textarea><br>
            <button type="submit">Enregistrer</button>
    </form>
@endif
@stop

