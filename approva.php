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

$mail = $_POST['btnApprova'];
$segr = $_GET['segr'];
echo $segr;

$stmt = $conn->prepare("UPDATE soci SET checked=TRUE WHERE mail=?");
$stmt->bind_param("s", $mail);
$stmt->execute();
$risultato = $stmt->get_result();

if ($segr == 'Sì') {
    /*$queryId = $conn->prepare("SELECT idSocio FROM soci WHERE mail=?");
    $queryId->bind_param("s", $mail);
    $queryId->execute();
    $id = $queryId->get_result();*/

    $queryInsC = $conn->prepare("INSERT INTO capace(FK_idSocio, FK_idServizio) VALUES((SELECT idSocio FROM soci WHERE mail=?), 8)");
    $queryInsC->bind_param("s", $mail);
    $queryInsC->execute();

    $queryUpdate = $conn->prepare("UPDATE soci SET richiestaSegretario=0 WHERE mail=?");
    $queryUpdate->bind_param("s", $mail);
    $queryUpdate->execute();
}
header('Location:management.php');
