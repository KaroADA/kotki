<!doctype html>
<html lang="en">
    <head>
        <title>KOTKI</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no shrink-to-fit=no">
        
        <!-- Bootstrap CSS v5.0.2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/animated_bg.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="vertical-center">
        <?php
            session_start();

            if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']){
				header('Location: index.php');
				return;
			}
        ?>

		<div class="container">
			<div class="row" style="justify-content: center; transition: all 1s">
				<div id="webcontent" class="w-auto mt-5">
					<div class="row">
						<h3 class="text-center font-weight-light my-3" id="title">Zaloguj się</h3>
						
						<form action="zaloguj.php" method="post" id="form-logowanie">
							<div class="form-group my-3">
								<i class="fa fa-user"></i>
								<input type="text" name="login" class="form-control" placeholder="Login" required="required">
							</div>
							<div class="form-group mb-3">
								<i class="fa fa-lock"></i>
								<input type="password" name="haslo" class="form-control" placeholder="Hasło" required="required">					
							</div>
							<div class="form-group mb-3" id="haslo2" style="display: none">
								<i class="fa fa-lock"></i>
								<input type="password" name="haslo2" class="form-control" placeholder="Powtórz hasło">					
							</div>
							<input class="btn btn-success mb-3 w-100" id="btn-zaloguj" type="submit" value="Zaloguj się">
						</form>
						
						<?php
							if(isset($_SESSION['blad'])){
								echo '<p class="text-danger" id="blad">'.$_SESSION['blad'].'</p>';
								unset($_SESSION['blad']);
							}	
						?>
					</div>
					<div class="row login_footer">
						<a class="footer_link text-center align-middle" id="footer_link" href="#">Nie masz konta?</a>
					</div>
				</div>
			</div>
		</div>

		<div class="background-kotki">
			<?php 
				for ($i = 1; $i <= 20; $i++) {
					echo file_get_contents("img/kotek.svg");
				}
			?>
		</div>
		
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="logowanie.js"></script>

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>