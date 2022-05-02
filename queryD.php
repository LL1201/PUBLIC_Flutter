<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza le scarpe acquistate per cliente e numero di scarpa</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="titolo">
        Visualizza i clienti con un certo numero di scarpa
    </div>
    <?php
    include_once "connessione.php";

    $numPiede = $_POST['cmbNumeriScarpa'];
    $query = "SELECT cognome, nome, COUNT(idCalzatura) FROM clienti JOIN calzature ON clienti.idCliente=calzature.cliente WHERE numPiede='" . $numPiede . "' GROUP BY cognome, nome;";
    $risultato = $conn->query($query);

    if ($risultato == FALSE)     // se ci sono problemi
    {
        echo "Query con errori: <br>";
        echo mysqli_error($conn);     // scrivo eventuali errori
    } else {
        echo "<table>";
        echo "<tr>";
        echo "<th>Cognome</th><th>Nome</th><th>Numero di scarpe acquistate</th>";
        echo "</tr>";

        while ($array = mysqli_fetch_array($risultato, MYSQLI_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $array['cognome'] . "</td><td>" . $array['nome'] . "</td><td>" . $array['COUNT(idCalzatura)'] . "</td>";
            echo "</tr>";
        }
        echo "</table><br/><br/>";
    }
    mysqli_close($conn);
    ?>
</body>

</html>