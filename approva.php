<?php
include_once "connessione.php";

$mail = $_POST['btnApprova'];
echo $mail;

$stmt = $conn->prepare("UPDATE soci SET checked=TRUE WHERE mail=?");
$stmt->bind_param("s", $mail);
$stmt->execute();
$risultato = $stmt->get_result();

header('Location:management.php');
