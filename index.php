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

// Formatage des données soumises 
if (isset($_POST['username']) &&
    isset($_POST['email']) &&
    isset($_POST['rate']) &&
    isset($_POST['comment'])) {
        $idComment= 0;
        $username = htmlentities($_POST['username']);
        $email=htmlentities($_POST['email']);
        $rate = intval($_POST['rate']);
        $comment = htmlentities($_POST['comment']);
        date_default_timezone_set('Europe/Paris');
        $createdAt = date('Y-m-d H:i:s');   


        if (isset($_FILES['filename']) && $_FILES['filename']['size']>0){
            $filename = $_FILES['filename']['name'];
            $tmpname = $_FILES['filename']['tmp_name'];
            $filenameType = exif_imagetype($tmpname);
            if (!$filenameType) {
                die('Le fichier chargé n\'est pas une image.');
            }
            $filenameExtension = image_type_to_extension($filenameType, true);

            $name = bin2hex(random_bytes(16)) . $filenameExtension;

            $folder = './imgUpload/'.$name;
            move_uploaded_file($tmpname, $folder);
        }
        
    }
        
// Insertion des données dans la DB
if($idComment===0){
    $queryInsert = "INSERT INTO comment (`username`, `email`, `rate`, `comment`, `filename`, `createdAt`) VALUES ('$username', '$email', '$rate', '$comment', '$name', '$createdAt')";
    $resultInsert=$connexion->query($queryInsert);
    if (!$resultInsert) {
        echo "Echec de l'insertion";
        var_dump($comment);
    }
}

//Récupération des données de la table comment de la db
$queryComment = "SELECT * FROM comment ORDER BY createdAt";
$resultComment=$connexion->query($queryComment);
if(!$resultComment){
    die('Erreur Fatale');
} 

//Insertion dans un tableau
$results=[];
while($result=mysqli_fetch_assoc($resultComment)){
  array_push($results, $result);
}
$length=count($results);


//var_dump($idComment);
//debug($_POST);
//debug($_FILES);

?>

<!--Code HTML -->

<main class="indexMain">
    <section class="form-section">
        <h1>Votre avis nous intéresse</h1>
        <form action="" method="POST" class="opinion-form" enctype="multipart/form-data">
            <!--<input type="hidden" name="" value="<?=$idComment?>">-->
            <div class="divForm">
                <label for="username">Votre pseudo</label>
                <br>
                <input type="text" name="username" id="username" placeholder="Pseudo" required>
            </div>
            <div class="divForm">
                <label for="email">Votre email</label>
                <br>
                <input type="email" name="email" id="email" placeholder="pseudo@domain.com" required>
            </div>
            <div class="divForm">
                <label for="rate">Note</label>
                <br>
                <!--système de notation-->
                <div class="starsContainer">
                    <input type="hidden" id="rate1_hidden" value="1">
                    <img src="img/greyStar.png"  onclick="getRate(this.id)" id="rate1" class="rateStar">
                    <input type="hidden" id="rate2_hidden" value="2">
                    <img src="img/greyStar.png"  onclick="getRate(this.id)" id="rate2" class="rateStar">
                    <input type="hidden" id="rate3_hidden" value="3">
                    <img src="img/greyStar.png"  onclick="getRate(this.id)" id="rate3" class="rateStar">
                    <input type="hidden" id="rate4_hidden" value="4">
                    <img src="img/greyStar.png"  onclick="getRate(this.id)" id="rate4" class="rateStar">
                    <input type="hidden" id="rate5_hidden" value="5">
                    <img src="img/greyStar.png"  onclick="getRate(this.id)" id="rate5" class="rateStar">
                </div>
                <input type="hidden" id="rate" name="rate" >

            </div>
            <div class="divForm">
                <label for="comment">Votre commentaire</label>
                <br>
                <textarea name="comment" id="comment" ></textarea>
            </div>
            <input type="file" name="filename" accept="image/*" >
            <br>
            <p>(Taille maximum : 4 Mo)</p>
            <br>
            <button type="submit" class="form-button" value="Envoyer">Envoyer</button>
        </form>

    </section>

    <section class="opinion-section">
        <h1>Les avis des internautes</h1>
        <div class="opinion-grid">
            <!--affichage dynamique des 3 derniers avis-->
            <?php for($i=($length-1); $i>($length-4); $i--):?>
                <div class="opinion-container">
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
        </div>
        <a class="opinion-button" href="opinion.php">Voir tous les avis</a>

    </section>

</main>


<?php require_once 'footer.php';?>

