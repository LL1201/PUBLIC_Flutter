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

$password = $_POST['txtPassword'];
$passwordNuova = password_hash($_POST['txtPasswordNuova'], PASSWORD_DEFAULT);
$mail = $_SESSION['utente'];
$flag = false;

$passwordCheck = $conn->query("SELECT mail, passwordU FROM soci");
while ($row = $passwordCheck->fetch_assoc()) {
    if ($row['mail'] == $mail && password_verify($password, $row['passwordU'])) {
        $flag = true;
        $stmt = $conn->prepare("UPDATE soci SET passwordU=? WHERE mail=?");
        $stmt->bind_param("ss", $passwordNuova, $mail);
        $stmt->execute();
        break;
    }
}

if (!$flag)
    echo 'Password errata. Impossibile modificare la password.';

//$risultato = $stmt->get_result();
//echo $risultato;

//header('Location:profilo.php');
