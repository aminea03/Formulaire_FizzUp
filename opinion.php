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
        $lengthResults=count($results);

        $filteredComment = [];
        // Insertion des résultats en fonction du filtre note choisi

        if(isset($_GET['sortingRate5'])) {
            for($i=($lengthResults-1); $i>=0; $i--){
                if ($results[$i]['rate']==5){
                    array_push($filteredComment, $results[$i]);
                }
            }
        }
        
        if(isset($_GET['sortingRate4'])) {
            for($i=($lengthResults-1); $i>=0; $i--){
                if ($results[$i]['rate']==4){
                    array_push($filteredComment, $results[$i]);
                }
            }
        }
        if(isset($_GET['sortingRate3'])) {
            for($i=($lengthResults-1); $i>=0; $i--){
                if ($results[$i]['rate']==3){
                    array_push($filteredComment, $results[$i]);
                }
            }
        }
        if(isset($_GET['sortingRate2'])) {
            for($i=($lengthResults-1); $i>=0; $i--){
                if ($results[$i]['rate']==2){
                    array_push($filteredComment, $results[$i]);
                }
            }
        }
        if(isset($_GET['sortingRate1'])) {
            for($i=($lengthResults-1); $i>=0; $i--){
                if ($results[$i]['rate']==1){
                    array_push($filteredComment, $results[$i]);
                }
            }
        }
        if(isset($_GET['sortingRate0'])) {
            for($i=($lengthResults-1); $i>=0; $i--){
                if ($results[$i]['rate']==0){
                    array_push($filteredComment, $results[$i]);
                }
            }
        }

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
            <div class="filtreContainer">
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
            </div>
        </div>        
        <div class="divForm">
            <button class="button" type="submit" value="valider">Valider</button>
        </div>
    </form>

    <section class="opinion-page">

        <!--Affichage dynamique des derniers avis-->

        <?php if (isset($_GET['sortingRate5']) ||
                isset($_GET['sortingRate4']) ||
                isset($_GET['sortingRate3']) ||
                isset($_GET['sortingRate2']) ||
                isset($_GET['sortingRate1']) ||
                isset($_GET['sortingRate0']) ): ?>
            <?php for($i=($length-1); $i>=0; $i--): ?>
                <div class="opinion-container-avis">
                    <h2 class="opinion-user"><?=$filteredComment[$i]['username']?></h2>
                    <!--Affichage de la notation-->
                    <div class="starsContainer">
                        <?php for($j=$filteredComment[$i]['rate']; $j>=1; $j--): ?>
                            <img src="img/yellowStar.png" class="rateStarSmall">
                        <?php endfor ?>
                        <?php for($k=($filteredComment[$i]['rate']+1); $k<=5; $k++): ?>
                            <img src="img/greyStar.png" class="rateStarSmall">
                        <?php endfor ?>
                    </div>
                    <div class="userComment">
                        <iframe id="imageCache_<?=$filteredComment[$i]['idComment']?>" src="img/logoFizzup.png" alt="logo fizzup" onload="load(this.id)" width="0" height="0" class="displayNone"></iframe>
                        <input type="hidden" id="imageCache_<?=$filteredComment[$i]['idComment']?>_hidden" value="<?=html_entity_decode($filteredComment[$i]['comment']);?>" >
                        <div id="imageCache_<?=$filteredComment[$i]['idComment']?>_div"></div>
                    </div>
                    <div class="imageAvis">
                        <img class="imageAvis" src="imgUpload/<?=$filteredComment[$i]['filename']?>" alt="">
                    </div>
                    <p class="createdAt">Avis publié le : <?=date('d F Y', strtotime($filteredComment[$i]['createdAt']))?></p>
                </div>
            <?php endfor ?>
        <?php else : ?>
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
        <?php endif ?>
    </section>
</main>



<?php require_once 'footer.php';?>