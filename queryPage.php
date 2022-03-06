<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banca del tempo</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<div class="titolo">
    Gestionale della Banca del Tempo
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
                <li class="paginascelta"><a href="queryPage.php" title="Login">Pagina delle query</a></li>                
                <li><a href="profilo.php" title="Il mio profilo">Il mio profilo</a></li>
                <li><a href="logout.php" title="Esci">Esci</a></li>
                <li><a href="management.php" title="Management">Management</a></li>';
        }
        ?>
    </ul>
</nav>

<body>

    <?php
    include_once "connessione.php";
    if (!isset($_SESSION['utente'])) //se la sessione non è
    {
        header('Location:login.php');
        exit;
    } else {
        echo "Benvenuto utente " . $_SESSION['utente'];
    }

    $flag = false;
    $approvedUser = $conn->query("SELECT mail, checked FROM soci");
    while ($row = $approvedUser->fetch_assoc()) {
        if ($row['mail'] == $_SESSION['utente'] && $row['checked'] == '1')
            $flag = true;
    }
    if ($flag) {

        echo '<div class="form-center">
        <form action="queryA.php" method="post">
            <fieldset>
                <h3>Visualizza le prestazioni relative ad un servizio:</h3>
                <select name="cmbServizioPrestazione">';

        include("cmbServizio.php");

        echo '</select>
                <input type="submit" name="btnVisualizzaPrestazioni" value="Visualizza">
            </fieldset>
        </form>
    </div>

    <div class="form-center">
        <form action="queryB.php" method="post">
            <fieldset>
                <h3>Visualizza tutti i servizi di una zona:</h3>
                <select name="cmbZonaB">';

        include("cmbZona.php");

        echo '</select>
                <input type="submit" name="btnVisualizzaServizi" value="Visualizza">
            </fieldset>
        </form>
    </div>

    <div class="form-center">
        <form action="queryC.php" method="post">
            <fieldset>
                <h3>Visualizza tutti gli offerenti di una prestazione:</h3>
                <select name="cmbZonaC">';

        include("cmbZona.php");

        echo '</select>
                <select name="cmbServizio">';

        include("cmbServizio.php");

        echo '</select>
                <input type="submit" name="btnVisualizzaPrestazione" value="Visualizza">
            </fieldset>
        </form>
    </div>

    <div class="form-center">
        <form action="queryD.php" method="post">
            <fieldset>
                <h3>Visualizza tutti i soci che fanno parte della segreteria e che offrono altri tipi di prestazione:</h3>
                <input type="submit" name="btnVisualizzaSegreteria" value="Visualizza">
            </fieldset>
        </form>
    </div>

    <div class="form-center">
        <form action="queryE.php" method="post">
            <fieldset>
                <h3>Visualizza le prestazioni ordinate secondo il numero di ore erogate:</h3>
                <input type="submit" name="btnVisualizzaPrestazioni" value="Visualizza">
            </fieldset>
        </form>
    </div>

    <div class="form-center">
        <form action="queryF.php" method="post">
            <fieldset>
                <h3>Visualizza i soci che hanno un debito con la BdT:</h3>
                <input type="submit" name="btnVisualizzaDebiti" value="Visualizza">
            </fieldset>
        </form>
    </div>';
    } else
        echo "<br>Il tuo account non è ancora stato approvato da un segretario! Non puoi visualizzare la pagina delle query";
    ?>
</body>

</html>