<html lang="pl">
	<head>
		<meta charset="utf-8"/>
	</head>

	<body>

        <?php
            session_start();

            if(!isset($_SESSION['zalogowany'])){
                header('Location: logowanie.php');
                return;
            }

            echo "Hej ".$_SESSION['login']."!<br />";
        ?>
        <a href="wyloguj.php">Wyloguj się!</a>

	</body>
</html>