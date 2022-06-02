<?php
    session_start();

    if (isset($_POST['id_kotka'])) {
        echo adoptuj($_POST['id_kotka']);
    }

    function adoptuj($id_kotka){
        echo $id_kotka;

        require_once "polaczenie.php";
        
        try
        {
            $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
            $pdo->query('UPDATE kotki SET id_wl = '.$_SESSION['id'].', data = NOW()  WHERE id_kotka = '.$id_kotka.';');
        }
        catch(PDOException $e)
        {
            echo 'Blad.'.$e;
        }
        exit;
    }
?>