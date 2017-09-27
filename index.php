<?php

session_start();

require_once("modele/function.php");

if (!isset($_REQUEST['action'])) {
    $action = 'accueil';
} else {
    $action = $_REQUEST['action'];
}

include("vues/v_entete.php");

switch ($action) {
    case 'accueil':
        include("vues/v_accueil.php");
        break;
    case 'voirVols' :
        $lesVols = getLesVols(); //appel la fonction getLesVolss
        include("vues/v_vols.php");
        break;
    case 'formReservation':
            $_SESSION['numero']=$_REQUEST['numero'];
            $lesVols=getLesVols();
            include("vues/v_formReservation.php");
           // session_destroy();
            break;
    case 'validerReservation':
            $_SESSION['numero']=$_REQUEST['numero'];
            $_SESSION['nom']=$_REQUEST['nom'];
            $_SESSION['prenom']=$_REQUEST['prenom'];
            $reservation = validerReservation();
            include("vues/v_confirmReservation.php");
            break;
}

include("vues/v_pied.php");
?>