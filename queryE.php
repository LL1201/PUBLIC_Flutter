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
        Visualizza le prestazioni ordinato secondo il numero di ore erogate
    </div>
    <?php
    session_start();
    if (!isset($_SESSION['utente'])) //se la sessione non è
    {
        header('Location:login.php');
        exit;
    }
    include_once "connessione.php";

    $stmt = $conn->prepare("SELECT prestazioni.descrizione AS descrizione, prestazioni.oreP AS ore FROM prestazioni ORDER BY prestazioni.oreP desc");
    $stmt->execute();

    $risultato = $stmt->get_result();

    if ($risultato == FALSE)     // se ci sono problemi
    {
        echo "Query con errori: <br>";
        echo mysqli_error($conn);     // scrivo eventuali errori
    } else {
        echo "<table>";
        echo "<tr>";
        echo "<th>Descrizione</th><th>Ore</th>";
        echo "</tr>";

        while ($array = mysqli_fetch_array($risultato, MYSQLI_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $array['descrizione'] . "</td><td>" . $array['ore'] . "</td>";
            echo "</tr>";
        }
        echo "</table><br/><br/>";
    }
    mysqli_close($conn);
    ?>
</body>

</html>