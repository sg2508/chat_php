<?php

// Fonction qui nettoie les données
function valid_donnees($donnees)
{
	// supprimer les espaces
	$donnees = trim($donnees);
	// supprimer les antislashes
	$donnees = stripslashes($donnees);
	// échapper les chevrons
	$donnees = htmlspecialchars($donnees);

	return $donnees;
}
