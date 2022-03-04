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
    $id = 0;
    $mail = $_POST['txtMail'];
    $password = $_POST['txtPassword'];

    $mailCheck = $conn->query("SELECT mail, passwordU FROM soci");
    while ($row = $mailCheck->fetch_assoc()) {
        if ($row['mail'] == $mail && password_verify($password, $row['passwordU'])) {
            $flag = true;
            session_start();
            $_SESSION['utente'] = $row['mail'];
        }
    }

    if ($flag == true) {
        echo "<p>Credenziali corrette!</p>";
        header('Location:queryPage.php');
    } else {
        echo "<p>Credenziali errate!</p>";
    }
    ?>
</body>

</html>