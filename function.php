<?php
//Fonction pour debug des variables
function debug($variable){
    echo '<pre>'.print_r($variable, true).'</pre>';
}

//Fonction tri croissant des notes
function decreasingRate ($a,$b) {
    if ($a == $b) {
        return 0;
    }
    return $a['rate'] > $b['rate'];
}

//Fonction tri décroissant des notes
function increasingRate ($a,$b) {
    if ($a == $b) {
        return 0;
    }
    return $a['rate'] < $b['rate'];
}

//Fonction tri par dates croissantes
function decreasingDate ($a,$b) {
    if ($a == $b) {
        return 0;
    }
    return $a['createdAt'] > $b['createdAt'];
}

//Fonction tri par dates décroissantes
function increasingDate ($a,$b) {
    if ($a == $b) {
        return 0;
    }
    return strtotime($a['createdAt']) < strtotime($b['createdAt']);
}