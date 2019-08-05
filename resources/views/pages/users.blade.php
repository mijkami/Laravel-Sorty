@extends('layouts.app')
@section('content')

<h2 class="p-1 mb-3">Liste d'utilisateurs</h2>
{{-- #TODO étudier /discuter possibilité de pouvoir créer nouvel invité --}}
@foreach ($users as $user)
    <div class="row justify-content-start no-gutters mt-3 mt-md-0">
    <div class="col-3 col-md-2 col-lg-1 h4">
            <a href="/users/{{ $user['id'] }}/edit" aria-label="Editer"><i class="fas fa-user-edit" title="Modifier '{{ $user['name'] }} {{ $user['firstname'] }}'"></i></a> / <a href="/users/{{ $user['id'] }}/destroy" aria-laber="Enlever"><i class="fas fa-user-times" title="Enlever '{{ $user['name'] }} {{ $user['firstname'] }}''"></i>
            </a>
    </div>
    <div class="col-5 col-md-2">{{ $user['name'] }}</div>
    <div class="col-4 col-md-2">{{ $user['firstname'] }}</div>
    <div class="col-4 offset-3 col-md-3 offset-md-0 h5">{{ $user['tel'] }}</div>
    <div class="col-5 col-md-3">{{ $user['email'] }}</div>
</div>
@endforeach

@endsection
