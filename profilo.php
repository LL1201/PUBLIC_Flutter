<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<div class="titolo">
    Il mio profilo
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
                <li class="paginascelta"><a href="profilo.php" title="Il mio profilo">Il mio profilo</a></li>
                <li><a href="logout.php" title="Esci">Esci</a></li>';
        }
        ?>
    </ul>
</nav>

<body>
    <?php
    include_once "connessione.php";

    $data = $conn->query("SELECT * FROM soci");
    while ($row = $data->fetch_assoc()) {
        if ($row['mail'] == $_SESSION['utente']) {
            $nome = $row['nome'];
            $cognome = $row['nome'];
            $telefono = $row['nome'];
            $mail = $row['nome'];
        }
    }
    echo '<div class="form-center">
        <form action="registraQuery.php" method="post">
            <fieldset>
                Cognome:
                <input type="text" name="txtCognome" value="' . $cognome . '">
                <br>
                Nome:
                <input type="text" name="txtNome value="' . $nome . '">
                <br>
                Numero telefono:
                <input type="text" name="txtNumero" maxlength="10" value="' . $telefono . '">
                <br>
                Mail:
                <input type="text" name="txtMail" value="' . $mail . '" readonly>   
                <br>                
                <input type="submit" name="btnModifica" value="Aggiorna i dati!">
            </fieldset>
        </form>
    </div>';
    ?>
</body>

</html>