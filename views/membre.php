<div class="espace">

    <h2>Mon espace</h2>

</div>

    <div class = "form3">
        
            <form action="index.php?route=insert_book" method="POST">
            <h2>Ajouter un livre</h2>

                <label for="title" class="field-label">Titre</label><input type="text" name="title" class="field-input">
                <label for="auteur" class="field-label">Auteur</label><input type="text" name="auteur" class="field-input"/>

                <label for="categorie" class="field-label">Catégorie :</label><br><br><br>
                    <select id="cats" name="cats">
                        <option value="roman">Romans</option>
                        <option value="romanAv">Romans d'aventures</option>
                        <option value="sF">Science fiction</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="horreur">Horreurs</option>
                        <option value="bio">Biographies</option>
                        <option value="contes">Contes</option>
                        <option value="nouvelles">Nouvelles</option>
                        <option value="tem">Reportages</option>
                    </select>

                <label for="image" class="field-label">Charger une image</label><br><br><br>
                <input type="file" name="fileToUpload" id="fileToUpload">

                <label for="description" class="field-label">Description</label><input type="text" name="description" class="field-input"/>
                <label for="opinion" class="field-label">Avis</label><input type="text" name="opinion" class="field-input"/>

                <label for="note" class="field-label">Ajouter une note</label><input type="radio" name="note" class="field-input"/><br><br>
                <label for="1">1<input type="radio" id="1" name="note" value="1"checked></label>
                <label for="2">2<input type="radio" id="2" name="note" value="2"checked></label>
                <label for="3">3<input type="radio" id="3" name="note" value="3"checked></label>
                <label for="4">4<input type="radio" id="4" name="note" value="4"checked></label>
                <label for="5">5<input type="radio" id="5" name="note" value="5"checked></label><br><br>
                <input type="submit" value="Ajouter"/>

                <h3><a href="index.php">Retour</a><h3>

                <button type="submit"><a href="index.php?route=deconnect">Me déconnecter</a></button>
    
            </form>
    </div>