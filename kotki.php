<?php 
    session_start();

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
        
            $wynik = $pdo->query('SELECT * FROM kotki WHERE id_wl = '.$_SESSION['id'].';');

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
                        <h4 class="card-title mb-3">'.$kotek['imie'].'</h4>
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

            $czapki = array("Nic", "Mikołaj", "Gej", "Czapa", "Sombrero", "Urodziny", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24");
            $i = 0;

            foreach($czapki as $czapka){
                echo '<option value="'.$i.'"'.($kotek['id_czapki'] == $i ? ' selected ' : '').'>'.$czapka.'</option>';
                $i++;
            }

            echo                '</select>
                        </div>
                    </div>
                </div>
            </div>';
            }
    }
    catch(PDOException $e)
    {
        echo 'Blad.<br />'.$e;
    }
?>

