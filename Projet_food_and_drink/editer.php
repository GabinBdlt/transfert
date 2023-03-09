<?php
include '../database.php';
if (
    isset($_POST['menu_id']) && isset($_POST['menu_nom']) && isset($_POST['menu_entree']) && isset($_POST['menu_plat']) 
    && isset($_POST['menu_dessert']) && isset($_POST['menu_boisson']) && isset($_POST['menu_tarif'])
) {
    $id = $_POST['menu_id'];
    $nom = $_POST['menu_nom'];
    $entree = $_POST['menu_entree'];
    $plat = $_POST['menu_plat'];
    $dessert = $_POST['menu_dessert'];
    $boisson = $_POST['menu_boisson'];
    $tarif = $_POST['menu_tarif'];

    if (empty($nom) || empty($entree) || empty($plat) || empty($dessert) || empty($boisson) || empty($tarif)) {
        echo "Veuillez vérifier tous les champs du formulaire.";
    } elseif (!is_numeric($tarif)) {
        echo 'Vérifiez le champ Tarif';
    } else {
        $sql = "UPDATE menu SET nom=:nom, entrée=:entree, plat=:plat, dessert=:dessert, boisson=:boisson, tarif=:tarif WHERE id=:id";
        $stmt = $dbb->prepare($sql);

        $stmt->execute(["id" => $id, "nom" => $nom, "entree" => $entree, "plat" => $plat, "dessert" => $dessert, "boisson" => $boisson, "tarif" => $tarif]);

        if ($stmt->rowCount()) {
            echo "Menu mis à jour avec succès!";
        } else {
            echo "Impossible de mettre à jour le menu.";
        }
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM menu WHERE id=:id";
    $stmt = $dbb->prepare($sql);
    $stmt->execute(["id" => $id]);
    $menu = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Formulaire d'édition de menu -->
<form method="POST">
    <input type="hidden" name="menu_id" value="<?php echo $menu['id']; ?>">
    <label for="menu_nom">Nom du menu :</label>
    <input type="text" name="menu_nom" value="<?php echo $menu['nom']; ?>">
    <br>
    <label for="menu_entree">Entrée :</label>
    <input type="text" name="menu_entree" value="<?php echo $menu['entrée']; ?>">
    <br>
    <label for="menu_plat">Plat :</label>
    <input type="text" name="menu_plat" value="<?php echo $menu['plat']; ?>">
    <br>
    <label for="menu_dessert">Dessert :</label>
    <input type="text" name="menu_dessert" value="<?php echo $menu['dessert']; ?>">
    <br>
    <label for="menu_boisson">Boisson :</label>
    <input type="text" name="menu_boisson" value="<?php echo $menu['boisson']; ?>">
    <br>
    <label for="menu_tarif">Tarif :</label>
    <input type="text" name="menu_tarif" value="<?php echo $menu['tarif']; ?>">
    <br>
    <input type="submit" value="Enregistrer les modifications">
    <br>
    <input type="submit" value="Enregistrer les modifications">
    </form>