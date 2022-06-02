<?php 
    session_start();


    if (isset($_POST['id_sort'])) {
        echo get_kotki($_POST['id_sort']);
    } else {
        echo get_kotki(0);
    }

    function get_kotki($id_sort){
        $mysql_host = 'mysql.staszic.waw.pl'; 
        $port = '3306'; //domyslny 3306
        $username = 'karoada';//uzytkownik
        $password = 'kotki';//haslo
        $database = 'karoada'; //baza

        try
        {
            //polaczenie z baza

            $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
            //echo 'OK! - polaczonys';

            //pobieranie danych  

                //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sorts = array("data DESC", "data", "wiek", "wiek DESC", "waga", "waga DESC", "imie", "imie DESC");
            
                $wynik = $pdo->query('select * from kotki join wystawa on kotki.id_kotka = wystawa.id_kotka join uzytkownicy on kotki.id_wl = uzytkownicy.id ORDER BY '.$sorts[$id_sort]);

                foreach($wynik as $kotek)
                {
                echo '
                <div class="col m-3 w-auto">
                    <div class="card" id="card_'.$kotek['id_kotka'].'" style="width: 18rem; height: 100%;">
                        <div class="card-img-top img_div">
                            <img class="obrazek" id="img_kotek_'.$kotek['id_kotka'].'" src="'.$kotek['zdjecie'].'">
                            <img class="obrazek" id="img_okularki_'.$kotek['id_kotka'].'" src="img/okularki_'.strval($kotek['id_okularkow']).'.png">
                            <img class="obrazek" id="img_czapka_'.$kotek['id_kotka'].'" src="img/czapka_'.strval($kotek['id_czapki']).'.png">
                        </div>
                        <!-- <img src="img/kotek.png" class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h4 class="card-title mb-3">'.$kotek['imie'].($kotek['plec'] == "Kot" ? " ♂" : " ♀").'</h4>
                            <h6 class="card-title mb-1">Właściciel: '.$kotek['login'].'</h6>
                            <h6 class="card-title mb-1">Wiek: '.$kotek['wiek'].'</h6>
                            <h6 class="card-title mb-3">Waga: '.$kotek['waga'].'kg</h6>
                            <button type="button" class="btn btn-success w-100">Supi kotek</button>
                        </div>
                    </div>
                </div>';
                }
        }
        catch(PDOException $e)
        {
            echo 'Blad.<br />'.$e;
        }
    }
?>

