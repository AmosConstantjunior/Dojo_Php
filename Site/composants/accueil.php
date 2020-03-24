<?php
include "../config/database.php"
?>
<article class="accueil">
            <H1>Nos Articles </H1>
            <?php
$donnees = "SELECT * FROM `Article`";
$result = mysqli_query($conn, $donnees);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {?>
        <h1><?=$row["Titre_de_article"] ?></h1>  <img src=<?=$row["Image"] ?> alt=" " srcset=""> <br>
   <?php }
} else {
    echo "0 results";
}
   ?>         

        </article>