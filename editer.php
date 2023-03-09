
<section class="change_admin_page">
    <form action="" method="get">
        <div class="flex_center search_bar">
      
            <input id="searchbar" onkeyup="search_menu()" type="text" name="search" placeholder="Chercher un menu..">  
            <div class="bouton">
                <button type="submit" value="submit" name="submit">search</button> 
            </div>
        </div>
    </form>
</section>


<?php
include 'basedoneesite.php';

if (isset($_GET['search'])) {
    $nom = $_GET['search'];
    
    $query = "SELECT * FROM menu WHERE nom = :nom";
    $stmt = $dbb->prepare($query);
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<form method='post'>";
            echo "<label for='nom'>Nom:</label>";
            echo "<input type='text' id='nom' name='nom' value='" . $row['nom'] . "'><br><br>";
            echo "<label for='entree'>Entrée:</label>";
            echo "<input type='text' id='entree' name='entree' value='" . $row['entrée'] . "'><br><br>";
            echo "<label for='plat'>Plat:</label>";
            echo "<input type='text' id='plat' name='plat' value='" . $row['plat'] . "'><br><br>";
            echo "<label for='dessert'>Dessert:</label>";
            echo "<input type='text' id='dessert' name='dessert' value='" . $row['dessert'] . "'><br><br>";
            echo "<label for='boisson'>Boisson:</label>";
            echo "<input type='text' id='boisson' name='boisson' value='" . $row['boisson'] . "'><br><br>";
            echo "<label for='tarif'>Tarif:</label>";
            echo "<input type='text' id='tarif' name='tarif' value='" . $row['tarif'] . "'><br><br>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<button type='submit' name='edit'>Edit</button>";
            echo "</form>";
        }
    } else {
        echo "veuillez entrer un menu existant";
    }
}


if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $entree = $_POST['entree'];
    $plat = $_POST['plat'];
    $dessert = $_POST['dessert'];
    $boisson = $_POST['boisson'];
    $tarif = $_POST['tarif'];
    
    $query = "UPDATE menu SET nom = :nom, entrée = :entree, plat = :plat, dessert = :dessert, boisson = :boisson, tarif = :tarif WHERE id = :id";
    $stmt = $dbb->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':entree', $entree, PDO::PARAM_STR);
    $stmt->bindParam(':plat', $plat, PDO::PARAM_STR);
    $stmt->bindParam(':dessert', $dessert, PDO::PARAM_STR);
    $stmt->bindParam(':boisson', $boisson, PDO::PARAM_STR);
    $stmt->bindParam(':tarif', $tarif, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        echo "Menu modifié avec succès";
    } else {
        echo "Erreur lors de la modification du menu";
    }
}
?>

   