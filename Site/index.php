<!DOCTYPE html>


           


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <title>Boom Lecture: </title>
</head>

<body>
    <header>
        <nav>
           <h1><a href="index.php?page=accueil"> B<span>OOM</span> L<span>ecture</span></a></h1>
            <a href="index.php?page=connexion">Se connecter</a>
        </nav>

    </header>
    <section>
    

<?php
include "./config/router.php";
routeur();
?>
    </section>
    <footer>

    </footer>
    <script>
        const input = document.getElementById("search-input");
        const searchBtn = document.getElementById("search-btn");

        const expand = () => {
            searchBtn.classList.toggle("close");
            input.classList.toggle("square");
        };

        searchBtn.addEventListener("click", expand);
    </script>
</body>

</html>