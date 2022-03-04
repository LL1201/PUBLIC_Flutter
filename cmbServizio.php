<?php
include_once "connessione.php";

$query = "SELECT idServizio, descrizione FROM servizi";
$risultato = $conn->query($query);

//ciclo per popolare la combo box sull'index
while ($row = $risultato->fetch_assoc()) {
    echo '<option value="' . $row['idServizio'] . '"> ' . $row['descrizione'] . ' </option>';
}
