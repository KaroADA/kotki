<?php
    session_start();

    if (isset($_POST['id_kotka'])) {
        echo adoptuj($_POST['id_kotka']);
    }

    function adoptuj($id_kotka){
        echo $id_kotka;

        $mysql_host = 'mysql.staszic.waw.pl'; 
        $port = '3306'; //domyslny 3306
        $username = 'karoada';//uzytkownik
        $password = 'kotki';//haslo
        $database = 'karoada'; //baza

        try
        {
            $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
            $pdo->query('UPDATE kotki SET id_wl = '.$_SESSION['id'].' WHERE id_kotka = '.$id_kotka.';');
        }
        catch(PDOException $e)
        {
            echo 'Blad.'.$e;
        }
        exit;
    }
?>