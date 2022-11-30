<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!--Affichage dynamique du titre de la page-->
    <title>
        <?php if(isset ($title)) {
            echo $title;
        } else {
            echo "Fizzup";
        } ?>
    </title>
    <meta name="description" content="Page du site Fizzup">
    <link href="CSS/reset.css" rel="stylesheet">
    <link href="CSS/stylesheet.css" rel="stylesheet">
    <script src="vendor/tinymce/tinymce/tinymce.min.js" referrerpolicy="origin"></script>

    <!--API mise en forme du texte-->
    <script>
      tinymce.init({
        selector: '#comment',
        menu: {
            edit: { title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall' },
            format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript' },
            tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | a11ycheck code wordcount' },
        },     
        menubar: 'edit format',
        plugins: 'emoticons lists advlist visualchars',
        toolbar: 'bold italic underline | bullist numlist | alignleft aligncenter alignright alignjustify | outdent indent | visualchars |' + 'image | emoticons',
        toolbar_mode: 'floating'
      });
    </script>   
</head>
<body>
    <header class="site-header">
        <div class="site-header-left">
            <a href="https://app.fizzup.com/start">
                <img class="logo-Fizzup" src="img/logoFizzup.png" alt="FIZZUP Logo">
            </a>
            <ul class="nav-list">
                <li class="nav-workout">
                    <a class="nav-link" href="https://app.fizzup.com/dashboard">Entrainements</a>
                </li>
                <li class="nav-program">
                    <a class="nav-link" href="https://app.fizzup.com/programs">Programmes</a>
                </li>
                <li class="nav-nutrition">
                    <a class="nav-link" href="https://app.fizzup.com/nutrition">Nutrition</a>
                </li>
                <li class="nav-advice">
                    <a class="nav-link" href="http://www.fizzup.com/fr/blog/">Conseils</a>
                </li>
            </ul>
        </div>
        <div class="site-header-right">
            <a class="connection_button" href="https://app.fizzup.com/login?lc=fr">Connexion</a>
        </div>
    </header>
    <main>
 