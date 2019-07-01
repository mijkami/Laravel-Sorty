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

class SorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (is_null(Auth::user())) { } else {
        //     session(['role' => User::find(Auth::user()->id)->role]);
        //     session(['firstname' => User::find(Auth::user()->id)->firstname]);
        //     session(['name' => Auth::user()->name]);
        //     session(['id' => Auth::user()->id]);
        // }
        //fin de définition var session
        //usage :
        //session('role')


        $sors = Sor::orderBy('dat', 'ASC')->get();
        return view('pages.sorties', compact('sors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.sortieCreate');
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
        Sor::create($request->all());
        return Redirect::to('/sors');
        // /!\ rappel pour SORTY ajout du flash message en redirect de cette manière :
        return Redirect::to('/sors')->with('success', "La sortie est créée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sor  $sor
     * @return \Illuminate\Http\Response
     */
    public function show(Sor $sor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sor  $sor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sor $sor)
    {
        return view('pages.sortieEdit', compact('sor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sor  $sor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sor $sor)
    {
        $sor->update($request->all());

        // /!\ rappel pour SORTY ajout du flash message en redirect de cette manière :
        return Redirect::to('/sors')->with('success', 'La  fiche de ' . $sor->typ . ' du ' . $sor->dat . ' est modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sor $sor)
    {
        $sor->delete();
        // return Redirect::to('/sors');
        // /!\ rappel pour SORTY ajout du flash message en redirect de cette manière :
        return Redirect::to('/sors')->with('success', 'La  fiche de ' . $sor->typ . ' du ' . $sor->dat . ' est détruite.');
    }

    public function destroyForm(Sor $sor)
    {
        return view('pages.sortieDelete', compact('sor'));
    }
}
