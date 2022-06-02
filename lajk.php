<?php
    session_start();

    if (isset($_POST['id_kotka'])) {
        echo lajk($_POST['id_kotka']);
    }

    function lajk($id_kotka){
        echo $id_kotka;

        require_once "polaczenie.php";

        try
        {
            $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
            $pdo->query('UPDATE kotki SET lajki = lajki + 1 WHERE id_kotka = '.$id_kotka.';');
        }
        catch(PDOException $e)
        {
            echo 'Blad.'.$e;
        }
        exit;
    }
?>