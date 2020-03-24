
        <html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body style='background:#fff;'>
        <div id="content">
            
            <a href='page.php?deconnexion=true'><span>Déconnexion</span></a>
            
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                       setcookie('nom', '', time()-3600);
                       setcookie('password', '', time()-3600);
                      session_unset();
                      header("location:index.php");
                   }
                }
                else if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "<br>Bonjour $user, vous êtes connectés";
                }
            ?>
            <section class="profil">
            <ul>
                <li><a href="">Ajouter d'articles</a></li>
                <li>
                    <form id="content">
                        <input type="text" name="input" class="input" id="search-input">
                        <button type="reset" class="search" id="search-btn"></button>
                    </form>
                </li>
            </ul>

        </section>

        </div>
    </body>