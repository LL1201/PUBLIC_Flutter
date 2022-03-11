<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<style>
    table tbody tr td form button {
        background-color: rgb(175, 255, 255);
        color: black;
        border-color: black;
    }

    table tbody tr td form button:hover {
        background-color: rgb(40, 255, 255);
    }
</style>
<div class="titolo">
    Approva le richieste di registrazione degli utenti
</div>
<?php
session_start();
?>
<nav>
    <ul>
        <?php
        if (!isset($_SESSION['utente'])) //se la sessione non è
        {
            header('Location:login.php');
            exit;
        } else {
            echo '<li></li><a href="index.php" title="Homepage">Homepage</a></li>
                <li><a href="queryPage.php" title="Login">Pagina delle query</a></li>                
                <li><a href="profilo.php" title="Il mio profilo">Il mio profilo</a></li>
                <li><a href="logout.php" title="Esci">Esci</a></li>
                <li class="paginascelta"><a href="management.php" title="Management">Management</a></li>';
        }
        ?>
    </ul>
</nav>

<body>
    <?php
    if (!isset($_SESSION['utente'])) //se la sessione non è
    {
        header('Location:login.php');
        exit;
    }

    //$segretarioCheckQuery = $conn->query("SELECT soci.mail AS email FROM soci JOIN capace ON capace.FK_idSocio = soci.idSocio 
    //JOIN servizi ON capace.FK_idServizio=servizi.idServizio");
    $notCheckedUsers = "SELECT soci.nome AS nome, soci.cognome AS cognome, soci.nTelefono AS tel, soci.via AS via, zone.descrizione AS descZona, soci.mail AS email FROM soci JOIN zone ON zone.idZona=soci.FK_idZona WHERE soci.checked=FALSE";

    if (!isset($_SESSION['ruolo'])) {
        echo 'Non hai i permessi per visualizzare questa pagina';
        //echo $_SESSION['ruolo'];
    } else if ($_SESSION['ruolo'] == 'Segretario') {
        include_once "connSegretario.php";
        $risultato = $conn->query($notCheckedUsers);
        echo "<table>";
        echo "<tr>";
        echo "<th>Nome</th><th>Cognome</th><th>Telefono</th><th>Via</th><th>Zona</th><th>Mail</th><th>Azione</th>";
        echo "</tr>";

        while ($array = mysqli_fetch_array($risultato, MYSQLI_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $array['nome'] . "</td><td>" . $array['cognome'] . "</td>" . "</td><td>" . $array['tel'] . "</td><td>" . $array['via'] . "</td><td>" . $array['descZona'] . "</td><td>" . $array['email'] . '</td><td><form action="approva.php" method="post" id="form1"><button type="submit" name="btnApprova" form="form1" value="' . $array['email'] . '">Approva</button></form>';
            echo "</tr>";
        }
        echo "</table><br/><br/>";
    } else {
        echo 'Non hai i permessi per visualizzare questa pagina';
        //echo $_SESSION['ruolo'];
    }
    ?>
</body>

</html>