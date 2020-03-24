<?php
$servername = "localhost";
$username = "amos";
$password = "admin";
try {
    $name = $email = $pwd = "";
    

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST["name"])) {
     if (!empty($_POST["email"])) {
        if (!empty($_POST["pwd"])) {
            $conn = new PDO("mysql:host=$servername;dbname=dojo_Php", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Utilisateur ('Pseudo', 'E_mail', 'MotDePasse')
            VALUES ($name, $email, $pwd)";
            // use exec() because no results are returned
            $name=$_POST["name"];
            $email=$_POST["email"];
            $pwd= $_POST["pwd"];
            $conn->exec($sql);
            echo "New record created successfully";
        } else{
     }
     } else {
   
    }
  } else {
      
  } 
}
    
    
} catch (PDOException $e) {
    {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conn = null;
}

