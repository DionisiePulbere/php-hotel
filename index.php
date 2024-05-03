<!-- Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale.
Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET 
permetta di filtrare gli hotel che hanno un parcheggio.
2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto 
(es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore -->

<?php
    
    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $star = isset($_GET['star']) ? $_GET['star'] : '';
    $park = isset($_GET['park']) ? $_GET['park'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booliking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<section>
    <div class="container mt-5">
        <form method="get">
            <div class="d-flex align-items-center">
                <span>Filtri:</span> 
                <div class="form-check form-switch mx-3">
                    <input class="form-check-input" <?php echo $park ? 'checked' : ''; ?> type="checkbox" role="switch" name="park" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Parcheggio</label>
                </div>
                <span>Stelle:</span>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="radio" value="" name="star" id="Default" <?php echo $star === "" ? 'checked' : "" ; ?>>
                    <label class="form-check-label" for="Default">
                        N/D
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="radio" value="1" name="star" id="onestar" <?php echo $star === "1" ? 'checked' : "" ; ?> >
                    <label class="form-check-label" for="onestar">
                        1
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="radio" value="2" name="star" id="twostar" <?php echo $star === "2" ? 'checked' : "" ; ?>>
                    <label class="form-check-label" for="twostar">
                        2
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="radio" value="3" name="star" id="threestar" <?php echo $star === "3" ? 'checked' : "" ; ?>>
                    <label class="form-check-label" for="threestar">
                        3
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="radio" value="4" name="star" id="fourstar" <?php echo $star === "4" ? 'checked' : "" ; ?>>
                    <label class="form-check-label" for="fourstar">
                        4
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="radio" value="5" name="star" id="fivestar" <?php echo $star === "5" ? 'checked' : "" ; ?>>
                    <label class="form-check-label" for="fivestar">
                        5
                    </label>
                </div>
                <button class="btn btn-primary ms-2" type="submit">Ricerca</button>
            </div>
        </form>
    </div>
    <div class="container mt-1" >
        <table class="table table-dark table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">NOME</th>
            <th scope="col">DESCRIZIONE</th>
            <th scope="col">PARCHEGGIO</th>
            <th scope="col">VOTO</th>
            <th scope="col">DISTANZA DAL CENTRO (KM)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($hotels as $key => $hotel){
                 if($hotel['parking']){
                    $parking = 'Sì';
                } else {
                    $parking = 'No';
                }

                if ($park === ""){
                    $isPark = "";
                } else {
                    if ($parking === "Sì"){
                        $isPark = "";
                    } else {
                        $isPark = "d-none";
                    }
                }

                if($star === ""){
                    $isStar = "";
                } else {
                    if($hotel['vote'] === intval($star)){
                        $isStar = "";
                    } else{
                        $isStar = "d-none";
                    };
                };
               ?> 
               <tr class="<?php echo $isPark . ' ' . $isStar ?>">
                    <th scope="row"><?php echo ++$key ?></th>
                    <td><?php echo $hotel['name'] ?></td>
                    <td><?php echo $hotel['description'] ?></td>
                    <td><?php echo $parking ?></td>
                    <td><?php echo $hotel['vote'] ?></td>
                    <td class="text-center"><?php echo $hotel['distance_to_center'] ?></td>
                </tr>
            <?php }?>    
        </tbody>
        </table>
    </div>
</section>
</body>
</html>