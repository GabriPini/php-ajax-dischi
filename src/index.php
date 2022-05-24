<?php
require __DIR__  . '/db/database.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>php-ajax-dischi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <header>
        <img src="assets/spotify-logo.png" alt="spotify logo">
    </header>

    <main>
        
        <div class="container d-flex ">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                    <?php foreach ($album_list as $album ) :?>
                    <div class="col mb-4">
                        <div class="card my-4 ">
                            <img class="img-fluid p-3" src="<?= $album["poster"]; ?>" alt="<?= $album["title"]; ?> cover">
                            <div class="card-body text-white text-center ">
                                <h5><?= $album["title"]?></h5>
                                <p class="text-secondary fw-bold"><?= $album["author"] ?></p>
                                <p class="text-secondary "><?= $album["year"] ?></p>
                            </div>
                        </div>
                        
                    </div>  
                    <?php endforeach ?>
            </div>
        </div>
    </main>

</body>
</html>