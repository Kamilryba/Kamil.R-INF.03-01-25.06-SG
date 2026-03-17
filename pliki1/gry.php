<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gry Komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Ranking Gier Komputerowych</h1>
    </header>
        <section class="lewy">
            <h3>Top 5 gier w tym miesiącu</h3>
            <ul>
                
            </ul>
            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Stronę wykonał</h3>
            <p>0000000000</p>
        </section>
        <section class="srodkowy">

        </section>
        <section class="prawy">
            <h3>Dodaj nową grę</h3>
            <form action="gry.php" method="post">
                <label for="nazwa">nazwa</label>
                <input type="text" name="nazwa">
                <label for="opis">opis</label>
                <input type="text" name="opis">
                <label for="cena">cena</label>
                <input type="text" name="cena">
                <label for="zdjęcie">zdjęcie</label>
                <input type="text" name="zdjęcie">
                <input type="submit" value="DODAJ">
            </form>
        </section>
    <footer>
        <form action="gry.php" method="post">
            <input type="text">
            <input type="submit" value="Pokaż opisz">
        </form>
    </footer>
</body>
</html>