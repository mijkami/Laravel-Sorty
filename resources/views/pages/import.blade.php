@extends('layouts.app')
@section('content')
<h2>Import / Export données membres de Parapangue</h2>
<div class="container p-2 ml-3">
    <div class="row justify-content-start">
        <div class="font-weight-bold col-4 col-md-1 px-2">Import :</div><div class="col-8 col-md-6 mb-2">Entêtes de colonnes (sans accent) : <b>'nom', 'prenom', 'tel' , 'email'</b></div>
            <div class="col-8 col-md-6 offset-4 offset-md-1">Format <b>xls, xslx, ods</b> :
                <ul>
                    <li>1 seule feuille</li>
                    <li>pas de case vide dans la colonne 'email'</li>
                </ul>
            </div>
        </div>
    <div class="row justify-content-start mt-2">
        <div class="font-weight-bold col-4 col-md-1 px-2">Export :</div><p class="col-8 col-md-6">Format <b>xlsx</b>.</p>
    </div>
</div>
<form action="{{ route('import') }}" class="col-12 col-md-7 border my-4" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="p-4">
        <label for="file"><h4>Sélectionnez le fichier à importer (xls, ods, csv) :</h4></label>
        <input type="file" name="file" class="form-control-file ml-4 mt-2" >
        <br>
        <button class="btn btn-success mx-2">Import</button>
        <a class="btn btn-warning" href="{{ route('export') }}">Export</a>
    </div>
</form>
@stop
