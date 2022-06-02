<div class="col-2 h-100 p-3">     
    <div class="form-group mb-3">
        <label for="selectSort_wystawa">Sortowanie</label>
        <select class="form-control mb-3" id="selectSort_wystawa">
            <option value="2">Wiek rosnąco</option>
            <option value="3">Wiek malejąco</option>
            <option value="4">Waga rosnąco</option>
            <option value="5">Waga malejąco</option>
            <option value="6">Imie alfabetycznie</option>
            <option value="7">Imie odwrotnie</option>
            <option value="8" selected="selected">Najpopularniejszy</option>
            <option value="9">Najnudniejszy</option>
        </select>
        <h6>Flirtowanie po płci</h6>
        <div class="form-check">
            <input class="form-check-input shadow-none" type="checkbox" value="" id="input_kobieta_wystawa" checked>
            <label for="input_kobieta_wystawa">Kotka ♀</label>
        </div>
        <div class="form-check">
            <input class="form-check-input shadow-none" type="checkbox" value="" id="input_facet_wystawa" checked>
            <label for="input_facet_wystawa">Kot ♂</label>
        </div>
        <h6 class="mt-3">Filtruj po okularkach</h6>
        <?php
            echo '<select class="form-control" id="selectOkularkiFiltrWystawa">';
                                                    
            $okularki = array("Nie filtruj", "Nic", "Czarne", "Serduschka", "Cool", "Żółte", "Przeciwsłoneczne");
            $i = -1;

            foreach($okularki as $okular){
                echo '<option value="'.$i.'").>'.$okular.'</option>';
                $i++;
            }

            echo '</select>';
        ?>
        <h6 class="mt-3">Filtruj po czapkach</h6>
        <?php
            echo '<select class="form-control" id="selectCzapkiFiltrWystawa">';
                                                    
            $czapki = array("Nie flirtuj", "Nic",  "Mikołaj", "Gej", "Czapa", "Sombrero", "Urodziny", "Pirat", "Różowy kapelusz", "Urodziny 2", "Wieśniara", "Golf", "Przyjaciel", "Pani dworu", "Czapka z daszkiem", "Brązowy kapelusz", "Czarny kapelusz", "Prezydent", "Thug Life", "Elf", "Kriper", "Budowlaniec", "Policja", "Przystojniak", "Szef kuchni", "Incognito");
            $i = -1;
                
            foreach($czapki as $czapka){
                echo '<option value="'.$i.'").>'.$czapka.'</option>';
                $i++;
            }

            echo '</select>';
        ?>
    </div>
</div>
<div class="col">
    <div class="row row-cols-3" id="div_kotki">
            <?php include 'wystawa_kotki.php';?>
    </div>
</div>