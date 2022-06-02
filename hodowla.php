<div class="row">
    <?php 
        session_start();

        require_once "polaczenie.php";

        try
        {
            //polaczenie z baza

            $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
            //echo 'OK! - polaczonys';

            //pobieranie danych  

            //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $czy_ban = $pdo->query('SELECT czy_ban FROM uzytkownicy WHERE id = '.$_SESSION['id'].';');
            
            foreach($czy_ban as $czy_bann)
            {
                // echo $czy_bann['czy_ban'];

                if($czy_bann['czy_ban'] == 1){
                    echo "BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN BAN";
                    return;
                }
            }

            $wynik = $pdo->query('SELECT * FROM kotki WHERE id_wl = 0 ORDER BY RAND() LIMIT 3;');

            foreach($wynik as $kotek)
            {
            echo '
            <div class="col m-3">
                <div class="card m-auto" id="card_'.$kotek['id_kotka'].'" style="width: 18rem; height: 100%;">
                    <div class="card-img-top img_div">
                        <img class="obrazek" id="img_kotek_'.$kotek['id_kotka'].'" src="'.$kotek['zdjecie'].'">
                    </div>
                    <!-- <img src="img/kotek.png" class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h4 class="card-title mb-1">'.$kotek['imie'].($kotek['plec'] == "Kot" ? " ♂" : " ♀").'</h4>
                        <h6 class="card-title mb-1">Wiek: '.$kotek['wiek'].'</h6>
                        <h6 class="card-title mb-3">Waga: '.$kotek['waga'].'kg</h6>
                        <input class="btn btn-success w-100 shadow-none btn-adoptuj" id="btn-adoptuj-'.$kotek['id_kotka'].'" type="submit" value="Adoptuj">
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
</div>