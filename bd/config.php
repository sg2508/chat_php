<!-- connexion à la bdd -->
<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=chat_php;charset=utf8', 'root', '');
} catch (Exception $e) {
	die('Erreur' . $e->getMessage());
}
