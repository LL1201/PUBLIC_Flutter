<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "Connessione: ";
    include_once "connessione.php";
    $tabelle = $_POST['cmbTabellaJoin'];

    switch ($tabelle) {
        case "clientiVendite":
            $query = "SELECT * FROM clienti JOIN vendite ON vendite.cliente=clienti.idCliente";
            $risultato = $conn->query($query);

            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th><th>Cognome</th><th>Nome</th><th>Data acquisto</th><th>Modello</th><th>Prezzo</th>";
            echo "</tr>";

            while ($array = mysqli_fetch_array($risultato, MYSQLI_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $array['idCliente'] . "</td><td>" . $array['cognome'] . "</td><td>" . $array['nome'] . "</td><td>" . $array['dataVendita'] . "</td><td>" . $array['modello'] . "</td><td>" . $array['prezzo'] . "</td>";
                echo "</tr>";
            }
            echo "</table><br/><br/>";
            break;
        case "modelliVendite":
            $query = "SELECT * FROM modelli JOIN vendite ON vendite.cliente=modelli.idMod";
            $risultato = $conn->query($query);

            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th><th>Descrizione</th><th>Cliente</th><th>Data acquisto</th><th>Prezzo</th>";
            echo "</tr>";

            while ($array = mysqli_fetch_array($risultato, MYSQLI_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $array['idMod'] . "</td><td>" . $array['desMod'] . "</td><td>" . $array['cliente'] . "</td><td>" . $array['dataVendita'] . "</td><td>" . $array['prezzo'] . "</td>";
                echo "</tr>";
            }
            echo "</table><br/><br/>";
            break;
    }

    if ($risultato == FALSE)     // se ci sono problemi
    {
        echo "Query con errori: <br>";
        echo mysqli_error($conn);     // scrivo eventuali errori
    } else {
    }
    mysqli_close($conn);
    ?>
</body>

</html>