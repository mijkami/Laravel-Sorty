@extends('layouts.app')
@section('content')

<h1>Création de sorties</h1>
<a href="/sors">Retour arrière</a><br>


<form class="form-horizontal" method="POST" action="{{ route("sors.store") }}">
        @csrf
        <input type="date" name="dat" > Date<br>
        <input type="radio" name="typ" value="sortie normale" checked> Sortie normale<br>
        <input type="radio" name="typ" value="montagne"> Montagne<br>
        <input type="radio" name="typ" value="encadrée"> Encadrée<br>
        <input type="radio" name="typ" value="1500"> 1500<br>
        <input type="radio" name="typ" value="accompagnée"> Accompagnée<br>
        <input type="radio" name="typ" value="sunset"> Sunset<br>
        <textarea rows="4" cols="50" name="comment_sor"> Commentaire...</textarea><br>

        {{-- <input type="textarea"  name="comment_sor"> Commentaire<br> --}}
        <button type="submit">Enregistrer</button>
</form>




@stop
