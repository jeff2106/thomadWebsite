<?php include VIEWS . 'inc/header.php'; ?>

<div>
    <h1>Bienvenue sur la page d'ajout d'utilisateur</h1>
    <form method="post" action="" class="w-50 mx-auto">

        <div class="row g-3">
            <div class="form-floating col-md-6 mb-3">
                <input type="text" class="form-control" id="nom" placeholder="nom" name="nom">
                <label for="nom">Nom</label>
            </div>

            <div class="form-floating col-md-6 mb-3">
                <input type="text" class="form-control" id="prenom" placeholder="Prenom" name="prenom">
                <label for="prenom">Prénom</label>
            </div>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="adresse" placeholder="admin" name="adresse">
            <label for="adresse">Adresse</label>
        </div>

        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" placeholder="email" name="email">
            <label for="user">Email</label>
        </div>


        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" placeholder="votre mdp" name="mot_de_passe">
            <label for="floatingPassword">Mot de Passe</label>
        </div>

        <input type="submit" class="btn btn-primary mt-3" value="Submit" name="submit">
    </form>
</div>
<?php include VIEWS . 'inc/footer.php'; ?>