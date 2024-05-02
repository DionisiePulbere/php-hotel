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
    <div class="container mt-5" >
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
               ?> <tr>
                <th scope="row"><?php echo $key ?></th>
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