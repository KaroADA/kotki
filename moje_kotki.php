<div class="col-lg-2 h-100 p-3">     
    <div class="form-group mb-3">
        <h6>Sortowanie</h6>
        <select class="form-control mb-3" id="selectSort_moje_kotki">
            <option value="0">Od najnowszego</option>
            <option value="1">Od najstarszego</option>
            <option value="2">Wiek rosnąco</option>
            <option value="3">Wiek malejąco</option>
            <option value="4">Waga rosnąco</option>
            <option value="5">Waga malejąco</option>
            <option value="6">Imie alfabetycznie</option>
            <option value="7">Imie odwrotnie</option>
            <option value="8">Najpopularniejszy</option>
            <option value="9">Najnudniejszy</option>
        </select>
        <h6>Flirtowanie po płci</h6>
        <div class="form-check">
            <input class="form-check-input shadow-none" type="checkbox" value="" id="input_kobieta_moje_kotki" checked>
            <label for="input_kobieta_moje_kotki">Kotka ♀</label>
        </div>
        <div class="form-check">
            <input class="form-check-input shadow-none" type="checkbox" value="" id="input_facet_moje_kotki" checked>
            <label for="input_facet_moje_kotki">Kot ♂</label>
        </div>
        <h6 class="mt-3">Filtruj po okularkach</h6>
        <?php
            echo '<select class="form-control" id="selectOkularkiFiltrMojeKotki">';
                                                    
            $okularki = array("Nie filtruj", "Nic", "Czarne", "Serduschka", "Cool", "Żółte", "Przeciwsłoneczne", "Kociara", "LGBTQQICAPF2K+", "Stary", "Złote", "Babcia na basenie", "Pączuś", "Karol Adamski", "Kujon");
            $i = -1;

            foreach($okularki as $okular){
                echo '<option value="'.$i.'").>'.$okular.'</option>';
                $i++;
            }

            echo '</select>';
        ?>
        <h6 class="mt-3">Filtruj po czapkach</h6>
        <?php
            echo '<select class="form-control" id="selectCzapkiFiltrMojeKotki">';
                                                    
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
            <?php include 'kotki.php';?>
    </div>
</div>