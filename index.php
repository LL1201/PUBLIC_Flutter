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
     Banca del tempo
 </div>

 <?php
    session_start();
    ?>

 <nav>
     <ul>
         <?php
            if (!isset($_SESSION['utente'])) //se la sessione non è
            {
                echo '<li class="paginascelta"><a href="index.php">Homepage</a></li>
                <li><a href="login.php" title="Login">Login</a></li>
                <li><a href="registrazione.php" title="Registrati">Registrati</a></li>';
            } else {
                echo '<li class="paginascelta"><a href="index.php">Homepage</a></li>
                <li><a href="queryPage.php" title="Login">Pagina delle query</a></li>                
                <li><a href="profilo.php" title="Il mio profilo">Il mio profilo</a></li>
                <li><a href="logout.php" title="Esci">Esci</a></li>
                <li><a href="management.php" title="Management">Management</a></li>';
            }
            ?>
     </ul>
 </nav>

 <body>
     <article>
         <p>
             “Banca del Tempo” è un'associazione basata sullo scambio di servizi/prestazioni, attuando un aiuto reciproco.
             Attraverso la BdT le persone mettono a disposizione il proprio tempo per determinate prestazioni (effettuare una piccola riparazione in casa, preparare una torta, conversare in lingua straniera, ecc.) aspettando di ricevere prestazioni da altri.
             Non circola denaro, tutte le prestazioni sono valutate in tempo, anche le attività di segreteria.
             Le prestazioni sono suddivise in categorie (lavori manuali, tecnologie, servizi di trasporto, bambini, attività sportive, ecc.).
             Chi dà un' ora del suo tempo a qualunque socio, riceve un' ora di tempo da chiunque faccia parte della BdT.
             Il territorio di riferimento della BdT è limitato (un quartiere in una grande città o un piccolo comune) ed è suddiviso in zone.
         </p>
         <img src="imageHome.jpg">
     </article>

 </body>

 </html>