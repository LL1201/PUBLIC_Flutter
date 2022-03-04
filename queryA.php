<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestazioni relative al servizio selezionato</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="titolo">
        Prestazioni
    </div>
    <?php
    session_start();
    if (!isset($_SESSION['utente'])) //se la sessione non è
    {
        header('Location:login.php');
        exit;
    }
    include_once "connessione.php";

    $servizio = $_POST['cmbServizioPrestazione'];

    $stmt = $conn->prepare("SELECT s1.cognome AS cognomeRicevente, s2.cognome AS cognomeOfferente, tipi.descrizione AS descTipo, servizi.descrizione AS descServ, prestazioni.descrizione AS descPrest, prestazioni.dataP AS dataP, prestazioni.oreP AS oreP, prestazioni.dataP
    FROM prestazioni JOIN soci s1 ON prestazioni.FK_idSocioRiceve=s1.idSocio
    JOIN soci s2 ON prestazioni.FK_idSocioOffre=s2.idSocio
    JOIN servizi ON prestazioni.FK_idServizio=servizi.idServizio
    JOIN tipi ON servizi.FK_idTipo=tipi.idTipo
    WHERE prestazioni.FK_idServizio=?");

    $stmt->bind_param("i", $servizio);
    $stmt->execute();

    $risultato = $stmt->get_result();

    if ($risultato == FALSE)     // se ci sono problemi
    {
        echo "Query con errori: <br>";
        echo mysqli_error($conn);     // scrivo eventuali errori
    } else {
        echo "<table>";
        echo "<tr>";
        echo "<th>Tipo</th><th>Servizio</th><th>Prestazione</th><th>Data</th><th>Ore</th><th>Offerente</th><th>Ricevente</th>";
        echo "</tr>";

        while ($array = mysqli_fetch_array($risultato, MYSQLI_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $array['descTipo'] . "</td><td>" . $array['descServ'] . "</td>" . "</td><td>" . $array['descPrest'] . "</td><td>" . $array['dataP'] . "</td><td>" . $array['oreP'] . "</td><td>" . $array['cognomeOfferente'] . "</td><td>" . $array['cognomeRicevente'];
            echo "</tr>";
        }
        echo "</table><br/><br/>";
    }
    mysqli_close($conn);
    ?>
</body>

</html>