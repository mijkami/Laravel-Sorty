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
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

Date::setLocale('fr');

class ParticipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null(Auth::user())) { } else {
            session(['role' => User::find(Auth::user()->id)->role]);
            session(['firstname' => User::find(Auth::user()->id)->firstname]);
            session(['name' => Auth::user()->name]);
            session(['id' => Auth::user()->id]);
        }
        //fin de définition var session
        //usage :
        //session('role')

        $particips = Particip::orderBy('inscription', 'ASC')->get();
        $sors = Sor::orderBy('dat', 'ASC')->get();
        return view('pages.planning', compact('particips', 'sors'));
    }

    public function archives()
    {
        $archives = Particip::orderBy('inscription', 'ASC')->get();
        $sors = Sor::orderBy('dat', 'DESC')->get();
        return view('pages.archives', compact('archives', 'sors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $particips = Particip::orderBy('inscription', 'ASC')->get();
        $sors = Sor::orderBy('dat', 'ASC')->get();
        return view('pages.planningCreate', compact('particips', 'sors'));
    }


    public function create2()
    {
        $users = User::orderBy('name', 'ASC')->get();
        $particips = Particip::orderBy('inscription', 'ASC')->get();
        $sors = Sor::orderBy('dat', 'ASC')->get();
        $sorFutur = $sors->Where('dat', '>=', today());
        return view('pages.planningCreate2', compact('users', 'particips', 'sorFutur'));
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
        Particip::create($request->all());
        // /!\ rappel pour SORTY ajout du flash message en redirect de cette manière :
        return Redirect::to('/particips')->with('success', "La participation est enregistrée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Particip  $particip
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Particip  $particip
     * @return \Illuminate\Http\Response
     */
    public function edit(Particip $particip)
    {
        return view('pages.planningEdit', compact('particip'));
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
        $particip->update($request->all());
        return Redirect::to('/particips')->with('success', 'La participation est modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Particip  $particip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Particip $particip)
    {
        $particip->delete();
        return Redirect::to(session('page'))->with('success', 'La  participation est supprimée !');
    }

    public function destroyForm(Particip $particip)
    {
        return view('pages.planningDelete', compact('particip'));
    }

    public function send(Request $request, Sor $sor)
    {

        $emails = array('test@test.fr');
        $particips = Particip::Where('sor_id', '=', $request->input('id'))->get();
        foreach ($particips as $particip) {
            $mail = $particip->User->email;
            array_push($emails, $mail);
        }
        $email = $emails;
        // corps du message qui sera envoyé en même temps que bodymail :
        session(['mailtext' => $request->input('text')]);

        $title = 'Inscription à une sortie Parapangue';
        $content = "sortie parapangue";
        $user_name = "sortie parapangue";
        //$emails = ['test1@hotmail.com','test2@hotmail.com','test3@hotmail.com'];
        //$data = ['email'=> $user_email,'name'=> $user_name,'subject' => $title, 'content' => $content];
        $data = ['subject' => $title, 'content' => $content];
        // envoi du mail basé sur la vue send2
        Mail::send('bodymail', $data, function ($message) use ($email, $data) {
            $subject = $data['subject'];
            $message->from('sortie@parapangue.re');
            $message->to($email);
            $message->subject($subject);
        });
        return Redirect::to('/')->with('success', "Email envoyé.");
    }

    public function formemail(Sor $sor)

    {
        $particips = Particip::Where('sor_id', '=', $sor->id)->get();
        return view('pages.formemail', compact('sor', 'particips'));
    }
}
