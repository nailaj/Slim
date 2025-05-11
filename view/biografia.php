<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Músics del Pakistan</title>
</head>
<body>
    <h1>Músics del Pakistan</h1>
    <ul>
        <?php foreach ($musics as $music): ?>
            <li>
                <h3><?= htmlspecialchars($music['name']) ?></h3>
                <p><?= htmlspecialchars($music['biography']) ?></p>
                <?php if (!empty($music['image_url'])): ?>
                    <img src="<?= htmlspecialchars($music['image_url']) ?>" alt="<?= htmlspecialchars($music['name']) ?>" width="300"><br>
                <?php endif; ?>
                <a href="<?= htmlspecialchars($music['website']) ?>" target="_blank">Visita la seva web</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
