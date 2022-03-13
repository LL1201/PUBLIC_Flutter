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
        Visualizza tutti gli offerenti di una prestazione
    </div>
    <?php
    session_start();
    if (!isset($_SESSION['utente'])) //se la sessione non è
    {
        header('Location:login.php');
        exit;
    }

    if (!isset($_SESSION['ruolo']))
        include_once "connLimiti.php";
    else
        switch ($_SESSION['ruolo']) {
            case 'Approvato':
                include_once "connApprovato.php";
                break;
            case 'Segretario':
                include_once "connSegretario.php";
                break;
            default:
                include_once "connLimiti.php";
                break;
        }

    $zona = $_POST['cmbZonaC'];
    $servizio = $_POST['cmbServizio'];

    $stmt = $conn->prepare("SELECT soci.nome AS nome, soci.cognome AS cognome, soci.via AS via, soci.nTelefono AS telefono FROM zone
    JOIN soci ON zone.idZona=soci.FK_idZona
    JOIN capace ON soci.idSocio=capace.FK_idSocio
    JOIN servizi ON servizi.idServizio=capace.FK_idServizio
    WHERE zone.idZona=? AND servizi.idServizio=?");
    $stmt->bind_param("ii", $zona, $servizio);
    $stmt->execute();

    $risultato = $stmt->get_result();

    if ($risultato == FALSE)     // se ci sono problemi
    {
        echo "Query con errori: <br>";
        echo mysqli_error($conn);     // scrivo eventuali errori
    } else {
        echo "<table>";
        echo "<tr>";
        echo "<th>Cognome</th><th>Nome</th><th>Via</th><th>Numero di telefono</th>";
        echo "</tr>";

        while ($array = mysqli_fetch_array($risultato, MYSQLI_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $array['cognome'] . "</td><td>" . $array['nome'] . "</td><td>" . $array['via'] . "</td><td>" . $array['telefono'] . "</td>";
            echo "</tr>";
        }
        echo "</table><br/><br/>";
    }
    mysqli_close($conn);
    ?>
</body>

</html>