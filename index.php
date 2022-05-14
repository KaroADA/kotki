<!doctype html>
<html lang="en">
  <head>
    <title>KOTKI</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <div class="container-fluid">
        <div class="row justify-content-end">

            <div class="col-1 mx-1 w-auto">
                <h5 class="card-title mb-3">moje kotki</h5>
            </div>
            <div class="col-1 mx-1 w-auto">
                <h5 class="card-title mb-3">hodowla</h5>
            </div>
            <div class="col-1 mx-1 w-auto">
                <h5 class="card-title mb-3">logowanie</h5>
            </div>
        </div>
        <div class="row">

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
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>  

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>