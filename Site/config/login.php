<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'amos';
    $db_password = 'admin';
    $db_name     = 'dojo_Php';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['pseudo'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['pwd']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM Utilisateur where 
              Pseudo = '".$username."' and MotDePasse = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
      //   if (isset($_POST['connecter'])) {
      //      setcookie('user-id', $count->id, time()+ 3600 * 24 * 3);
      //   }
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           if (isset($_POST['remember'])) {
              setcookie('nom', $username, time()+365*24*3600, null, null, false, true);
              setcookie('password', $password, time()+365*24*3600, null, null, false, true);
           }
           $_SESSION['pseudo'] = $username;
           header('Location: page.php');
        }
        else
        {
           header('Location: index.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
       
    }
    else
    {
       header('Location: index.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location:../composants/profil.php');
}
mysqli_close($db); // fermer la connexion
?>