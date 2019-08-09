@extends('layouts.app')
@section('content')

<h2 class="p-1 mb-3">Liste d'utilisateurs</h2>
{{-- #TODO étudier /discuter possibilité de pouvoir créer nouvel invité --}}
@foreach ($users as $user)
    <div class="row justify-content-start no-gutters mt-3 mt-md-0">
    <div class="col-5 col-md-2">{{ $user['name'] }}</div>
    <div class="col-4 col-md-2">{{ $user['firstname'] }}</div>
    <div class="col-4 offset-3 col-md-3 offset-md-0">{{ $user['tel'] }}</div>
    <div class="col-5 col-md-3">{{ $user['email'] }}</div>
</div>
@endforeach

@endsection
