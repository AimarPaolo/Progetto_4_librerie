<?php
    include("../including/aperturaSessioni.php");
    if(!isset($_SESSION["entrato"])){
        if(isset($_REQUEST[""]))
        ?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>Osteria da Marco</title>
        <meta name="author" content="Paolo Aimar">
        <meta name="keywords" lang="it" content="html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/progetto.css">
    </head>
    <body class="bodyErrato">
        <p class="segnalaErrore">Identità non verificata, l'utente non ha ancora eseguito l'accesso. Verifica l'identità per poter accedere a questa parte!</p>
        <a href="login.php">Torna alla pagina di Login</a>
    </body>
</html>
<?php
    return;
    }
    if(isset($_REQUEST["review"]) && $_REQUEST["review"] != "" && isset($_REQUEST["rating"])){
        $nome_server = $_SERVER["SERVER_ADDR"];
        $nome_utente = "uReadWrite";
        $password_accesso = "SuperPippo!!!";
        $nome_database = "restaurant";

        $conn = mysqli_connect($nome_server, $nome_utente, $password_accesso, $nome_database); 
        if(mysqli_connect_errno()){
            $_SESSION["messaggio_di_errore"] = "Errore connessione al DBMS: ".mysqli_connect_error();
        }
        mysqli_set_charset($conn, "utf8mb4");
        $data = date("Y-m-d  H:i:s"); 
        $testo = trim($_REQUEST["review"]);
        //prendo il primo valore che ho e lo inserisco nel database (questo corrisponde ad un numero che indica il numero di stelle che assegna il cliente)
        $ratings = trim(substr($_REQUEST["rating"], 0, 1));
        $query_username = "INSERT INTO recensione (username, data, recensione, testo) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query_username);
        if(isset($_SESSION["nome_utente"])){
            $nome = "";
            if(isset($_REQUEST["email"]) && $_REQUEST["email"] != ""){
                $email = $_REQUEST["email"];
                $ut = $_SESSION["nome_utente"];
                $nome = "$ut($email)";
            }else{
                $ut = $_SESSION["nome_utente"];
                $nome = "$ut";
            }
            if(isset($_REQUEST["anonimo"])){
                $nome = "Anonimo";
            }
            mysqli_stmt_bind_param($stmt, "ssis", $nome, $data, $ratings, $testo);
            if (!mysqli_stmt_execute($stmt)) {
                $_SESSION["messaggio_di_errore"] = "Errore query fallita, ricontrollare quale può essere il problema";
            } else {
                $_SESSION["messaggio_di_successo"] = "Il tuo tweet è stato postato con successo!!";
            }
            
        } else {
            $_SESSION["messaggio_di_errore"] = "Errore, lo username non è stato settato!";
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: ratings.php");
        exit();
    }
    $nome_server = $_SERVER["SERVER_ADDR"];
    $nome_utente = "uReadOnly";
    $password_accesso = "posso_solo_leggere";
    $nome_database = "restaurant";

    $conn = mysqli_connect($nome_server, $nome_utente, $password_accesso, $nome_database); 
    if(mysqli_connect_errno()){
        $_SESSION["messaggio_di_errore"] = "Errore connessione al DBMS: ".mysqli_connect_error();
        exit();
    }
    mysqli_set_charset($conn, "utf8mb4");

    $query = "SELECT username, data, recensione, testo FROM recensione ORDER BY data DESC";
    $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>ratings ristorante</title>
        <meta name="author" content="Paolo Aimar">
        <meta name="keywords" lang="it" content="html">
        <meta name="description" content="pagina home">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/progetto.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <nav>
        <div class="navbar">
            <a href="home.php">Home</a>
            <a href="registrazione.php">Registra</a>
            <a href="login.php">Login</a>
            <a href="menu.php">Men&ugrave;</a>
            <a id="attiva" href="ratings.php">Recensioni</a>
            <a href="contacts.php">Contatti</a>
            <a href="../including/logout.php">Logout</a>
        </div>
    </nav>
        <main>
            <h2>Le recensioni della nostra Osteria!</h2>
            <?php
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='recensione'>";
                        echo "<p>" . $row['username'] . " - " . $row['data'] . "</p>";
                        echo "<p>";

                        //in questo modo mostro solamente le stelle colorate in base alla valutazione
                        for ($i = 0; $i < 5; $i++) {
                            if ($i < $row['recensione']) {
                                echo "<span class='fa fa-star checked'></span>";
                            } else {
                                echo "<span class='fa fa-star'></span>";
                            }
                        }

                        echo "</p>";
                        echo "<p>" . htmlspecialchars($row['testo']) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Non ci sono recensioni disponibili.</p>";
                }
                mysqli_close($conn);
            ?>
            <form action="ratings.php" method="post" name="form_rating" id="form_rating">
                <div class="recensione">
                    <!--inserisco un form che permette all'utente di inserire il numero di stelle al ristorante e, nel caso in cui l'utente lo desidera
                anche un testo.-->
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="inserire la mail (facolatativo)">
                <label for="rating">Stelle:</label>
                <!--aggiunta delle option per avere anche questo tipo di -->
                <select id="rating" name="rating" required>
                    <option value="" disabled selected>Seleziona un punteggio</option>
                    <option value="5">5 Stelle</option>
                    <option value="4">4 Stelle</option>
                    <option value="3">3 Stelle</option>
                    <option value="2">2 Stelle</option>
                    <option value="1">1 Stella</option>
                </select>
                <label for="review">Recensione (almeno 15 caratteri)</label>
                <textarea id="review" name="review" placeholder="Scrivi la tua recensione qui..." minlength="15" required></textarea>
                <div>voglio pubblicare la recensione in anonimo<input type="checkbox" name="anonimo" id="anonimo"></div> 
                <input class="bottoni" type="submit" value="Invia Recensione">
                </div>
            </form>
        </main>
        <footer>
            <div>&copy; 2024 Osteria da Marco. Tutti i diritti riservati.</div>
            <div><a href="mailto:s297424@studenti.polito.it">Email: s297424@studenti.polito.it</a></div>
            <div>Pagina Corrente: <?php echo basename($_SERVER['PHP_SELF']);?></div>
    </footer>
    </body>
</html>