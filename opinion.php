<?php 
require_once 'function.php';

$title="Avis - Fizzup";
require_once 'header.php';

//connexion DB
require_once 'loginDB.php';
$connexion = new mysqli($hn, $un, $pw, $db);
if ($connexion->connect_error) {
    die ('Erreur Fatale');
}

//Récupération des données de la table comment de la db
$queryComment = "SELECT * FROM comment ORDER BY createdAt";
$resultComment=$connexion->query($queryComment);
if(!$resultComment){
    die('Erreur Fatale');
} 


if (isset($_GET['sortingRate5']) ||
    isset($_GET['sortingRate4']) ||
    isset($_GET['sortingRate3']) ||
    isset($_GET['sortingRate2']) ||
    isset($_GET['sortingRate1']) ||
    isset($_GET['sortingRate0']) ) {

        $results=[];
        while($result=mysqli_fetch_assoc($resultComment)){
            array_push($results, $result);
        }

        $filteredComment = [];
        // Insertion des résultats en fonction du filtre note choisi

        if(isset($_GET['sortingRate5'])) {
            foreach ($results as $comment){
                if ($comment['rate']==5) {
                    array_push($filteredComment, $comment);
                }
            }
        }
        
        if(isset($_GET['sortingRate4'])) {
            foreach ($results as $comment){
                if ($comment['rate']==4) {
                    array_push($filteredComment, $comment);
                }
            }
        }
        if(isset($_GET['sortingRate3'])) {
            foreach ($results as $comment){
                if ($comment['rate']==3) {
                    array_push($filteredComment, $comment);
                }
            }
        }
        if(isset($_GET['sortingRate2'])) {
            foreach ($results as $comment){
                if ($comment['rate']==2) {
                    array_push($filteredComment, $comment);
                }
            }
        }
        if(isset($_GET['sortingRate1'])) {
            foreach ($results as $comment){
                if ($comment['rate']==1) {
                    array_push($filteredComment, $comment);
                }
            }
        }
        if(isset($_GET['sortingRate0'])) {
            foreach ($results as $comment){
                if ($comment['rate']==0) {
                    array_push($filteredComment, $comment);
                }
            }
        }
        //var_dump($filteredComment);


        // changer le nom du tableau "results"
        $length=count($filteredComment);

        if(isset($_GET['commentSorting'])){
            if($_GET['commentSorting']== "decreasingRate"){
                usort($filteredComment,'decreasingRate');
            } else if($_GET['commentSorting']== "increasingRate"){
                usort($filteredComment,'increasingRate');
            } else if($_GET['commentSorting']== "decreasingDate"){
                usort($filteredComment,'decreasingDate');
            } else if($_GET['commentSorting']== "increasingDate"){
                usort($filteredComment,'increasingDate');
            }
        }
    

} else {
    //Insertion des données de la db dans un tableau
    $results=[];
    while($result=mysqli_fetch_assoc($resultComment)){
        array_push($results, $result);
    }
    $length=count($results);

    //Tri des résultats

    if(isset($_GET['commentSorting'])){
        if($_GET['commentSorting']== "decreasingRate"){
            usort($results,'decreasingRate');
        } else if($_GET['commentSorting']== "increasingRate"){
            usort($results,'increasingRate');
        } else if($_GET['commentSorting']== "decreasingDate"){
            usort($results,'decreasingDate');
        } else if($_GET['commentSorting']== "increasingDate"){
            usort($results,'increasingDate');
        }
    }
}



?>

