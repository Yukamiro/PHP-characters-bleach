<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personnages de Bleach</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #111;
            color: #eee;
        }

        .character-card {
            background-color: #1c1c1c;
            border-radius: 1em;
            padding: 2em;
            box-shadow: 0 0 1em rgba(0, 0, 0, 0.5);
            margin-bottom: 2em;
        }

        .character-img {
            width: 100%;
            max-width: 100%;
            height: auto;
            border-radius: 0.5em;
        }

        .powers-list {
            color: #ffa500;
            margin-top: 1em;
        }

        h2 {
            color: #00bcd4;
            font-size: 1.8em;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <h1 class="text-center mb-4">Personnages de Bleach</h1>
        <form action="index.php?action=homePage" method="GET" style="text-align: center; margin: 2em 0;">

            <input type="text" id="search" name="name" placeholder="Recherche un personnage..."
                style="padding: 0.5em 1em; width: 50%; border-radius: 5px; border: 1px solid #ccc;">
            <button type="submit" style="padding: 0.5em 1em; margin-left: 0.5em; border: none; background: #333; color: white; border-radius: 5px;">
                Rechercher
            </button>
        </form>
        <div class="d-flex justify-content-center gap-3 mb-5">
            <a class="btn btn-outline-info" href="index.php">Tous</a>
            <a class="btn btn-outline-info" href="index.php?action=homePage&type=Shinigami">Shinigami</a>
            <a class="btn btn-outline-info" href="index.php?action=homePage&type=Arrancar">Arrancars</a>
            <a class="btn btn-outline-info" href="index.php?action=homePage&type=Fullbringer">Fullbringer</a>
            <a class="btn btn-outline-info" href="index.php?action=homePage&type=Quincy">Quincy</a>
        </div>
        <?php

        use App\Model\Character;

        // var_dump($_POST);
        // var_dump($_GET);
        ?>
        <div class="row">

            <?php
            echo (count($characters) == 0 ? ("Aucun résultat") : "");
            foreach ($characters as $character): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="character-card p-3">
                        <div class="mb-3 text-center">
                            <?php // if ($_POST == $character->getName()) {
                            ?>
                            <img src="<?= htmlspecialchars($character->getImage()) ?>" alt="<?= htmlspecialchars($character->getName()) ?>" class="character-img">
                        </div>
                        <h2 class="text-center"><?= htmlspecialchars($character->getName()) ?></h2>
                        <p><strong>Type :</strong> <?= $character->getType() ?></p>
                        <?php if ($character->getZanpakuto()): ?>
                            <p><strong>Zanpakuto :</strong> <?= htmlspecialchars($character->getZanpakuto()) ?></p>
                        <?php endif; ?>
                        <?php if ($character->getLetter()): ?>
                            <p><strong>Lettre (Quincy) :</strong> <?= htmlspecialchars($character->getLetter()) ?></p>
                        <?php endif; ?>
                        <?php if ($character->getFullbring_type()): ?>
                            <p><strong>Fullbring :</strong> <?= htmlspecialchars($character->getFullbring_type()) ?></p>
                        <?php endif; ?>

                        <div class="powers-list">
                            <strong>Pouvoirs :</strong>
                            <?php if (!empty($character->getPowers())): ?>
                                <ul class="mb-0">
                                    <?php foreach ($character->getPowers() as $power): ?>
                                        <li><?= htmlspecialchars($power->getPower_name()) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>null</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php  // } 
                ?>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>