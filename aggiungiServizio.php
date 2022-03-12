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

$query = "SELECT idSocio FROM soci WHERE mail='" . $_SESSION['utente'] . "'";
$id = $conn->query($query);

$servizio = $_POST['cmbServizio'];

$stmt = $conn->prepare("INSERT INTO capace(FK_idSocio, FK_idServizio) VALUES(?,?)");
$stmt->bind_param("is", $id, $servizio);
$stmt->execute();

$risultato = $stmt->get_result();
//echo $risultato;

header('Location:profilo.php');
