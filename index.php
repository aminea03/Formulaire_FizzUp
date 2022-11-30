<?php 
require_once 'function.php';

$title="Votre avis";
require_once 'header.php';

//connexion DB
require_once 'loginDB.php';
$connexion = new mysqli($hn, $un, $pw, $db);
if ($connexion->connect_error) {
    die ('Erreur Fatale');
}

//debug($_POST);

?>

<!--Code HTML -->

<section class="form-section">
    <h1>Votre avis nous intéresse</h1>
    <form action="" method="POST" class="opinion-form">
        <!--<input type="hidden" name="" value="<?=$idComment?>">-->
        <div class="divForm">
            <label for="username">Votre pseudo</label>
            <br>
            <input type="text" name="username" id="username" placeholder="Pseudo">
        </div>
        <div class="divForm">
            <label for="email">Votre email</label>
            <br>
            <input type="email" name="email" id="email" placeholder="pseudo@domain.com">
        </div>

        <div class="divForm">
            <label for="rate">Note</label>
            <br>
            <!--système de notation-->
            <input type="" name="rate" id="rate" >
        </div>

        <div class="divForm">
            <label for="comment">Votre commentaire</label>
            <br>
            <textarea name="comment" id="comment"></textarea>
        </div>

        <!--<div class="divForm">
            <label for=""></label>
            <br>
            <input type="" name="" id="">
        </div>
        <div class="divForm">
            <label for=""></label>
            <br>
            <input type="" name="" id="">
        </div>-->
        <div class="divButton">
            <button class="button" type="submit" value="valider">Envoyer</button>
        </div>

    </form>
</section>

<section class="opinion-section">
    <h1>Les avis des internautes</h1>
    <div class="opinion-grid">
        <!--affichage dynamique des derniers avis-->
    </div>
    <a class="opinion-button" href="opinion.php">Voir tous les avis</a>

</section>




<?php require_once 'footer.php';?>

