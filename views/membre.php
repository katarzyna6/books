<?php
//var_dump($view['datas']);
//var_dump($view['datas']['books']); 
require "views/nav.php";

$books = $view['datas']['books'];


$list = "";


?>

<div class="espace">
    <h2>Mon espace</h2>
</div>

<h3><a href="index.php?route=deconnect">Me déconnecter</a></h3>

    <div class = "form3">
        
            <form action="index.php?route=<?= isset($view['datas']['book'])? "mod_book" : "insert_book"; ?>" method="POST">
            
            <h2><?= isset($view['datas']['book'])? "Modifier un livre" : "Ajouter un livre"; ?> </h2>

                <label for="title" class="field-label">Titre</label><input type="text" name="title" class="field-input" value="<?= isset($view['datas']['book'])? $view['datas']['book']->getTitle() : ""; ?>"/>

                <label for="auteur" class="field-label">Auteur</label><input type="text" name="auteur" class="field-input" value="<?= isset($view['datas']['book'])? $view['datas']['book']->getAuteur() : ""; ?>"/>

                <label for="categorie" class="field-label">Catégorie :</label><br><br><br>

                    <select id="cats" name="cats">

                        <?php foreach ($view["datas"]["cat"] as $cat): ?>
                            <option value="<?=$cat->getIdCategorie(); ?>"><?=$cat->getNom(); ?></option>
                            
                        <?php endforeach ?>
                        <!--<option value="roman">Roman</option>
                        <option value="romanAv">Roman d'aventure</option>
                        <option value="sF">Science fiction</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="horreur">Horreur</option>
                        <option value="bio">Biographie</option>
                        <option value="contes">Conte</option>
                        <option value="nouvelles">Nouvelle</option>
                        <option value="tem">Reportage</option> -->
                    </select>

                <label for="image" class="field-label">Charger une image</label><br><br><br>
                <input type="file" name="image" id="image" value="<?= isset($view['datas']['book'])? $view['datas']['book']->getImage() : ""; ?>">

                <label for="description" class="field-label">Description</label><input type="text" name="description" class="field-input" value="<?= isset($view['datas']['book'])? $view['datas']['book']->getDescription() : ""; ?>"/>
                
                <label for="opinion" class="field-label">Avis</label><input type="text" name="opinion" class="field-input" value="<?= isset($view['datas']['book'])? $view['datas']['book']->getOpinion() : ""; ?>"/>

                <label for="note" class="field-label">Ajouter une note</label><input type="radio" name="note" class="field-input" value="<?= isset($view['datas']['book'])? $view['datas']['book']->getNote() : ""; ?>"/><br><br>

                <label for="1">1<input type="radio" id="1" name="note" value="1"></label>
                <label for="2">2<input type="radio" id="2" name="note" value="2"></label>
                <label for="3">3<input type="radio" id="3" name="note" value="3"></label>
                <label for="4">4<input type="radio" id="4" name="note" value="4"></label>
                <label for="5">5<input type="radio" id="5" name="note" value="5"></label><br><br>

                <?= isset($view['datas']['book'])? "<input type='hidden' name='id_book' value=' ".$view['datas']['book']->getIdBook()."'>" : ""; ?>

                <input type="submit" value="<?= isset($view['datas']['book'])? "Modifier" : "Ajouter"; ?>" />
               

                

                <div class="list">

                <h2>Mes livres ajoutés :</h2>

                    <ul>

                        <?php foreach($books as $book) :?>
                            <li>Titre : <a href="index.php?route=membre&id=<?= $book->getIdBook()?>"><?= $book->getTitle()?></li></a><br>
                            <li>Auteur :<br><?=$book->getAuteur()?></li><br>
                            <li>Image :<br><?=$book->getImage()?></li>
                            <li>Categorie :<br><?=$book->categoriecomplete->getNom();?></li><!--affichage les noms des categories -->
                            <li>Description :<br><?=$book->getDescription()?></li>
                            <li>Ma note :<br><?=$book->getNote()?></li>
                            <li>Mon avis :<br><?=$book->getOpinion()?></li>
                            <h3><a href="index.php?route=insert_book=<?= $book->getIdBook()?>">Ajouter</a></h3>
                            <h3><a href="index.php?route=membre&id=<?= $book->getIdBook()?>">Modifier</a></h3>
                            <h3><a href="index.php?route=del_book&id=<?= $book->getIdBook()?>">Supprimer</a></h3>
                        <?php endforeach ?>

                    </ul>
                    <!-- Autorisation -->
                        <!-- <?php if($_SESSION['user']['autorisation'] === "admin"): ?> -->
                    <!-- Ici on insère notre code HTML -->
                    <!-- <?php endif ?> -->
                </div>

                <h3><a href="index.php">Retour</a><h3>
   
            </form>
    </div>

<?php
    require "views/footer.php";
?>