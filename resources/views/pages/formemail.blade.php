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
        height: 400,
        width: 800,
        menubar: false,
        plugins: ' link ',
        toolbar: 'bold italic underline forecolor  fontsizeselect | alignleft aligncenter alignright | link removeformat |',
        forced_root_block : false,
        });
    </script>
</head>
<body>
    <h3>Création du mail</h3>
    <?php
        //définition des variables :
        // - caractéristiques de la sortie (date, type, commentaire)
        // - liste des participants (noms, emails)
        $mailtext = "<p class='font-weight-bold mb-0'>Sortie du ".Date::parse($sor->dat)->format('l j F')." , ".$sor->typ."</p>";
        $mailtext = $mailtext."<p class='col col-lg-7 p-0 mb-2'>".$sor->comment_sor."</p>";
    ?>
    <form class="form-horizontal" method="POST" action="{{ route("send") }}">
        {{ csrf_field() }}
        {{ method_field('GET') }}
    <textarea name="text" value="{{ $mailtext }}" class="editme">{{ $mailtext }}</textarea><br>
    {{-- TODO Faire un foreach pour extraire 2 variables :
            - la liste des participants
            - la liste des emails
            (voir pusharray, rajout des éléments à un tableau)
            Coller ces variables dans un input ou textarea pour pouvoir les modifier.
            Ces champs sont récupérés avec la fonction request de input dans le controller (un pour users, un pour emails)

            --}}
    {{-- <input type="text" name="text" value="{{ $mailtext }}">Contenu du mail<br> --}}
        {{-- <input type="text" name="firstname"> Prénom<br>
        <input type="email" name="email" value="email@google.com"> Email<br>
        <input type="text" name="tel" value="0000000000"> Téléphone<br><br>
        <input type="radio" name="role" value="invité"> Invité<br>
        <input type="radio" name="role" value="membre" checked> Membre<br>
        <input type="radio" name="role" value="admin"> Admin<br>
        <input type="radio" name="role" value="superadmin"> Super-admin<br>
        <input type="hidden" name="password" value={{bcrypt('abcd')}}> --}}
        <button type="submit">Enregistrer</button>
    </form>

</body>
</html>




