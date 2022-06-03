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
        <div class="col m-3">
            <h6>Dodaj nowego kotka do bazy danych:</h6>
            <form>
                <div class="form-group">
                    <label for="IdInput">Id kotka</label>
                    
                    <?php
                        require_once "polaczenie.php";

                        try
                        {
                            //polaczenie z baza
                
                            $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
                
                            $mysql_query = 'SELECT * FROM kotki ORDER BY id_kotka DESC LIMIT 1';
                            
                            // echo $mysql_query;
                
                            $wynik = $pdo->query($mysql_query);
                
                            foreach($wynik as $kotek)
                            {
                            echo '<input type="email" class="form-control" id="IdInput" aria-describedby="emailHelp" placeholder="'.$kotek['id'].'" disabled>';
                            }
                        }
                        catch(PDOException $e)
                        {
                            echo 'Blad.<br />'.$e;
                        }
                
                        exit;
                    ?>
                    
                    <small id="idHelp" class="form-text text-muted">Id kotka</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>