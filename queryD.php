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
        Visualizza i soci segretari che offrono altri servizi
    </div>
    <?php
    session_start();
    if (!isset($_SESSION['utente'])) //se la sessione non è
    {
        header('Location:login.php');
        exit;
    }
    include_once "connApprovato.php";

    $stmt = $conn->prepare("SELECT t.cognome AS cognome, t.nome AS nome FROM (SELECT soci.cognome, soci.nome, COUNT(soci.idSocio) FROM soci
	JOIN capace ON capace.FK_idSocio=soci.idSocio
	JOIN servizi ON servizi.idServizio=capace.FK_idServizio
	GROUP BY soci.idSocio 
	HAVING COUNT(soci.nome)>=2) t");
    $stmt->execute();

    $risultato = $stmt->get_result();

    if ($risultato == FALSE)     // se ci sono problemi
    {
        echo "Query con errori: <br>";
        echo mysqli_error($conn);     // scrivo eventuali errori
    } else {
        echo "<table>";
        echo "<tr>";
        echo "<th>Cognome</th><th>Nome</th>";
        echo "</tr>";

        while ($array = mysqli_fetch_array($risultato, MYSQLI_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $array['cognome'] . "</td><td>" . $array['nome'] . "</td>";
            echo "</tr>";
        }
        echo "</table><br/><br/>";
    }
    mysqli_close($conn);
    ?>
</body>

</html>