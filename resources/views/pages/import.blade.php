@extends('layouts.app')
@section('content')
<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="file">Sélectionner le fichier à importer (xls, ods, csv)</label>
    <input type="file" name="file" class="form-control" >
    <br>
    <button class="btn btn-success">Import </button>
    <?php

    ?>
    <a class="btn btn-warning" href="{{ route('export') }}">Export </a>
</form>
@stop
