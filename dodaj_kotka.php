<?php
    session_start();

    if (isset($_POST['id_kotka'])) {
        echo dodajKotka($_POST['id_kotka'], $_POST['id_wl'], $_POST['zdjecie'], $_POST['imie'], $_POST['wiek'], $_POST['waga'], $_POST['plec']);
    }

    function dodajKotka($id_kotka, $id_wl, $zdjecie, $imie, $wiek, $waga, $plec){
        echo $id_kotka, $id_wl, $zdjecie, $imie, $wiek, $waga, $plec;

        require_once "polaczenie.php";

        try
        {
            $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
            $pdo->query('INSERT INTO kotki (id_kotka, id_wl, zdjecie, imie, wiek, waga, plec, id_okularkow, id_czapki, lajki, kolor, data) VALUES ('.$id_kotka.','.$id_wl.',"'.$zdjecie.'","'.$imie.'",'.$wiek.','.$waga.',"'.$plec.'",0,0,0,"elo",NOW());');
        }
        catch(PDOException $e)
        {
            echo 'Blad.'.$e;
        }
        exit;
    }
?>