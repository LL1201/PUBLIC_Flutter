<?php
//-- Connessione al DB

// definisco 4 variabili:

// macchina sulla quale è il dbms
$dbHost = "localhost";
// utente dbms
$dbUsr = "utenteLimiti";
// password
$dbPass = "UtenteLimiti123";
// nome db
$dbName = "bdt";

// stabilisco la connessione
$conn = new mysqli($dbHost, $dbUsr, $dbPass, $dbName);

// la connessione è attiva?
if ($conn->connect_error) {
    // se ci sono errori interrompo lo script
    die("connessione fallita " . mysqli_connect_error());
}
//echo "connessione riuscita <br/>"; //se va tutto bene scrivo messaggio
