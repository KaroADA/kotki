<div class="grid">
    <div class="row">
        <div class="col m-3">
            <h6>Zablokuj dostęp do hodowli:</h6>
            <?php
                require_once "polaczenie.php";

                try
                {
                    //polaczenie z baza
        
                    $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
        
                    $mysql_query = 'SELECT * FROM uzytkownicy';
                    
                    // echo $mysql_query;
        
                    $wynik = $pdo->query($mysql_query);
        
                    foreach($wynik as $user)
                    {
                    echo '
                        <div class="form-check">
                            <input class="form-check-input shadow-none check-ban-hodowla" type="checkbox" value="" id="check-ban-hodowla-'.$user['id'].'" '.($user['czy_ban'] == 1 ? ' checked ' : '').'>
                            <label for="check-ban-hodowla-'.$user['id'].'">'.$user['login'].'</label>
                        </div>';
                    }
                }
                catch(PDOException $e)
                {
                    echo 'Blad.<br />'.$e;
                }
        
                exit;
            ?>
        </div>
    </div>
</div>