<?php
    session_start();

    if (isset($_POST['id_sort'])) {
        echo get_kotki($_POST['id_sort']);
    } else {
        echo get_kotki(0);
    }

    function get_kotki($id_sort){
        
        require_once "polaczenie.php";

        try
        {
            //polaczenie z baza

            $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
            //echo 'OK! - polaczonys';

            //pobieranie danych  

            //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sorts = array("data DESC", "data", "wiek", "wiek DESC", "waga", "waga DESC", "imie", "imie DESC");

            $wynik = $pdo->query('SELECT * FROM kotki WHERE id_wl = '.$_SESSION['id'].' ORDER BY '.$sorts[$id_sort]);
            $id_wyst_tab = ($pdo->query('SELECT kotki.id_kotka from kotki join wystawa on kotki.id_kotka = wystawa.id_kotka where kotki.id_wl = '.$_SESSION['id'].';'));
            $id_wyst = 0;

            foreach($id_wyst_tab as $id){
                $id_wyst = $id['id_kotka'];
            }

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
                    <h6 class="card-title mb-1">Wiek: '.$kotek['wiek'].'</h6>
                    <h6 class="card-title mb-3">Waga: '.$kotek['waga'].'kg</h6>
                        <div class="form-group mb-3">
                            <label for="selectOkularki_'.$kotek['id_kotka'].'">Wybierz okularki</label>
                            <select class="form-control selectOkularki" id="selectOkularki_'.$kotek['id_kotka'].'">';
                                                
            $okularki = array("Nic", "Czarne", "Serduschka", "Cool", "Żółte", "Przeciwsłoneczne");
            $i = 0;

            foreach($okularki as $okular){
                echo '<option value="'.$i.'"'.($kotek['id_okularkow'] == $i ? ' selected ' : '').'>'.$okular.'</option>';
                $i++;
            }

            echo                '
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="selectCzapki_'.$kotek['id_kotka'].'">Wybierz czape</label>
                            <select class="form-control selectCzapki" id="selectCzapki_'.$kotek['id_kotka'].'">';

            $czapki = array("Nic", "Mikołaj", "Gej", "Czapa", "Sombrero", "Urodziny", "Pirat", "Różowy kapelusz", "Urodziny 2", "Wieśniara", "Golf", "Przyjaciel", "Pani dworu", "Czapka z daszkiem", "Brązowy kapelusz", "Czarny kapelusz", "Prezydent", "Thug Life", "Elf", "Kriper", "Budowlaniec", "Policja", "Przystojniak", "Szef kuchni", "Incognito");
            $i = 0;
                
            foreach($czapki as $czapka){
                echo '<option value="'.$i.'"'.($kotek['id_czapki'] == $i ? ' selected ' : '').'>'.$czapka.'</option>';
                $i++;
            }

            echo                '</select>
                        </div>
                        <button type="button" id="btn-naWystawe_'.$kotek['id_kotka'].'" class="btn-naWystawe btn '.($kotek['id_kotka'] == $id_wyst ? ' btn-success ' : 'btn-outline-dark').' w-100 shadow-none">Na wystawę!</button>
                    </div>
                </div>
            </div>';
            }
        }
        catch(PDOException $e)
        {
            echo 'Blad.<br />'.$e;
        }

        exit;
    }
?>