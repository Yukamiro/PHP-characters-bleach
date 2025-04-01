<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Détail du personnage - <?= htmlspecialchars($characters->getName()) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-color: #111;
            color: #eee;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 960px;
            margin: 4em auto;
            background: #1e1e1e;
            border-radius: 1em;
            padding: 2em;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
        }

        .character-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 2em;
            align-items: center;
        }

        .character-img {
            max-width: 240px;
            width: 100%;
            height: auto;
            border-radius: 1em;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        h1 {
            font-size: 2.2em;
            color: #00bcd4;
            margin-bottom: 0.5em;
        }

        .info p {
            margin: 0.3em 0;
            font-size: 1.05em;
        }

        .info .label {
            font-weight: bold;
            color: #ffa500;
        }

        .description {
            margin-top: 1.5em;
            font-size: 1.1em;
            line-height: 1.6;
        }

        .powers-list {
            margin-top: 2em;
        }

        .powers-list strong {
            color: #ffa500;
            font-size: 1.2em;
        }

        .powers-list ul {
            padding-left: 1.5em;
        }

        .back-btn {
            display: inline-block;
            margin-top: 3em;
            padding: 0.6em 1.2em;
            background: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 0.5em;
            transition: background 0.3s ease;
        }

        .back-btn:hover {
            background: #555;
        }

        @media screen and (max-width: 768px) {
            .character-wrapper {
                flex-direction: column;
                align-items: flex-start;
            }

            .character-img {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="character-wrapper">
            <img class="character-img" src="<?= htmlspecialchars($characters->getImage()) ?>" alt="<?= htmlspecialchars($characters->getName()) ?>">

            <div class="info">
                <h1><?= htmlspecialchars($characters->getName()) ?></h1>
                <p><span class="label">Type :</span> <?= htmlspecialchars($characters->getType()) ?></p>

                <?php if ($characters->getZanpakuto()): ?>
                    <p><span class="label">Zanpakuto :</span> <?= htmlspecialchars($characters->getZanpakuto()) ?></p>
                <?php endif; ?>

                <?php if ($characters->getLetter()): ?>
                    <p><span class="label">Lettre (Quincy) :</span> <?= htmlspecialchars($characters->getLetter()) ?></p>
                <?php endif; ?>

                <?php if ($characters->getFullbring_type()): ?>
                    <p><span class="label">Fullbring :</span> <?= htmlspecialchars($characters->getFullbring_type()) ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="description">
            <?= nl2br(htmlspecialchars($characters->getDetails())) ?>
        </div>

        <div class="powers-list">
            <strong>Pouvoirs :</strong>
            <?php if (!empty($characters->getPowers())): ?>
                <ul>
                    <?php foreach ($characters->getPowers() as $power): ?>
                        <li><?= htmlspecialchars($power->getPower_name()) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>null</p>
            <?php endif; ?>
        </div>

        <a class="back-btn" href="index.php">← Retour à la liste</a>
    </div>

</body>

</html>