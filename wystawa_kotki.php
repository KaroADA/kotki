<?php 

    function odmien($liczba, $pojedyncza, $mnoga, $mnoga_dopelniacz) {
        if ($liczba == 1) return $pojedyncza;
        $reszta10 = $liczba % 10;
        $reszta100 = $liczba % 100;
        if ($reszta10 > 4 || $reszta10 < 2 || ($reszta100 < 15 && $reszta100 > 11) || $liczba == 0)
            return $mnoga_dopelniacz;
        return $mnoga;
    }

    session_start();

    $id_sort = 8;
    $filtr_kot = 1;
    $filtr_kotka = 1; 
    $filtr_okulary = -1; 
    $filtr_czapki = -1;  

    if (isset($_POST['id_sort'])) {
        $id_sort = $_POST['id_sort'];
    }
    if (isset($_POST['filtr_kot'])) {
        $filtr_kot = $_POST['filtr_kot'];
    }
    if (isset($_POST['filtr_kotka'])) {
        $filtr_kotka = $_POST['filtr_kotka'];
    }
    if (isset($_POST['filtr_okulary'])) {
        $filtr_okulary = $_POST['filtr_okulary'];
    }
    if (isset($_POST['filtr_czapki'])) {
        $filtr_czapki = $_POST['filtr_czapki'];
    }
    
    echo get_kotki($id_sort, $filtr_kotka, $filtr_kot, $filtr_okulary, $filtr_czapki);

    function get_kotki($id_sort, $filtr_kotka, $filtr_kot, $filtr_okulary, $filtr_czapki){
        
        require_once "polaczenie.php";

        try
        {
            //polaczenie z baza

            $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
            //echo 'OK! - polaczonys';

            //pobieranie danych  

                //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sorts = array("data DESC", "data", "wiek", "wiek DESC", "waga", "waga DESC", "imie", "imie DESC", "lajki DESC", "lajki");

                $filtry_plec_string = "";

                if($filtr_kot)
                    $filtry_plec_string .= ' OR plec = "Kot"';
                if($filtr_kotka)
                    $filtry_plec_string .= ' OR plec = "Kotka"';
    
                $filtry_okulary_string = "";
    
                if($filtr_okulary != -1)
                    $filtry_okulary_string .= ' AND id_okularkow = '.$filtr_okulary;
    
                $filtry_czapki_string = "";
    
                if($filtr_czapki != -1)
                    $filtry_czapki_string .= ' AND id_czapki = '.$filtr_czapki;
    
                $mysql_query = 'SELECT * FROM kotki JOIN wystawa ON kotki.id_kotka = wystawa.id_kotka JOIN uzytkownicy ON kotki.id_wl = uzytkownicy.id WHERE (1 = 2 '.$filtry_plec_string.')'.$filtry_okulary_string.$filtry_czapki_string.' ORDER BY '.$sorts[$id_sort];

                // echo $mysql_query;

                $wynik = $pdo->query($mysql_query);

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
                            <h4 class="card-title mb-1">'.$kotek['imie'].($kotek['plec'] == "Kot" ? " ???" : " ???").'</h4>
                            <h6 class="card-title mb-3" id="h6-lajk-'.$kotek['id_kotka'].'">'.$kotek['lajki'].' '.odmien(strval($kotek['lajki']), "lajk", "lajki", "lajk??w").'</h6>
                            <h6 class="card-title mb-1">W??a??ciciel: '.$kotek['login'].'</h6>
                            <h6 class="card-title mb-1">Wiek: '.$kotek['wiek'].'</h6>
                            <h6 class="card-title mb-3">Waga: '.$kotek['waga'].'kg</h6>
                            <button type="button" class="btn btn-success w-100 shadow-none btn-lajk" id="btn-lajk-'.$kotek['id_kotka'].'"'.($kotek['id_wl'] == $_SESSION['id'] ? ' disabled ' : '').'>'.($kotek['id_wl'] == $_SESSION['id'] ? 'Tw??j kotek' : 'Supi kotek').'</button>
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

