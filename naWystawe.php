<?php
    session_start();

    if (isset($_POST['id_kotka'])) {
        echo naWystawe($_POST['id_kotka']);
    }

    function naWystawe($id_kotka){
        echo $id_kotka;

        $mysql_host = 'mysql.staszic.waw.pl'; 
        $port = '3306'; //domyslny 3306
        $username = 'karoada';//uzytkownik
        $password = 'kotki';//haslo
        $database = 'karoada'; //baza

        try
        {
            $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
            $pdo->query('DELETE wystawa from wystawa join kotki on kotki.id_kotka = wystawa.id_kotka where kotki.id_wl = '.$_SESSION['id'].';');
            $pdo->query('INSERT INTO wystawa (id_kotka) VALUES ('.$id_kotka.');');
        }
        catch(PDOException $e)
        {
            echo 'Blad.'.$e;
        }
        exit;
    }
?>