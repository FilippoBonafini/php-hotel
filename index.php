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

$vote_order = $_GET['vote'];
$parking_order = $_GET['parking'];

$vote = [];
foreach ($hotels as $key => $hotel) {
    $vote[$key] = $row['vote'];
}

function compareByIsActive($a, $b)
{
    if ($a['parking'] === $b['parking']) {
        return 0;
    }
    return ($a['parking'] < $b['parking']) ? 1 : -1;
}






if ($vote_order === 'voteHight') {
    array_multisort($vote, SORT_ASC, $hotels);
} else if ($vote_order === 'voteLow') {
    array_multisort($vote, SORT_ASC, $hotels);
    $hotels = array_reverse($hotels);
}

if ($parking_order === 'true') {
    usort($hotels, 'compareByIsActive');
}




?>

<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel</title>
    <!-- IMPORT CDN BOOSTRAP CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <div class="navbar-brand fs-1 fw-bold">Hotel</div>
            </div>
        </nav>
    </header>


    <div class="card text-bg-dark m-3">

        <form class=" card-header fs-4 row gx-5 mx-4 mt-3" method="GET">
            <div class="form-check form-switch col-auto">
                <input class="form-check-input" type="radio" role="switch" id="voteHight" name="vote" value="voteHight">
                <label class="form-check-label" for="voteHight">Voto<i class="fa-solid fa-arrow-up mx-1"></i></label>
            </div>
            <div class="form-check form-switch col-auto">
                <input class="form-check-input" type="radio" role="switch" id="voteLow" name="vote" value="voteLow">
                <label class="form-check-label" for="voteLow">Voto<i class="fa-solid fa-arrow-down mx-1"></i></label>
            </div>
            <div class="form-check form-switch col-auto ">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="parking"
                    value="true">
                <label class="form-check-label" for="flexSwitchCheckDefault">Parcheggio</label>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Filtra</button>
            </div>
        </form>


        <div class="card-body">
            <table class="table table-dark table-borderless">
                <thead>
                    <tr>
                        <th scope="col">Nome Hotel</th>
                        <th scope="col">Descrizione Hotel</th>
                        <th scope="col">Parcheggio</th>
                        <th scope="col">voto</th>
                        <th scope="col">Distanza dal centro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($hotels as $hotel) { ?>
                        <tr>
                            <td>
                                <?php echo $hotel['name'] ?>
                            </td>
                            <td>
                                <?php echo $hotel['description'] ?>
                            </td>
                            <td>
                                <?php echo $hotel['parking'] ? 'Si' : 'No' ?>
                            </td>
                            <td>
                                <?php echo $hotel['vote'] ?> / 5
                            </td>
                            <td>
                                <?php echo $hotel['distance_to_center'] ?> Km
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- IMPORT CDN BOOSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <!-- IMPORT CDN FONT AWESOME  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>

</html>