<?php
include_once "connLimiti.php";

$query = "SELECT idServizio, descrizione FROM servizi WHERE idServizio<>8"; //non viene mostrato il servizio segretario
$risultato = $conn->query($query);

//ciclo per popolare la combo box sull'index
while ($row = $risultato->fetch_assoc()) {
    echo '<option value="' . $row['idServizio'] . '"> ' . $row['descrizione'] . ' </option>';
}
