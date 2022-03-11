<?php
include_once "connLimiti.php";
session_start();

$telefono = $_POST['cmbServizio'];

$stmt = $conn->prepare("UPDATE soci SET nTelefono=? WHERE mail = ?");
$stmt->bind_param("ss", $telefono, $mail);
$stmt->execute();

$risultato = $stmt->get_result();
//echo $risultato;

header('Location:profilo.php');


/*if ($risultato == FALSE)     // se ci sono problemi
{
    echo "Query con errori: <br>";
    echo mysqli_error($conn);     // scrivo eventuali errori
}*/
