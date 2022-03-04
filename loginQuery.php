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

    $flagChecked = false;
    $flag = false;
    $id = 0;
    $mail = $_POST['txtMail'];
    $password = $_POST['txtPassword'];
    $segretario = false;

    $mailCheck = $conn->query("SELECT mail, passwordU, checked FROM soci");
    while ($row = $mailCheck->fetch_assoc()) {
        if ($row['mail'] == $mail && password_verify($password, $row['passwordU'])) {
            $flag = true;
            if ($row['checked'] == 1)
                $flagChecked = true;
            session_start();
            $_SESSION['utente'] = $row['mail'];
        }
    }

    /*$segretarioCheckQuery = $conn->query("SELECT soci.mail FROM soci JOIN capace ON capace.FK_idSocio = soci.idSocio 
    JOIN servizi ON capace.FK_idServizio=servizi.idServizio");
    while ($row = $segretarioCheckQuery->fetch_assoc()) {
        if ($row['mail'] == $mail) {
            $segretario = true;
            session_start();
            $_SESSION['utente'] = $row['mail'];
        }
    }

    $risultato = $stmt->get_result();*/

    if ($flag == true) {
        echo "<p>Credenziali corrette!</p>";
        header('Location:queryPage.php');
    } else {
        echo "<p>Credenziali errate!</p>";
    }
    ?>
</body>

</html>