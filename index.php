<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calzolaio</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="titolo">
        Gestionale del calzolaio
    </div>

    <div class="form-center">
        <form action="queryA.php" method="post">
            <fieldset>
                <h3>Visualizza descrizione e prezzo di tutte le calzature:</h3>
                <input type="submit" name="btnVisualizzaCalzature" value="Visualizza">
            </fieldset>
        </form>
    </div>

    <div class="form-center">
        <form action="queryB.php" method="post">
            <fieldset>
                <h3>Visualizza descrizione e data di acquisto di tutte le scarpe che costano:</h3>
                <input type="text" name="txtPrezzo">
                <input type="submit" name="btnVisualizza120" value="Visualizza">
            </fieldset>
        </form>
    </div>

    <div class="form-center">
        <form action="queryC.php" method="post">
            <fieldset>
                <h3>Scegli un cliente e visualizza le scarpe acquistate:</h3>
                <select name="cmbCognome">
                    <?php
                    include("cmbCognomi.php");
                    ?>
                </select>
                <input type="submit" name="btnVisualizza" value="Visualizza">
            </fieldset>
        </form>
    </div>

    <div class="form-center">
        <form action="queryD.php" method="post">
            <fieldset>
                <h3>Scegli un numero di scarpa e per ogni cliente visualizza il numero di scarpe acquistate:</h3>
                <select name="cmbNumeriScarpa">
                    <?php
                    include("cmbNumeriScarpa.php");
                    ?>
                </select>
                <input type="submit" name="btnVisualizza" value="Visualizza">
            </fieldset>
        </form>
    </div>
</body>

</html>