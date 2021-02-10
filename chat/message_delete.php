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

$id = [$_GET['id']];

if (!empty($_GET)) {
	$statement = $bdd->prepare('DELETE FROM user_chat WHERE id_user_chat = ?');
	$statement->execute($id);
} else {
	echo'Erreur suppression';
}

// Puis rediriger vers minichat.php comme ceci :
header('Location: minichat.php');
	$reponse->closeCursor();
