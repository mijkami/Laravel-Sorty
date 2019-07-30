@extends('layouts.app')
@section('content')
<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="file"><h3>Sélectionnez le fichier à importer (xls, ods, csv) :</h3></label>
    <input type="file" name="file" class="form-control-file ml-4 mt-2" >
    <br>
    <button class="btn btn-success ml-3">Import</button>
    <?php

    ?>
    <a class="btn btn-warning" href="{{ route('export') }}">Export</a>
</form>
@stop