<main class="opinionMain">
    <h1 class="opinion-title">Les avis des internautes</h1>
    <!--Formulaire de tri des résultats-->
    <form action="" method="get" class="opinionForm">
        <div class="chartForm">
            <label for="commentSorting">Trier les résultats par :  </label>
            <select id="commentSorting" name="commentSorting" class="opinionForm-option">
                <option value="decreasingDate" selected >Les derniers résultats</option>
                <option value="increasingDate">Les premiers résulats</option>
                <option value="decreasingRate">Notes décroissantes</option>
                <option value="increasingRate">Notes croissante</option>
            </select>
        </div>
        <div class="filtre">
            <label for="commentSorting">Filtrer les résultats par notes : </label>
                <div class="sortingStarsContainer">
                        <input type="checkbox" name="sortingRate5" id="sortingRate5" value="5">
                        <img src="img/yellowStar.png" class="rateStarVerySmall">
                        <img src="img/yellowStar.png" class="rateStarVerySmall">
                        <img src="img/yellowStar.png" class="rateStarVerySmall">
                        <img src="img/yellowStar.png" class="rateStarVerySmall">
                        <img src="img/yellowStar.png" class="rateStarVerySmall">
                </div>
                <div class="sortingStarsContainer">
                        <input type="checkbox" name="sortingRate4" id="sortingRate4" value="4">
                        <img src="img/yellowStar.png" class="rateStarVerySmall">
                        <img src="img/yellowStar.png" class="rateStarVerySmall">
                        <img src="img/yellowStar.png" class="rateStarVerySmall">
                        <img src="img/yellowStar.png" class="rateStarVerySmall">
                        <img src="img/greyStar.png" class="rateStarVerySmall">
                </div>
                <div class="sortingStarsContainer">
                        <input type="checkbox" name="sortingRate3" id="sortingRate3" value="3">
                        <img src="img/yellowStar.png" class="rateStarVerySmall">
                        <img src="img/yellowStar.png" class="rateStarVerySmall">
                        <img src="img/yellowStar.png" class="rateStarVerySmall">
                        <img src="img/greyStar.png" class="rateStarVerySmall">
                        <img src="img/greyStar.png" class="rateStarVerySmall">
                </div>
                <div class="sortingStarsContainer">
                        <input type="checkbox" name="sortingRate2" id="sortingRate2" value="2">
                        <img src="img/yellowStar.png" class="rateStarVerySmall">
                        <img src="img/yellowStar.png" class="rateStarVerySmall">
                        <img src="img/greyStar.png" class="rateStarVerySmall">
                        <img src="img/greyStar.png" class="rateStarVerySmall">
                        <img src="img/greyStar.png" class="rateStarVerySmall">
                </div>
                <div class="sortingStarsContainer">
                        <input type="checkbox" name="sortingRate1" id="sortingRate1" value="1">
                        <img src="img/yellowStar.png" class="rateStarVerySmall">
                        <img src="img/greyStar.png" class="rateStarVerySmall">
                        <img src="img/greyStar.png" class="rateStarVerySmall">
                        <img src="img/greyStar.png" class="rateStarVerySmall">
                        <img src="img/greyStar.png" class="rateStarVerySmall">
                </div>
                <div class="sortingStarsContainer">
                        <input type="checkbox" name="sortingRate0" id="sortingRate0" value="0">
                        <img src="img/greyStar.png" class="rateStarVerySmall">
                        <img src="img/greyStar.png" class="rateStarVerySmall">
                        <img src="img/greyStar.png" class="rateStarVerySmall">
                        <img src="img/greyStar.png" class="rateStarVerySmall">
                        <img src="img/greyStar.png" class="rateStarVerySmall">
                </div>
            </label>
        </div>

        <div class="divForm">
            <button class="button" type="submit" value="valider">Valider</button>
        </div>
    </form>

    <section class="opinion-page">

        <!--Affichage dynamique des derniers avis-->
        <?php for($i=($length-1); $i>=0; $i--): ?>
            <div class="opinion-container-avis">
                <h2 class="opinion-user"><?=$results[$i]['username']?></h2>
                <!--Affichage de la notation-->
                <div class="starsContainer">
                    <?php for($j=$results[$i]['rate']; $j>=1; $j--): ?>
                        <img src="img/yellowStar.png" class="rateStarSmall">
                    <?php endfor ?>
                    <?php for($k=($results[$i]['rate']+1); $k<=5; $k++): ?>
                        <img src="img/greyStar.png" class="rateStarSmall">
                    <?php endfor ?>
                </div>
                <div class="userComment">
                    <iframe id="imageCache_<?=$results[$i]['idComment']?>" src="img/logoFizzup.png" alt="logo fizzup" onload="load(this.id)" width="0" height="0" class="displayNone"></iframe>
                    <input type="hidden" id="imageCache_<?=$results[$i]['idComment']?>_hidden" value="<?=html_entity_decode($results[$i]['comment']);?>" >
                    <div id="imageCache_<?=$results[$i]['idComment']?>_div"></div>
                </div>
                <div class="imageAvis">
                    <img class="imageAvis" src="imgUpload/<?=$results[$i]['filename']?>" alt="">
                </div>
                <p class="createdAt">Avis publié le : <?=date('d F Y', strtotime($results[$i]['createdAt']))?></p>
            </div>
        <?php endfor ?>
    </section>
</main>



<?php require_once 'footer.php';?>