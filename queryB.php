<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza le scarpe per un certo prezzo</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="titolo">
        Visualizza tutti i servizi di una zona
    </div>
    <?php
    session_start();
    if (!isset($_SESSION['utente'])) //se la sessione non è
    {
        header('Location:login.php');
        exit;
    }
    include_once "connessione.php";

    $zona = $_POST['cmbZonaB'];


    $stmt = $conn->prepare("SELECT servizi.descrizione AS descrizione FROM zone 
    JOIN soci ON zone.idZona=soci.FK_idZona
    JOIN capace ON soci.idSocio=capace.FK_idSocio
    JOIN servizi ON servizi.idServizio=capace.FK_idServizio
    WHERE zone.idZona=?");
    $stmt->bind_param("i", $zona);
    $stmt->execute();

    $risultato = $stmt->get_result();

    if ($risultato == FALSE)     // se ci sono problemi
    {
        echo "Query con errori: <br>";
        echo mysqli_error($conn);     // scrivo eventuali errori
    } else {
        echo "<table>";
        echo "<tr>";
        echo "<th>Descrizione</th>";
        echo "</tr>";

        while ($array = mysqli_fetch_array($risultato, MYSQLI_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $array['descrizione'] . "</td>";
            echo "</tr>";
        }
        echo "</table><br/><br/>";
    }
    mysqli_close($conn);
    ?>
</body>

</html>