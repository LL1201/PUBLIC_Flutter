<?php
include_once "connessione.php";

$query = "SELECT idZona, descrizione FROM zone";
$risultato = $conn->query($query);

//ciclo per popolare la combo box sull'index
while ($row = $risultato->fetch_assoc()) {
    echo '<option value="' . $row['idZona'] . '"> ' . $row['descrizione'] . ' </option>';
}
