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
    Registrati come nuovo socio della Banca del Tempo!
</div>
<nav>
    <ul>
        <li><a href="index.php">Homepage</a></li>
        <li><a href="login.php" title="Login">Login</a></li>
        <li class="paginascelta"><a href="#">Registrati</a></li>
    </ul>
</nav>

<body>
    <div class="form-center">
        <form action="registraQuery.php" method="post">
            <fieldset>
                Cognome:
                <input type="text" name="txtCognome">
                <br>
                Nome:
                <input type="text" name="txtNome">
                <br>
                Numero telefono:
                <input type="text" name="txtNumero" maxlength="10">
                <br>
                Mail:
                <input type="text" name="txtMail">
                <br>
                Password:
                <input type="password" name="txtPassword">
                <br>
                Via:
                <input type="text" name="txtVia">
                <br>
                Zona:
                <select name="cmbZonaReg">
                    <?php
                    include("cmbZona.php");
                    ?>
                </select>
                <br>
                Cosa sei capace di fare?:
                <select name="cmbServizioReg">
                    <?php
                    include("cmbServizio.php");
                    ?>
                </select>
                <br>
                <input type="submit" name="btnRegistrati" value="Registrati">
            </fieldset>
        </form>
    </div>
</body>

</html>