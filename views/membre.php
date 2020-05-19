<div class="espace">

    <h1>Mon espace</h1>

</div>

    <div class = "form3">
        <h2>Ajouter un livre</h2>
        
            <form action="index.php?route=membre" method="POST">

                <label for="titre"><input type="text" placeholder="Titre" name="titre"/></label>
                <label for="auteur"><input type="text" placeholder="Auteur" name="auteur"/></label>
                <label for="description"><input type="text" placeholder="Description" name="description"/></label>
                <label for="avis"><input type="text" placeholder="Avis" name="avis"/></label>
                
                <input type="submit" value="Ajouter"/>
                <h3><a href="index.php">Retour</a><h3>
                <h3><a href="index.php?route=deconnect">Me déconnecter</a></h3>
    
            </form>
    </div>
