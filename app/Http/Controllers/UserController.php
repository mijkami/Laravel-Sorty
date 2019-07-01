<?php

namespace App\Http\Controllers;

use App\Models\Particip;
use App\Models\User;
use App\Models\Sor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

Date::setLocale('fr');

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // définition variable $users
        $users = User::orderBy('name', 'ASC')->get();
        // aller à la vue 'index.blade.php' en passant la variable $users définie préalablement
        return view('pages.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.userCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // récupère tout le formulaire, possibilité de faire un-à-un
        // pour tous les éléments, champ par champ
        User::create($request->all());
        // return Redirect::to('/users');
        // /!\ rappel pour SORTY ajout du flash message en redirect de cette manière :
        return Redirect::to('/users')->with('success', "L'utilisateur est créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //on renvoie vers la vue qui permettra d'editer l'user
        //correspondant à id- creer une vue useredit
        // compact user : renvoie à userEdit les données d'user ($ non nécessaire)

        return view('pages.userEdit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        // /!\ rappel pour SORTY ajout du flash message en redirect de cette manière :
        return Redirect::to('/users')->with('success', 'La  fiche de ' . $user->name . ' ' . $user->firstname . ' est modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        // return Redirect::to('/users');
        // /!\ rappel pour SORTY ajout du flash message en redirect de cette manière :
        return Redirect::to('/users')->with('success', 'La  fiche de ' . $user->name . ' ' . $user->firstname . ' est détruite.');
    }

    public function destroyForm(User $user)
    {
        return view('pages.userDelete', compact('user'));
    }
}
