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
    </head>
    <body>
        <?php
            session_start();

            if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']){
				header('Location: index.php');
				return;
			}
        ?>

        <main>
            <div class="container col-sm-12">
                <div class="row">
                    <div id="webcontent" class="bg-light d-table col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
                        <p class="bb text-center">KOTKI miau miau</p>
                        <p class="bb text-center">Logowanie</p>
                        
                        <form action="zaloguj.php" method="post">
                            <input type="text" name="login" placeholder="login" /> <br /><br />
                            <input type="password" name="haslo" placeholder="hasło" /> <br /><br />
                            <input type="submit" value="Zaloguj się" /> <br /><br />
                            <a href="rejestracja.php">Nie masz konta?</a>
                        </form>
                        
                        <?php
                            if(isset($_SESSION['blad'])){
                                echo '<p style="color:red">'.$_SESSION['blad'].'</p>';
                                unset($_SESSION['blad']);
                            }	
                        ?>
                        
                    </div>
                </div>
            </div>
	    </main>

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>