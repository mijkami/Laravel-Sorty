@extends('layouts.app')
@section('content')
@if (session('role')=='superadmin')
    <h2>Modification d'utilisateur</h2>
    <a href="{{ URL::previous() }}"><p><i class="fas fa-arrow-left"> Annuler / page précédente</i></p></a>
    <form  method="POST" action="{{ route('users.update', $user->id) }}">
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
