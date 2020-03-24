<?php
include "../config/database.php"
?>
<?php
if (isset($_POST['submit'])) {
    $titre= htmlspecialchars($_POST['titre']);
    $contenu= htmlspecialchars($_POST['contenu']) ;
    $image=$_POST['image'];
    date_default_timezone_set('Europe/Paris');
    $date=date('d/m/y à H:i:s');
    // $statut =$_POST['statut'];
    if ((!empty($titre)) &&(!empty($contenu))) {
        $add = "INSERT INTO Article(Titre_de_article, Contenu_de_l_article ) VALUES('".$titre."', '".$contenu."')";
        if (mysqli_query($conn, $add)) {
            $succes="votre compte a bien été creer";
        
        } else {
            echo "Error: " . $add . "<br>" . mysqli_error($conn);
        }
    } else{
        $erreur = "Veillez finaliser les champs";
    }
}
?>
<section class="add-article">
            <div class="container">

                <H1>Ajouter des articles</H1>

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
                <form action="" method="post">
                    <label for="titre">Titre</label>
                    <input id="fname" name="titre" placeholder="Le titre de votre article" type="text">
                    <label for="contenu">Contenu</label>
                    <textarea id="subject" name="contenu" placeholder="Le contenu de votre article"
                        style="height:200px"></textarea>
                        <label for="">Image</label>
                    <input type="file" name="image" src="" alt="">
                    <label for="">Statut</label>
                    <select name="statut" id="statut">
                        <option value="public">Public</option>
                        <option value="non-public">Non Public</option>
                    </select>
                    <input type="submit" name="submit" value="Envoyer">
                </form>
            </div>
        </section>