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
    Login
</div>

<nav>
    <ul>
        <li><a href="index.php">Homepage</a></li>
        <li class="paginascelta"><a href="#">Login</a></li>
        <li><a href="registrazione.php">Registrati</a></li>
    </ul>
</nav>

<body>
    <div class="form-center">
        <form action="loginQuery.php" method="post">
            <fieldset>
                Mail:
                <input type="text" name="txtMail">
                <br>
                Password:
                <input type="password" name="txtPassword">
                <br>
                <input type="submit" name="btnLogin" value="Login">
            </fieldset>
        </form>
    </div>
</body>

</html>