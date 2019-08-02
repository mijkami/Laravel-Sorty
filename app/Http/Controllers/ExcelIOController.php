<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\Usertemp;
use Maatwebsite\Excel\Facades\Excel;
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

class ExcelIOController extends Controller
{
    public function importExportView()
    {
        if (is_null(Auth::user())) {
            return Redirect::to('/login')->with('error', 'connexion nécessaire');
        }
        if (session('role') <> 'superadmin') {
            return Redirect::to('/')->with('error', 'accès non autorisé');
        }
        return view('pages.import');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import()
    {
        if (is_null(request()->file('file'))) {
            return Redirect::to('/importExport')->with('error', 'le fichier est manquant');
        }
        //importation fichier extérieur
        DB::table('usertemps')->delete();
        Excel::import(new UsersImport, request()->file('file'));

        $users = User::all();
        $usertemps = Usertemp::all();

        // test email duppliqué
        foreach ($usertemps as $usertemp) {
            $mail = $usertemp->email;
            $countemail = $aa = Usertemp::where('email', $mail)->count();
            if ($countemail > 1) {
                return Redirect::to('/importExport')->with('error', 'le mail ' . $mail . ' est présent plusieurs fois');
            }
        }

        //analyse table Usertemp et mise à jour
        // mettre toutes les fiches à statut = 4
        foreach ($users as $user) {
            $user->statut = 4;
            $user->save();
        }

        // pour chaque usertemps
        foreach ($usertemps as $usertemp) {
            $x = 0;
            $emailusertemp = $usertemp->email;

            //on regarde les correspondance avec user
            foreach ($users as $user) {
                $emailuser = $user->email;
                //statut 1 : fiche présente sans mise à jour
                //       2 : fiche présente avec mise à jour
                //       3 : fiche nouvelle
                //       4 : fiche sans correspondance

                //si il y a correspondance d'email
                if ($emailuser == $emailusertemp) {
                    $x = 1;

                    //si tous les autres champs sont identiques : statut 1
                    if (
                        $user->name == $usertemp->name and
                        $user->firstname == $usertemp->firstname and
                        $user->tel == $usertemp->tel
                    ) {
                        $user->statut = 1;
                        $user->save();
                    } else
                    // sinon mise à jour et statut 2
                    {
                        $user->name = $usertemp->name;
                        $user->firstname = $usertemp->firstname;
                        $user->tel = $usertemp->tel;
                        $user->email = $usertemp->email;
                        //$user->ajour=$usertemp->ajour;
                        //$user->role=$usertemp->role;
                        $user->statut = 2;
                        $user->save();
                    }
                } else { }
            }

            // pas de correspondance d'email = creation de fiche et statut 3
            if ($x == 0) {
                $user = new User;
                $user->name = $usertemp->name;
                $user->firstname = $usertemp->firstname;
                $user->email = $usertemp->email;
                $user->tel = $usertemp->tel;
                $user->ajour = 1;
                $user->statut = 3;
                $user->role = 'membre';
                $user->password = $usertemp->password;
                $user->save();
            }
        }
        return Redirect::to('/users')->with('success', 'Importation effectuée.');
    }
}

