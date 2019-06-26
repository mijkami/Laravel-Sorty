<?php

namespace App\Http\Controllers;


use App\Models\Particip;
use App\Models\User;
use App\Models\Sor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Jenssegers\Date\Date;
use Carbon\Carbon;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class ParticipController extends Controller
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
     * @param  \App\Particip  $particip
     * @return \Illuminate\Http\Response
     */
    public function show(Particip $particip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Particip  $particip
     * @return \Illuminate\Http\Response
     */
    public function edit(Particip $particip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Particip  $particip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Particip $particip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Particip  $particip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Particip $particip)
    {
        //
    }
}
