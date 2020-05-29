<!--<h1>CLUB de LIVRES</h1>-->
<?php require "views/nav.php"; ?>

<div class = "form1">
                
        <form action="index.php?route=insert_user" method="POST">
        <h2>Inscrivez-vous</h2>
        
            <div class="field">
                <label for="name" class="field-label">Nom</label>
                <input type="text" name="nom" class="field-input">
            </div>
        
            <div class="field">
                <label for="name2" class="field-label">Prénom</label>
                <input type="text" name="prenom" class="field-input">
            </div>
        
            <div class="field">
                <label for="email" class="field-label">E-mail</label>
                <input type="text" name="email" class="field-input">
            </div>
        
            <div class="field">
                <label for="nick" class="field-label">Nick</label>
                <input type="text" name="nick" class="field-input">
            </div>
        
                        
            <div class="field">
                <label for="password" class="field-label">Mot de passe</label>
                <input type="password" name="password" class="field-input">
            </div>
        
            <div class="field">
                <label for="password2" class="field-label">Répétez le mot de passe</label>
                <input type="password" name="password2" class="field-input">

            </div>
                <button type="submit">Créer un compte</button> 
                <h3><a href="index.php">Retour</a><h3>
            </div>
    
        </form>
    </div>
            
<div class = "form2">
                    
        <form action="index.php?route=connect_user" method="POST">
            
        <h2>Connectez-vous</h2>
        
            <div class="field">
                <label for="nick" class="field-label">Nick</label>
                <input type="text" name="nick" class="field-input"/>
            </div>
        
            <div class="field">
                <label for="password" class="field-label">Mot de passe</label>
                <input type="password" name="password" class="field-input"/>
            </div>
        
            <h3><a href="#">Mot de passe oublié?</a></h3>
        
            <button type="submit">Connectez-vous</button>
        
            <h3><a href="index.php">Creer un compte</a><h3>

        </form>
</div>
                

<?php
    require "views/footer.php";
?>      
        
