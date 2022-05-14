<html lang="pl">
	<head>
		<meta charset="utf-8"/>
	</head>

	<body>
		<?php
			session_start();

			if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']){
				header('Location: index.php');
				return;
			}
		?>

		<form action="zarejestruj.php" method="post">
			<input type="text" name="login" placeholder="login" /> <br /><br />
			<input type="password" name="haslo" placeholder="hasło" /> <br /><br />
            <input type="password" name="haslo2" placeholder="powtórz hasło" /> <br /><br />
			<input type="submit" value="Zarejestruj się" /> <br /><br />
			<a href="logowanie.php">Masz już konto?</a>
		</form>
		
		<?php
			if(isset($_SESSION['blad'])){
				echo '<p style="color:red">'.$_SESSION['blad'].'</p>';
				unset($_SESSION['blad']);
			}	
		?>

	</body>
</html>