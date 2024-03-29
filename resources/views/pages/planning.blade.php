@extends('layouts.app')
@section('content')
<h2>Sorties prochaines & Participants</h2>

    {{ session(['page' => "/particips"]) }}

    @if (session('role')=='admin' OR session('role')=='superadmin')
        <a href="/sors/create">
            <p><i class="fas fa-shuttle-van"> Créer une sortie</i></p>
        </a>
        <a href="/particips/create2">
            <p><i class="fa fa-plus"></i> Création de participation (mode administrateur)</p>
        </a>
    @elseif (session('role')=='membre')
        <a href="/particips/create"><p><i class="fas fa-plus"> Création de participation</i></p></a>
    @endif
    {{-- affichage des sorties
    #TODO option creer un role biplaceur qui pourrait
    s'inscrire  2 fois, sans autre prérogative (membre + cette possibilité) --}}
    @if (count($sorFutur) == null)
                <h2 class='row ml-5 font-weight-bold mt-5 text-primary'>
                    <i class='fas fa-exclamation-triangle'> Pas encore de sortie programmée pour le moment !</i>
                </h2>
    @endif

    @foreach ($sorFutur as $sor)
        <section class='mt-4'>
            <p class='mb-0'>
                <span class='font-weight-bold'>{{ Date::parse($sor->dat)->format('l j F') }}, {{ $sor->typ }}</span>
                @if (session('role')=='admin' or session('role')=='superadmin')
                    | <a href="formemail/{{ $sor->id }}"><i class="far fa-envelope"> Envoi mail</i></a> /
                    <a href="/sors/{{ $sor->id }}/edit"><i class="far fa-edit"> Éditer</i></a> /
                    <a href="/sors/'.$sor->id.'/destroy"><i class="fa fa-times"></i> Effacer</a>
                @endif
            </p>
        <p class='col col-lg-7 p-0 mb-2'>{{ $sor->comment_sor }}</p>
        <?php
            $participSor = $particips->Where('sor_id','=', $sor->id);
            $participNum=1;
        ?>
        @if (count($participSor) == null)
            <span class='row ml-5'>Pas encore d'inscrit !</span>
        @endif
        @foreach ($participSor as $particip)
            {{--
            // ajouter IF pour afficher différemment selon admin ou autre utilisateur,
            // tester si le $particip->user_id correspond à la session de id --}}
            @if ($participNum == 9)
                <span class='row ml-5'>Liste d'attente :</span>
            @endif
            @if ($participNum >= 9)
                <font color='#00008B'>
            @endif
            <div class="row justify-content-end no-gutters">
                @if (session('role')=='admin' or session('role')=='superadmin' or (session('role')=='membre' and session('id')==$particip->user_id))
                    <div class="col-3 col-md-2 col-lg-1 h5">
                        <a href="/particips/{{ $particip->id }}/edit" aria-label="Editer">
                            <i class="fas fa-user-edit" title="Modifier {{ $particip->User->name }} {{ $particip->User->firstname }}"></i>
                        </a> /
                        <a href="/particips/{{ $particip->id }}/destroy" aria-label="supprimer">
                            <i class="fas fa-user-times" title="Enlever {{ $particip->User->name }} {{ $particip->User->firstname }}"></i>
                        </a>
                    </div>
                @endif
                <div class="col-9 col-sm-4 col-md-4 col-lg-2">{{ $participNum }}. {{ $particip->User->firstname }} {{ $particip->User->name }}</div>
                    <div class="col-6 offset-2 col-sm-5 offset-sm-0 col-md-6 offset-md-0 col-lg-3 offset-lg-0">
                        @if (session('role')=='admin' or session('role')=='superadmin' or (session('role')=='membre'))
                            {{ $particip->User->tel }}
                        @endif
                    </div>
                <div class="col-4 col-sm-2 offset-sm-2 col-md-4 offset-md-2 col-lg-2 offset-lg-0">
                    @if (session('role')=='admin' or session('role')=='superadmin')
                        {{ Date::parse($particip->inscription)->format('j F') }}
                    @endif
                </div>
                <div class="col-10 offset-2 col-sm-7 offset-sm-0 col-md-6 col-lg-4 offset-md-0 mb-3">
                    @if (session('role')=='admin' or session('role')=='superadmin' or (session('role')=='membre'))
                        {{ $particip->comment_particip }}
                    @endif
                </div>
            </div>
            @if ($participNum >= 8)
                </font>
            @endif
            <?php
                $participNum+=1;
            ?>
        @endforeach
        </section>
    @endforeach
@stop
