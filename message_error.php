<div class="login-form">
    <?php

	//appel function
	require_once 'function/function.php';

				if (isset($_GET['login_err'])) {
					$err = valid_donnees($_GET['login_err']);

					switch ($err) {
						case 'user_name':
						?>
    <div class="alert alert-danger" role="alert">
        <strong>Success</strong> Le nom de l'utilisateur est incorrect
    </div>
    <?php
		  break;
		  case 'user_name_length':
	?>
    <div class="alert alert-danger" role="alert">
        <strong>Erreur</strong> La longueur du nom d'utilisateur ne doit pas dépasser 100 caratères
    </div>
    <?php
						break;
						case 'email':
					?>
    <div class="alert alert-danger" role="alert">
        <strong>Erreur</strong> L'email ou le mot de passe est incorect
    </div>
    <?php
		  break;
		  case 'already_exist':
	?>
    <div class="alert alert-danger" role="alert">
        <strong>Erreur</strong> Le compte existe déjà
    </div>
    <?php
		  break;
		  case 'user_email_length':
	?>
    <div class="alert alert-danger" role="alert">
        <strong>Erreur</strong> La longueur de l'email ne doit pas dépasser 100 caratères
    </div>
    <?php
		  break;
		  case 'already':
	?>
    <div class="alert alert-danger" role="alert">
        <strong>Erreur</strong> compte non existant
    </div>
    <?php
		  break;
		  case 'pass_no_ident':
	?>
    <div class="alert alert-danger" role="alert">
        <strong>Erreur</strong> Les mots de passe ne correspondes pas
    </div>
    <?php
		  break;
		  case 'success':
	?>
    <div class="alert alert-info" role="alert">
        <strong>Success</strong> Enregistrement réussi
    </div>

    <?php
		   break;
	}
				}
		?>
</div>