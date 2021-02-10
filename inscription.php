<!-- formulaire d'unscription -->
<!DOCTYPE html>
<html lang="fr-fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire d inscription chat php</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <h1>Formulaire d'inscription</h1>

<!-- appel message erreur -->
<?php require 'message_error.php'; ?>

    <div class="container-fluid">
        <form method="POST" action="inscription_traitement.php">
            <div class="form-group">
                <label for="user_name">Nom d'utilisateur </label>
                <input type="text" class="form-control" placeholder="Nom d'utilisateur" id="user_name" name="user_name"
                    required="requiered">
            </div>
            <div class="form-group">
                <label for="user_email">Email </label>
                <input type="email" class="form-control" id="user_email" aria-describedby="emailHelp" name="user_email"
                    required="requiered" placeholder="Email">
                <small id="user_email" class="form-text text-muted">Nous ne partagerons jamais votre e-mail.</small>
            </div>
            <div class="form-group">
                <label for="user_password">Mot de passe</label>
                <input type="password" class="form-control" id="user_password" name="user_password"
                    placeholder="Mot de passe" required="requiered">
            </div>
            <div class="form-group">
                <label for="password_retype ">Re-saisir le mot de passe</label>
                <input type="password" class="form-control" id="password_retype " name="password_retype"
                    placeholder="Mot de passe" required="requiered">
            </div>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">Se souvenir de moi</label>
            </div>

            <button type="submit" class="btn btn-primary">Inscription</button>
        </form>
        <a href="connexion.php">
            Déjà inscrit</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>