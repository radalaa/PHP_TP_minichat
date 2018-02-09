<?php
//connexion à la base de donnée
            try{
                 $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8;','root','');
               }
            catch(Exception $e)
                {
                die('Erreur: '. $e->getmessage());
                }


session_start();
    if (isset($_POST['pseudo1']) AND !empty($_POST['pseudo1']) and !empty($_POST['Messgespost']))
    {
        $_SESSION['pseudoo'] =$_POST['pseudo1'];


 
    $pseudo_de_post = $_POST['pseudo1'];
    $messages_de_post = $_POST['Messgespost'];  
    

                $req = $bdd->prepare('INSERT INTO message_minichat(pseudo, message,date_message) VALUES(:nom, :possesseur, NOW())');
                $req->execute(array(    
                    'nom' => $pseudo_de_post,
                    'possesseur' => $messages_de_post,
                                ));

            // Effectuer ici la requête qui insère le message
            header('Location: minichat.php');


        }else{
            
             header('Location: minichat.php');
        }

    
