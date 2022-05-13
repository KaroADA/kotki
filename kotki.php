<?php 

    $mysql_host = 'mysql.staszic.waw.pl'; 
    $port = '3306'; //domyslny 3306
    $username = 'karoada';//uzytkownik
    $password = 'kotki';//haslo
    $database = 'karoada'; //baza
    
	$id_kotka_url = -1;
	$id_czapki_url = -1;
	$id_okularkow_url = -1;
	
	if (isset($_GET['id_kotka'])) {
		$id_kotka_url = $_GET['id_kotka'];
	}
	if (isset($_GET['id_czapki'])) {
		$id_czapki_url = $_GET['id_czapki'];
	}
	if (isset($_GET['id_okularkow'])) {
		$id_okularkow_url = $_GET['id_okularkow'];
	}
	
    try
    {
        //polaczenie z baza

        $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
        //echo 'OK! - polaczonys';

        //pobieranie danych  

            //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $wynik = $pdo->query('SELECT id_kotka, id_okularkow, id_czapki, zdjecie, imie FROM kotki');

            foreach($wynik as $kotek)
            {
            echo '
            <div class="col m-3 w-auto">
                <div class="card" id="card_'.$kotek['id_kotka'].'" style="width: 18rem; height: 100%;">
                    <div class="card-img-top img_div">
                        <img class="obrazek" id="img_kotek" src="'.$kotek['zdjecie'].'">
                        <img class="obrazek" id="img_okularki" src="img/okularki_'.strval($kotek['id_okularkow']).'.png">
                        <img class="obrazek" id="img_czapka" src="img/czapka.png">
                    </div>
                    <!-- <img src="img/kotek.png" class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h5 class="card-title mb-3">'.$kotek['imie'].'</h5>
                        <div class="form-group mb-3">
                            <label for="selectOkularki_'.$kotek['id_kotka'].'">Wybierz okularki</label>
                            <select class="form-control" id="selectOkularki_'.$kotek['id_kotka'].'">
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
                            <select class="form-control" id="selectCzapki_'.$kotek['id_kotka'].'">
                                <option value="0"'.($kotek['id_czapki'] == 0 ? ' selected ' : '').'>Nic</option>
                                <option value="1"'.($kotek['id_czapki'] == 1 ? ' selected ' : '').'>Mikołaj</option>
                                <option value="2"'.($kotek['id_czapki'] == 2 ? ' selected ' : '').'>Kowboj</option>
                                <option value="3"'.($kotek['id_czapki'] == 3 ? ' selected ' : '').'>Urodziny</option>
                            </select>
                        </div>
                        <button class="save_btn btn btn-primary" id="save_'.strval($kotek['id_kotka']).'">Zapisz</button>
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

