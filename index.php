<!doctype html>
<html lang="en">
    <head>
        <title>KOTKI</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS v5.0.2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/slider.css">


    </head>
    <body>

        <div class="slidecontainer">
			<input class="slider" type="range" min="1" max="100" value="50">
		</div>

        <?php
            session_start();

            if(!isset($_SESSION['zalogowany'])){
                header('Location: logowanie.php');
                return;
            }

            //echo "Hej ".$_SESSION['id']."!<br />";
        ?>
        
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container">
                <div class="navbar-brand">
                    <?php 
                        echo file_get_contents("img/kotek.svg");
                    ?>
                    <style>
                        .kotek{
                            max-height: 40px;
                            width: min-content;
                        }
                    </style>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" id="moje_kotki_link" href="#">Moje kotki</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="hodowla_link" href="#">Hodowla kotków</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="wyloguj_link" href="wyloguj.php">Wyloguj się</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row" id="page_container">

            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="script.js"></script>  

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <audio id="audioplayer" src="muzyka/kot_hymn.wav" autoplay loop></audio>
		<script src="muzyka/muzyczka.js"></script>
        
    </body>
</html>