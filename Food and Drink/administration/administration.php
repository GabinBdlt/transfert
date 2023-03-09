
<!DOCTYPE html>
<html lang="en">

<?php include '../basedonéesite.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Projet Dev</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo" id="head">
                <img src="./img/food-and-drink.svg" alt="">
            </div>
            <div class="admin_header">
                <ul>
                    <a href="index.html">
                        <li>Admin Page</li>
                    </a>
                    <a href="#">
                        <li>Ajouter/modifier</li>
                    </a>
                    <a href="#">
                        <li>Supprimer/visualiser</li>
                    </a>
                </ul>
            </div>
            <div class="log-in">
                <img src="./img/log-in.svg" alt="">
            </div>
        </nav>
    </header>
    <section class="change_admin_page">
        <div class="flex_center search_bar">
            <!-- input tag -->
            <input id="searchbar" onkeyup="search_menu()" type="text"
            name="search" placeholder="Chercher un menu..">   
        </div>
        <div class="flex_center admin_change">
            <h2>NOS MENUS</h2>
        </div>
        <div class="MenuAffiche">
        <?php
         
         $st = $dbb->prepare("select * from menu");
         $st->execute();
         $data = $st->fetchAll();
       
         foreach ($data as $record) {

             $id = $record['id'];
             $nom = $record['nom'];
             $tarif = $record['tarif'];
             $entrée = $record['entrée'];
             $plat = $record['plat'];
             $dessert = $record['dessert'];
             $boisson = $record['boisson'];
             echo "<h4><span class='menunom color'> Menu $nom : $tarif €</h4>";
             echo "<li class='color'><span class='menutitre color'> Entrée : " . "<span class='menuligne color'>$entrée</li>";
             echo "<li class='color'><span class='menutitre color'> Plat : " . "<span class='menuligne color'>$plat</li>";
             echo "<li class='color'><span class='menutitre color'> Dessert : " . "<span class='menuligne color'>$dessert</li>";
             echo "<li class='color'><span class='menutitre color'> Boisson : " . "<span class='menuligne color'>$boisson</li>";
             echo "<li class='color'><span class='menutitre color'> ID : " . "<span class='menuligne color'>$id</li>";
             echo "<button class='btn_supr' type='submit'method='desac'>Désactiver</button>";
         }                      
         ?>
        </div>
        <div class="formulaire">
            <div>
                <h1>Formulaire</h1>
            </div>
            <form action="ajouter.php"  method='POST'>
                <div class="bloc_forme" id="bloc_nom">
                  <input class="bloc_form" type="text" id="nom" name="menu_nom" placeholder="Nom">
                </div>
              
                <div class="bloc_forme" id="bloc_entree">
                  <input class="bloc_form" type="Text" id="entree" name="menu_entree" placeholder="Entrée">
                </div>
              
                <div class="bloc_forme" id="bloc_plat">
                    <input class="bloc_form" type="text" id="plat" name="menu_plat" placeholder="Plat">
                  </div>
                
                <div class="bloc_forme" id="bloc_dessert">
                    <input class="bloc_form" type="Text" id="dessert" name="menu_dessert" placeholder="Dessert">
                </div>

                <div class="bloc_forme" id="bloc_boisson">
                    <input class="bloc_form" type="text" id="boisson" name="menu_boisson" placeholder="Boisson">
                </div>
                
                <div class="bloc_forme" id="bloc_tarif">
                    <input class="bloc_form" type="Text" id="tarif" name="menu_tarif" placeholder="Tarif">
                </div>
                
                <div class="bloc_forme buttons">
                    <button class="btn btn_admin" type="submit">Ajouter</button>
                    <button class="btn btn_admin" type="submit">Modifier</button>
                </div>
              </form>
        </div>
    </section>
    <footer class="flex_center">
        <div class="container">
            <div class="bloc nous_joindre">
                <div>
                    <h3>NOUS JOINDRE</h3>
                    <div class="text_footer">
                        <p>3 rue de la Chalotais,<br/>35000 Rennes</p>
                        <p>Tel: 07 84 74 91 29</p>
                    </div>
                </div>
            </div>
            <div class="bloc logo">
                <img src="./img/food-and-drink.svg" alt="">
            </div>
            <div class="bloc nos_horaire">
                <div>
                    <h3>NOS HORAIRE</h3>
                    <div class="text_footer">
                        <p>Du lundi au samedi<br/>de 11h00 à 15h00 et de 19h00 à 23h00</p>
                        <p>Le restaurant est fermé le dimanche</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>