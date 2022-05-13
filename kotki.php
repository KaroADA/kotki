<?php 
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
        
            $wynik = $pdo->query('SELECT id_kotka, zdjecie, imie FROM kotki');

            foreach($wynik as $kotek)
            {
            echo '
            <div class="col m-3 w-auto">
                <div class="card" style="width: 18rem; height: 100%;">
                    <div class="card-img-top img_div">
                        <img class="obrazek" id="img_kotek" src="'.$kotek['zdjecie'].'">
                        <img class="obrazek" id="img_okularki" src="img/okularki_'.strval($kotek['id_kotka'] % 5 + 1).'.png">
                        <img class="obrazek" id="img_czapka" src="img/czapka.png">
                    </div>
                    <!-- <img src="img/kotek.png" class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h5 class="card-title mb-3">'.$kotek['imie'].'</h5>
                        <div class="form-group mb-3">
                            <label for="selectOkularki">Wybierz okularki</label>
                            <select class="form-control" id="selectOkularki">
                                <option value="0">Nic</option>
                                <option value="1">Okulary 1</option>
                                <option value="2">Okulary 2</option>
                                <option value="3">Okulary 3</option>
                                <option value="4">Okulary 4</option>
                                <option value="5">Okulary 5</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="selectOkularki">Wybierz czape</label>
                            <select class="form-control" id="selectOkularki">
                                <option>Swiety Mikołaj</option>
                                <option>Kowboj</option>
                                <option>Urodziny</option>
                            </select>
                        </div>
                        <a href="#" class="btn btn-primary">Zapisz</a>
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

