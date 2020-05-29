<?php
//var_dump($view['datas']);
//var_dump($view['datas']['books']); 
require "views/nav.php";

$books = $view['datas']['books'];


$list = "";


?>

<div class="espace">
    <h2>Mon espace</h2>
    <div><a href="index.php?route=deconnect">Me déconnecter</a></div>
</div>


    <div class = "form3">
        
        <form action="index.php?route=<?= isset($view['datas']['book'])? "mod_book" : "insert_book"; ?>" method="POST">
            
            <h2><?= isset($view['datas']['book'])? "Modifier un livre" : "Ajouter un livre"; ?> </h2>

                <div><label for="title" class="field-label">Titre</label><input type="text" name="title" class="field-input" value="<?= isset($view['datas']['book'])? $view['datas']['book']->getTitle() : ""; ?>"/></div>

                <div><label for="auteur" class="field-label">Auteur</label><input type="text" name="auteur" class="field-input" value="<?= isset($view['datas']['book'])? $view['datas']['book']->getAuteur() : ""; ?>"/></div>

                <div><label for="categorie" class="field-label">Catégorie :</label>

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
                </div>

                <div><label for="image" class="field-label">Charger une image</label></div>
                <div><input type="file" name="image" id="image" value="<?= isset($view['datas']['book'])? $view['datas']['book']->getImage() : ""; ?>"></div>

                <div><label for="description" class="field-label">Description</label><input type="text" name="description" class="field-input" value="<?= isset($view['datas']['book'])? $view['datas']['book']->getDescription() : ""; ?>"/></div>
                
                <div><label for="opinion" class="field-label">Avis</label><input type="text" name="opinion" class="field-input" value="<?= isset($view['datas']['book'])? $view['datas']['book']->getOpinion() : ""; ?>"/></div>

                <div><label for="note" class="field-label">Ajouter une note</label><!--<input type="radio" name="note" class="field-input" value=" <?= isset($view['datas']['book'])? $view['datas']['book']->getNote() : ""; ?> -->

                <?php for($i = 1; $i < 6; $i++) : ?>
                <?php 
                    if(isset($view['datas']['book']) && $i == $view['datas']['book']->getNote()) {
                        $selected = "checked";
                         
                    } else {
                    $selected = "";
                }
                
                ?>

                <label for="<?= $i ?>"><?= $i ?><input type="radio" id="<?= $i ?>" name="note" value="<?= $i ?>" <?= $selected ?> ></label>
                <!--<label for="2">2<input type="radio" id="2" name="note" value="2"></label>
                <label for="3">3<input type="radio" id="3" name="note" value="3"></label>
                <label for="4">4<input type="radio" id="4" name="note" value="4"></label>
                <label for="5">5<input type="radio" id="5" name="note" value="5"></label> -->
                <?php endfor ?></div>

                <div><?= isset($view['datas']['book'])? "<input type='hidden' name='id_book' value=' ".$view['datas']['book']->getIdBook()."'>" : ""; ?></div>

                <div><input type="submit" value="<?= isset($view['datas']['book'])? "Modifier" : "Ajouter"; ?>" /></div>
        </form>
    </div>       

<div class="list">

    <h2>Mes livres ajoutés :</h2>

        <ul>

            <?php foreach($books as $book) :?>
                <li>Titre : <a href="index.php?route=membre&id=<?= $book->getIdBook()?>"><?= $book->getTitle()?></a></li>
                <li>Auteur :<?=$book->getAuteur()?></li>
                <li>Image :<?=$book->getImage()?></li>
                <li>Categorie :<?=$book->categoriecomplete->getNom();?></li><!--affichage les noms des categories -->
                <li>Description :<?=$book->getDescription()?></li>
                <li>Ma note :<?=$book->getNote()?></li>
                <li>Mon avis :<?=$book->getOpinion()?></li>
                            
                <?php endforeach ?>

        </ul>

    <a href="index.php?route=insert_book=<?= $book->getIdBook()?>">Ajouter</a>
    <a href="index.php?route=membre&id=<?= $book->getIdBook()?>">Modifier</a>
    <a href="index.php?route=del_book&id=<?= $book->getIdBook()?>">Supprimer</a>

    <div><a href="index.php">Retour</a></div>

</div>

<!-- Autorisation -->
<!-- <?php if($_SESSION['user']['autorisation'] === "admin"): ?> -->
<!-- Ici on insère notre code HTML -->
<!-- <?php endif ?> -->
            


   
        

<?php
    require "views/footer.php";
?>