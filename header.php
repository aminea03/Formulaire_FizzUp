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
    <script src="https://use.fontawesome.com/1c05a796f5.js"></script>

    
    <script type="text/javascript">

    // Script modification couleur étoile notation

    function getRate(id){
        var id=document.getElementById(id).id;
        var rate=document.getElementById(id+"_hidden").value;
        for(var i=rate;i>=1;i--)
        {
            document.getElementById("rate"+i).src="img/yellowStar.png";
        }
        var id=parseInt(rate)+1;
        for(var j=id;j<=5;j++)
        {
            document.getElementById("rate"+j).src="img/greyStar.png";
        }

        document.getElementById("rate").setAttribute("value", rate);

    }

    // Script affichage du message envoyé
    
    function load(id){
        var imageCacheId = document.getElementById(id).id;
        var message = document.getElementById(imageCacheId+"_hidden").value;
        document.getElementById(imageCacheId+"_div").innerHTML= message;
    }
    

    </script>

    <!--API mise en forme du texte-->
    <script src="vendor/tinymce/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#comment',
        menu: {
            edit: { title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall' },
            format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript' },
            tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | a11ycheck code wordcount' },
        },     
        menubar: 'edit format',
        plugins: 'lists advlist visualchars',
        toolbar: 'bold italic underline | bullist numlist | alignleft aligncenter alignright alignjustify | outdent indent | visualchars |' ,
        toolbar_mode: 'floating', 
        entity_encoding: "raw",
        encoding : 'xml',
        
      });
    </script>   
</head>
<body>
    <header class="site-header">
        <div class="site-header-left">
            <a href="https://app.fizzup.com/start">
                <img class="logo-Fizzup" src="img/logoFizzup.png" alt="FIZZUP Logo">
            </a>
            <!--Pour affichage du menu burger sur mobile-->
            <label for="toggle" id="burger">☰</label>
            <input type="checkbox" id="toggle">
            <!--Affichage des liens de navigation-->
            <ul class="nav-list" >
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
 