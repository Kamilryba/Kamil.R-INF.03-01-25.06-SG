<?php

use Dom\Mysql;

$connection = new mysqli('localhost','root','','gry');
?>
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
                <?php
                    $zapytanie1 = mysqli_query($connection,'SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5;');
                    while($gra = $zapytanie1-> fetch_assoc()){
                        echo "
                        <li>".$gra['nazwa']." <mark class='punkty'>".$gra['punkty']."</mark></li>
                        ";
                    }
                ?>
            </ul>
            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Stronę wykonał</h3>
            <p>0000000000</p>
        </section>
        <section class="srodkowy">
            <?php
                $zapytanie2 = mysqli_query($connection,'SELECT gry.id, gry.nazwa, gry.zdjecie FROM gry;');
                while($gra = $zapytanie2-> fetch_assoc()){
                    echo "
                        <article class ='gra'>
                            <img src='".$gra['zdjecie']."' alt='".$gra['nazwa']."' title='".$gra['id']."'>
                            <p>".$gra['nazwa']."</p>
                        </article>
                    ";
                }
            ?>
        </section>
        <section class="prawy">
            <h3>Dodaj nową grę</h3>
            <form action="gry.php" method="post">
                <label for="nazwa">nazwa</label><br>
                <input type="text" name="nazwa"><br>
                <label for="opis">opis</label><br>
                <input type="text" name="opis"><br>
                <label for="cena">cena</label><br>
                <input type="text" name="cena"><br>
                <label for="zdjęcie">zdjęcie</label><br>
                <input type="text" name="zdjęcie"><br>
                <input type="submit" value="DODAJ">
            </form>
        </section>
    <footer>
        <form action="gry.php" method="post">
            <input type="text" name="id">
            <input type="submit" value="Pokaż opis">
        </form>
         <?php
            if(isset($_POST['id'])){
                $zapytanie3 = mysqli_query($connection,"SELECT gry.nazwa, LEFT(gry.opis, 100), gry.punkty,gry.cena FROM gry WHERE gry.id = ".$_POST["id"]." ;");
                while($gra = $zapytanie3 -> fetch_assoc()){
                    echo " <h2>".$gra['nazwa'].", ".$gra['punkty']." punktów, ".$gra['cena']." zł</h2>
                    <p>".$gra['LEFT(gry.opis, 100)']."</p>
                    ";
                }
            }
            ?>
    </footer>
</body>
</html>
<?php
    if(isset($_POST['nazwa'])){
        if($_POST['nazwa'] != ""){
            
        if(!isset($_POST['opis'])){
            $_post['opis'] = "";
        }
        elseif(!isset($_POST['cena'])){
            $_post['cena'] = "";
        }
        elseif(!isset($_POST['zdjęcie'])){
            $_post['zdjęcie'] = "";
        }else{
        $zapytanie4 = mysqli_query($connection,"INSERT INTO `gry`( `nazwa`, `opis`, `cena`, `zdjecie`) VALUES ('".$_POST['nazwa']."','".$_POST['opis']."','".$_POST['cena']."','".$_POST['zdjęcie']."');");
        
        }
        }
    }


    $connection -> close();
?>