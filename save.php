<?php
    if (isset($_POST['id_kotka'])) {
        echo save($_POST['id_kotka'], $_POST['id_czapki'], $_POST['id_okularkow']);
    }

    function save($id_kotka, $id_czapki, $id_okularkow){
        echo $id_kotka.$id_czapki.$id_okularkow;

        $mysql_host = 'mysql.staszic.waw.pl'; 
        $port = '3306'; //domyslny 3306
        $username = 'karoada';//uzytkownik
        $password = 'kotki';//haslo
        $database = 'karoada'; //baza

        try
        {
            $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
            $pdo->query('UPDATE kotki SET id_okularkow = '.$id_okularkow.', id_czapki = '.$id_czapki.' WHERE id_kotka = '.$id_kotka.';');
        }
        catch(PDOException $e)
        {
            echo 'Blad.'.$e;
        }
        exit;
    }
?>