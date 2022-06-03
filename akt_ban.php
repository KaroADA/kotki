<?php
    session_start();

    if (isset($_POST['id'])) {
        echo ban($_POST['id'], $_POST['czy_ban']);
    }

    function ban($id, $czy_ban) {
        echo $czy_ban;

        require_once "polaczenie.php";

        try
        {
            $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
            $pdo->query('UPDATE uzytkownicy SET czy_ban = '.$czy_ban.' WHERE id = '.$id.';');
        }
        catch(PDOException $e)
        {
            echo 'Blad.'.$e;
        }
        exit;
    }
?>