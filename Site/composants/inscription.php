<?php
session_start();
include "../config/database.php";

if (isset($_POST['submit'])) {
    
    $name= htmlspecialchars($_POST['name']);
    $email= $_POST['email'];
    $pwd = sha1($_POST['pwd']);
    $pwd2 = sha1($_POST['pwd2']);
    if ((!empty($name)) &&(!empty($email)) && (!empty($pwd)) && (!empty($pwd2))) {
      if (strlen($name)<=10) {
         if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if ($pwd==$pwd2) {
                
                $inserMembre = "INSERT INTO Utilisateur(Pseudo,Adressemail,MotDePasse) VALUES( '".$name."','".$email."', '".$pwd."')";
                
                if (mysqli_query($conn, $inserMembre)) {
                    $succes="votre compte a bien été creer";
                header('refresh:5;url=Index.php');
                } else {
                    echo "Error: " . $inserMembre . "<br>" . mysqli_error($conn);
                }
    
            } else{
                $erreur= "Les mots de passe ne correspondent pas";
            }
         } else{
             $erreur =" Votre mail n'est pas conforme";
         }
      } else{
          $erreur="Pseudo trop long veillez respecter la taille de 10";
      }
    } else{
        $erreur = "Veillez remplir les champs ";
    }
}
?>


<section class="inscription">
            <form action="" method="POST" id="container">
                <?php if (isset($erreur)) {?> 
                    <p style="color: red">
                    <?= $erreur ?>
                </p>
                 <?php  
                }?>
                <?php if (isset($succes)) {?> 
                    <p style="color: green">
                    <?= $succes ?>
                </p>
                 <?php  
                }?>
                <div id="progress-triangle"></div>

                <label for="name">
                    <div class="holder">
                        Pseudo
                        <input type="text" name="name" autocomplete="off" id="name">
                    </div>
                </label>

                <label for="email">
                    <div class="holder">
                        Email
                        <input type="email" name="email" autocomplete="off" id="email">
                    </div>
                </label>

                <label for="pwd">
                    <div class="holder">
                        Password
                        <input type="password" name="pwd" id="password">
                    </div>
                </label>
                <label for="pwd2">
                    <div class="holder">
                       Confirmation de Password
                        <input type="password" name="pwd2" id="password">
                    </div>
                </label>



                <div class="select-cover"></div>
                <div id="select-triangle"></div>
                </div>
                </label>



                <input type="submit" name="submit" id="submit-input">
            </form>
</section>