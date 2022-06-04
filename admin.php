<div class="grid">
    <div class="row">
        <div class="col m-3">
            <h6>Zablokuj dostęp do hodowli:</h6>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID użytkownika</th>
                        <th scope="col">Login</th>
                        <th scope="col">Zablokuj</th>
                    </tr>
                </thead>
                <tbody>
                    
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
                            // echo '
                            //     <div class="form-check">
                            //         <input class="form-check-input shadow-none check-ban-hodowla" type="checkbox" value="" id="check-ban-hodowla-'.$user['id'].'" '.($user['czy_ban'] == 1 ? ' checked ' : '').'>
                            //         <label for="check-ban-hodowla-'.$user['id'].'">'.$user['login'].'</label>
                            //     </div>';
                            echo '
                            <tr>
                                <th scope="row">'.$user['id'].'</th>
                                <td>'.$user['login'].'</td>
                                <td><input class="form-check-input shadow-none check-ban-hodowla" type="checkbox" value="" id="check-ban-hodowla-'.$user['id'].'" '.($user['czy_ban'] == 1 ? ' checked ' : '').'></td>
                            </tr>';
                            }
                        }
                        catch(PDOException $e)
                        {
                            echo 'Blad.<br />'.$e;
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col m-3">
            <h6>Dodaj nowego kotka do bazy danych:</h6>
            <form>
                <div class="form-group mb-3">
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
                            echo '<input type="number" class="form-control" id="IdInput" aria-describedby="emailHelp" value="'.($kotek['id_kotka'] + 1).'" disabled>';
                            }
                        }
                        catch(PDOException $e)
                        {
                            echo 'Blad.<br />'.$e;
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputPassword1">ID właściciela</label>
                    <input type="number" class="form-control" id="InputIdWl" value="0" min="0">
                    <small>0 - hodowla</small>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputPassword1">Link do zdjęcia</label>
                    <input type="text" class="form-control" id="InputLink">
                    <small>Przykładowe zdjęcie: https://cdn.discordapp.com/attachments/905794819425710110/976213404098383902/obraz.png</small>
                    <small id="warningZdj" class="text-danger" style="display: none;">Podaj prawidłowy link do zdjęcia</small>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputPassword1">Imie</label>
                    <input type="text" class="form-control" id="InputImie">
                    <small id="warningImie" class="text-danger" style="display: none;">Podaj imie</small>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputPassword1">Wiek</label>
                    <?php
                        echo '<input type="text" class="form-control" id="InputWiek" value="'.rand(1,15).'" min="1">';
                    ?>
                    <small id="warningWiek" class="text-danger" style="display: none;">Podaj wiek</small>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputPassword1">Waga</label>
                    <?php
                        echo '<input type="number" class="form-control" id="InputWaga" value="'.rand(1,8).'" min="1">';
                    ?>
                    <small id="warningWaga" class="text-danger" style="display: none;">Podaj wagę</small>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputPassword1">Plec</label>
                    <input type="text" class="form-control" id="InputPlec">
                    <small>Kot lub Kotka</small>
                    <small id="warningPlec" class="text-danger" style="display: none;">Podaj prawidłową płeć</small>
                </div>
                <button type="submit" id="btn-dodaj" class="btn btn-success">Dodaj</button>
            </form>
        </div>
    </div>
</div>