<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Contatti - Osteria da Marco</title>
    <meta name="author" content="Paolo Aimar">
    <meta name="keywords" lang="it" content="contatti, osteria, ristorante">
    <meta name="description" content="Pagina dei contatti dell'Osteria da Marco">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/progetto.css">
</head>
<body>
    <nav>
        <div class="navbar">
            <a href="home.php">Home</a>
            <a href="registrazione.php">Registra</a>
            <a href="login.php">Login</a>
            <a href="menu.php">Men&ugrave;</a>
            <a href="ratings.php">Recensioni</a>
            <a id="attiva" href="contacts.php">Contatti</a>
            <a href="../including/logout.php">Logout</a>
        </div>
    </nav>
    <main>
        <h1>Contattaci</h1>
        <div class="contact-info">
            <h2>Informazioni di Contatto</h2>
            <p><strong>Indirizzo:</strong> Via Fittizia 123, 40100 Bologna, Italia</p>
            <p><strong>Telefono:</strong> +39 051 1234567</p>
            <p><strong>Email:</strong> <a href="mailto:info@osteriadamarco.it">info@osteriadamarco.it</a></p>
            <p><strong>Proprietari:</strong> Marco Rossi, Laura Bianchi</p>
        </div>
        <!--utilizzo solamente un iframe perchè, utilizzando il codice javascript si avevano alcuni problemi-->
        <iframe 
            id="map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2888.0173206920897!2d11.340427316017878!3d44.49488707910142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477fd4cbef46cfaf%3A0x7c94b3d1d3bdee8b!2sPiazza%20Maggiore%2C%2040124%20Bologna%20BO%2C%20Italia!5e0!3m2!1sit!2sit!4v1682345678901!5m2!1sit!2sit"
            allowfullscreen=""
            loading="lazy">
        </iframe>
    </main>
    <footer>
        <div>&copy; 2024 Osteria da Marco. Tutti i diritti riservati.</div>
        <div><a href="mailto:s297424@studenti.polito.it">Email: s297424@studenti.polito.it</a></div>
        <div>Pagina Corrente: <?php echo basename($_SERVER['PHP_SELF']);?></div>
    </footer>
</body>
</html>
