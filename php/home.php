<?php
    /*include("../including/aperturaSessioni.php");
    if(isset($_SESSION["entrato"]))
        $entrato = $_SESSION["entrato"];
    else
        $entrato = false;
    */
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>home ristorante</title>
        <meta name="author" content="Paolo Aimar">
        <meta name="keywords" lang="it" content="html">
        <meta name="description" content="pagina home">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/progetto.css">
    </head>
    <body>
    <nav>
        <div class="navbar">
            <a id="attiva" href="home.php">Home</a>
            <a href="registrazione.php">Registra</a>
            <a href="login.php">Login</a>
            <a href="menu.php">Men&ugrave;</a>
            <a href="ratings.php">Recensioni</a>
            <a href="contacts.php">Contatti</a>
            <a href="../including/logout.php">Logout</a>
        </div>
    </nav>
        <main>
            <h1>Scopri i Sapori Autentici</h1>
            <div class="container">
                <section id="about">
                    <h2>Chi Siamo</h2>
                    <p>All'Osteria da Marco, offriamo un'esperienza culinaria unica che unisce tradizione e innovazione. La nostra missione è quella di portare in tavola i sapori autentici della cucina italiana, utilizzando ingredienti freschi e di alta qualità.</p>
                </section>
                <section id="menu">
                    <h2>Il Nostro Menu</h2>
                    <p>Scopri il nostro menu ricco di piatti tradizionali italiani, preparati con passione e maestria. Dalla pasta fatta in casa ai dolci deliziosi, ogni piatto è pensato per deliziare il tuo palato.</p>
                </section>
            </div>
        </main>
        <footer>
            <div>&copy; 2024 Osteria da Marco. Tutti i diritti riservati.</div>
            <div><a href="mailto:s297424@studenti.polito.it">Email: s297424@studenti.polito.it</a></div>
            <div>Pagina Corrente: <?php echo basename($_SERVER['PHP_SELF']);?></div>
    </footer>
    </body>
</html>