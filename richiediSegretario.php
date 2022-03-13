<?php

session_start();
if (!isset($_SESSION['utente'])) //se la sessione non è
{
    header('Location:login.php');
    exit;
}

if (!isset($_SESSION['ruolo']))
    include_once "connLimiti.php";
else
    switch ($_SESSION['ruolo']) {
        case 'Approvato':
            include_once "connApprovato.php";
            break;
        case 'Segretario':
            include_once "connSegretario.php";
            break;
        default:
            include_once "connLimiti.php";
            break;
    }

$queryInsC = $conn->prepare("UPDATE soci SET richiestaSegretario=1 WHERE mail=?");
$queryInsC->bind_param("s", $_SESSION['utente']);
$queryInsC->execute();

header('Location:profilo.php');
