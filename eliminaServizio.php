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

$id = $_POST['btnElimina'];

$stmt = $conn->prepare("DELETE FROM capace WHERE idCapace=?");
$stmt->bind_param("i", $id);
$stmt->execute();

$risultato = $stmt->get_result();
//echo $risultato;

header('Location:profilo.php');
