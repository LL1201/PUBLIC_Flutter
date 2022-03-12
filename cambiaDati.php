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

$telefono = $_POST['txtNumero'];
$mail = $_SESSION['utente'];
$via = $_POST['txtVia'];

$stmt = $conn->prepare("UPDATE soci SET nTelefono=?, via=? WHERE mail = ?");
$stmt->bind_param("sss", $telefono, $via, $mail);
$stmt->execute();

$risultato = $stmt->get_result();
//echo $risultato;

header('Location:profilo.php');


/*if ($risultato == FALSE)     // se ci sono problemi
{
    echo "Query con errori: <br>";
    echo mysqli_error($conn);     // scrivo eventuali errori
}*/
