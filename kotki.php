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
                            <select class="form-control selectOkularki" id="selectOkularki_'.$kotek['id_kotka'].'">
                                <option value="0"'.($kotek['id_okularkow'] == 0 ? ' selected ' : '').'>Nic</option>
                                <option value="1"'.($kotek['id_okularkow'] == 1 ? ' selected ' : '').'>Okulary 1</option>
                                <option value="2"'.($kotek['id_okularkow'] == 2 ? ' selected ' : '').'>Okulary 2</option>
                                <option value="3"'.($kotek['id_okularkow'] == 3 ? ' selected ' : '').'>Okulary 3</option>
                                <option value="4"'.($kotek['id_okularkow'] == 4 ? ' selected ' : '').'>Okulary 4</option>
                                <option value="5"'.($kotek['id_okularkow'] == 5 ? ' selected ' : '').'>Okulary 5</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="selectCzapki_'.$kotek['id_kotka'].'">Wybierz czape</label>
                            <select class="form-control selectCzapki" id="selectCzapki_'.$kotek['id_kotka'].'">
                                <option value="0"'.($kotek['id_czapki'] == 0 ? ' selected ' : '').'>Nic</option>
                                <option value="1"'.($kotek['id_czapki'] == 1 ? ' selected ' : '').'>Mikołaj</option>
                                <option value="2"'.($kotek['id_czapki'] == 2 ? ' selected ' : '').'>Gej</option>
                                <option value="3"'.($kotek['id_czapki'] == 3 ? ' selected ' : '').'>Czapa</option>
                                <option value="4"'.($kotek['id_czapki'] == 4 ? ' selected ' : '').'>Sombrero</option>
                                <option value="5"'.($kotek['id_czapki'] == 5 ? ' selected ' : '').'>Urodziny</option>
                            </select>
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

