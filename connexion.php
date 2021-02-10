<!-- traitement de la connexion -->
<?php
// démmarer les sessions
session_start();

// connect à la bd
require_once 'bd/config.php';
//appel function
require_once 'function/function.php';

// Vérifie la bonne réception de la variable
if (isset($_POST['email']) && isset($_POST['password'])) {
	$email = valid_donnees($_POST['email']);
	$pass = valid_donnees($_POST['password']);
	echo($email);
	// Check si la personne existe dans la bd grace à son mail
	$check = $bdd->prepare('SELECT  user_email, user_password, user_name FROM users WHERE user_email = ?');
	$check->execute([$email]);
	// Stock les données dans $data
	$data = $check->fetch();
	// rowCount() Retourne le nombre de lignes affectées par la requête $check
	$row = $check->rowCount();

	// Si la personne existe
	if ($row == 1) {
		// Vérifie que l'adresse email est bien valide
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			// hashage du mot de passe
			$password = password_hash($data['user_password'], PASSWORD_ARGON2I);
			// Vérifie si le mot de passe est ok
			if (password_verify($pass, $data['user_password'])) {
				// Création variable de SESSION user_name
				$_SESSION['user'] = $data['user_name'];
				header('Location:chat/minichat.php');
			} else {
				// Redirection avec message d'erreur grace à GET password
				header('Location:index.php?email');
			}
		} else {
			// Redirection avec message d'erreur grace à GET email
			header('Location:index.php?login_err=email');
		}
	} else {
		// Redirection avec message d'erreur grace à GET email / password
		header('Location:index.php?login_err=already');
	}
} else {
	header('Location:index.php');
}
