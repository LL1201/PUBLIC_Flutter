<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza le scarpe acquistate</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="titolo">
        Visualizza le scarpe acquistate
    </div>
    <?php
    include_once "connessione.php";

    $idCliente = $_POST['cmbCognome'];
    $query = "SELECT cognome, nome, descrizione, prezzo FROM clienti JOIN calzature ON clienti.idCliente=calzature.cliente WHERE idCliente='" . $idCliente . "'";
    $risultato = $conn->query($query);

    if ($risultato == FALSE)     // se ci sono problemi
    {
        echo "Query con errori: <br>";
        echo mysqli_error($conn);     // scrivo eventuali errori
    } else {
        echo "<table>";
        echo "<tr>";
        echo "<th>Cognome</th><th>Nome</th><th>Descrizione calzatura</th><th>Prezzo</th>";
        echo "</tr>";

        while ($array = mysqli_fetch_array($risultato, MYSQLI_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $array['cognome'] . "</td><td>" . $array['nome'] . "</td><td>" . $array['descrizione'] . "</td><td>" . "€" . $array['prezzo'] . "</td>";
            echo "</tr>";
        }
        echo "</table><br/><br/>";
    }
    mysqli_close($conn);
    ?>
</body>

</html>