<?php
 
 
  function routeur(){

      if (isset($_GET["page"])) {
         if ($_GET["page"] == "accueil") {
        include "./composants/accueil.php";
       
      
       } else if ($_GET["page"] == "connexion") {
           include "./composants/connexion.php";
          } else if ($_GET["page"] == "about") {
              include "./first_about.php";
              include "./troisieme.php";
          }  else if ($_GET["page"] == "produits") {
              include "./produit_1.php";
              
          };
           if (isset($_SERVER["PATH_INFO"])){
          if ($_SERVER["PATH_INFO"] == "contact") {
            include "./contact_first.php";
          } else if ($_SERVER["PATH_INFO"] == "accueil") {
            include "./first.php";
            include "./second.php";
            include "./third.php";
          }
      }
      }

  }  
      





?>