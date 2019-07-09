<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Sorties Parapangue</title>
</head>
<body>
    <p>Element fixe du mail (adresse, entête, tel, logo).</p>
    element dynamique :
        - caractéristiques sortie (date, type, commentaire)
            <?php
                echo session('mailtext');
            ?>
        - participants
            {{-- {{session('participants')}} --}}
</body>
</html>
