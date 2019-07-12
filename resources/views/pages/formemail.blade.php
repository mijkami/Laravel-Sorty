<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création du mail</title>
    <script src="https://cdn.tiny.cloud/1/yw2alpvctek8wufoxpxk8yffewrm15kpefdwcxbq1phsmq9a/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
        selector: "textarea.editme",
        selector : "textarea:not(.mceNoEditor)",
        height: 600,
        width: 1200,
        menubar: false,
        plugins: ' link ',
        toolbar: 'bold italic underline forecolor  fontsizeselect | alignleft aligncenter alignright | link removeformat |',
        forced_root_block : false,
        });
    </script>
</head>
<body>
    <?php

        // corps du message
            $mailtext='';$virgule=''; $x=1;$title= Date::parse($sor->dat)->format('l j F  ').' / sortie '.$sor->typ;
            $comment=$sor->comment_sor; $n=$sor->id;
            session(['origine' => 'send/'.$n]);

            $mailtext='<h3>Parapangue<br>'.$title.'</h3>';
            $mailtext=$mailtext.'<font color="blue">'.$comment.'<br><br></font><b>Liste des participants</b>';
            $mailtext=$mailtext.'<table style="text-align: left; width: 1000PX; height: 25px;" border="0" cellpadding="2" cellspacing="2"><tbody>';
        // - liste des participants
         foreach($particips as $particip)
        {
        if($particip->sor_id==$n)
        {
            if ($x == 9){$mailtext=$mailtext. "<tr><td><td><u><font color='blue'>Liste d'attente<br></u></tr>"; }
                $mailtext=$mailtext. '<tr>
                  <td style="width: 20px;">';
                  $mailtext=$mailtext.  $x. '</td>
                  <td style="width: 120px;"><font color="white"> </font>';
                  if ($x > 8){$mailtext=$mailtext.  '<font color="blue">'; }
                  $mailtext=$mailtext." ".$particip->User->firstname.' '.$particip->User->name.'</td>
                  <td style="width: 90px;">';
                  if ($x > 8){$mailtext=$mailtext.  '<font color="blue">'; }
                  $mailtext=$mailtext.  '<FONT size="2pt"> tel :'. $particip->User->tel.' </td>
                  <td style="width:60px;">';
                   if ($x > 8){$mailtext=$mailtext.  '<font color="blue">'; }
                 $mailtext=$mailtext.  '<FONT size="2pt"> inscr. :'.Date::parse($particip->inscription)->format(' j F ').'</font></td>
                  <td style="width: 180px;">';
                 if ($x > 8){$mailtext=$mailtext.  '<font color="blue">'; }
                  $mailtext=$mailtext.  '<FONT size="2pt">'.$particip->comment_particip.' </td>
                  </tr>' ;
                  if ($x > 8){$mailtext=$mailtext.  ''; }
                  $x=$x+1;
            }
        }
            $mailtext=$mailtext. " </tbody></table>

                    <div style='margin-left: 40px;'><br>
                    Ce courriel est automatique et est envoyé aux différents participants, depuis le site parapangue.re<br>
                    -> vous pouvez échanger entre vous pour préparer cette sortie, les emails des participants sont dans l'entête du courriel<br>
                    -> accès au planning par le menu 'planning sorties' du site http://parapangue.re ou <br>
                    -> directement par http://sorties.16mb.com<br>
                    <br>
                    INFOS : <br>
                    -> le planning est définitif à H-24,<br>
                    -> la participation financière à la sortie sera due en cas d'abscence (cf décision du cd)<br>
                    -> le tel de Pierre Killian : 0692 77 73 58<br>
                    -> le tel de Franck, notre chauffeur : 0692 92 24 32<br><br></font></div>
                    ";

    ?>
     <h3>Création du mail</h3>
        <form class="form-horizontal" method="POST" action="{{ route('send') }}">
            {{ csrf_field() }}
            {{ method_field('GET') }}
            <button type="submit" class="btn btn-primary">Envoyer le courriel</button> <a class="btn btn-secondary" href="/particips" role="button">annuler</a>
            <textarea style="vertical-align: top;" rows = "5" cols = "90" name="commentmail" value="{{$mailtext}}"  >{{$mailtext}}</textarea>
            <input  type="hidden"  name="title" value="{{$title}}">
            <input  type="hidden"  name="id" value="{{$sor->id}}">
            <input  type="hidden"  name="text" value="{{$mailtext}}">

        </form>
</body>
</html>





