<?php
session_start();
if (isset($_SESSION['pseudoo']) AND !empty($_SESSION['pseudoo']))
{$r = $_SESSION['pseudoo'];}
else {
    $r='Pseudo';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page a Mini chat</title>
    </head>
     <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
       
    <p> Vieuller sesire ton message :  </p>
     <p>   <form name="monform" action="minichatpost.php" method="post" >
        <label for="pseudo">Pseudo :</label>
          <input type="Text" name="pseudo1" placeholder= "<?php echo $r; ?>">
          <br />
<label for="pseudo">Message :</label>
            <input type="text" name="Messgespost"><br />
            <input type="submit" name="envoyer" value="envoyer">
            
        </form>
          <?php
        //connexion à la base de donnée
            try{
                 $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8;','root','');
               }
            catch(Exception $e)
                {
                die('Erreur: '. $e->getmessage());
                }

        // requête pour récupurer les données
                $reponse = $bdd->query('Select * from message_minichat ORDER BY ID DESC LIMIT 0, 10');
               while ( $donnees = $reponse->fetch()) {
                //affichage des message
                    //   echo $donnees['pseudo'] .' :::::: '.$donnees['message'] . '</br>';
                echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';

                }
               

        //afficher s il y a des messsages



        ?>
    </p>
      
        
    </body>
</html>
