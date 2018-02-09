<?php
//connexion à la base de donnée
            try{
                 $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8;','root','');
               }
            catch(Exception $e)
                {
                die('Erreur: '. $e->getmessage());
                }

?>

<?php
session_start();
if (isset($_POST['pseudo1']) AND !empty($_POST['pseudo1']))
{$_SESSION['pseudoo'] =$_POST['pseudo1'];}



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page minichat</title>
    </head>
    <body>
 
    <?php
    $pseudo_de_post = $_POST['pseudo1'];
    $messages_de_post = $_POST['Messgespost'];
  
    

                $req = $bdd->prepare('INSERT INTO message_minichat(pseudo, message) VALUES(:nom, :possesseur)');
                $req->execute(array(    
                    'nom' => $pseudo_de_post,
                    'possesseur' => $messages_de_post,
                    ));

                echo 'Le jeu a bien été ajouté !';

            // Effectuer ici la requête qui insère le message
            // Puis rediriger vers minichat.php comme ceci :
            header('Location: minichat.php');

/*
            if (isset($_POST['pseudo']) AND isset($_POST['Messgespost']) ) {
                echo 'mot de passe correcte';
            }else{
                echo 'mot de passe incorrecte';

            }*/
        ?>
    </body>
</html>