    <?php require '../bd/config.php'; 
          require '../function/function.php'?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <title>tp mini chat php mysql</title>


    </head>

    <body>
      <div class="container_fluid p-3">
        <h1>TP mini chat PHP MySQL bienvenu</h1>
        <br>
        <h2>saisir votre nom et votre message</h2>
        <form action="minichat_post.php" method="post">
          <div class="form-group">
            <label for="user_name">Nom d'utilisateur <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="user_name" id="user_name" required
              pattern="[a-z0-9_\.\-]{2,50}"
              title="2 caractères minimum, types autorisé : . - _  a-z 0-9, pas d'espace en début de ligne"
              placeholder="Nom d'utilisateur">
          </div>
          <div class="form-group">
            <label for="user_message">Saisir votre message <span class="text-danger">*</span></label>
            <textarea class="form-control" name="user_message" id="user_message" required pattern="[a-z0-9_\.\-]{2,255}"
              title="2 caractères minimum, types autorisé : . - _  a-z 0-9, pas d'espace en début de ligne"
              placeholder="Votre text 2 catatères minimum et 255 max" rows="3"></textarea>
          </div>

          <div class="form-group">
            <label for="btn-envoi"></label>
            <button class="btn btn-primary" type="submit" id="btn-envoi">
              Envoyer</button>
          </div>
        </form>
        <br>
        <h2>Message du forum</h2>
        <br>
        <table class="table" table-striped>
          <thead>
            <tr>
              <th scope="col">Message N°</th>
              <th scope="col">Nom uilisateur</th>
              <th scope="col">message</th>
              <th style="width:15%" scope="col">date</th>
              <th scope="col">modifier</th>
              <th scope="col">supprimer</th>
            </tr>
          </thead>

          <?php

			// Récupération des 10 derniers messages
			$full_identity = $bdd->query('SELECT * FROM message_chat
                                    INNER JOIN users
                                    WHERE message_chat.id_user_message = users.id_user
                                    ORDER BY date_message 
                                    DESC LIMIT 0, 10');

			// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
			while ($identitys = $full_identity->fetch()) {
				echo(
			  '<tr>
				<td>' .
					valid_donnees($identitys['id_message']) .
				'</td>' .
				'<td>' .
					valid_donnees($identitys['id_user_message']) .
				'</td>' .
				'<td class="text-break">' .
					valid_donnees($identitys['message']) .
				'</td>' .
				'<td style="width: 15%">' .
					 date('d-m-Y H:i:s', strtotime($identitys['date_message'])) .
				'</td>' .
				'<td style="width: 100px">' .
					'<buton class="btn btn-info" type="submit">modif</button>' .
				'</td>' .
				'<td>' .
				'<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Supprimer
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Voulez-vous supprimer le message N°'.$identitys['id_message'] .'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
        <a class="btn btn-danger" type="button" href="message_delete.php?id=' . $identitys['id_message'] . '" >Oui</a>
      </div>
    </div>
  </div>
</div>' .
					'</td>' .
			'</tr>'
			);
			}
			?>
        </table>
      </div>



      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
      </script>
    </body>

    </html>