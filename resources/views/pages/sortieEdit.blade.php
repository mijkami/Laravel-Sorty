@extends('layouts.app')
@section('content')

<h1>Edition de sortie</h1><br>
<a href="/sors">Retour arrière</a><br>
{{-- store => update --}}

<form class="form-horizontal" method="POST" action="{{ route("sors.store") }}">
        @csrf
        <input type="date" name="dat" value="{{ $sor->dat }}"> Date<br>
        <input type="radio" name="typ" value="montagne" <?php if ($sor->typ=="montagne"){echo 'checked';} ?>> Montagne<br>
        <input type="radio" name="typ" value="encadrée" <?php if ($sor->typ=="encadrée"){echo 'checked';} ?>> Encadrée<br>
        <input type="radio" name="typ" value="1500" <?php if ($sor->typ=="1500"){echo 'checked';} ?>> 1500<br>
        <input type="radio" name="typ" value="accompagnée" <?php if ($sor->typ=="accompagnée"){echo 'checked';} ?>> Accompagnée<br>
        <input type="radio" name="typ" value="sunset" <?php if ($sor->typ=="sunset"){echo 'checked';} ?>> Sunset<br>
        <textarea rows="4" cols="50" name="comment_sor" value="{{ $sor->comment_sor }}"> Commentaire...</textarea><br>

        {{-- <input type="textarea"  name="comment_sor"> Commentaire<br> --}}
        <button type="submit">Enregistrer</button>
</form>

@stop

