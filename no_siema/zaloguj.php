<html lang="pl">
	<head>
		<meta charset="utf-8"/>
	</head>

	<body>

        <?php
            session_start();

            if((!isset($_POST['login'])) || (!isset($_POST['haslo']))){
                header('Location: logowanie.php');
                return;
            }

            require_once "polaczenie.php";

            $polaczenie = @new mysqli($mysql_host, $username, $password, $database);
            
            if($polaczenie->connect_errno != 0){
                echo 'Blad.<br />';
                return;
            }

            $login = htmlentities($_POST['login'], ENT_QUOTES, "UTF-8");
            $haslo = $_POST['haslo'];

            if($tabela = $polaczenie->query("SELECT * FROM uzytkownicy WHERE login='"
            .mysqli_real_escape_string($polaczenie, $login)."'")){
                $tab = $tabela->fetch_assoc();
                
                if($tabela->num_rows && password_verify($haslo, $tab['hasz_hasla'])){
                    $_SESSION['login'] = $login;
                    $_SESSION['id'] = $tab['id'];
                    $_SESSION['zalogowany'] = true;

                    $tabela->close();
                    header('Location: index.php');
                }
                else{
                    $_SESSION['blad'] = 'Nieprawidłowy login lub hasło!';
                    header('Location: logowanie.php');
                }
            }
            else{
                $_SESSION['blad'] = 'Wystąpił błąd!';
                header('Location: logowanie.php');
            }
            $polaczenie->close();
            
        ?>

	</body>
</html>