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

    $tabella = $_POST['cmbTabella'];
    $query = "SELECT * FROM" . ' ' . $tabella;
    $risultato = $conn->query($query);

    if ($risultato == FALSE)     // se ci sono problemi
    {
        echo "Query con errori: <br>";
        echo mysqli_error($conn);     // scrivo eventuali errori
    } else {

        switch ($tabella) {
            case "clienti":
                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th><th>Cognome</th><th>Nome</th><th>Indirizzo</th><th>Città</th><th>Telefono</th>";
                echo "</tr>";

                while ($array = mysqli_fetch_array($risultato, MYSQLI_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $array['idCliente'] . "</td><td>" . $array['cognome'] . "</td><td>" . $array['nome'] . "</td><td>" . $array['indirizzo'] . "</td><td>" . $array['citta'] . "</td><td>" . $array['telefono'] . "</td>";
                    echo "</tr>";
                }
                echo "</table><br/><br/>";
                break;
            case "modelli":
                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th><th>Des mod</th><th>Tipo di legno</th><th>Colore</th>";
                echo "</tr>";

                while ($array = mysqli_fetch_array($risultato, MYSQLI_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $array['idMod'] . "</td><td>" . $array['desMod'] . "</td><td>" . $array['tipoLegno'] . "</td><td>" . $array['colore'] . "</td>";
                    echo "</tr>";
                }
                echo "</table><br/><br/>";
                break;
            case "vendite":
                $query = "SELECT vendite.idVendita, clienti.nome, vendite.dataVendita, modelli.desMod, vendite.prezzo, vendite.agente FROM clienti JOIN vendite ON clienti.idCliente=vendite.cliente JOIN modelli ON modelli.idMod=vendite.modello";
                $risultato = $conn->query($query);
                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th><th>Cliente</th><th>Data vendita</th><th>Modello</th><th>Prezzo</th><th>Agente</th>";
                echo "</tr>";

                while ($array = mysqli_fetch_array($risultato, MYSQLI_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $array['idVendita'] . "</td><td>" . $array['nome'] . "</td><td>" . $array['dataVendita'] . "</td><td>" . $array['desMod'] . "</td><td>" . $array['prezzo'] . "</td><td>" . $array['agente'] . "</td>";
                    echo "</tr>";
                }
                echo "</table><br/><br/>";
                break;
                break;
        }
    }
    mysqli_close($conn);
    ?>
</body>

</html>