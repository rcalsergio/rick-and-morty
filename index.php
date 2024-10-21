<?php

if(isset($_GET['url']) && $_GET['url'] != null){
    $url = $_GET['url'];
}else{
    $url = "https://rickandmortyapi.com/api/character";
}
$response = file_get_contents($url);
$data = json_decode($response);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick y Morty</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <img src="rickymorty.png" class="rounded mx-auto d-block" onclick="location.href='.';">
    <div class="container mt-5">
        <?php
        foreach ($data->results as $personaje) {
            echo "<div class='card mt-3 p-3 shadow-sm'>";
            echo "<h4 class='card-title'>Personaje: <strong>$personaje->name</strong></h4>";
            echo "<p><strong>ID:</strong> $personaje->id</p>";
            echo "<p><strong>Especie:</strong> $personaje->species</p>";
            echo "<p><strong>Episodios:</strong> " .  count($personaje->episode) . "</p>";
            echo "<img src='$personaje->image' class='img-fluid' width='150px'>";
            echo "</div>";
        }
        ?>
        <div class="mt-4">
            <div class="w3-show-inline-block">
                <?php if($data->info->prev != null){ ?>
                        <input type='button' onclick="location.href='.?url=<?php echo $data->info->prev;?>';"
                            class="btn btn-primary" value="Atrás"/>
                        <?php } ?>
                        <?php if($data->info->next != null){ ?>
                        <input type="button" onclick="location.href='.?url=<?php echo $data->info->next;?>';" class="btn btn-dark"
                            style="margin-left: 10px" value="Siguiente"/>
                        <?php } ?>
            </div>
        </div>
        <br>
        <!-- Bootstrap JS and Popper.js CDN -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>