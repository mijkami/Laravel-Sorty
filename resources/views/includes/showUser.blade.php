<div class="row justify-content-start no-gutters mt-3 mt-md-0 {{$color[$user->statut]}}">
    <div class="col-2 col-md-1">
            <a href="/users/{{ $user['id'] }}/edit"><i class="fas fa-user-edit"></i></a> / <a href="/users/{{ $user['id'] }}/destroy"><i class="fas fa-user-times"></i>
            </a>
    </div>
    <div class="col-5 col-md-2">{{ $user['name'] }}</div>
    <div class="col-4 col-md-2">{{ $user['firstname'] }}</div>
    <div class="col-4 col-md-3 ">{{ $user['tel'] }}</div>
    <div class="col-5 col-md-3">{{ $user['email'] }}</div>
</div>
