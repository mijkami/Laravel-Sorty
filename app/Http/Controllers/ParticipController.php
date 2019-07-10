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
use Carbon\Carbon;
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
        if (is_null(Auth::user())) {
            return Redirect::to('/login')->with('error', 'connexion nécessaire');
        }

        //recherche date sortie
        $idsorty = $particip->sor_id;
        $idparticip = $particip->id;
        $sor = Sor::find($idsorty);
        $datsorty = $sor->dat;
        $sortyname = Date::parse($datsorty)->format('l j F  ') . ' / sortie ' . $sor->typ;

        //nb d'heures avant la sortie (pas de desinscription h-24)
        $a = new Carbon($datsorty);
        $now = Carbon::now();
        $ecart = $a->diffInHours($now) + 5;

        //id des participants à la sortie
        //ORDRE  $ordre[n°] donne le rang
        $idparticipants = Particip::where('sor_id', $idsorty)->orderBy('inscription', 'asc');
        $idpars = $idparticipants->get();
        $x = 0;
        foreach ($idpars as $idpar) {
            $x = $x + 1;
            $ordre[$idpar->id] = $x;
            $tri[$x] = $idpar->id;
        }

        //nb de participants
        $nb = $idparticipants->count();

        //premier en liste d'attente// note : last() ne fonctionne pas
        if ($nb > 8) {
            $user9 = Particip::find($tri[9])->user_id;
            $user = User::find($user9);
            $name9 = $user->firstname . ' ' . $user->name;
            $email9 = $user->email;
            $attente = $name9 . ' / tel : ' . $user->tel . ' / ' . $email9;
        }

        //flash notification à l'user connecté qui veut supprimer sa sortie trop tard
        $text1 = '';
        if ($nb == 5 and $ecart < 25 and session('role') <> 'admin' and session('role') <> 'superadmin') {
            return Redirect::to(session('origine'))->with('error', 'Vous ne pouvez pas vous désinscrire ' . $ecart . ' heures avant la sortie. Elle pourra ainsi avoir lieu et les autres participants ne seront pas pénalisés. Trouvez un remplaçant : après son inscription, vous pourrez annuler votre participation.                     Si vous êtes noté absent, vous devrez payer la sortie.');
        }

        // flash demandant de prévenir le user 9 en liste d'attente intégrant la sortie
        if ($nb > 8 and $ordre[$idparticip] < 9) {
            $text1 = "Prévenez---- " . $attente . " ---- ce membre a intégré la sortie !!! merci !!!";

            //*************************************************************************

            // envoi mail integration du user 9 dans la liste des participants à la sortie
            // préparation du mail
            $title = 'integration à la sortie du ' . $sortyname;
            $content = "sortie parapangue";
            $data = ['subject' => $title, 'content' => $content];
            $text = '<H3>Sortie du ' . $sortyname . '</H3> <br><br><b> ' . $name9 . '</b><br>Suite à une désinscription, vous faites désormais partie des participants à la sortie Parapangue <br><font color=blue><b>du ' . $sortyname . ' </font></b><br><br>Bons vols ... <br><br>     http://sorties.16mb.com/';
            $emails = array($email9, 'gaillot.gege@gmail.com');
            session(['text' => $text]);
            // envoi du mail basé sur la vue send2 (view préformattée sur la reintegration à cette sortie)
            //use($emails, $data)
            Mail::send('/bodymail2', $data, function ($message) use ($emails, $data)
            {
                $subject = $data['subject'];
                $message->from('sorties@parapangue.re');
                $message->to($emails);
                $message->subject($subject);
            });
        }
        // effacement retour sur la page à l'origine de la suppression
        $particip->delete();
        return Redirect::to(session('origine'))->with('success', 'Participation  supprimée ! ' . $text1);
        // return Redirect::to('/home')->with('success', 'Participation  supprimée !');
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
