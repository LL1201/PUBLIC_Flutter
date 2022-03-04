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
                <li><a href="logout.php" title="Esci">Esci</a></li>
                <li><a href="management.php" title="Management">Management</a></li>';
            }
            ?>
     </ul>
 </nav>

 <body>
     <article>
         <p>
             Un'associazione “Banca del Tempo” vuole realizzare una base di dati per registrare e gestire le attività dell'associazione.
             La “Banca del Tempo” (BdT) indica uno di quei sistemi organizzati di persone che si associano per scambiare servizi e/o saperi, attuando un aiuto reciproco.
             Attraverso la BdT le persone mettono a disposizione il proprio tempo per determinate prestazioni (effettuare una piccola riparazione in casa, preparare una torta, conversare in lingua straniera, ecc.) aspettando di ricevere prestazioni da altri.
             Non circola denaro, tutte le prestazioni sono valutate in tempo, anche le attività di segreteria.
             Le prestazioni sono suddivise in categorie (lavori manuali, tecnologie, servizi di trasporto, bambini, attività sportive, ecc.).
             Chi dà un' ora del suo tempo a qualunque socio, riceve un' ora di tempo da chiunque faccia parte della BdT. La base di dati dovrà mantenere le informazioni relative ad ogni prestazione (quale prestazione, da chi è stata erogata, quale socio ha ricevuto quella prestazione, per quante ore e in quale data) per consentire anche interrogazioni di tipo statistico.
             Il territorio di riferimento della BdT è limitato (un quartiere in una grande città o un piccolo comune) ed è suddiviso in zone; la base di dati dovrà contenere la mappa del territorio e delle singole zone, in forma grafica.
             <br>
             Si consideri la realtà di riferimento sopra descritta e si realizzino:
             <br>
             <li> la progettazione concettuale della realtà indicata attraverso la produzione di uno schema (ad esempio ER, Entity - Relationship) con gli attributi di ogni entità, il tipo di ogni relazione e i suoi eventuali attributi;</li>
             <li> una traduzione dello schema concettuale realizzato in uno schema logico (ad esempio secondo uno schema relazionale);</li>
             <li> le seguenti interrogazioni espresse in algebra relazionale e/o in linguaggio SQL:</li>
             <li> Dato un servizio estrarre tutte le info delle prestazioni relative a quel servizio;</li>
             <li> Data una zona estrarre tutti i servizi offerti in quella zona;</li>
             <li> data una richiesta di prestazione, visualizzare la porzione di mappa del territorio nel quale si trova il socio richiedente e l’elenco di tutti i soci che si trovano in quella zona in grado di erogare quella prestazione, visualizzandone il nome, cognome, indirizzo e numero di telefono;</li>
             <li> visualizzare tutti i soci che fanno parte della segreteria e che offrono anche altri tipi di prestazione;</li>
             <li> produrre un elenco delle prestazioni ordinato in modo decrescente secondo il numero di ore erogate per ciascuna prestazione.</li>
             <li> produrre l’elenco dei soci (con cognome, nome e telefono) che hanno un “debito” nella BdT (coloro che hanno usufruito di ore di prestazioni in numero superiore a quelle erogate);</li>
         </p>
     </article>

 </body>

 </html>