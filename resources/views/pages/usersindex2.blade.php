@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">


<h1>Utilisateurs             </h1><br>
<?php

echo ' <a href="/users/create"> nouvelle fiche utilisateur   - </a>';
$x=0;echo ' - Info sur la dernière mise à jour <Font color=green>-Fiche mise à jour</font><Font color=blue>-Fiche nouvelle</font><Font color=red>-Fiche orpheline</font>';

    //statut 1 : fiche présente sans mise à jour
    //       2 : fiche présente avec mise à jour
    //       3 : fiche nouvelle
    //       4 : fiche sans correspondance

// coloration statut couleurs array
$color = array ('', '', '<b><Font color=green>', '<b><Font color=blue>', '<b><Font color=red>');
$x1=0;$x2=0;$x3=0;$x4=0;
      foreach ($users as $user)
      { echo'<tr></tr>';
$x=$x+1;if($x<10){$x="0".$x;}

if ($user->statut==2){$x2=$x2+1;if($x2==1){ echo $color[$user->statut].'Mise à jour<br>';   }}
if ($user->statut==3){$x3=$x3+1;if($x3==1){ echo $color[$user->statut]. 'Nouvelle fiche<br>';   }}
if ($user->statut==4){$x4=$x4+1;if($x4==1){ echo $color[$user->statut].'FICHES A SUPPRIMER ?<br>';   }}
                    echo '<tr> <form  method="POST" action="'.route('users.update', $user->id) .'">'. csrf_field() . method_field('PUT') ;

                    echo' <td >'.$color[$user->statut].$x.' <input  type="text" style="width: 100px;"  name="name" value="'. $user->name .'" >
                     <td ><input  type="text" style="width: 100px;"  name="firstname" value="'. $user->firstname .'" ></td>
                                             <td ><input type="radio" name="ajour" value="1"';
                        if ($user->ajour=='1'){echo 'checked';}
                       echo '> à jour<input type="radio" name="ajour" value="0"';
                        if ($user->ajour=='0'){echo 'checked';}
                        echo '> non</td>

                     <td ><label for="tel" ></label><input  type="text" style="width: 200px;" name="email" value="'. $user->email .'" ></td>
                      <td ><label for="email" ></label><input  type="text" style="width: 160px;" name="tel" value="'. $user->tel .'" ></td>';
if (session('role')=='superadmin'){
                          echo '<td ><input type="radio" name="role" value="invité"';
                        if ($user->role=='invité'){echo 'checked';}
                       echo '> invité / ';

                         echo '<td ><input type="radio" name="role" value="membre"';
                        if ($user->role=='membre'){echo 'checked';}
                       echo '>membre / <input type="radio" name="role" value="admin"';
                        if ($user->role=='admin'){echo 'checked';}
                        echo '>admin / <input type="radio" name="role" value="superadmin"';
                        if ($user->role=='superadmin'){echo 'checked';}

                     echo '>superadmin </td>';

}

     echo '<td style="width: 60px;"><button type="submit" class="btn btn-primary btn-sm">Enregistrer</button><a href="/users/'.$user->id.'/destroy">SUP</a></td>

                    </font></b></form></tr>';
        ?>



      <?php

      }
      ?>



@endsection
