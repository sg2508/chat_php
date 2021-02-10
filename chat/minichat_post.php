<?php

// Connexion à la base de données
try {
	$bdd = new PDO(
		'mysql:host=localhost;
                    dbname=tp_mini_chat_oc;
                    charset=utf8',
		'root',
		''
	);
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
	echo 'la connexion a échoué: ';
}
// Connexion fichier function
 require 'function/function.php';

if (!isset($_POST)) {
	echo'non ok';
} else {
	echo'ok';
}
// die();
// funcion valid_donnees(nettoyage de données)
valid_donnees($user_name = $_POST['user_name']);
valid_donnees($user_message = $_POST['user_message']);

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO user_chat (user_name, user_message) VALUES(?, ?)');
$req->execute([$user_name, $user_message]);

// Puis rediriger vers minichat.php comme ceci :
header('Location: minichat.php');
$reponse->closeCursor();
