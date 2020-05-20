<div class="espace">

    <h1>Mon espace</h1>

</div>

    <div class = "form3">
        <h2>Ajouter un livre</h2>
        
            <form action="index.php?route=insert_book" method="POST">

                <label for="title"><input type="text" placeholder="Titre" name="title"/></label>
                <label for="author"><input type="text" placeholder="Auteur" name="author"/></label>
                <label for="description"><input type="text" placeholder="Description" name="description"/></label>
                <label for="opinion"><input type="text" placeholder="Avis" name="opinion"/></label>
                <p>Ajouter une note<br></p>
                <label for="1">1<input type="radio" id="1" name="note" value="1"checked></label>
                <label for="2">2<input type="radio" id="2" name="note" value="2"checked></label>
                <label for="3">3<input type="radio" id="3" name="note" value="3"checked></label><br>
                <input type="submit" value="Ajouter"/>
                <h3><a href="index.php">Retour</a><h3>
                <h3><a href="index.php?route=deconnect">Me déconnecter</a></h3>
    
            </form>
    </div>
