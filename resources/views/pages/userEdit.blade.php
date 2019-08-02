@extends('layouts.app')
@section('content')
@if (session('role')=='superadmin')
    <h3>{{ $user->name }} {{ $user->firstname }} : <span class="h2 font-weight-bold">modification</span> de la fiche personelle</h3>
    <a href="{{ URL::previous() }}"><h3><i class="fas fa-arrow-left"> Annuler / page précédente</i></h3></a>
    <form  method="POST" class="mt-4" action="{{ route('users.update', $user->id) }}">
        {{ csrf_field() }}
        {{ method_field('PuT') }}
        <input type="text" name="name" value="{{ $user->name }}"> Nom<br>
        <input type="text" name="firstname" value="{{ $user->firstname }}"> Prénom<br>
        <input type="text" name="email" value="{{ $user->email }}"> Email<br>
        <input type="text" name="tel" value="{{ $user->tel }}"> Téléphone<br><br>
        <input type="radio" name="role" value="invité" <?php if ($user->role=="invité"){echo 'checked';} ?>> Invité<br>
        <input type="radio" name="role" value="membre" <?php if ($user->role=="membre"){echo 'checked';} ?>> Membre<br>
        <input type="radio" name="role" value="admin" <?php if ($user->role=="admin"){echo 'checked';} ?>> Admin<br>
        <input type="radio" name="role" value="superadmin" <?php if ($user->role=="superadmin"){echo 'checked';} ?> class="mceNoEditor"> Super-admin<br>
        <button type="submit">Modifier</button>
    </form>
@endif
@stop
