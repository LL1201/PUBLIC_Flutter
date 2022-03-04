<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="titolo">
        Esito registrazione
    </div>
    <?php
    include_once "connessione.php";

    $flag = false;
    $cognome = $_POST['txtCognome'];
    $nome = $_POST['txtNome'];
    $telefono = $_POST['txtNumero'];
    $mail = $_POST['txtMail'];
    $password = password_hash($_POST['txtPassword'], PASSWORD_DEFAULT);
    $via = $_POST['txtVia'];
    $zona = $_POST['cmbZonaReg'];
    $checked = false;

    $mailCheck = $conn->query("SELECT mail FROM soci");
    while ($row = $mailCheck->fetch_assoc()) {
        if ($row['mail'] == $mail)
            $flag = true;
    }

    if ($flag != true) {

        $stmt = $conn->prepare("INSERT INTO soci (cognome, nome, nTelefono, via, FK_idZona, mail, passwordU, checked)
        VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssissi", $cognome, $nome, $telefono, $via, $zona, $mail, $password, $checked);
        $stmt->execute();

        $risultato = $stmt->get_result();
        //echo $risultato;
        session_start();
        $_SESSION['utente'] = $mail;
        header('Location:queryPage.php');
    } else {
        echo "<p>Mail già inserita!</p>";
    }

    /*if ($risultato == FALSE)     // se ci sono problemi
    {
        echo "Query con errori: <br>";
        echo mysqli_error($conn);     // scrivo eventuali errori
    }*/


    ?>
</body>

</html>