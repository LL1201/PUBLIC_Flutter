<?php
include_once "connessione.php";

$query = "SELECT idCliente, cognome FROM clienti"; //query per selezionare tutti i cognomi
$risultato = $conn->query($query);

//ciclo per popolare la combo box sull'index
while ($row = $risultato->fetch_assoc()) {
    echo '<option value="' . $row['idCliente'] . '"> ' . $row['cognome'] . ' </option>';
}
