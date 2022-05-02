<?php
include_once "connessione.php";

$query = "SELECT numPiede FROM clienti GROUP BY numPiede"; //query per selezionare tutti i numeri di piede
$risultato = $conn->query($query);

//ciclo per popolare la combo box sull'index
while ($row = $risultato->fetch_assoc()) {
    echo '<option value="' . $row['numPiede'] . '"> ' . $row['numPiede'] . ' </option>';
}
