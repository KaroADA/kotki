<html lang="pl">
	<head>
		<meta charset="utf-8"/>
	</head>

	<body>

        <?php
            session_start();

            if((!isset($_POST['login'])) || (!isset($_POST['haslo'])) || (!isset($_POST['haslo_powt']))){
                header('Location: logowanie.php?logowanie=false');
                return;
            }
            
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];
            $haslo2 = $_POST['haslo_powt'];
            $hasz_hasla = password_hash($haslo, PASSWORD_DEFAULT);

            if(strlen($login) < 3 || strlen($login) > 15){
                $_SESSION['blad'] = 'Login musi zawierać od 3 do 15 znaków!';
            }
            else if(!ctype_alnum($login)){
                $_SESSION['blad'] = 'Login powinien zawierać wyłącznie litery i/lub liczby!';
            }
            else if($haslo !== $haslo2){
                $_SESSION['blad'] = 'Podane hasła nie są jednakowe!';
            }
            else if(strlen($haslo) < 4 || strlen($haslo) > 30){
                $_SESSION['blad'] = 'Hasło musi zawierać od 8 do 30 znaków!';
            }

            if(isset($_SESSION['blad'])){
                header('Location: logowanie.php?logowanie=false');
                return;
            }
            
            //mamy poprawne dane w formularzu

            require_once "polaczenie.php";

            $polaczenie = @new mysqli($mysql_host, $username, $password, $database);
            
            if($polaczenie->connect_errno != 0){
                echo 'Blad.<br />';
                return;
            }

            if($tabela = $polaczenie->query("SELECT * FROM uzytkownicy WHERE login='"
            .mysqli_real_escape_string($polaczenie, $login)."'")){
                if($tabela->num_rows){
                    $_SESSION['blad'] = 'Użytkownik o podanym loginie już istnieje!';
                    header('Location: logowanie.php?logowanie=false');
                }
                else{
                    if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '".mysqli_real_escape_string($polaczenie, $login)."', '$hasz_hasla', 0)")){
                        $_SESSION['blad'] = 'Pomyślnie zarejestrowano, możesz się zalogować!';
                        header('Location: logowanie.php');
                    }
                    else{
                        $_SESSION['blad'] = 'Wystąpił błąd!';
                        header('Location: logowanie.php?logowanie=false');
                    }
                }
            }
            else{
                $_SESSION['blad'] = 'Wystąpił błąd!';
                header('Location: logowanie.php?logowanie=false');
            }

            $polaczenie->close();
        ?>

	</body>
</html>