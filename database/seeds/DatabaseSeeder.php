<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Sor;
use App\Models\Particip;
//Carbon = utilitaire de gestion des dates
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // effacer les données présentes
        DB::table('users')->delete();
        DB::table('sors')->delete();
        DB::table('particips')->delete();

        // servira pour la génération de typ de sorties
        $array = array("sortie normale", "montagne", "encadrée", "1500", "accompagnée", "sunset");
        // initialisation de faker
        $faker = Faker\Factory::create('fr_FR');

        // créer 20 users
        for ($i = 0; $i < 20; $i++) {
            $user = new User;
            $user->name = $faker->lastName;
            $user->firstname = $faker->firstName;
            $user->email = $faker->unique()->email;
            $user->password = bcrypt('12345678');
            $user->tel = $faker->phoneNumber;
            $user->statut = rand(1, 3);
            $user->role = 'membre';
            $user->ajour = true;
            $user->save();
        }

        //créer un user admin
        $user = new User;
        $user->name = 'a';
        $user->firstname = 'a';
        $user->email = 'a@a.fr';
        $user->password = bcrypt('a');
        $user->tel = '0692 000 000';
        $user->role = 'admin';
        $user->statut = rand(1, 3);
        $user->ajour = true;
        $user->save();
        // creation de 6 sorties
        for ($i = 0; $i < 6; $i++) {
            $date = date('d-m-Y');
            $delai = rand(-20, 40);
            $date2 = strftime('%Y-%m-%d', strtotime($date . '+' . $delai . ' day'));

            Sor::create([

                'dat' => $date2,
                'typ' => $array[rand(0, 6)],
                'comment_sor' => $faker->text,
            ]);
        }
        // creation de 20 participations sur les sorties existantes et les users existants sor_id et user_id min et max
        for ($i = 0; $i < 20; $i++) {
            $particip = new Particip;
            $particip->comment_particip = $faker->text;
            $particip->sor_id =  rand(Sor::min('id'), Sor::max('id'));
            $particip->user_id =  rand(User::min('id'), User::max('id'));
            $particip->typ = 'typ';
            $particip->save();
        }
    }
}
