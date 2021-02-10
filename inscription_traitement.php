<?php

// démmarer les sessions
session_start();

// connect à la bd
require_once 'bd/config.php';
//appel function
require_once 'function/function.php';

// verification post non vide et existe
if (isset($_POST['user_name']) && isset($_POST['user_email'])
	&& isset($_POST['user_password']) && isset($_POST['password_retype'])) {
	$user_name = valid_donnees($_POST['user_name']);
	$user_email = valid_donnees($_POST['user_email']);
	$user_password = valid_donnees($_POST['user_password']);
	$password_retype = valid_donnees($_POST['password_retype']);

	// prepare sql :
	$check_mail = $bdd->prepare('SELECT user_name, user_email, user_password FROM users WHERE user_email = ?');
	$check_mail->execute([$user_email]);
	$data_mail = $check_mail->fetch();
	// verifie si l'email existe
	$row_mail = $check_mail->rowCount();

	if ($row_mail == 0) {
		// Verifier la longueur des champs
		if (strlen($user_name) <= 100) {
			// code...
			if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
				// code...verifie longueur email
				if (strlen($user_email) <= 100) {
					// code...verifie si l'eemail est valide
					if ($user_password == $password_retype) {
						// code...hashage du mot de passe
						$user_pass = password_hash($user_password, PASSWORD_ARGON2I);
						// Recuperer l adresse IP
						// $ip = $_SERVER['REMOTE_ADDR'];

						//prepare et execute la requete d insertion avec un tableau associatif
						$insert = $bdd->prepare('INSERT INTO users(user_name, user_email, user_password) VALUES(:pseudo, :email, :password)');
						$insert->execute([
							'pseudo' => $user_name,
							'email' => $user_email,
							'password' => $user_pass
							
						]);
						//redirection inscription avec message de succès
						header('Location:index.php?login_err=success');
						die();
					} else {
						// code...
						header('Location:inscription.php?login_err=pass_no_ident');
					}
				} else {
					header('Location:inscription.php?login_err=email_length');
				}
			} else {
				// code...verifie si l email est valide
				header('Location:inscription.php?login_err=email');
			}
		} else {
			// code...
			header('Location:inscription.php?login_err=user_name_length');
		}
	} else {
		header('Location:inscription.php?login_err=already_exist');
	}
} else {
	echo'recept post vide no ok';
	header('Location:inscription.php');
}
