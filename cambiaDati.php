<?php
include_once "connessione.php";
session_start();

$cognome = $_POST['txtCognome'];
$nome = $_POST['txtNome'];
$telefono = $_POST['txtNumero'];
$mail = $_POST['txtMail'];

$stmt = $conn->prepare("UPDATE soci SET cognome=?, nome=?, nTelefono=? WHERE mail = ?");
$stmt->bind_param("ssss", $cognome, $nome, $telefono, $mail);
$stmt->execute();

$risultato = $stmt->get_result();
//echo $risultato;

header('Location:profilo.php');


/*if ($risultato == FALSE)     // se ci sono problemi
{
    echo "Query con errori: <br>";
    echo mysqli_error($conn);     // scrivo eventuali errori
}*/
