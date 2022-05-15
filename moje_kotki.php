<div class="col-2 h-100 p-3">     
    <div class="form-group mb-3">
        <label for="selectSort">Sortowanie</label>
        <select class="form-control" id="selectSort">
            <option value="0">Id kotka</option>
            <option value="1">Wiek rosnąco</option>
            <option value="2">Wiek malejąco</option>
            <option value="3">Waga rosnąco</option>
            <option value="4">Waga malejąco</option>
            <option value="5">Imie alfabetycznie</option>
            <option value="6">Imie odwrotnie</option>
        </select>
    </div>
    <h6 class="card-title mb-3">Flirtowanie</h5>
    <h6 class="card-title mb-3">bla lba bla</h5>
    <h6 class="card-title mb-3">bla lba bla</h5>
    </div>
    <div class="col">
    <div class="row row-cols-3" id="div_kotki">
            <?php include 'kotki.php';?>
    </div>
</div>