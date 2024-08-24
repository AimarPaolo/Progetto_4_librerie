<?php
    include("../including/aperturaSessioni.php");
   /* if(isset($_SESSION["entrato"]))
        $entrato = $_SESSION["entrato"];
    else
        $entrato = false;
    if($entrato == false){
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
    */
    //inserisco questo codice come commento perchè non ha senso far accedere l'utente alla pagina dei menù solo se è registrato
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>menu ristorante</title>
        <meta name="author" content="Paolo Aimar">
        <meta name="keywords" lang="it" content="html">
        <meta name="description" content="pagina home">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/progetto.css">
        <!--aggiungo una libreria google per creare un google chart-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script>
            function searchMenu() {
                /*In questo caso viene preso il valore dell'utente appena viene inserito dentro la barra di ricerca 
                e le parole vengono considerate tutte minuscole per evitare errori da parte dell'utente*/
                let input = document.getElementById('search-input').value.toLowerCase();
                let items = document.querySelectorAll('main section ul li');

                items.forEach(item => {
                    let itemName = item.querySelector('span').textContent.toLowerCase();
                    if (itemName.includes(input)) {
                        //se viene trovato il testo richiesto non viene modificato e il cibo cercato continua ad essere presente
                        //nel meù
                        item.style.display = '';
                    } else {
                        //altrimenti viene cancellato
                        item.style.display = 'none';
                    }
                });
            }
        </script>
    </head>
    <body>
    <nav>
        <div class="navbar">
            <a href="home.php">Home</a>
            <a href="registrazione.php">Registra</a>
            <a href="login.php">Login</a>
            <a id="attiva" href="menu.php">Men&ugrave;</a>
            <a href="ratings.php">Recensioni</a>
            <a href="contacts.php">Contatti</a>
            <a href="../including/logout.php">Logout</a>
        </div>
    </nav>
        <main>
            <!--inserisco una barra di ricerca a scopo didattico (non avrebbe senso in un vero sito di un ristorante perchè
            solitamente non si conoscono i piatti presenti nel menù e quindi è difficile andare a cercare nella barra di ricerca-->
            <div class="search-container">
                <input type="text" id="search-input" placeholder="Cerca nel menù..." class="search-input" onkeyup="searchMenu()">
                <button class="bottoni" onclick="searchMenu()">Cerca</button>
            </div>
            <div class="menu_tradizionale"></div>
            <h1>Men&ugrave; Tradizionale</h1>
                <section class="antipasti">
                    <h2>Antipasti</h2>
                    <ul>
                        <li>
                            <span>Bruschette al Pomodoro</span>
                            <span>€5.00</span>
                        </li>
                        <li>
                            <span>Prosciutto e Melone</span>
                            <span>€9.00</span>
                        </li>
                        <li>
                            <span>Carpaccio di Manzo</span>
                            <span>€10.50</span>
                        </li>
                        <li>
                            <span>Crostini di Fegatini</span>
                            <span>€6.50</span>
                        </li>
                    </ul>
                </section>
                <section class="primi">
                    <h2>Primi Piatti</h2>
                    <ul>
                        <li>
                            <span>Spaghetti alla Carbonara</span>
                            <span>€10.00</span>
                        </li>
                        <li>
                            <span>Risotto ai Funghi Porcini</span>
                            <span>€12.00</span>
                        </li>
                        <li>
                            <span>Penne all'Arrabbiata</span>
                            <span>€9.50</span>
                        </li>
                        <li>
                            <span>Lasagne alla Bolognese</span>
                            <span>€13.00</span>
                        </li>
                    </ul>
                </section>
                <section class="secondi">
                    <h2>Secondi Piatti</h2>
                    <ul>
                        <li>
                            <span>Bistecca alla Fiorentina</span>
                            <span>€22.00</span>
                        </li>
                        <li>
                            <span>Pollo alla Cacciatora</span>
                            <span>€15.00</span>
                        </li>
                        <li>
                            <span>Ossobuco alla Milanese</span>
                            <span>€18.00</span>
                        </li>
                        <li>
                            <span>Branzino al Forno</span>
                            <span>€20.00</span>
                        </li>
                    </ul>
                </section>
                <section class="dolci">
                    <h2>Dolci</h2>
                    <ul>
                        <li>
                            <span>Tiramisù</span>
                            <span>€6.00</span>
                        </li>
                        <li>
                            <span>Panna Cotta</span>
                            <span>€5.50</span>
                        </li>
                        <li>
                            <span>Cannoli Siciliani</span>
                            <span>€7.00</span>
                        </li>
                        <li>
                            <span>Gelato Artigianale</span>
                            <span>€4.00</span>
                        </li>
                    </ul>
                </section>
            </div>
        <!--creo diversi menù per i primi e i secondi e poi creo un chart che aiuta nella scelta del menù -->
        <h1>Men&ugrave; di Mare</h1>
        <div class="menu_mare">
            <section class="antipasti">
                <h2>Antipasti di Mare</h2>
                <ul>
                    <li>
                        <span>Insalata di Mare</span>
                        <span>€10.00</span>
                    </li>
                    <li>
                        <span>Cocktail di Gamberi</span>
                        <span>€12.00</span>
                    </li>
                    <li>
                        <span>Polpo alla Luciana</span>
                        <span>€14.00</span>
                    </li>
                    <li>
                        <span>Carpaccio di Tonno</span>
                        <span>€13.00</span>
                    </li>
                </ul>
            </section>
            <section class="primi">
                <h2>Primi Piatti di Mare</h2>
                <ul>
                    <li>
                        <span>Spaghetti alle Vongole</span>
                        <span>€14.00</span>
                    </li>
                    <li>
                        <span>Risotto alla Pescatora</span>
                        <span>€15.00</span>
                    </li>
                    <li>
                        <span>Fettuccine ai Frutti di Mare</span>
                        <span>€13.00</span>
                    </li>
                    <li>
                        <span>Paccheri al Ragù di Pesce Spada</span>
                        <span>€16.00</span>
                    </li>
                </ul>
            </section>
            <section class="secondi">
                <h2>Secondi Piatti di Mare</h2>
                <ul>
                    <li>
                        <span>Branzino al Sale</span>
                        <span>€20.00</span>
                    </li>
                    <li>
                        <span>Frittura di Calamari e Gamberi</span>
                        <span>€18.00</span>
                    </li>
                    <li>
                        <span>Orata al Cartoccio</span>
                        <span>€22.00</span>
                    </li>
                    <li>
                        <span>Zuppa di Pesce</span>
                        <span>€25.00</span>
                    </li>
                </ul>
            </section>
            <section class="dolci">
                <h2>Dolci</h2>
                <ul>
                    <li>
                        <span>Cheesecake ai Frutti di Bosco</span>
                        <span>€6.50</span>
                    </li>
                    <li>
                        <span>Sorbetto al Limone</span>
                        <span>€5.00</span>
                    </li>
                    <li>
                        <span>Crema al Limone</span>
                        <span>€5.50</span>
                    </li>
                    <li>
                        <span>Torta al Cioccolato con Scorza d'Arancia</span>
                        <span>€7.00</span>
                    </li>
                </ul>
            </section>
        </div>
        <h1>Men&ugrave; Vegetariano</h1>
        <div class="menu_vegetariano">
                <section class="antipasti">
                    <h2>Antipasti Vegetariani</h2>
                    <ul>
                        <li>
                            <span>Bruschette con Avocado e Pomodorini</span>
                            <span>€6.00</span>
                        </li>
                        <li>
                            <span>Insalata di Quinoa e Verdure</span>
                            <span>€8.50</span>
                        </li>
                        <li>
                            <span>Carpaccio di Zucchine</span>
                            <span>€7.00</span>
                        </li>
                        <li>
                            <span>Verdure Grigliate con Hummus</span>
                            <span>€8.00</span>
                        </li>
                    </ul>
            </section>
            <section class="primi">
                <h2>Primi Piatti Vegetariani</h2>
                <ul>
                    <li>
                        <span>Ravioli di Ricotta e Spinaci</span>
                        <span>€10.00</span>
                    </li>
                    <li>
                        <span>Lasagne Vegetariane</span>
                        <span>€12.00</span>
                    </li>
                    <li>
                        <span>Pasta alla Norma</span>
                        <span>€9.50</span>
                    </li>
                    <li>
                        <span>Risotto alla Zucca</span>
                        <span>€11.00</span>
                    </li>
                </ul>
            </section>
            <section class="secondi">
                <h2>Secondi Piatti Vegetariani</h2>
                <ul>
                    <li>
                        <span>Parmigiana di Melanzane</span>
                        <span>€12.00</span>
                    </li>
                    <li>
                        <span>Polpette di Lenticchie</span>
                        <span>€10.50</span>
                    </li>
                    <li>
                        <span>Strudel di Verdure</span>
                        <span>€11.00</span>
                    </li>
                    <li>
                        <span>Frittata di Patate e Cipolle</span>
                        <span>€8.00</span>
                    </li>
                </ul>
            </section>
            <section class="dolci">
                <h2>Dolci Vegetariani</h2>
                <ul>
                    <li>
                        <span>Frutta Fresca di Stagione</span>
                        <span>€5.00</span>
                    </li>
                    <li>
                        <span>Crema Catalana</span>
                        <span>€6.00</span>
                    </li>
                    <li>
                        <span>Torta di Mele Vegan</span>
                        <span>€7.00</span>
                    </li>
                    <li>
                        <span>Biscotti Vegani con Mandorle</span>
                        <span>€4.00</span>
                    </li>
            </section>
        </div>
        <div id="piechart"></div>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Cibo', 'Prezzo'],
            ['tra i 10 euro e i 20 euro', 21],
            ['sotto i 10 euro', 22],
            ['sopra i 20 euro', 7],
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {'title':'Il range di prezzo dei nostri piatti', 'width':550, 'height':400};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
            }
            </script>
        </main>
        <footer>
            <div>&copy; 2024 Osteria da Marco. Tutti i diritti riservati.</div>
            <div><a href="mailto:s297424@studenti.polito.it">Email: s297424@studenti.polito.it</a></div>
            <div>Pagina Corrente: <?php echo basename($_SERVER['PHP_SELF']);?></div>
    </footer>
    </body>
</html>