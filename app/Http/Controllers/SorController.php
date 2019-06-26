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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sor  $sor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sor $sor)
    {
        //
    }
}
